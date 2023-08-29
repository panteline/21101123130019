<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/global.css" type="text/css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
    body{
background-color: darkblue;
background-size: cover;
background-repeat: no-repeat;
background-position: center;
background-image: linear-gradient(greenyellow,#FFA500);
}
content, table{
    box-shadow: 0px 0px 10px 10px red;
    background-color:violet;
    border-radius: 25px;
}
    .content table, tr,th{
        border: 1px solid green;
        border-width: 5px;
        margin-left: 200px;
    background-color:darkblue;
        width:800px;  
    }
    .content table, caption{
        border: 1px solid green;
        border-width: 5px;
        width:800;  
        background-color:darkblue;
        font-size:40px;
        height:50px;
        padding-top:20px;
    }
    .content table, tr,td{
        border: 1px solid green;
        border-width: 5px;
        margin-left: 200px;
        background-color:blue;
        font-size:15px;
        width:800px;  
    }
    </style>
</head>
<body>
<button><a href="index.php">logout</a></button>
    
<font face="WELCOME! WELCOME! WELCOME!" size="7">
        <marquee style="color:red;" direction="left">WELCOME! WELCOME! WELCOME!</marquee></font>
<button style='background-color:pink;margin-left:550px;width:90px;margin-top:40px;border-radius: 10px;'><a href="index.php">back</a></button>
    <div class="yaliyomo">
    <table>
    <caption>TAARIFA ZA WAAJILIWA</caption>
    <tr>
    <th>Number</th>
    <th>name</th>
    <th>address</th>
    <th>salary</th>
    <th>mobile</th>
    </tr>
    <?php
    include ("database.php");
    $sql = 'SELECT * FROM `list` ORDER BY id ASC';
    $result = mysqli_query($con, $sql);
    $i=1;
    while($row = mysqli_fetch_array($result)){
           $id = $row['id'];
           $name = $row['name'];
           $address = $row['address'];
           $salary= $row['salary'];
           $mobile = $row['mobile'];


                            echo '<tr>';
                            echo '<td>'. $i. '</td>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['address'] . '</td>';
							echo '<td>'. $row['salary'] . '</td>';
							echo '<td>'. $row['mobile'] . '</td>';
							echo '<td><a class="btn btn-success" href="edit.php?id='.$row['id'].'">Edit</a>';
							echo ' ';
							echo "<div> <button style='background-color:darkgreen;' onclick='futaPost($id)'>Delete</button></div>";
							echo '</td>';
                            echo '</tr>';
                            $i++;
                   }
                   if(isset($_GET['deletePostId']) && $_GET['deletePostId']!=''){
                    $id = $_GET['deletePostId'];
                    $delete_query = "DELETE FROM `list` WHERE id = $id";
                    $result = mysqli_query($con,$delete_query);
                
                }   
            
                ?>
                <br><br><br>
            </div>
            <script>
                    function futaPost(id){
                        console.log(id)
                        var jibu = confirm('Are you sure you want to delete?')
                        if(jibu){
                            var url = '?deletePostId='
                            window.location =url+id
                        }
                    }
                </script>
                            
    </table>
    </div>
</body>
</html>