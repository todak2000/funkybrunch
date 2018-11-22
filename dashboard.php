<!doctype html>

<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Funky Brunch - Dahsboard</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="js/jquery.js"></script>
</head>

<body>
<?php
           
            require ('auth/funkydb.php');
            
			
		    // If form submitted, insert values into the database.
		    if (isset($_POST['generate'])){
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
                // echo $ref;
				
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
                    
                            $full_url = "www.funkybrunch/".$uniquelink;
                            echo "<div align='center' class='form' style='margin-top: 0;color:#ccc; width: 100vw; height:100vh; z-index:1000; padding:20% 30%; position:fixed; background-color: rgba(0,0,0,0.7);'><h3 style='color:#ccc;'>
                            <a href='linktrack.php?uid="; 
                            echo $ref;
                            echo"'>";
                            echo $full_url;
                            echo"</a></h3><br/><a style='color:#979b1b;' href='dashboard.php'>Dashboard</a></div>";
                            
                           
                        }

                    }
                }
                
            }
        ?>
                        <?php
                        session_start();
                        require('auth/funkydb.php');
                        if(!isset($_SESSION["email"])){
                        header("Location: signin.php");
                        exit(); }

                        if(isset($_SESSION['email']))
                            {
                                $email=$_SESSION['email'] ;
                            
                            }
                        ?>

    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                   
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/funky_brunch_log.jpg" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/funky_brunch_logo---.jpg" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                    <a href="#" class="nav-link"><h4><?php echo $email;?>!</h4></a>
                    <a class="nav-link pull-right" href="logout.php"><i class="fa fa-power-off" style="padding-right:10px;"></i>Logout</a>
                        </div>



                    <!-- <div class="user-area dropdown float-right">
                        

                        <div class="user-menu dropdown-menu">
                            

                            <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div> -->

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php 
                                            
                                            $query12 = "SELECT * from `admin_link`";
                                            $result12 = mysqli_query($con,$query12) or die(mysqli_error());
                                            $rows12 = mysqli_num_rows($result12);
                                            
                                            echo($rows12);?></span></div>
                                            <div class="stat-heading">No of Links Generated</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-smile"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">
                                            <?php 
                                            
                                            $query13 = "SELECT * from `invitees_tbl`";
                                            $result13 = mysqli_query($con,$query13) or die(mysqli_error());
                                            $rows13 = mysqli_num_rows($result13);
                                            
                                            echo($rows13);?>
                                            </span></div>
                                            <div class="stat-heading">No of Clicks</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-user"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">
                                            <?php 
                                            
                                            // echo $url ;
                                          
                                           
                                           ?></span></div>
                                            <div class="stat-heading">Registered</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-lg-3 col-md-6 link_generator">
                        <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                         
                                            <div class="stat-text"><a href="linktrack.php?uid=<?php echo $ref;?>"><span > 
                                            
                                            <?php 
                                            
                                             echo $full_url ;
                                            ?>
                                            
                                            </span></a></div>
                                            <div class="stat-heading">Link Generated</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- /Widgets -->
                <!--  Traffic  -->
                
                <!--  /Traffic -->
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="#"><h4 class="box-title">Links <span><button type="submit" name="generate" class="btn btn-primary btn-lg pull-right generate" >Generate</button></span> </h4></form>
                                    <!-- Modal -->
  
        
                           </div>
                           <?php
                        $query21 = "SELECT * FROM `admin_link`";
                            $result21 = mysqli_query($con,$query21) or die(mysqli_error());
                            $rows21 = mysqli_num_rows($result21);
                            if($rows21>0){

                                echo"<div class='card-body'>
                                <div class='table-stats order-table ov-h'>
                                    <table class='table'>
                                        <thead>
                                            <tr>
                                                <th class='serial'>#</th>
                                                <th>Link URL</th>
                                                
                                                <th>DATE CREATED</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        ";
                                while ($row21 = mysqli_fetch_assoc($result21))
                
                                {
                                    $id21 = $row21['a_id'];
                                    $link21    = $row21['link'];
                                    $time21 = $row21['time_created'];

                                    echo "
                                    <tr>
                                    <td class='serial'>";
                                    echo $id21;
                                    echo"</td> 
                                    <td>  <span class='name'>";
                                    echo $link21;
                                    echo"</td> 
                                    
                                    <td>  <span >";
                                    echo $time21;
                                    echo"</td> </tr>";

                                }
                                echo"
                                </tbody>
                                </table>
                                    </div>
                                </div>
                          
                                ";
                            }
                        ?>
                        
                                    </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                        <div class="col-xl-6">
                        <?php
                        require('auth/funkydb.php');


                            $query31 = "SELECT link as li,COUNT(oauth) as c FROM invitees_tbl GROUP BY link";
                                $result31 = mysqli_query($con,$query31) or die(mysqli_error());

                                echo"<div class='card-body'>
                                <div class='table-stats order-table ov-h'>
                                    <table class='table'>
                                        <thead>
                                            <tr>
                                                <th class='serial'>#</th>
                                                <th>Link URL</th>
                                                <th>Clicks Generated</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        ";
                                // while (($row21 = mysqli_fetch_assoc($result21)) && ($row31 = mysqli_fetch_assoc($result31)) )

                                while ($row31 = mysqli_fetch_assoc($result31))
                
                                {
                                    $link21    = $row31['li'];
                                    $click31 = $row31['c'];

                                    echo "
                                    <tr>
                                    <td class='serial'>";
                                    echo"</td> 
                                    <td>  <span class='name'>";
                                    echo $link21;
                                    echo"</td> 
                                    <td>  <span class='count'>";
                                    echo $click31;
                                    echo"</td>
                                    </tr>";

                                }
                                echo"
                                </tbody>
                                </table>
                                </div>
                                </div> 
                                    </div>
                                </div>
                            </div>
                        </div> 
                                ";
                            
                        ?>
                       
                        </div>
                    </div>
                </div>
            </h1>
            
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Funky Brunch
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://ivothinking.com">iVO Thinking</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->
    

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
   
</body>
<?php 
                
     
        ?>
</html>
