<?php 
   
    require ('auth/funkydb.php');
    include ('phpqrcode/qrlib.php'); 
    
    $urlUID =($_GET['uid']);


    $query1="SELECT link FROM admin_link WHERE link = '$urlUID'";
  
            $result1 = mysqli_query($con,$query1) or die(mysqli_error());
                     $rows1 = mysqli_num_rows($result1);
                   
                     if($rows1==1){
                        $token_keys = bin2hex(random_bytes(16));
                        $timestamp=time();
                       
                        $oauth = $token_keys .'|'.+ $timestamp;
                        

                        $encoded = urlencode( base64_encode( $oauth ) );
                        echo $encoded;
                    //$query2 = "INSERT into `admin_link` (link) VALUES ('$link_gotten')";
                        $query2 = "INSERT into `invitees_tbl` (link,oauth,valid) VALUES ('$urlUID','$encoded',1)";
                        // var_dump($query2);
                        $result2 = mysqli_query($con,$query2) or die(mysqli_error());
                        
                        // var_dump($result2);

                         // outputs image directly into browser, as PNG stream 
                         QRcode::png($encoded, 'invitedd.png', QR_ECLEVEL_H);
                        //  echo '<img style="width:600;height:600;" src="invitedd.png" />'; 
                        echo"
                        <div class='container' align='center'>
                            <div class='logo'>
                                <img src='img-bc/funky-brunch logo2.svg' class='pull-left first'>
                                <span><img src='img-bc/funky-brunch.svg'class='pull-right second'></span>
                            </div>
                            <div class='barcode'>
                                <img src='invitedd.png' align='center' class='bc'>
                                <p class='p'>The Ultimate Brunch Experience</p>
                                <p class='p2'><i>Ticket Admits One</i></p>
                                <p class='p1'>Powered by iVO</p>
                                <img src='img-bc/ivo_logo.svg' align='center'>


                                            <div class='container-login100-form-btn' >
                                                <div class='wrap-login100-form-btn'>
                                                    <div class='login100-form-bgbtn'></div>
                                                    <form method='post' action='verification.php'><button class='login100-form-btn' style='text-align: center; margin: auto;'type='submit' name='submit'></form>
                                                        verify
                                                    </button>
                                                </div>
                                            </div>

                            </div>";
                         
                         //QRcode::png($encoded, 'invited.png'); 
                    }else{
                        echo ("Link does not exist");
                    }

                