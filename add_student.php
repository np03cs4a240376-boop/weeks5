<?php
require "functions.php";
require "header.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $name = formatName($_POST["name"]);
        $email = $_POST["email"];
        $skills = cleanSkills($_POST["skills"]);

        if (empty($name) || empty($email)) {
            throw new Exception("All fields are required.");
        }

        if (!validateEmail($email)) {
            throw new Exception("Invalid email format.");
        }

        saveStudent($name, $email, $skills);
        $message = "Student saved successfully!";
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<h3>Add Student Info</h3>

<form method="post">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="text" name="email"><br><br>
    Skills: <input type="text" name="skills"><br><br>
    <button type="submit">Save</button>
</form>

<p><?php echo $message; ?></p>

<?php require "footer.php"; ?>
