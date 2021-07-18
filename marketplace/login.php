<?php

require_once 'connect.php';

session_start();

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashpass = hash('sha256' ,$password);

    // $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);

if(empty(trim($email))){
    echo 'Email cannot be empty';
}elseif(empty(trim($password))){
    echo 'Password cannot be empty';
}else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo '<p>Must be a valid email</p>';
    }elseif(!$lowercase || strlen($password) < 6) {
        echo '<p>Your password must letters and numbers & not less than 6</p>';
      }else{

        //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE email='$email'
        and password='$hashpass'";
	    $result = mysqli_query($con,$query) or die(mysql_error());
	    $rows = mysqli_num_rows($result);
        if($rows==1){

            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            
    
            // Redirect user to index.php
	    header("Location: index.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='auth.php'>Login or Register</a></div>";
	}
        
        }
         
        
        

    }

}

?>