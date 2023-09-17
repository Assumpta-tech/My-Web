<?php
$userName= $_POST['userName'];
$email= $_POST['email'];
$password= $_POST['password'];
$product= $_POST['products'];
$number= $_POST['number'];

//database connection
$conn = new mysqli('localhost','root','','users');
if($conn->connect_error)
{
    die('connection failed:'.$conn->connect_error);
}
else
{
    $stmt= $conn->prepare("insert into entries(userName, email, password, product, number) values("?,?,?,?,i")");
    $stmt->bind_param("ssssi", $userName, $email, $password, $product, $number);
    $stmt->execute();
    echo"Successfully done!!";
    $stmt->close();
    $conn->close();
}