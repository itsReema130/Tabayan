<?php
session_start();

// IF Not Logged In 
if(!isset($_SESSION['UserEmail']))
{
    // not logged in
    header('Location: index.php');
    exit();
}else{

    $userType=$_SESSION["UserType"];
    if($userType=='مدقق بيانات'){

        require_once('config.php');
        $sql="SELECT * FROM `#dataCheckTemporarily`";
        $result=mysqli_query($con,$sql);
        $user_email=$_SESSION["UserEmail"];

        if( $result){

            while($row=mysqli_fetch_array($result)){
                
                $ID=$row['data_id'];
                //Inset Checked Data Into data_checked Table
                $sql4="INSERT INTO `data_checked` (`user_email`, `data_id`) VALUES ('$user_email', '$ID')";
                $result4=mysqli_query($con,$sql4);
                }//End While
                
        }//End IF $result

    }//End IF DataChecke user

    //Reset dataCheckTemporarily Table
    $sql3="DELETE FROM `#dataCheckTemporarily` WHERE `user_email`='$user_email'";
    $result=mysqli_query($con,$sql3);
    session_unset();
    session_destroy();
    header("location: login.php?Logout=Yes"); 
    exit();
}//end else 
?>