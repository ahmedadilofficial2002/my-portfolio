<?php
$email = $_POST['email'];
$password = $_POST['password'];
$conn = new mysqli('localhost','root','','CAT');

if($conn->connect_error){
    die("Connection Error ! ".$conn->connect_error);
}
else{
    $stmt = $conn->prepare("SELECT * FROM login WHERE email = ? AND password = ?");
    $stmt->bind_param('ss',$email,$password);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows>0){
    header('Location: index.html');
    $stmt->close();
    $conn->close();
    exit();
    }
    else
        {
            header('Location: error.html');
            exit();
        }
    
}
?>