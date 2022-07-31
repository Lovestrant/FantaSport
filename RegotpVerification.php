<?php 
session_start();

$otpV  = '';
$errors = array("passwordErr" => "", "success" => "");
include_once('db.php');

if(isset($_POST['submit'])) {
  $email = $_SESSION['email'];
  $firstName =$_SESSION['firstname'];
  $LastName =  $_SESSION['lastname'];
  $address = $_SESSION['address'];
  $password1 = $_SESSION['password1'];
  $phonenumber = $_SESSION['phonenumber'];


    if($_POST['otp'] === $_SESSION['session_otp']){
       
        $sql = "INSERT INTO authentication (firstname,lastname, phonenumber,email, address, password) VALUES ('$firstName', '$LastName','$phonenumber','$email','$address','$password1')";
        $res = mysqli_query($con,$sql);
		
		if($res ==1){
        $errors['success'] = "Registration successful.";

        sleep(5);
        echo"<script>location.replace('login.php');</script>"; 
		}  

    }else{
        $errors['passwordErr'] = "Failed, wrong OTP";
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
    <div class="container">
    <div class="row" id="topparagraph">
        <div class="col-sm-12">
            <h2>Ente OTP from email to complete Registration</h2>
        <div class="col-sm-12">
            <form action="RegotpVerification.php" method="post">
            <input class="reginput" type="text" name ="otp" placeholder="Enter OTP " value="<?php echo $otpV;?>" required><br><br>

                <!--Error display-->
                <div><h3 style="color: green;"><?php echo $errors['success']; ?></h3></div>
                <div><h3 style="color: red;"><?php echo $errors['passwordErr']; ?></h3></div>
                
                <button name="submit" title="sign Up" >Complete Registration</button>

            </form>
        </div>
        </div>
    </div>
    </div>
</body>
</html>