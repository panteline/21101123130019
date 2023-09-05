<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/global.css" type="text/css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <title>CRUD_TABLE.php</title>
    <link rel="stylesheet" href="CRUD.css">
</head>

    <table border = "3px" align = "center">
        <tr>
            <caption><big>WORKERS DETAILS</big></caption>
            <th>id</th>
            <th>first name</th>
            <th>second name</th>
            <th>sex</th>
            <th>age</th>
            <th></th>
            
        </tr>

        <?php
        //read from the database

        $host = "localhost";
        $dbuser = "root";
        $dbname = "crud";
        $dbpassword = "";
        $connection = mysqli_connect($host,$dbuser,$dbpassword,$dbname);

        $query = 'SELECT * FROM crud_ipt ORDER BY id ASC';
        $result = mysqli_query($connection,$query);
        $i=1;

        while($row = mysqli_fetch_array($result)){
            $id = $row['id'];
            $first_name = $row['first_name'];
            $second_name = $row['second_name'];
            $sex = $row['sex'];
            $age = $row['age'];

            echo '<tr>';
            echo '<td>'.$i. '</td>';
            echo '<td>'.$row['first_name']. '</td>';
            echo '<td>'.$row['second_name']. '</td>';
            echo '<td>'.$row['sex']. '</td>';
            echo '<td>'.$row['age']. '</td>';

           
            echo '<td><button><a class = "btn btn-success" href = "CRUD_UPDATE.php?id='.$row['id'].'">update</a></button>';
            echo '</td>';

            echo '<td>';
            echo "<div><button style='background-color:lightgreen;' onclick = 'futaPost($id)'>delete</button></div>";
            echo '</td>';
            echo '</tr>';
            $i++;
        }

        if(isset($_GET['deletePostId']) && $_GET['deletePostId']){
            $id = $_GET['deletePostId'];
            $delete_query  = "DELETE FROM `crud_ipt` WHERE id = $id";
            $query = mysqli_query($connection,$delete_query);

        }


?>
<br><br><br>
<script>
    function futaPost(id){
        console.log(id)
        var jibu = confirm('Are you sure you want to delete');
        if(jibu){
            var url = '?deletePostId='
            window.location =url+id
        }
    }
</script>
    </table>
    
</body>
</html>