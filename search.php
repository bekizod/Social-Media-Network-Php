<?php 


$new_t="";



include 'header.php'; 
$name = $_POST["search"];
$added_by;
$result_1 = mysqli_query($con, "SELECT * FROM users WHERE username='$name'");
$userSearch = mysqli_fetch_array($result_1);
$get = false;
// if($userSearch == ""){
//     echo "no result";
// }
// else{
 
//     $added_by = $userSearch ['username'];
    
// }
?>



<style>
    body{
        background-image: url("assets/req.jpg");
        background-position: center;
        background-size: cover;
        /* background-repeat: no-repeat; */
    }
    .main_column{
      backdrop-filter: blur(12px);
        width: 700px;
        color: white;
        margin-top: 95px;
        margin-bottom: 150px;
        margin-left: auto;
        margin-right: auto;
        border-radius: 5px;
        padding-top: 1px;
        padding-bottom: 30px;
        padding-left: 20px;
        border: 3px solid #00AEFF;
        box-shadow: 16px 10px 107px 120px black;
    }
    
    #pro_pic{
        height: 55px;
        width: 55px;
        border-radius: 50%;
    }

    .name{
        margin-left: 65px;
        margin-top: -52px;
        margin-bottom: auto;
    }

    hr{
        margin-top: 13px;
        width: 350px;
       
    }
    .pic{
        width: 75px;
        height: 75px;
    }
    .inner{
        background: gray;
        display: flex;
        flex-direction: row;
        padding-left: 30px;
        gap: 19px;
        border: 3px solid white;
        border-radius: 16px;
        box-shadow: 1px 1px  40px blueviolet;
    }
    .link{
        text-decoration: none;
        color: white;
    }
    .link:hover{
        color: #00FFFF;
    }
</style>
    <div class="main_column">
    <?php 
            
            $query =  mysqli_query($con, "SELECT * FROM users WHERE username='$name'");
            if(mysqli_num_rows($query)==0){
                echo  "<h4 style='text-align: center; font-size:25px;color:#EEFF00'>Oops no result...!!! make sure u must search by username only!!</h4>";
            }
            else{

                while($row = mysqli_fetch_array($query)){
                    $added_by = $row['username'];
                    $request_pic = $row['profile_pic'];
                    echo "<h4 style='text-align: center; font-size:35px;color:#00FFFF'>Your Search Request </h4><div class='inner'><div><img class='pic' src='".$request_pic."'></div><h1 style='margin-top: 30px;'><a class='link' href='$added_by'>" . $row['first_name'] . " " . $row['last_name']."</a></h1></div></div>";
                   
                    
                 
                }
            }?>
</div>


    

        <!-- <h4 style="text-align: center; font-size:35px;color:#00FFFF">Your Search Request </h4>
        <div class="inner" style="display: flex; flex-direction: row; gap:19px; padding-left:30px">
        <div><img src="<?php echo $userSearch['profile_pic']; ?>" class="pic"  ></div>
        <h1 style="margin-top: 30px;"><a class="link" href='<?php echo $added_by?>'><?php echo $userSearch['first_name']." ".$userSearch['last_name'] ?></a></h1> -->
        </div>