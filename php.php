<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$con_pass = $_POST['pass_confirm'];
$conn = new mysqli("localhost",'root','','CAT');
if($conn->connect_error){
    die('Connection Error '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare('INSERT INTO login (name,email,password) VALUES(?,?,?)');
    $stmt->bind_param('sss',$name,$email,$password);
    $stmt->execute();
    header("Location: login.html");
    exit();
    $conn->close();
    $stmt->close();
}

?>