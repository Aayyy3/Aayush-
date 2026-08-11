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
$sql="SELECT * FROM students WHERE id=$sid";
$res=mysqli_query($conn,$sql);
$student=mysqli_fetch_assoc($res);

if(!empty($_POST)){
    $name=$_POST['name'];
    $address=$_POST['address'];
    $sql="UPDATE students SET name='$name', address='$address' WHERE id=$sid";
    $res=mysqli_query($conn,$sql);
    if($res){
        header("Location: index.php");
    } else {
        echo "Record not updated";
    }
}
?>
<form method="POST">
name: <input type="text" name="name" value="<?php echo $student['name']; ?>"><br>
address: <input type="text" name="address" value="<?php echo $student['address']; ?>"><br>
<button>update record</button>
</form>