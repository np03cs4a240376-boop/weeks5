<?php
require "header.php";

if (file_exists("students.txt")) {
    $lines = file("students.txt");
    echo "<h3>Student List</h3>";

    foreach ($lines as $line) {
        list($name, $email, $skills) = explode("|", trim($line));
        $skillsArray = explode(",", $skills);

        echo "<p>";
        echo "<strong>Name:</strong> $name<br>";
        echo "<strong>Email:</strong> $email<br>";
        echo "<strong>Skills:</strong> ";
        print_r($skillsArray);
        echo "</p><hr>";
    }
} else {
    echo "No students found.";
}

require "footer.php";
