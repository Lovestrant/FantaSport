<?php
session_start();

$phonenumber = $securitykey = $password = $passwordconfirm = '';

$errors = array("passwordErr" => "", "success" =>"","OTPsuccess" =>"");

include_once('db.php');

if(isset($_POST['submit'])){

    $email= mysqli_real_escape_string($con, $_POST['email']);

    if(empty($email)) {
        $errors['passwordErr'] = "Enter email.";
    }else{
        $sql1 = "SELECT * from authentication where email = '$email' Limit 1";
        $result= mysqli_query($con,$sql1);
        $queryResults= mysqli_num_rows($result);
        
        
    if($queryResults) {
        $otp = rand(100000, 999999); //generates random otp
        $_SESSION['session_otp'] = strval($otp);
        $_SESSION['email'] = $email;
       

        $message = "Your one time email verification code is ". $otp;
        $sub = "Email verification from Fanta Sports";
        $headers = "From : " . "fantaweek.xlabproject.net";
        try{
            $retval = mail($email,$sub,$message);
            if($retval)
            {
                echo"<script>location.replace('otpVerification.php');</script>"; 
                
            }
        }
        
        catch(Exception $e)
        {
            die('Error: '.$e->getMessage());
        }

     }else{               
        $errors['phonenumberErr'] = "No user with such email in the system. Please try again.";
    
     }
 }
}
   

  
      
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports</title>

    <!--Css link-->
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <!--Bootstrap css Links -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!--Bootstrap JS Links -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>


<div class = "container" id="headerbody">

    <div class="row">
        <div class="col-sm-12">
            <p id="topparagraph" style="font-size: 20px; margin-top: 5px;">Reset Password:</p>
        </div>
    </div> <br>

    <div class="row" id="topparagraph">
        <div class="col-sm-12">
            <form action="reset.php" method="post">
            
                <input class="reginput" type="email" name ="email" placeholder="Enter your email" value="<?php echo $phonenumber;?>"><br><br>


                <!--Error display-->
                <div><h3 style="color: green;"><?php echo $errors['success']; ?></h3></div>
                <div><h3 style="color: red;"><?php echo $errors['passwordErr']; ?></h3></div>
                
                <button name="submit" title="sign Up" >Generate OTP</button>

            </form>
        </div>


 <div class="row" id="topparagraph">
        <div class="col-sm-12" id ="bottomdiv">
            <a href="register.php"> Register.</a> <br><br>
            <a id="reset" href="login.php"> Back to login page.</a>
            
        </div>
    </div>

</div>
 
</body>
</html>