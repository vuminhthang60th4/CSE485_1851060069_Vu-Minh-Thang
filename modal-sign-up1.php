<?php 
include('config.php');
include('random.php');
 $errors = array(); // Initialize an error array. 

	// Check for a first name:                        
		$name = trim($_POST['name']);
	if (empty($name)) {
		$errors[] = 'You forgot to enter your first name.';
	}
	// Check for a last name:
		$sdt = trim($_POST['sdt']);
	if (empty($sdt)) {
		$errors[] = 'You forgot to enter your sdt.';
	}
	// Check for an email address:
		$email = trim($_POST['email']);
	if (empty($email)) {
		$errors[] = 'You forgot to enter your email address.';
    }
    $sql1="select * from signup where email='$email'";
    $result=mysqli_query($conn,$sql1);
    if(mysqli_num_rows($result)>0){
        $errors[] = 'Your email address already used.';
    }
	
    
    if (empty($errors)) {
    //hashing the password
    
    //generate randomstrin


    
    $randstring=generateRandomString();
    //execute query
    $sql="insert into signup(name, sdt, email)
    VALUES ('$name','$sdt','$email')";
    mysqli_set_charset($conn,'UTF8');
     if(mysqli_query($conn,$sql)){
        $sql1="select idup from signup where email='$email'";
        $result=mysqli_query($conn,$sql1);
        if(mysqli_num_rows($result)>0){
            $id=mysqli_fetch_assoc($result);
        }   



        require 'mailer/PHPMailerAutoload.php';  
        
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 3;                                  // Enable verbose debug output  
        $mail->isSMTP();                                       // Set mailer to use SMTP  
        $mail->Host = 'smtp.gmail.com;';                       // Specify main and backup SMTP servers  
        $mail->SMTPAuth = true;                                // Enable SMTP authentication  
        $mail->Username = 'thangvuminh2611@gmai.com';               // your SMTP username  
        $mail->Password = '2502200026';                      // your SMTP password  
        $mail->SMTPSecure = 'tls';                             // Enable TLS encryption, `ssl` also accepted  
        $mail->Port = 587;                                     // TCP port to connect to  
        $mail->setFrom('thangvuminh2611@gmail.com', 'BOSS lv1');  
        $mail->addAddress($email);                             // set your BCC email address  
        $mail->isHTML(true);                                   // Set email format to HTML  
        $mail->Subject = 'How to send email from localhost using php with mysqli';  
        $mail->Body  = '<h1>Welcome</h1><h3>Dear '.$name.' </h3>';
        $mail->Body  .= '<p>Thank you for signing up </p>';
        
        if($mail->send()) {  
        echo 'Message has been sent';  
        } else {  
        echo 'Message could not be sent';  
        }  
        header("Location:thanks.php");
     }
     else{
         $e= mysqli_error($conn);
        header("Location:error.php?error=$e");
     }
    }else { // Report the errors.                                            
		$errorstring = "Error! <br /> The following error(s) occurred:<br>";
		foreach ($errors as $msg) { // Print each error.
			$errorstring .= " - $msg<br>";
		}
		$errorstring .= "Please try again.<br>";
        header("Location:error.php?error=$errorstring");
		}// End of if (empty($errors)) IF.






?>