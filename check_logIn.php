<?php
    // Connect With Database 
    require_once('config.php');
    require_once "functions.php";

    session_start();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $userEmail=$_POST['Email'];
        $userPassword=$_POST['Password'];
        //Convert username To Uppercase Because It Saved As Uppercase In Database
        $userEmail=strtolower($userEmail);

        $userEmail=stripcslashes($userEmail);
        $userPassword=stripcslashes($userPassword);
        $userEmail = mysqli_real_escape_string($con,$userEmail);
        $userPassword = mysqli_real_escape_string($con,$userPassword);
        

    
        $query="select * from user where user_email='$userEmail' and user_password= '$userPassword' ";
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_array($result);

        if($row>0){
                if($row['user_email'] == $userEmail && $row['user_password'] == $userPassword  ){
                    //If A User Is Data Checker 
                    if($row['user_status']=='active'){
                        if($row['user_type']=="مدقق بيانات"){
                            
                            $_SESSION["UserEmail"] = $row['user_email'];
                            $_SESSION["UserPass"] = $row['user_password'];
                            $_SESSION["UserType"] = $row['user_type'];
                            header("location: DataChecker.php");
                        //If A User Is Data Entry 
                        }if($row['user_type']=="مدخل بيانات"){

                            $_SESSION["UserEmail"] = $row['user_email'];
                            $_SESSION["UserPass"] = $row['user_password'];
                            $_SESSION["UserType"] = $row['user_type'];
                            header("location: DataEntry.php");  

                        } //End If
                        if($row['user_type']=="Admin"){

                            $_SESSION["UserEmail"] = $row['user_email'];
                            $_SESSION["UserPass"] = $row['user_password'];
                            $_SESSION["UserType"] = $row['user_type'];
                            header("location: Admin.php");  

                        } //End If
                    }else{
                    header("location: login.php?Error= هذا المشارك لم يتم تفعيل حسابه في المبادرة بعد");    
                    }

                }else{

                    // echo '<script type="text/javascript">';
                    // echo 'setTimeout(function () {swal("!عذراً،   ", "البريد الاكتروني او كلمة المرور غير صحيحة    ", "error", { buttons: { catch: { text: "تم",value: "catch",},},}).then((value) => { window.location.href="index.php"; });';
                    // echo '}, 1000);</script>';
                    header("location: login.php?Error= البريد الإلكتروني أو كلمة المرور غير صحيحة");         
                }//End Else
        }
        else{
            header("location: login.php?Error= البريد الإلكتروني أو كلمة المرور غير صحيحة");
        }
    }else {
        redirectToIndexPage();
    }

?>