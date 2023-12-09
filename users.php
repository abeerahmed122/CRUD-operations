<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crud Operation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container my-5" >
    <h2>List Of Clients</h2>
    <a class="btn btn-primary " href="/crud/create.php" role="button">New Client</a>
    <br>
    <table class="table" >
        <thead>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Created at</th>
        <th>Action</th>
        </tr>
        </thead>
       <tbody>
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "crud";

   $connect=new mysqli($servername,$username,$password,$dbname);
   if($connect->connect_error){
die("connection failed:" .$connect->connect_error);
   }
//read all data from database
   $sql= "select * from clients";
   $result=$connect->query($sql);

      //check for query
      if(!$result){  //if we had any error in this query
          die('invalid query' .$connect->connect_error);
      }
   //i retrieve the data from db for each row by using fetch_assoc
    while($row=$result->fetch_assoc()){
          echo "
          <tr>
          <td>$row[id]</td>
          <td>$row[name]</td>
          <td>$row[email]</td>
          <td>$row[phone]</td>
          <td>$row[address]</td>
          <td>$row[created_at]</td>
          <td>
              <a class='btn btn-primary btn-sum' href='/crud/edit.php?id=$row[id]'>Edit</a>
              <a class='btn btn-danger btn-sum' href='/crud/delete.php?id=$row[id]'>Delete</a>
          </td>
      </tr>
          ";
    }
      ?>

       </tbody>
    </table>

</div>

</body>
