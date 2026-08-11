<?php
$host="localhost";
$user="root";
$password="";
$dbname="library";
$conn=mysqli_connect($host,$user,$password,$dbname);
if(!$conn){
    echo "DataBase not connected";
}
$sid=$_GET['sid'];
$sql="SELECT * FROM books WHERE sn=$sid";
$res=mysqli_query($conn,$sql);
$books=mysqli_fetch_assoc($res);

if(!empty($_POST)){
    $name=$_POST['name'];
    $author=$_POST['author'];
    $publication=$_POST['publication'];
    $sql="UPDATE books SET name='$name', address='$address', publication='$publication' WHERE sn=$sid";
    $res=mysqli_query($conn,$sql);
    if($res){
        header("Location: index.php");
    } else {
        echo "Record not updated";
    }
}
?>
<form method="POST">
name: <input type="text" name="name" value="<?php echo $books['name']; ?>"><br>
author: <input type="text" name="author" value="<?php echo $books['author']; ?>"><br>
publication: <input type= "text" name="publication" value="<?php echo $books['publication']; ?>"><br>
<button>update record</button>
</form>