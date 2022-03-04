<?php session_start(); 
 
if (isset($_SESSION['user1'])){
    unset($_SESSION['user1']); // xóa session login
}
header('location: index.php');

?>