<div class="container my-4">


    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">user_id</th>
          <th scope="col">email</th>
          <th scope="col">password</th>
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
            echo "<tr>
            <th scope='row'>". $user_id . "</th>
            <td>". $row['email'] . "</td>
            <td>". $row['password'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['user_id'].">Edit</button> <button class='delete btn btn-sm btn-danger' id=d".$row['user_id'].">Delete</button>  </td>
          </tr>";
        } 
          ?>


      </tbody>
    </table>
  </div>

  //addc
  // else{
//     //$user_name = $_POST["user_name"];
//     $email = $_POST["email"];
//     $password = $_POST["password"];

//   // Sql query to be executed
//   $sql = "INSERT INTO `user_db` ('user_name', `email`, `password`) VALUES ('$email', '$password')";
//   $result = mysqli_query($conn, $sql);

   
//   if($result){ 
//       $insert = true;
//       echo "welcome".$;
//   }
//   else{
//       echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
//   } 
// }
// }