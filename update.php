<?php

include 'connect.php';
$id= $_GET['updateid'];
$sql="select * from user where id=$id";
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name= $row['name'];
$email= $row['email'];
$mobile= $row['mobile'];
$password= $row['password'];

if(isset($_POST['submit'])){
  $name= $_POST['name'];
  $email= $_POST['email'];
  $mobile= $_POST['mobile'];
  $password= $_POST['password'];

  
$sql= "update user set id=$id ,name='$name', email='$email',mobile='$mobile', password='$password' where id=$id";
$result=mysqli_query($conn,$sql);
if($result){
  header('location:index.php');
}else{
  die(mysqli_error($conn));
}
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Basic Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
  <div class="container my-5">
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" autocomplete="off" name="name" placeholder="enter your name"
          value=<?php echo $name ?>>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" autocomplete="off" name="email" placeholder="enter your email"
          value=<?php echo $email ?>>
      </div>
      <div class="mb-3">
        <label class="form-label">Mobile</label>
        <input type="text" class="form-control" autocomplete="off" name="mobile" placeholder="enter your mobile number"
          value=<?php echo $mobile ?>>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" autocomplete="off" name="password" placeholder="enter your password"
          value=<?php echo $password ?>>
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
</body>

</html>