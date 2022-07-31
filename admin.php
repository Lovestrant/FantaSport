<?php
 include_once("db.php");
 $errors = array("Err" => "", "passwordErr" => "", "success" => "");
 //First File

 if(isset($_POST['uploadQuotation'])){
    //  Include PHPExcel_IOFactory  
    require('import/PHPExcel.php');
    require('import/PHPExcel/IOFactory.php');


    $file = $_FILES['q_file']['tmp_name'];
    $file_n = $_FILES['q_file']['name'];
 

    $ext = pathinfo($file_n, PATHINFO_EXTENSION);
    
    if(!empty($file)){
        if($ext == 'xlsx'){
            $obj = PHPExcel_IOFactory::load($file);
    
            //  Get worksheet dimensions
            $sheet = $obj->getSheet(0); 
            $highestRow = $sheet->getHighestRow(); 
            $highestColumn = $sheet->getHighestColumn();
            
            //  Insert row data array into your database of choice here
            $sql1 = "SELECT * FROM wpv7_fanta90_sports_quote";

            $result= mysqli_query($con,$sql1);
            $queryResults= mysqli_num_rows($result);

            if(empty($queryResults)){
                for ($row = 3; $row <= $highestRow; $row++){ 
                    //  Read a row of data
                    $r = $sheet->getCellByColumnAndRow(1, $row)->getValue();
                    $n = $sheet->getCellByColumnAndRow(2, $row)->getValue();
                    $s = $sheet->getCellByColumnAndRow(3, $row)->getValue();
                    $q = $sheet->getCellByColumnAndRow(4, $row)->getValue(); 
        
                    $sql = "insert into wpv7_fanta90_sports_quote(fsq_r,fsq_n, fsq_s,fsq_q) values('$r','$n','$s','$q')";
                    $res = mysqli_query($con,$sql);
                    
               
                }
                $errors['success'] = "Success";
               
            }else{
                $sql = "TRUNCATE TABLE wpv7_fanta90_sports_quote";
                $res = mysqli_query($con,$sql);
                if($res) {
                    for ($row = 3; $row <= $highestRow; $row++){ 
                        //  Read a row of data
                        $r = $sheet->getCellByColumnAndRow(1, $row)->getValue();
                        $n = $sheet->getCellByColumnAndRow(2, $row)->getValue();
                        $s = $sheet->getCellByColumnAndRow(3, $row)->getValue();
                        $q = $sheet->getCellByColumnAndRow(4, $row)->getValue();
            
                        $sql = "insert into wpv7_fanta90_sports_quote(fsq_r,fsq_n, fsq_s,fsq_q) values('$r','$n','$s','$q')";
                        $result = mysqli_query($con,$sql);
                    }
                    $errors['success'] = "Update Success";
                }
            }
            $succ = 'Submitted successfully!';
            
        }else{
            $err = 'Invalid file format!';
        }
    }else{
        $err = 'Please select a file first!';
    }
}

 

if(isset($_POST['uploadPlayerVotes'])){
    //  Include PHPExcel_IOFactory  
    require('import/PHPExcel.php');
    require('import/PHPExcel/IOFactory.php');


    $file = $_FILES['file']['tmp_name'];
    $file_n = $_FILES['file']['name'];
 

    $ext = pathinfo($file_n, PATHINFO_EXTENSION);
    
    if(!empty($file)){
        if($ext == 'xlsx'){
            $obj = PHPExcel_IOFactory::load($file);
    
            //  Get worksheet dimensions
            $sheet = $obj->getSheet(0); 
            $highestRow = $sheet->getHighestRow(); 
            $highestColumn = $sheet->getHighestColumn();
            
            //  Insert row data array into your database of choice here
            $sql1 = "SELECT * FROM playervotes";

            $result= mysqli_query($con,$sql1);
            $queryResults= mysqli_num_rows($result);

            if(empty($queryResults)){
                for ($row = 3; $row <= $highestRow; $row++){ 
                    //  Read a row of data
                    $r = $sheet->getCellByColumnAndRow(1, $row)->getValue();
                    $n = $sheet->getCellByColumnAndRow(2, $row)->getValue();
                    $s = $sheet->getCellByColumnAndRow(3, $row)->getValue();
                    $q = $sheet->getCellByColumnAndRow(4, $row)->getValue(); 
        
                    $sql = "insert into wpv7_fanta90_sports_quote(fsq_r,fsq_n, fsq_s,fsq_q) values('$r','$n','$s','$q')";
                    $res = mysqli_query($con,$sql);
                    
               
                }
                $errors['success'] = "Success";
               
            }else{
                $sql = "TRUNCATE TABLE wpv7_fanta90_sports_quote";
                $res = mysqli_query($con,$sql);
                if($res) {
                    for ($row = 3; $row <= $highestRow; $row++){ 
                        //  Read a row of data
                        $r = $sheet->getCellByColumnAndRow(1, $row)->getValue();
                        $n = $sheet->getCellByColumnAndRow(2, $row)->getValue();
                        $s = $sheet->getCellByColumnAndRow(3, $row)->getValue();
                        $q = $sheet->getCellByColumnAndRow(4, $row)->getValue();
            
                        $sql = "insert into wpv7_fanta90_sports_quote(fsq_r,fsq_n, fsq_s,fsq_q) values('$r','$n','$s','$q')";
                        $result = mysqli_query($con,$sql);
                    }
                    $errors['success'] = "Update Success";
                }
            }
            $succ = 'Submitted successfully!';
            
        }else{
            $err = 'Invalid file format!';
        }
    }else{
        $err = 'Please select a file first!';
    }
}

 

?>

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fanta Sport</title>

    <!--Css link-->
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <!--Bootstrap css Links -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!--Bootstrap JS Links -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="admin.php" method="post" enctype="multipart/form-data">
                    <h3>Upload player Quotation</h3>
                    <input type="file" name="q_file" id="quotation"> <br><br>

                    <div><h3 style="color: red;"><?php echo $errors['passwordErr']; ?></h3></div>
                    <div><h3 style="color: green;"><?php echo $errors['success']; ?></h3></div>

                    <button name="uploadQuotation" type="submit">Upload</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <form action="admin.php" method="post" enctype="multipart/form-data">
                    <h3>Upload player Votes</h3>
                    <input type="file" name="file" id="quotation"> <br><br>
                    <button name="uploadPlayerVotes" type="submit">Upload</button>
                </form>
            </div>
        </div>
        
    </div>
    
</body>
</html>