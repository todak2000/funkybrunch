
		<?php
            require('jive_db.php');
            
           /* @PARAMS
                    userName,
                    firstName,
                    lastName,
                    phoneNo,
                    email,
                    password,
                    birthday,
                    gender*/

		    // If form submitted, insert values into the database.
		    if (isset($_REQUEST['submit'])){
                
            
				$username = stripslashes($_REQUEST['username']); // removes backslashes
				$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string

				$firstname = stripslashes($_REQUEST['firstname']);
				$firstname = mysqli_real_escape_string($con,$firstname);

				$lastname = stripslashes($_REQUEST['lastname']);
				$lastname = mysqli_real_escape_string($con,$lastname);

				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($con,$email);

				$phoneno = stripslashes($_REQUEST['phoneno']);
				$phoneno = mysqli_real_escape_string($con,$phoneno);

				$birthday = stripslashes($_REQUEST['birthday']);
				$birthday = mysqli_real_escape_string($con,$birthday);

				$password = stripslashes($_REQUEST['password']);
				$password = mysqli_real_escape_string($con,$password);

				$gender = stripslashes($_REQUEST['gender']);
                $gender = mysqli_real_escape_string($con,$gender);
                
               // Check that data was sent to the mailer.
                    if ( empty($username) OR empty($firstname) OR empty($lastname) OR empty($phoneno)  OR empty($birthday) OR empty($password) OR empty($gender) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        // echo "Error (400). Please fill every details for your registration";
                        echo json_encode(
                            array('message'=> 'Error (400). Please fill every details for your registration')
                        );
                    } else{

                        $query = "SELECT * FROM jiveUser WHERE userName='".$username."' or email='".$email."' ";
                        $result = mysqli_query($con,$query);
                        $rows = mysqli_num_rows($result);
                
                        if($rows>=1){
                            // echo" Error (400). Username or email already exists";
                            echo json_encode(
                                array('Error (400) '=> ' Username or email already exists')
                            );
                        } else{
                                $query = "INSERT into `jiveUser` (userName,firstName,lastName,phoneNo,email,password,birthday,gender) VALUES ('$username','$firstname', '$lastname','$phoneno','$email','".md5($password)."', '$birthday', '$gender')";
                                $result = mysqli_query($con,$query);
                                if($result){
                                    // echo "Success (200). Registration Successful";
                                    echo json_encode(
                                        array('Success (200)'=> ' Resigtration Successful')
                                    );

                                }      
            }
        } 
        
    }else{
    		}

                
                