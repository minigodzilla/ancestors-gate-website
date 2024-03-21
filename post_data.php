<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    // CSV format data
    $csvData = "$name,$email,$comment\n";

    // Path to the text file for appending data
    $file = 'form_data.csv';

    // Append data to the file
    if (file_put_contents($file, $csvData, FILE_APPEND | LOCK_EX) !== false) {
        $response = 'Thank you for your feedback!';
    } else {
        $response = 'Error saving form data. Please try again later.';
    }
} else {
    $response = 'Error: Invalid request.';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ancestors' Gate - Contact</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
   <div><?php echo $response ?></div>
</body>

</html>
