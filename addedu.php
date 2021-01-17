<?php
// Include config file
require_once "config.php";
 

$nameedu = $noidungedu = $timestart = $timeend = "";
$nameedu_err = $noidungedu_err = $timestart_err = $timeend_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    
    
    $input_nameedu = trim($_POST["nameskin"]);
    
        $nameedu = $input_nameedu;
    



    // Validate address
    $input_noidungedu = trim($_POST["noidung"]);
    
        $noidungedu = $input_noidungedu;
    
    
    // Validate salary
    $input_timestart = trim($_POST["phantram"]);
    
        $timestart = $input_timestart;
    
    


    $input_timeend = trim($_POST["end"]);
    
        $timeend = $input_timeend;
    




    // Check input errors before inserting in database
    if(empty($nameedu_err) && empty($noidungedu_err) && empty($timestart_err) && empty($timeend_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO edu (nameedu, noidungedu, timestart, timeend) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_nameedu, $param_noidungedu, $param_timestart, $param_timeend);
            
            // Set parameters
            $param_nameedu = $nameedu;
            $param_noidungedu = $noidungedu;
            $param_timestart =  $timestart;
            $param_timeend = $timeend;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: displayedu.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Thêm năm học</h2>
                    </div>
                    <p>Thêm gì đó vào</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($nameedu_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="nameskin" class="form-control" value="<?php echo $nameedu; ?>">
                            <span class="help-block"><?php echo $nameedu_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($noidungedu_err)) ? 'has-error' : ''; ?>">
                            <label>Nội dung</label>
                            <textarea name="noidung" class="form-control"><?php echo $noidungedu; ?></textarea>
                            <span class="help-block"><?php echo $noidungedu_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($timestart_err)) ? 'has-error' : ''; ?>">
                            <label>Thời điểm bắt đầu</label>
                            <input type="text" name="phantram" class="form-control" value="<?php echo $timestart; ?>">
                            <span class="help-block"><?php echo $timestart_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($timeend_err)) ? 'has-error' : ''; ?>">
                            <label>Thời điểm kết thúc</label>
                            <input type="text" name="end" class="form-control" value="<?php echo $timeend; ?>">
                            <span class="help-block"><?php echo $timeend_err;?></span>
                        </div>





                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="displayedu.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>