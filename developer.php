<?php
session_start();

//initializing input values
$firstname = $password = $passwordconfirm = $lastname = $address =$phonenumber  =$email = '';

$errors = array("Err" => "", "passwordErr" => "", "success" => "","email" => "");

include_once('db.php');


if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $firstName = mysqli_real_escape_string($con, $_POST['firstname']);
    $LastName = mysqli_real_escape_string($con, $_POST['lastname']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $passwordconfirm = mysqli_real_escape_string($con, $_POST['passwordconfirm']);
   
     
     if($password != $passwordconfirm){
         $errors['passwordErr'] = "Password with its confirmations does not match";
      
     }elseif(empty($firstName) || empty($password) ||empty($email) ||empty($LastName) || empty($passwordconfirm) ||empty($phonenumber)){

        $errors['Err'] = "Fill all the fields.";
     }else{

        $sql1="SELECT * FROM adminauthentication where email = '$email' and phonenumber = $phonenumber Limit 1";
    
		$result= mysqli_query($con,$sql1);
		$queryResults= mysqli_num_rows($result);
		
		
        if($queryResults) {

            $errors['passwordErr'] = "Admin with same phonenumber and email already exist.";
           // echo"<script>alert('A user with same phone number already exist. Try again with a different number.')</script>"; 
        }else{
           $password1 = md5($password);//encryption of password

            $sql = "INSERT INTO adminauthentication (firstname,lastname,email, password,phonenumber) VALUES ('$firstName', '$LastName','$email','$password1','$phonenumber')";
		    $res = mysqli_query($con,$sql);
		
	
            if($res ==1){

            //set session variables
            // $_SESSION['fullname'] = "$fullname";
            // $_SESSION['phonenumber'] = "$phonenumber";

            $errors['success'] = "Registration successful.";
    
            }

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

<script>
function adminLogin() {
    location.replace("home.php");
}

</script>


</head>
<body>

<div class = "container" id="headerbody">
<div class = "row" style='margin-top: -2%;'>

    <div class="row">
        <div class="col-sm-12">
            <p id="topparagraph" style="font-size: 20px; margin-top: 5px;">Create An Account:</p>
        </div>
    </div>

    <div class="row">
    <div class="col-sm-12" id="topparagraph">
            <form action="developer.php" method="post">

                <div><h5 style="color: red;"><?php echo $errors['Err']; ?></h5></div>

                <input  class="reginput" type="text" name = "firstname" placeholder ="Enter First Name" value="<?php echo $firstname;?>"> <br><br>
                <input  class="passinput" type="text" name = "lastname" placeholder ="Enter last name" value="<?php echo $lastname;?>"> <br><br>
                <input  class="passinput" type="tel" name = "phonenumber" placeholder ="Phone Number" value="<?php echo $phonenumber;?>"> <br><br>
                <input  class="passinput" type="email" name = "email" placeholder ="Enter email" value="<?php echo $email;?>"> <br><br>
                <input  class="passinput" type="password" name = "password" placeholder ="Set password" value="<?php echo $password;?>"> <br><br>
                <input  class="passinput" type="password" name = "passwordconfirm" placeholder ="Repeat password" value="<?php echo $passwordconfirm;?>"> <br><br>
            
                <div><h3 style="color: red;"><?php echo $errors['passwordErr']; ?></h3></div>
                <div><h3 style="color: green;"><?php echo $errors['success']; ?></h3></div>

                <button name="submit" title="sign Up" >Sign Up</button>

            </form>
        </div>
    </div> <br> 


    <div class="row" id="topparagraph">
    <div class="col-sm-12" id ="bottomdiv">
         
        <a id="reset" href="login.php"> Go back to login page.</a>
        
    </div>
    </div>

</div>

</div>

</body>
</html>