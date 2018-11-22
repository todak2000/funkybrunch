<!DOCTYPE html>
<html lang="en">
<head>
	<title>Funky Brunch Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">

<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-59">
						Verification
					</span>

					<div class="wrap-input100 " >
						<span class="label-input100">OAUTH</span>
						<input class="input100" type="text" name="oauth" placeholder="Enter the Oauth">
						<span class="focus-input100"></span>
					</div>

					

					<div class="container-login100-form-btn" >
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" style="text-align: center; margin: auto;" name="saubmit">
								verify
							</button>
						</div>
					</div>
</form>
<?php
 
 require('auth/funkydb.php');
// $encoded = 'NDMxMTQwOGRiMTdkYzhkNmFiZTQ0MGZiYjg0MGFkNjl8MTU0MjgxNjI2NA%3D%3D';



// $query1="SELECT * FROM invitees_tbl WHERE oauth = '$encoded'";

// $result1 = mysqli_query($con,$query1) or die(mysqli_error());
//          $rows1 = mysqli_num_rows($result1);
        
         

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

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<script src="js/main.js"></script>
 
</body>

</html>
