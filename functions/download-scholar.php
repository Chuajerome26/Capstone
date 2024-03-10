<?php

require '../classes/database.php';
$database = new Database();

$data = "SELECT * FROM scholar_info WHERE status = 1 ORDER BY id ASC";
$query = $database->getConnection()->query($data);

if ($query->rowCount() > 0) {
    $delimeter = ",";
    $filename = "scholar-data_" . date('Y-m-d') . ".csv";

    $f = fopen('php://memory', 'w');

    // Define fields for the data
    $fields = array('SCHOLAR_ID', 'FIRST_NAME', 'MIDDLE_NAME', 'LAST_NAME', 'SUFFIX', 'GENDER', 'AGE', 'NICK_NAME', 'CIVIL_STATUS', 'CITIZENSHIP', 'DATE_OF_BIRTH', 'BIRTH_PLACE', 'HEIGHT', 'WEIGHT', 'RELIGION', 'MOBILE_NUMBER', 'EMAIL', 'ADDRESS', 'PROVINCE', 'MED_CONDITION', 'FB_LINK', 'SKILLS', 'FATHER_NAME', 'FATHER_AGE', 'FATHER_OCCUPATION', 'FATHER_INCOME', 'FATHER_ATTAINED', 'MOTHER_NAME', 'MOTHER_AGE', 'MOTHER_OCCUPATION', 'MOTHER_INCOME', 'MOTHER_ATTAINED', 'GUARDIAN', 'EMERGENCY_CONTACT', 'GUARDIAN_RS', 'GUARDIAN_CONTACT', 'E_SCHOOL', 'E_AVE', 'E_ACHIEVEMENTS', 'JH_SCHOOL', 'JH_AVE', 'JH_ACHIEVEMENTS', 'SH_SCHOOL', 'SH_AVE', 'SH_ACHIEVEMENTS', 'SH_COURSE', 'C_SCHOOL', 'C_AVE', 'C_ACHIEVEMENTS', 'C_COURSE', 'OTHER_SCHO', 'OTHER_SCHO_TYPE', 'OTHER_SCHO_COVERAGE', 'OTHER_SCHO_STATUS', 'Q1', 'Q2', 'APPLY_SCHO', 'APPLY_SCHO_EXPLAIN', 'DATE_APPLY');
    fputcsv($f, $fields, $delimeter);


    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $linedata = array(
            $row['id'], $row['f_name'], $row['m_name'], $row['l_name'], $row['suffix'], $row['gender'], $row['age'], $row['nick_name'], $row['c_status'], $row['citizenship'], $row['date_of_birth'], $row['b_place'], $row['height'], $row['weight'], $row['religion'], $row['mobile_number'], $row['email'], $row['address'], $row['province'], $row['med_condition'], $row['fb_link'], $row['skills'], $row['father_name'], $row['father_age'], $row['father_occupation'], $row['father_income'], $row['father_attained'], $row['mother_name'], $row['mother_age'], $row['mother_occupation'], $row['mother_income'], $row['mother_attained'], $row['guardian'], $row['emergency_contact'], $row['guardian_rs'], $row['guardian_contact'], $row['e_school'], $row['e_ave'], $row['e_achievements'], $row['jh_school'], $row['jh_ave'], $row['jh_achievements'], $row['sh_school'], $row['sh_ave'], $row['sh_achievements'], $row['sh_course'], $row['c_school'], $row['c_ave'], $row['c_achievements'], $row['c_course'], $row['other_scho'], $row['other_scho_type'], $row['other_scho_coverage'], $row['other_scho_status'], $row['q1'], $row['q2'], $row['apply_scho'], $row['apply_scho_explain'], $row['date_apply']
        );
        fputcsv($f, $linedata, $delimeter);
    }

    fseek($f, 0);

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    fpassthru($f);
} else {
    echo "No records found.";
}


// $datadelete = "SELECT * FROM attendance";
// $querydel = $conn->query($datadelete);
// if($querydel->num_rows > 0){
//     while($row1 = $querydel->fetch_assoc()){
//         $delete = "DELETE FROM attendance WHERE attendance.id = '".$row1['id']."'";
//         $querydell = $conn->query($delete);
//     }
// }