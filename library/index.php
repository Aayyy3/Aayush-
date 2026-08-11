<?php
$host="localhost";
$user="root";
$password="";
$dbname="library";
$conn=mysqli_connect($host,$user,$password,$dbname);
if(!$conn){
    echo "DataBase not connected";
}
$sql="SELECT * FROM books";
$response=mysqli_query($conn,$sql);
if(!empty($_POST)){
    $name=$_POST['name'];
    $author=$_POST['author'];
    $publication=$_POST['publication'];
    $sql="INSERT INTO books(name,author,publication) VALUES('$name','$author','$publication')";
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
author: <input type="text" name="author"><br>
publication: <input type="text" name="publication"><br>
<button>add record</button>
</form>
<ul>
    <?php foreach($response as $books) { ?>
        <li><?php echo $books['name']; ?>
        <a href="delete.php?sid=<?php echo $books['sn']; ?>">Delete</a>
        <a href="edit.php?sid=<?=$books['sn']?>">Edit</a>
        </li>
    <?php } ?>

</ul>
