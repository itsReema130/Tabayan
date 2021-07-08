<?php
    // Connect With Database 
    require_once('config.php');
    require_once('sendEmail.php');
    require_once "functions.php";
    session_start();    
        // $key=$_POST['Delete'];
        // $_SESSION["user"]=$key;
        if(isset($_POST['Delete'])){
            $newstring = $_POST['Delete'];;
            $type=userType($newstring );
            $email=userEmail($newstring);
            $_SESSION["user"]=$email;

            $q1 ="SELECT * FROM user WHERE user_email = '$email'";
            $check=mysqli_query($con,$q1) or die("not found".mysqli_error());
                    if(mysqli_num_rows($check)>0){
                        $q2 ="DELETE FROM user WHERE user_email ='$email'";
                        $check2=mysqli_query($con,$q2) or die("not deleted".mysqli_error());?>
                        
                <?php
                //    $message="نعتذر تم وفض الاشتراك في مبادرة تبين ";
                //    mail( $key, 'مبادرة تبين', $message);
                    $mail->addAddress($email);
                    $mail->AddEmbeddedImage('img/logoInEmail.png', 'logoimg', 'img/logoInEmail.png'); // attach file img/Picture 2.png', and later link to it using identfier logoimg
                    $mail->Body="<html lang='HE'>
                    <head>
                    <title>
                        مبادرة تبيّن
                    </title>
                    </head>
                    <body style='text-align:right; direction:rtl;'>
                        <table>
                            <tr>
                                <td><h4>السلام عليكم ورحمة الله وبركاته:</h4></td>
                            </tr>
            
                            <tr>
                                <td>نعتذر عن قبول انظمامك لمبادرة تبيّن. </td>
                            </tr>
        
                            <tr>
                                <td><h4><br><br>فريق تبيّن</h4><br>
                                    <img src=\"cid:logoimg\" style='direction:rtl;' />
                                </td>    
                            </tr>

                        </table>
                    </body>
                    </html>";
                        if($mail->send()){
                            header("location: Admin.php?Done=delete");
                        }else{
                            header("location: Admin.php?email=error");
                        }
                    }else{ ?>    
                <?php 
                    header("location: Admin.php?Done=error");
                    } 
        }else if(isset($_POST['Accept'])){
    
            $newstring = $_POST['Accept'];;
            $type=userType($newstring );
            $email=userEmail($newstring);
            $_SESSION["user"]=$email;

            $q1 ="SELECT * FROM user WHERE user_email = '$email'";
            $check=mysqli_query($con,$q1) or die("not found".mysqli_error());
            if(mysqli_num_rows($check)>0){
                $q2 ="UPDATE user SET user_status='active' WHERE user_email='$email'";
                 $check2=mysqli_query($con,$q2) or die("not Accept".mysqli_error());?>
            
           <?php

            $mail->addAddress($email);
            $mail->AddEmbeddedImage('img/logoInEmail.png', 'logoimg', 'img/logoInEmail.png'); // attach file img/Picture 2.png', and later link to it using identfier logoimg    
            $mail->Body="<html lang='HE'>
            <head>
            <title>
                مبادرة تبيّن
            </title>
            </head>
            <body style='text-align:right; direction:rtl;'>
                <table>

                    <tr>
                        <td><h4>السلام عليكم ورحمة الله وبركاته،</h4></td>
                    </tr>

                    <tr>
                        <td>يسعد فريق تبيّن بإبلاغك بأنه تم قبول طلبك للإنظمام لمبادرة تبيّن ك$type بيانات. </td>
                    </tr>

                    <tr>
                        <td>يمكنك الآن تسجيل الدخول <a href='http://192.168.64.2/Tabayan/index.php'>لمنصة تبيّن.</a> </td>   
                            
                    </tr>
        
                    <tr>
                        <td><br>نشكر لك إسهامك معنا في إثراء المحتوى العربي،</td>
                    </tr>

                    <tr>
                        <td><h4>فريق تبيّن</h4><br>
                            <img src=\"cid:logoimg\" style='direction:rtl;' />
                        </td> 
                    </tr>
        
                </table>
            </body>
            </html>";

        // $mail->Body="<h1  style='direction:rtl;'>Test 1 of PHPMailer html</h1>
        // <p>This is a test picture: <img src=\"cid:logoimg\" width=90 height=60/></p>";

                if($mail->send()){
                    header("location: Admin.php?Done=update");
                }else{
                    header("location: Admin.php?email=error");
                }
            
            }else{ ?>
                
            <?php 
                header("location: Admin.php?Done=error");          
            } 
        }else {
            redirectToIndexPage();    
        }

    
    

?>