<?php
require "functions.php";
require "header.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $fileName = uploadPortfolioFile($_FILES["portfolio"]);
        $message = "File uploaded successfully: " . $fileName;
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>

<h3>Upload Portfolio File</h3>

<form method="post" enctype="multipart/form-data">
    Select file:
    <input type="file" name="portfolio"><br><br>
    <button type="submit">Upload</button>
</form>

<p><?php echo $message; ?></p>

<?php require "footer.php"; ?>
