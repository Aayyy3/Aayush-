<?php

$host="localhost";
$user="root";
$password="";
$dbname="rainbow";
$conn=mysqli_connect($host,$user,$password,$dbname);
if(!$conn){
    echo "DataBase not connected";
}
$sql="SELECT * FROM students";
$response=mysqli_query($conn,$sql);
if(!empty($_POST)){
    $name=$_POST['name'];
    $address=$_POST['address'];
    $sql="INSERT INTO students(name,address) VALUES('$name','$address')";
    $res=mysqli_query($conn,$sql);
    if($res){
        echo "Record added successfully";
        header("Location: index.php");
    } else {
        echo "Record not added";
    }
}
?>
<form method="POST">
name: <input type="text" name="name"><br>
address: <input type="text" name="address"><br>
<button>add record</button>
</form>
<ul>
    <?php foreach($response as $student) { ?>
        <li><?php echo $student['name']; ?>
        <a href="delete.php?sid=<?php echo $student['id']; ?>">Delete</a>
        <a href="edit.php?sid=<?=$student['id']?>">Edit</a>
        </li>
    <?php } ?>

</ul>