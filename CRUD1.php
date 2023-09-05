<?php
//send data to the database

$host = "localhost";
$dbuser = "root";
$dbname = "crud";
$dbpassword = "";
$connection = mysqli_connect($host,$dbuser,$dbpassword,$dbname);

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    

$query = "INSERT INTO crud_ipt VALUES('','$first_name','$second_name','$sex','$age')";
mysqli_query($connection,$query);
header('location:CRUD_TABLE.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPT7</title>
    <link rel="stylesheet" href="CRUD.css">
</head>
<body>
    <center>
        <div class = "table" style = "margin-top :20px;" >

        <h1><big>REGISTER.</big></h1><br>
    <form action="CRUD1.php" method = "post">
        <label for="first_name">first name</label><br>
        <input type="text" name = "first_name" ><br>

        <label for="second_name">second name</label><br>
        <input type="text" name = "second_name" ><br>

        <label for="sex">sex</label><br>
        <input type="text" name = "sex" ><br>

        <label for="age">age</label><br>
        <input type="text" name = "age" ><br>

        <input type="submit" name = "submit" value = "SUBMIT">
    </form>
    </div>
    </center>
</body>
</html>