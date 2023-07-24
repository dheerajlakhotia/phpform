<?php
include 'connect.php';

if(isset($_POST['submit'])){
  $ph='';
  $name= mysqli_real_escape_string($conn ,$_POST['name']);
  $email= mysqli_real_escape_string($conn ,$_POST['email']);
  $mobile= mysqli_real_escape_string($conn ,$_POST['mobile']);
  $password= mysqli_real_escape_string($conn ,$_POST['password']);


  $pass=password_hash($password,PASSWORD_BCRYPT);
  $emailquery="select * from user where email='$email'";
  $query= mysqli_query($conn,$emailquery);
  $emailcount= mysqli_num_rows($query);



  if ($emailcount>0){
     echo '
    <div class="alert alert-primary alert-dismissible fade show close" role="alert">
    Email already exist!
  </div>
    ';
  }else{
    $sql= "insert into user(name,email,mobile,password) values('$name','$email','$mobile','$pass')";
    $result=mysqli_query($conn,$sql);
    if($result){
      echo '
      <div class="alert alert-primary alert-dismissible fade show close my-auto" role="alert">
      data inserted sccussfully!
    </div>
      ';
    }else{
      die(mysqli_error($conn));
    }
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
    <div class="display-1 text-center">Fill the from</div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" autocomplete="off" name="name" placeholder="enter your name" required>

      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" autocomplete="off" name="email" placeholder="enter your email"
          required>
      </div>
      <div class="mb-3">
        <label class="form-label">Mobile</label>
        <input type="text" class="form-control" autocomplete="off" name="mobile" placeholder="enter your mobile number"
          required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" autocomplete="off" name="password" placeholder="enter your password"
          required>
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>


    <!-- form end here -->

    <div class="display-3 my-5 text-center">USER DATA</div>

    <table class="table table-primary  table-hover">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Mobile</th>
          <th scope="col">Password</th>
          <th scope="col">Oppration</th>
        </tr>
      </thead>
      <tbody>

        <?php 
      $sql= "select * from user";
      $result=mysqli_query($conn,$sql);
      if($result){
        while($row=mysqli_fetch_assoc($result)){
                  $id=$row['id'];
                  $name=$row['name'];
                  $email=$row['email'];
                  $mobile=$row['mobile'];
                  $password=$row['password'];
                  echo '<tr>
                  <th scope="row">'.$id.'</th>
                  <td>'.$name.'</td>
                  <td>'.$email.'</td>
                  <td>'.$mobile.'</td>
                  <td>'.$password.'</td>
                  <td>
                  <button class="btn btn-primary my-2"><a class="text-light"href="update.php?updateid='.$id.'">Update</a></button>
                  <button class="btn btn-danger"><a class="text-light"href="delete.php?deleteid='.$id.'">Delete</a></button>
                </td>
                </tr>';
        }
      }     
      ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
</body>

</html>