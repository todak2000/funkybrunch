
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Generate link</title>
		

		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/log.css" />
    	<script src="js/jquery.js"></script>
     	<script src="js/bootstrap.js"></script>
	</head>
	<body class="body">
    <div class="row" style="height:300px; wdith:1000px; margin:auto;">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="form" style="margin-top:30%;">
					<h1 align="center" style="color:#232323;">generate link</h1>
					<form action="" method="post" name="login">
						<!-- <input type="text" name="username" readonly placeholder="" required class="form-control" /> -->
						<!-- <input type="password" name="password" placeholder="Password" required class="form-control" /> -->
						<input name="submit" type="submit" value="Generate" class="form-control"  />
					</form>
					<!-- <p style="margin-top: 20px; color:#ccc;">Not registered yet? <a style="color:#979b1b; "href='registration.php'>Register Here</a> <span class="pull-right" style="color:#ccc;">Forgot Password? <a style="color:#979b1b; "href='reset.php'>Reset Here</a></span></p>
					 -->

				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
		<?php
			require('auth/funkydb.php');
			
		    // If form submitted, insert values into the database.
		    if (isset($_POST['submit'])){
				function unique_link($length=10) {

                    $string = '';
                    // You can define your own characters here.
                    $characters = "23456789ABCDEFHJKLMNPRTVWXYZabcdefghijklmnopqrstuvwxyz";
                 
                    for ($p = 0; $p < $length; $p++) {
                        $string .= $characters[mt_rand(0, strlen($characters)-1)];
                    }
                 
                    return $string;
                 
                 }
                 
                $ref = unique_link(6);
				
                //Checking is user existing in the database or not
                $query = "INSERT into `admin_link` (link) VALUES ('$ref')";
                $result = mysqli_query($con,$query);
            
                if($result){
                    $query00="SELECT * FROM admin_link ORDER BY time_created DESC LIMIT 1";
  
                    $result00 = mysqli_query($con,$query00) or die(mysqli_error());
                     $rows00 = mysqli_num_rows($result00);
                    if($rows00==1){

                        while ($row    = mysqli_fetch_array($result00))
                    
                        {
                            $uniquelink     = $row['link'];
                        }
                    echo "<div align='center' class='form' style='color:#ccc; width: 400px;  margin:auto;margin-top: 5%; padding-bottom:30px;'><h3 style='color:#ccc;background-color:rgba(0,0,0,0.5); padding-bottom:30px; border-radius:20px;' > <span style='font-size:80px; color:#FFC655'>&#9785;</span><br> <a href='generatelink.php' style='color:#ccc; font-family:open sans;'>www.funkybrunch/invited/";
                    echo $uniquelink;
                    echo"</a></h3><br/>Click here to <a style='color:#979b1b;' href='generatelink.php'>back</a></div>";
                    }   
                else{
                    echo "<div align='center' class='form' style='margin-top: 0;color:#ccc; width: 400px;position:fixed; top: 30%; left: 35%;'><h3 style='color:#ccc;'> <span style='font-size:80px; color:#FFC655'>&#9785;</span><br>USorry! Link Unvailable</h3><br/>Click here to <a style='color:#979b1b;' href='generatelink.php'>back</a></div>";
                    }
            }
				
		?>
        
		
		
        <?php }?>


	</body>
</html>
