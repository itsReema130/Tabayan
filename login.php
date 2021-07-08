<!DOCTYPE html>
<html lang="en">
<head>
		<?php include 'includes/head.php';?>
		
</head>
<body>

<!--- Start Title -->
<div id="bgimage">
	<h1 class="text-center" style="padding:150px 0px 0px; color:white; font-weight: bold" id="TabayanSmall">مبادرة تبيّن</h1>
</div>
<!--- End Title -->

<!--Start Header-->                   
<?php $page ='login';include 'includes/navbar.php';?>
<!--End Header-->  


<div class="container">
	<div class="row justify-content-center text-center">
		<div class="col-lg-5 col-md-8 col-sm-12 col-xs-12  py-5 first" id="top2">

			<form action="check_logIn.php" method="POST">
				<div class="form-group ">
					<h3 class="text-center" style=" padding:0px 0px 15px; color:white">تسجيل الدخول</h3>
					<img src="img/Tabayan logo without bg copy.png"  width=180 height=140 class="rounded mx-auto d-block" style=" padding:0px 0px 15px;"/>
				</div>
				<?php 
				//If There Error In Login
				if(@$_GET['Error']==true)
					{
				?>
				<div class=" text-danger py-3 "><?php echo $_GET['Error']?></div>

				<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.2/sweetalert2.all.min.js"></script>
				<!--Logout Alert -->
				<?php 
					}if(@$_GET['Logout']==true){
						echo '<script type="text/javascript">';
						echo 'setTimeout(function () {swal(" ", " تم تسحيل الخروج بنجاح    ", "success", { buttons: { catch: { text: "تم",value: "catch",},},timer: 3000}).then((value) => { window.location.href="login.php"; });';
						echo '}, 300);</script>';
						}

						if(@$_GET['ResetPass']==true){
							if(@$_GET['ResetPass']=='Yes'){
								echo '<script type="text/javascript">';
								echo 'setTimeout(function () {swal(" ", " تم إعادة تعيين كلمة المرور بنجاح    ", "success", { buttons: { catch: { text: "تم",value: "catch",},},timer: 3000}).then((value) => { window.location.href="login.php"; });';
								echo '}, 500);</script>';

							//Fail to Send Request
							}elseif (@$_GET['ResetPass']=='No') {
								echo '<script type="text/javascript">';
								echo 'setTimeout(function () {swal("!عذراً، حدث خطأ ما", " لم يتم إعادة تعيين كلمة المرور بنجاح    ", "error", { buttons: { catch: { text: "تم",value: "catch",},},timer: 3000}).then((value) => { window.location.href="login.php"; });';
								echo '}, 500);</script>';
							}
						}
				?>
				<!--End Logout Alert -->

				<!-- Start Login Form-->
				<div class="form-group ">
					<input type="email" class="form-control text-right" id="Email" name="Email" placeholder="البريد الإلكتروني" required >
				</div>
				
				<div class="form-group">
					<input type="password" class="form-control text-right" id="Password" name="Password" placeholder="كلمة المرور" required>
				</div>

				<a href="login.php"><button type="submit" class="btn btn-purple btn-block text-center btn btn-primary" id="buttonStyle" value="Login" >تسحيل الدخول</button></a>
				<a href="forgotPassword.php"><p class="text-right" style="color:#687089; padding:15px 15px 0px 0px"> هل نسيت كلمة المرور؟</p></a>
				<a href="EnterUsersInfo.php"><h6 class="text-center" style="color:#687089; padding:5px 0px 0px 0px; font-weight: bold"> الاشتراك في مبادرة تبيّن</h6></a>
				
			</form>
			<!-- END Login Form-->
		</div>
	</div>
</div>


<!--- Start Footer -->
<?php include 'includes/footer.php';?>
<!--- End of Footer -->

<!--- Script Source Files -->
<?php include 'includes/scripts.php';?>
<!--- End of Script Source Files -->

</body>
</html>
