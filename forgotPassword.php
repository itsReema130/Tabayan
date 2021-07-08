<?php
	use PHPMailer\PHPMailer\PHPMailer;

	require_once('sendEmail.php');
	
    require_once "functions.php";

    if (isset($_POST['email'])) {
        require_once('config.php');

        $email = $con->real_escape_string($_POST['email']);

        $sql = $con->query("SELECT * FROM user WHERE user_email='$email'");
        if ($sql->num_rows > 0) {

			$token = generateNewString();
 
			$con->query("UPDATE user SET token='$token', 
			tokenExpire=DATE_ADD(NOW(), INTERVAL 5 MINUTE)
			WHERE user_email='$email'
 ");


	        $mail->addAddress($email);
	        $mail->setFrom("tabayanteam@gmail.com","Tabayan");
	        $mail->Subject = "Reset Password";
            $mail->isHTML(true);
            $mail->AddEmbeddedImage('img/logoInEmail.png', 'logoimg', 'img/logoInEmail.png'); // attach file img/Picture 2.png', and later link to it using identfier logoimg
            $mail->Body ="<html lang='HE'>
            <head>
            <title>
                مبادرة تبيّن
            </title>
            </head>
            <body style='text-align:right; direction:rtl;'>
                <table>
                    <tr>
                        <td><h4>مرحباً،</h4></td>
                    </tr>

                    <tr>
                        <td>لإعادة تعيين كلمة المرور لمنصة تبين، انقر على الرابط التالي: <br></td>
                    </tr>
    
                    <tr>
                        <td>
                            <a href='
                            http://192.168.64.2/Tabayan/resetPassword.php?email=$email&token=$token
                            '>http://192.168.64.2/Tabayan/resetPassword.php?email=$email&token=$token</a>
                        </td>
                    </tr>

                    <tr>
                        <td><br><br>اذا كنت لا تريد يمكنك تجاهل هذا البريد.</td>
                    </tr>
                    <tr>
                        <td><h4><br><br>فريق تبيّن</h4><br>
                        <img src=\"cid:logoimg\" style='direction:rtl;'>
                        </td> 
                    </tr>

                </table>
            </body>
        </html>";          
	        if ($mail->send())
    	        exit(json_encode(array("status" => 1, "msg" => '<p style="color:#616161; font-size:20px">راجع بريدك الإلكتروني </p> <p style="color:#616161;">لقد ارسلنا إليك بريد إلكتروني للتحقق، افتحه وانقر على الرابط لمتابعة تغيير كلمة المرور </p>')));
    	    else
    	        exit(json_encode(array("status" => 0, "msg" => 'حدث خطأ اثناء تغيير كلمة المرور، حاول مرة اخرى.')));

        } else
            exit(json_encode(array("status" => 0, "msg" => 'تأكد من البريد الإلكتروني المدخل.')));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<?php include 'includes/head.php';?>
</head>
<body> 
<!--- Image Slider -->
<div id="bgimage">
<h1 class="text-center" style="padding:150px 0px 0px; color:white; font-weight: bold" id="TabayanSmall">مبادرة تبيّن</h1>
</div>
	<!--- End Image Slider -->


                    
<?php $page ='login';include 'includes/navbar.php';?>


<div class="container">
		<div class="row justify-content-center text-center">
		
		<div class="col-lg-5 col-md-8 col-sm-12 col-xs-12  py-5 first" id="top2">

				
					<form>
						<div class="form-group ">
							<h3 class="text-center" style=" padding:0px 0px 15px; color:white">إعادة تعيين كلمة المرور</h3>
							<img src="img/Tabayan logo without bg copy.png"  width=180 height=140 class="rounded mx-auto d-block" style=" padding:0px 0px 15px;"/>
						</div>
						<p id="response"></p>
						<div class="form-group ">
							<input type="email" class="form-control text-right" id="email" placeholder="البريد الإلكتروني">
						</div>
						

						<button type="button" class="btn btn-purple btn-block text-center btn btn-primary" id="buttonStyle">ارسال</button>
                
					</form>
					
			</div>
		</div>
</div>

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var email = $("#email");

        $(document).ready(function () {
            $('#buttonStyle').on('click', function () {
                if (email.val() != "") {
                    email.css('border', '1px solid green');

                    $.ajax({
                       url: 'forgotPassword.php',
                       method: 'POST',
                       dataType: 'json',
                       data: {
                           email: email.val()
                       }, success: function (response) {
                            if (!response.success)
                                $("#response").html(response.msg).css('color', "red");
                            else
                                $("#response").html(response.msg).css('color', "green");
                        }
                    });
                } else
                    email.css('border', '1px solid red');
            });
        });
    </script>


<!--- Start Footer -->
<?php include 'includes/footer.php';?>
<!--- End of Footer -->

<!--- Script Source Files -->
<?php include 'includes/scripts.php';?>
<!--- End of Script Source Files -->

</body>
</html>
