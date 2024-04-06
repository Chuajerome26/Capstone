<!DOCTYPE html>
<html>
<head>
    <title>Grade Calculator</title>
</head>
<body>
    <h2>Grade Calculator</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file" accept=".pdf"><br><br>
        <input type="submit" name="submit" value="Calculate Average Grade">
    </form>

    <?php
    // Include Zend_Pdf library
    require_once 'Zend/Pdf.php';

    // Function to calculate grade
    function calculateGrade($score) {
        // Implement your grading logic here
        // This is just a placeholder
        if ($score >= 90) {
            return 1.0; // Equivalent to an excellent grade (1.0)
        } elseif ($score >= 80) {
            return 2.0; // Equivalent to a very good grade (2.0)
        } elseif ($score >= 75) {
            return 2.5; // Equivalent to a good grade (2.5)
        } elseif ($score >= 70) {
            return 3.0; // Equivalent to a satisfactory grade (3.0)
        } elseif ($score >= 65) {
            return 3.5; // Equivalent to a fair grade (3.5)
        } elseif ($score >= 60) {
            return 4.0; // Equivalent to a passing grade (4.0)
        } else {
            return 5.0; // Equivalent to a failing grade (5.0)
        }
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        // Check if file is uploaded successfully
        if (isset($_FILES["file"]) && $_FILES["file"]["error"] == UPLOAD_ERR_OK) {
            // Get uploaded file details
            $fileName = $_FILES["file"]["name"];
            $fileTmpName = $_FILES["file"]["tmp_name"];

            // Load PDF file
            $pdf = Zend_Pdf::load($fileTmpName);

            // Extract text from PDF (This is a basic example, actual extraction may be more complex)
            $text = '';
            foreach ($pdf->pages as $page) {
                $text .= $page->getText();
            }

            // Split text into lines
            $lines = explode("\n", $text);

            // Skip the first three lines
            array_splice($lines, 0, 3);

            // Process each line to extract numbers
            $grades = [];
            foreach ($lines as $line) {
                // Extract numerical grades from the line
                preg_match_all('/\b\d+\b/', $line, $matches);
                foreach ($matches[0] as $match) {
                    $grades[] = intval($match);
                }
            }

            // Calculate average grade
            $totalGrades = count($grades);
            $totalScore = array_sum($grades);
            $averageGrade = $totalScore / $totalGrades;

            // Display average grade
            echo "<p>Average Grade for all students: $averageGrade</p>";
        } else {
            echo "<p>Error uploading file. Please try again.</p>";
        }
    }
    ?>
</body>
</html>
