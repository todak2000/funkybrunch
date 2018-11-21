
    <?php
    require('jive_db.php');
    session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
        
        $username = stripslashes($_REQUEST['username']); // removes backslashes
        $username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
        $Npassword = stripslashes($_REQUEST['password']);
        $Npassword = mysqli_real_escape_string($con,$Npassword);
        
    //Checking is user existing in the database or not
        $query = "SELECT * FROM `jiveUser` WHERE userName='$username'";
        $result = mysqli_query($con,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['username'] = $username;
            $update= "UPDATE jiveUser SET password='$Npassword' where userName='$username'";
            echo json_encode(
                            array('message'=> 'Success (200). Password changed successfully')
                        );    
        
        }else{
            echo json_encode(
                array('message'=> 'Error (400). Password changed Failed')
            );         
        }
    }else{
    }