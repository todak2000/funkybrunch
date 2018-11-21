<?php

include("auth.php"); //include auth.php file on all secure pages 

require('jive_db.php');
            if (isset($_POST['postButton'])){
                $id =$_SESSION['username'];
                $message =mysqli_real_escape_string($con, $_POST['message']);     
                    $sql = "INSERT INTO post (message, sender) VALUES ('$message', '$id')";
                    $query = mysqli_query($con, $sql) or die(mysqli_error($con));
                    if($query){
                        echo json_encode(
                            array('message'=> 'Success (200). Your Post Submitted Successfully')
                        );
                    }else{
                        echo json_encode(
                            array('message'=> 'Error (400). Failed to Submit Your Post')
                        );

                    }
            }
             
            
 ?>                
