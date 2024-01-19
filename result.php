<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollNumber = $_POST["rollNumber"];
    
    // Load Excel sheet (Assuming the file is named "results.xlsx")
    $excelFile = 'results.xlsx';
    $excelData = [];
    
    if (file_exists($excelFile)) {
        $excelData = array_map('str_getcsv', file($excelFile));
    }
    
    // Search for the roll number in the Excel data
    $result = null;
    foreach ($excelData as $row) {
        if ($row[0] == $rollNumber) {
            $result = $row;
            break;
        }
    }
    
    // Display result
    if ($result !== null) {
        echo "<h2>Result for Roll Number: $rollNumber</h2>";
        echo "<p>Name: $result[1]</p>";
        echo "<p>Medium: $result[2]</p>";
        echo "<p>Subject 1: $result[3]</p>";
        echo "<p>Subject 2: $result[4]</p>";
        echo "<p>Subject 3: $result[5]</p>";
        echo "<p>Subject 4: $result[6]</p>";
        echo "<p>Total: $result[7]</p>";
        echo "<p>Status: $result[8]</p>";
    } else {
        echo "<p>No result found for Roll Number: $rollNumber</p>";
    }
}
?>
