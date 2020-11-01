<?php

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "user";
$login_email=$_GET["email"];
$login_password=$_GET["pass"];
//Create connection of database
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbname);
//Check connection
  if (!$conn)
    {
     die("Connection failed: " . mysqli_connect_error());
    }

    //select query to select data from database,table name is user_db
    $sql = "SELECT user_name,user_email,user_password FROM user_db where user_email='$login_email' and user_password='$login_password'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);

    //check given table data is equal to given data

  if($row['user_email']==$login_email && $row['user_password']==$login_password) 
    {
     echo "<td><h1>hello " . $row['user_name'] . "</h1></td>";
    } 
    else 
    {
     echo "0 results";
    }
    //delete query 
    if(isset($_GET['delete'])){
      $user_id = $_GET['delete'];
      $delete = true;
      $sql = "DELETE FROM `user_db` WHERE `user_id` = $user_id";
      $result = mysqli_query($conn, $sql);
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>dashboard</title>
  </head>
  <body>
  <br>
  <hr>
   <a href="add_user.php" target="_blank" button class='edit btn btn-sm btn-primary abc'>Add User</a>
  <hr>
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">user_id</th>
          <th scope="col">user_name</th>
          <th scope="col">user_email</th>
          <th scope="col">user_password</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `user_db`";
          $result = mysqli_query($conn, $sql);
          $user_id = 0;
          while($row = mysqli_fetch_assoc($result)){
            $user_id = $user_id + 1;
            echo "<tr>";
            echo "<th scope='row'>". $user_id . "</th>";
            echo "<td>". $row['user_name'] . "</td>";
            echo "<td>". $row['user_email'] . "</td>";
            echo "<td>". $row['user_password'] . "</td>";
            echo "<td><a href='edit_user.php' button class='edit btn btn-sm btn-primary' id=".$row['user_id'].">Edit</a>";
            //<button class='edit btn btn-sm btn-primary' id=".$row['user_id'].">Edit</button> 
            echo "<button class='delete btn btn-sm btn-danger' id=d".$row['user_id'].">Delete</button></td>";
          //  echo "<td><a href='dashboard.php' button class='edit btn btn-sm btn-primary' id=".$row['user_id'].">Delete</a></td>";
         echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

