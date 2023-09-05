<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE7</title>
    <link rel="stylesheet" href="CRUD.css">
</head>
<body>


<?php
    $host = "localhost";
    $dbuser = "root";
    $dbname = "crud";
    $dbpassword = "";
    $connection = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
    
    if(isset($_GET['id']) && $_GET['id']!==''){
        $id = $_GET['id'];
        $query = "SELECT * FROM `crud_ipt` WHERE id = '$id'";
        $result = mysqli_query($connection, $query);

         
         while($post = mysqli_fetch_array($result)){
            $editId = $post['id'];
            $editFirst_name = $post['first_name'];
            $editSecond_name = $post['second_name'];
            $editSex = $post['sex'];
            $editAge = $post['age'];
           
           
         }
     }
     //Update
     if(isset($_POST['update'])){
        $editId = $_POST['editId'];
        $first_name = $_POST['first_name'];
        $second_name = $_POST['second_name'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $update_query = "UPDATE `crud_ipt` SET first_name='$first_name',second_name= '$second_name',sex='$sex',age='$age' WHERE id='$editId'";
        $result = mysqli_query($connection, $update_query);
    

    header('location: CRUD_TABLE.php');
}
?>

<div class ="update" style="
margin-top: 150px;">

<center>
<form action="" method="POST">
                <label for="name">first name:</label>
                <br>
                <input type="text" name="first_name" id="first name" required value="<?php echo @$editFirst_name;?>" >
                <br>

                <label for="name">second name:</label>
                <br>
                <input type="text" name="second_name" id="second name" required value="<?php echo @$editSecond_name;?>" >
                <br>

                <label for="name">sex:</label>
                <br>
                <input type="text" name="sex" id="sex" required value="<?php echo @$editSex;?>" >
                <br>

                <label for="name">age:</label>
                <br>
                <input type="text" name="age" id="age" required value="<?php echo @$editAge;?>" >
                <br>

                <!-- <label for="name">1:position:</label>
                <br>
                <input type="text" name="position" id="position" required value="<?php echo @$editPosition;?>" >
                <br> -->
        
                <input type="hidden" name="editId" value="<?php echo @$editId;?>">
                <?php if($_GET['id'] != 0){ ?>
                <br>
                <input type="submit" name="update" value="Update">
                <?php } ?>
            </form>
            </center>
                <br>
                  </div>  
</body>
</html>

