<?php
// Include config file
require_once "config.php";
 

$namest = $noidungst =  "";
$namest_err = $noidungst_err  = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    
    
    $input_namest = trim($_POST["namest"]);
    if(empty($input_namest)){
        $namest_err = "Please enter an name.";     
    } else{
        $namest = $input_namest;
    }



    // Validate address
    $input_noidungst = trim($_POST["noidungst"]);
    if(empty($input_noidungst)){
        $noidungst_err = "Please enter an content.";     
    } else{
        $noidungst = $input_noidungst;
    }
    
    
    
    // Check input errors before inserting in database
    if(empty($namest_err) && empty($noidungst_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO st (namest, noidungst) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_namest, $param_noidungst);
            
            // Set parameters
            $param_namest = $namest;
            $param_noidungst = $noidungst;
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: displayst.php");
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
                        <h2>Thêm sở thích</h2>
                    </div>
                    <p>Thêm gì đó vào</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($nameskin_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="namest" class="form-control" value="<?php echo $namest; ?>">
                            <span class="help-block"><?php echo $namest_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($noidungst_err)) ? 'has-error' : ''; ?>">
                            <label>Nội dung</label>
                            <textarea name="noidungst" class="form-control"><?php echo $noidungst; ?></textarea>
                            <span class="help-block"><?php echo $noidungst_err;?></span>
                        </div>
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="displayst.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>