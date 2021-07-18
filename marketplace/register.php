<?php
require_once 'connect.php';

if(isset($_POST['signup'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    $hashpass = hash('sha256', $password);

    // $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

if(empty(trim($email))){
    echo 'Email cannot be empty';
}elseif(empty(trim($password))){
    echo 'Password cannot be empty';
}elseif(empty(trim($conpassword))){
    echo 'Re-Enter Password';
}else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo '<p>Must be a valid email</p>';
    }elseif(!$lowercase || strlen($password) < 6) {
        echo '<p>Your password must contain letters and numbers & not less than 6</p>';
      }elseif($password !== $conpassword){
          echo 'Password do not match. Try again';
      }else{

        $sql = "INSERT INTO users(name,email,password)
        VALUES('$name','$email','$hashpass')";

        if( $con->query($sql) === TRUE){
            session_start();
            echo "<div class='alert alert-success'>Successfully added new Account</div>";
            $_SESSION['success'] = 'Sucessfully registered. Please login';
            echo 'Success';

        

        header('Location: auth.php');
            
        }else{
            echo "<div class='alert alert-danger'>Error: There was an error while registering</div>";
        }
        
        }
    }

}

?>
