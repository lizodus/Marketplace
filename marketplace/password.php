<?php
require_once 'header.php';

require_once 'connect.php';

session_start();
if(isset($_POST['change'])){
    $password = $_POST['password'];
    $email = $_POST['email'];
    $hashpass = hash('sha256', $password);

//Checking is user existing in the database or not

        $sql = "UPDATE users SET password = '$hashpass'
         WHERE email = '$email' ";
  
      if( $con->query($sql) === TRUE){
          echo "<div class='alert alert-success'>Successfully updated</div>";
          mysqli_close($con); // Close connection
          // redirects to all records page
          $_SESSION['success'] = 'Sucessfully updated';
          echo "<div class='alert alert-primary'>";
          $_SESSION['success'];
         echo "<a href='auth.php' class='btn btn-primary'>Login Here</a>";
          "</div>";
          exit;
      
      }else{
          echo "<div class='alert alert-danger'>Error: There was an error while adding new todo</div>";
          echo mysqli_error($con);
      }
} 
    ?>

    <div class="mt-4 container">
        <h4>Change Password</h4>
       <form id="loginform" class="form-horizontal" action="password.php" method="POST">
                     

       <div style="margin-bottom: 25px" class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input type="text" class="form-control" name="email" placeholder="Email">
    <div class="col-sm-12">

    <div style="margin-bottom: 25px" class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

    <input id="login-username" type="text" class="form-control" name="password" placeholder="Enter New Password" required>
    <div class="col-sm-12">
<input id="btn-login" type="submit" name="change" class="btn btn-success" value="Submit">  
                                      
                                    </div>
                                         
</div>

</div>
</form>
<?php
require_once 'footer.php';
?>
