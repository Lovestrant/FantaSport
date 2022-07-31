<?php 
session_start();
$otpV =$securityConfirm=$security = '';
$errors = array("passwordErr" => "", "success" => "");

include_once('db.php');

if(isset($_POST['submit'])) {
  $email = $_SESSION['email'];

  $sql1="SELECT * FROM authentication where email = '$email' Limit 1";
    
  $result= mysqli_query($con,$sql1);
  $queryResults= mysqli_num_rows($result);
  
  
  if($queryResults) {
    if(!empty($_POST['passwordConfirm']) && !empty($_POST['password']) && !empty($_POST['otp'])){
        if($_POST['passwordConfirm'] === $_POST['password']){
            if($_POST['otp'] === $_SESSION['session_otp']){
                $password1 = md5($password);//encryption of password
                $sql = "UPDATE authentication set password = '$password1' where email= '$email'";
                $res = mysqli_query($con,$sql);       
                if($res ==1){
                    $errors['success'] = "Reset Success";
                    sleep(5);
                    echo "<script>location.replace('login.php');</script>";
                }
            }else{
                $errors['passwordErr'] = "Failed, wrong OTP";
            }
        }else{
            $errors['passwordErr'] = "Password must match with its confirmation";
        }
    }else{
        $errors['passwordErr'] = "Fill all fields";
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
    <div class="container">
    <div class="row" >
        <div class="col-sm-12" id="topparagraph">
        <h2>Ente OTP from email to complete Reset</h2>
        <div class="col-sm-12">
            <form action="otpVerification.php" method="post">
            <input class="reginput" type="text" name ="otp" placeholder="Enter OTP " value="<?php echo $otpV;?>"><br><br>
                <input class="reginput" type="password" name ="password" placeholder="Enter new password" value="<?php echo $security;?>"><br><br>
                <input  class="passinput" type="password" name = "passwordConfirm" placeholder ="Confirm Password" value="<?php echo $securityConfirm;?>"> <br><br>

                <!--Error display-->
                <div><h3 style="color: green;"><?php echo $errors['success']; ?></h3></div>
                <div><h3 style="color: red;"><?php echo $errors['passwordErr']; ?></h3></div>
                
                <button name="submit" title="sign Up" >Reset</button>

            </form>
        </div>
        </div>
    </div>
    </div>
</body>
</html>