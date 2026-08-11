<?php
$host="localhost";
$user="root";
$password="";
$dbname="rainbow";
$conn=mysqli_connect($host,$user,$password,$dbname);
if(!$conn){
    echo "DataBase not connected";
}
$sid=$_GET['sid'];
$sql="DELETE FROM students WHERE id=$sid";
$res=mysqli_query($conn,$sql);
if($res){
    echo "Record deleted successfully";
    header("Location: index.php");
} else {
    echo "Record not deleted";
}