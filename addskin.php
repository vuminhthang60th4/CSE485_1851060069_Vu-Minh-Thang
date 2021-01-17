<?php
// Include config file
require_once "config.php";
 

$nameskin = $noidung = $phantram = "";
$nameskin_err = $noidung_err = $phantram_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    
    
    $input_nameskin = trim($_POST["nameskin"]);
    if(empty($input_nameskin)){
        $nameskin_err = "Please enter an name.";     
    } else{
        $nameskin = $input_nameskin;
    }



    // Validate address
    $input_noidung = trim($_POST["noidung"]);
    if(empty($input_noidung)){
        $noidung_err = "Please enter an address.";     
    } else{
        $noidung = $input_noidung;
    }
    
    // Validate salary
    $input_phantram = trim($_POST["phantram"]);
    if(empty($input_phantram)){
        $phantram_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_phantram)){
        $phantram_err = "Please enter a positive integer value.";
    } else{
        $phantram = $input_phantram;
    }
    
    // Check input errors before inserting in database
    if(empty($nameskin_err) && empty($noidung_err) && empty($phantram_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO skin (nameskin, noidung, phantram) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_nameskin, $param_noidung, $param_phantram);
            
            // Set parameters
            $param_nameskin = $nameskin;
            $param_noidung = $noidung;
            $param_phantram = $phantram;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: displayskin.php");
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
                        <h2>Thêm kỹ năng</h2>
                    </div>
                    <p>Thêm gì đó vào</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($nameskin_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="nameskin" class="form-control" value="<?php echo $nameskin; ?>">
                            <span class="help-block"><?php echo $nameskin_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($noidung_err)) ? 'has-error' : ''; ?>">
                            <label>Nội dung</label>
                            <textarea name="noidung" class="form-control"><?php echo $noidung; ?></textarea>
                            <span class="help-block"><?php echo $noidung_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Phần trăm</label>
                            <input type="text" name="phantram" class="form-control" value="<?php echo $phantram; ?>">
                            <span class="help-block"><?php echo $phantram_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="displayskin.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>