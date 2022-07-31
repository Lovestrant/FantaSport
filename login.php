<?php
session_start();

$email =$password = '';
$errors = array("phonenumberErr" => "", "success" => "");

include_once('db.php');


if(isset($_POST['submit'])){
   
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    
    if(empty($email)) {
        $errors['phonenumberErr'] = "Email Required";
    }elseif(empty($password)){
        $errors['phonenumberErr'] = "Password Required";
    }else{
        $password1 = md5($password); //encrypting password
        $sql1="SELECT * FROM authentication where  email='$email'";// and password= '$password1' LIMIT 1";
      
        $result= mysqli_query($con,$sql1);
        $queryResults= mysqli_num_rows($result);
        
        if($queryResults) {
    
            while($row = mysqli_fetch_assoc($result)) {
    
            //set session variables
            $_SESSION['email'] = $row['email'];
            $_SESSION['phonenumber'] = $row['phonenumber'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
      
            //taking user to main page
           $errors['success'] = "Login successful.";
           echo"<script>location.replace('index.php');</script>"; 

            }
        }else{
            $errors['phonenumberErr'] = "Wrong combinations. Fill your details correctly.";
    
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
<div class = "row"  id="headerbody">

    <div class="row">
    <div class="col-sm-12">
        <p id="topparagraph" style="font-size: 25px">Login:</p>
        </div>
    </div>
    <br><br>

    <div class="row">
    <div class="col-sm-12" id="topparagraph">
            <form action="login.php" method="post">
                <input class="reginput" type="email" name ="email" placeholder="Enter your Email"><br><br>
                <input  class="passinput" type="password" name = "password" placeholder ="Enter your password"> <br><br>
            
            <!--Error display-->
            <div><h5 style="color: red;"><?php echo $errors['phonenumberErr']; ?></h5></div>
            <div><h5 style="color: green;"><?php echo $errors['success']; ?></h5></div>
            
            <button type= "submit" name="submit" title="Login">Login</button>

            </form>
        </div>
    </div>

    <br>
    <div class="row" id="topparagraph">
    <div class="col-sm-12" id ="bottomdiv">
            <a href="register.php" id="register">Create A new Account</a><br><br>
            <a id="reset" href="reset.php">Forgot Password</a>
            
    </div>
    </div>

</div>

</div>

    
</body>
</html>