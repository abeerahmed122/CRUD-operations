<?php
if(isset($_GET['id'])){
$id=$_GET['id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

$connect=new mysqli($servername,$username,$password,$dbname);

$sql="DELETE FROM clients WHERE id=$id";
$connect->query($sql);
}
header("Location: /crud/users.php");
exit;
?>