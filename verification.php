<!DOCTYPE html>
<html lang="en">
<head>
	<title>Funky Brunch Verification</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #fff;">
<style>
    body{text-align:center;}
    .container{width: 600px; text-align:center; margin-top:50px;margin-bottom:50px;}
    p{font-size:30px;margin-top:10px;margin-bottom:10px;}
    .container-login100-form-btn{style="text-align: center; margin: auto; padding-top:30px; padding-bottom:30px;}
    .input105 {text-align:center; display: block; width: 100%; height: 50px; background: transparent; font-family: Poppins-Regular; font-size: 16px; color: #555555; line-height: 1.2;
  padding: 0 2px;}
  .login100-form-btn {display: -webkit-box;  display: -webkit-flex; display: -moz-box; display: -ms-flexbox; display: flex; justify-content: center; align-items: center; padding: 0 20px;  min-width: 244px;
  height: 50px; font-family: Poppins-Medium; font-size: 16px; color: #fff; line-height: 1.2;}
</style>
<div class='container'>
<form class='form' method='post'>
					<p>Verification</p>

					<div class="oauth" >
						<p>OAUTH</p>
						<input class="input105" type="text" name="oauth" placeholder="Enter the Oauth">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn" style="text-align:center; margin-left:28%;">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" style="text-align: center; margin: auto;" name="saubmit">
								verify
							</button>
						</div>
					</div>
</form>
</div>
<?php
 
 require('auth/funkydb.php');

         

         if (isset($_REQUEST['saubmit'])){
				
            $oauth = stripslashes($_REQUEST['oauth']); // removes backslashes
            $oauth = mysqli_real_escape_string($con,$oauth); //escapes special characters in a string

        //Checking is user existing in the database or not

            $query ="SELECT * FROM `invitees_tbl` WHERE oauth='$oauth'";
            
            $result = mysqli_query($con,$query) or die(mysqli_error());
            // var_dump($result);
            $rows = mysqli_num_rows($result);
            // var_dump($rows);
            if($rows==1){
             
                while ($row    = mysqli_fetch_array($result))
                {
                    $valid =($row['valid']) ;
                //    echo $valid;
                    if($valid ==1){
                        $decoded = base64_decode( urldecode( $oauth ));
                        $decoded_Split = explode('|', $decoded);
                        $decoded_timestamp = $decoded_Split[1];
                        $decoded_oauth = $decoded_Split[0];
                        // echo $decoded_timestamp;
                        // echo "<br>";
                        // echo $decoded_oauth;
                        
                        $query2 = "UPDATE invitees_tbl  SET valid = 0 WHERE oauth = '$oauth'";
                        $result2 = mysqli_query($con,$query2) or die(mysqli_error());
                        echo"Link Verified Ok";
                       
                    }
                   else{
                       echo"Link not valid";
                       
                   }
                }
               
             }else{
                       
?>


<?php }
}?>

</body>

</html>
