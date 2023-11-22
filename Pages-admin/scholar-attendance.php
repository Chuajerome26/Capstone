<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="configure();">
    <div class="container">
        <div id="my_camera"></div>
        <div id="results" style="visibility: hidden;position:absolute;"></div>
        
        <!-- Add an input field to capture the ID -->
        <input type="text" id="idInput" placeholder="Enter ID" />
        <br>
        <!-- Change the button type to "button" to prevent form submission -->
        <button type="button" onclick="saveSnap();">Save</button>
    </div>

    <script type="text/javascript" src="../assets/js/webcam.min.js"></script>
    <script type="text/javascript">
        function configure() {
            Webcam.set({
                width: 480,
                height: 360,
                image_format: 'jpeg',
                jpeg_quality: 90
            });

            Webcam.attach('#my_camera');
        }

        function saveSnap() {
            // Get the ID input value
            var idInputValue = document.getElementById("idInput").value;

            // Take a snapshot
            Webcam.snap(function(data_uri) {
                document.getElementById('results').innerHTML = '<img id="webcam" src="' + data_uri + '">';
                
                // Create a FormData object to send data to upload.php
                var base64Image = data_uri.split(',')[1]; // Extract the base64 image data

                var formData = new FormData();
                formData.append("id", idInputValue);
                formData.append("image", base64Image); // Send the base64 image data

                // Send the data to a function that saves the image
                saveImage(formData);
            });

            Webcam.reset();
        }

        function saveImage(formData) {
            // Send the data to a PHP script that will save the image
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../functions/upload.php", true); // Replace with the correct path to your PHP script
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    window.location.href = '../functions/upload.php';
                    configure();
                }
            };
            xhr.send(formData);
        }
    </script>
</body>
</html>
