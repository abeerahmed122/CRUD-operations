<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

$connect=new mysqli($servername,$username,$password,$dbname);?>



<?php

$name="";
$email="";
$phone="";
$address="";
$error_message="";
$success_message="";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];

    do
    {
if(empty($name) || empty($email) || empty($phone)|| empty($address)){
    $error_message="All the fields are required";
    break;
}

$sql="INSERT INTO clients (name,email,phone,addres)" . "VALUES($name,$email,$phone,$address)";
$result=$connect->query($sql);

if(!$result){

    $error_message="invalid query:" .$connect->connect_error;
    break;
}
        $name="";
        $email="";
        $phone="";
        $address="";
        $success_message="client add correctly";
header("Location:/ crud/users.php");
exit;

    }
        while(false);
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <title>crud</title>
</head>
<body>
<div class="container my-5">
    <h2>New Clients</h2>
    <?php
    if(!empty($error_message)){
       echo"
       <div class='alert alert-warning alert-dismissable fade shoe' role='alert'>
       <strong>$error_message</strong>
       <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
       
       </div>
       ";
    }
    ?>






    <form method="post">
                <div class="mb-3">
                    <label>Your Name</label>
                    <input type="text"
                           class="form-control"
                           placeholder="Enter Your Name"
                           name="name"
                           autocomplete="off"
                           value="<?php echo"$name"?>">

                <div class="mb-3 ">
                    <label >Your Email</label>
                    <input type="email"
                           class="form-control"
                           placeholder="Enter Your Email"
                           name="email"
                           autocomplete="off"
                           value="<?php echo"$email"?>">
                </div>

                <divclass="mb-3">
                  <label>Your Mobile Number</label>
                    <input type="number"
                           class="form-control"
                           placeholder="Enter Your Mobile"
                           name="phone"
                           autocomplete="off"
                           value="<?php echo"$phone"?>">
                </div>
                    <div class="mb-3">
                        <label >Your Address</label>
                        <input type="text"
                               placeholder="Enter Your Address"
                               class="form-control"
                               name="address"
                              autocomplete="off"
                               value="<?php echo"$address"?>">
                    </div>
        <?php
        if(!empty($success_message)){
            echo"
<div class='row mb-3'>
      <div class='offset-sm-3 col-sm-6'>
       <div class='alert alert-success alert-dismissable fade shoe' role='alert'>
       <strong>$success_message</strong>
       <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
       </div>
       </div>
       </div>
       ";
        }
        ?>
        <div>
                <button type="submit" class="btn btn-primary">Submit</button><br>
        </div><br>
        <div class="col-sm-3 d-grid">
            <a class="btn btn-outline-primary" href="/crud/users.php" role="button">Cancel</a>
        </div>
            </form>

</div>
</body>
</html>