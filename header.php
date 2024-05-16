<!-- Header.php^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ -->

<?php 

    include 'session-file.php';
    include 'classes/User.php';
    include 'classes/Post.php';
    include 'classes/Message.php';

    if(isset($_SESSION['username'])){
        $userLoggedIn = $_SESSION['username'];
        $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
        $user = mysqli_fetch_array($user_details_query);
    }
    
    elseif ($userLoggedIn == 'admin') {
        header("Location: admin_home.php");
    }
    else{
        header("Location: register.php");
    }

   
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link allfiles -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/style.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/stylen.css">
    <script> <style src="assets/js/jquery-3.5.1.min.js"> </style> </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">

    <title>TB3</title>
    <style>
        .search{
            margin-left: 60vw;
            margin-top: 18px;
            z-index: 1;
           
        }
        .search_in{

            border-radius: 5px;
        }
        .submit{
            background: darkblue;
            color: aliceblue;
            cursor: pointer;
        }

    </style>
</head>
<body>

<div class="header_bar">
    <a href="index.php" style="text-decoration: none; color: #44c2d8;"><img src="images/logo.jpg" alt="O" style="height: 40px; width: 40px; margin: 18px 3px -10px 30px;">
    <span style="font-family: Roboto;/*! text-decoration: none; */font-size: 26px;">TB<sup>3</sup></span></a>
    <div class="search"><form action="search.php" method="post"><input type="text" class="search_in" name="search" placeholder="Search by username..."/><input type="submit" value="Search" class="submit" /></form></div class="search">
  <div class="nav-center">
      <div class="dropdown">
        <div style="display: flex; flex-direction: row;gap: 80px;">
        <div style="display: flex; flex-direction: row; margin-left:-60%">
        <div><span><img src="<?php echo $user['profile_pic']; ?>" style="margin-bottom: 3px;"></span></div>
        <div><h5 style="margin-top: 6.5px;"><a href="<?php echo $userLoggedIn; ?>"> <?php echo "@".$user ['username']?></a></h5></div>
        <!-- <div><h5 style="margin-top: 6.5px;"><a href="<?php echo $userLoggedIn; ?>"> <?php echo "@".$userSearch ['username']?></a></h5></div> -->
        </div>
        
        
        <div class="" style="display: flex; flex-direction: row; gap: 20px; margin-top:10px; margin-left:50px; text-decoration:none"> 
                <div>
                     <a href="request.php" style="margin-top: 6.5px; text-decoration: none;"> <i class="fas fa-user-plus fa-lg" style="margin-right: 3px;"></i> Requests</a>
                <?php    
                    $user_obj = new User($con, $userLoggedIn);
                    $num_requast = $user_obj->getNumbreOfRequest();
                    if ($num_requast > 0){
                        echo "
                            <div class='notification_count' style='background: red; height: 20px; width: 20px; border-radius: 50%; color: white; display: grid; position: relative; margin: -20px 0px 0px 135px;'>
                                <span style='font-size: 10px; text-align: center; margin: 2px 0 0 0;'>"
                                    . $num_requast .
                                "</span>        
                            </div>
                        ";
                    }         
                ?>
                </div>
                <div><a href="account_settings.php" style="margin-top: 6.5px;text-decoration: none;"> <i class="fas fa-cog fa-lg" style="margin-right: 3px;"></i> Settings</a></div>
                <div><a href="logout.php" style="margin-right: 3px; text-decoration: none; color: red;"> <i class="fas fa-sign-out-alt fa-lg" ></i> Logout</a></div>
            </div>
        </div>
        
      </div>
  </div>
  
  
  <nav>
        

        <a href="index.php"> <i class="fas fa-home fa-lg"></i></a>
        <?php    
            $message_obj = new Message($con, $userLoggedIn);
            $num_msg = $message_obj->getUnreadNumber();
            if ($num_msg > 0){
                echo "
                    <div class='notification_count' style='background: red; height: 20px; width: 20px; border-radius: 50%; color: white; display: grid; position: relative; margin: -30px 0px 0px 60px;'>
                        <span style='font-size: 10px; text-align: center; margin: 2px 0 0 0;'>"
                            . $num_msg .
                        "</span>        
                    </div>
                ";
            }         
        ?> 
  </nav>
  
</div>
