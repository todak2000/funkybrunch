<?php
 
 require('auth/funkydb.php');
$encoded = 'NDMxMTQwOGRiMTdkYzhkNmFiZTQ0MGZiYjg0MGFkNjl8MTU0MjgxNjI2NA%3D%3D';



$query1="SELECT * FROM invitees_tbl WHERE oauth = '$encoded'";

$result1 = mysqli_query($con,$query1) or die(mysqli_error());
         $rows1 = mysqli_num_rows($result1);
        
         if($rows1==1){
             
            while ($row    = mysqli_fetch_array($result1))
            {
                $valid =($row['valid']) ;
            //    echo $valid;
                if($valid ==1){
                    $decoded = base64_decode( urldecode( $encoded ));
                    $decoded_Split = explode('|', $decoded);
                    $decoded_timestamp = $decoded_Split[1];
                    $decoded_oauth = $decoded_Split[0];
                    echo $decoded_timestamp;
                    echo "<br>";
                    echo $decoded_oauth;
                    
                    $query2 = "UPDATE invitees_tbl  SET valid = 0 WHERE oauth = '$encoded'";
                    $result2 = mysqli_query($con,$query2) or die(mysqli_error());
                }
               else{
                   echo"Link not valid";
               }
            }
           
         }

      
?>