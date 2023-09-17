<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $name = $_POST["name"];
    $comment = $_POST["comment"];
    
    // Sanitize user input (you should do more robust sanitization in a production environment)
    $name = htmlspecialchars($name);
    $comment = htmlspecialchars($comment);
    
    // Create a timestamp for the comment
    $timestamp = date("Y-m-d H:i:s");
    
    // Format the comment
    $formattedComment = "Name: $name\nTimestamp: $timestamp\nComment: $comment\n\n";
    
    // Store the comment in a text file
    $filePath = "comments/" . date("Y-m") . "-comments.txt"; // Store comments by month
    file_put_contents($filePath, $formattedComment, FILE_APPEND | LOCK_EX);
    
    // Redirect back to the comments page (change this to your actual page)
    header("Location: about.html");
}
?>
