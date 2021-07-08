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

<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-lg-5 col-md-8 col-sm-12 col-xs-12  py-5 first" id="top2">	
				<form action="SaveUsersInfo.php" method="POST">
					<div class="form-group ">
						<h3 class="text-center" style=" padding:0px 0px 15px; color:white">الاشتراك في مبادرة تبيّن</h3>
						<img src="img/Tabayan logo without bg copy.png"  width=180 height=140 class="rounded mx-auto d-block" style=" padding:0px 0px 15px;"/>
					</div>

					<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.2/sweetalert2.all.min.js"></script>

					<!--Send Request Successfully-->
					<?php 
						if(@$_GET['Save']==true){
							if(@$_GET['Save']=='Yes'){
								echo '<script type="text/javascript">';
								echo 'setTimeout(function () {swal("شكراً لك", " تم ارسال طلب مشاركة سوف نتواصل معك في اقرب وقت ممكن    ", "success", { buttons: { catch: { text: "تم",value: "catch",},},timer: 3000}).then((value) => { window.location.href="EnterUsersInfo.php"; });';
								echo '}, 500);</script>';

							//Fail to Send Request
							}elseif (@$_GET['Save']=='No') {
								echo '<script type="text/javascript">';
								echo 'setTimeout(function () {swal("!عذراً، حدث خطأ ما", " لم يتم ارسال الطلب    ", "error", { buttons: { catch: { text: "تم",value: "catch",},},timer: 3000}).then((value) => { window.location.href="EnterUsersInfo.php"; });';
								echo '}, 500);</script>';
							}
						}

						if(@$_GET['Error']==true)
							{?>
								<div class=" text-danger py-3 "><?php echo "كلمتا المرور غير متطابقتين"?></div>
						<?php } ?>

					
					
					<div class="form-group ">
						<input type="email" class="form-control text-right" id="Email" name="Email" placeholder="البريد الإلكتروني" required >
					</div>
					
					<div class="form-group">
						<input type="password" class="form-control text-right" id="Password" name="Password" placeholder="كلمة المرور" required>
					</div>

					<div class="form-group">
						<input type="password" class="form-control text-right" id="confirm_password" name="confirm_password" placeholder="تاكيد كلمة المرور" required>
					</div>

					<div class="form-group">
						<input type="text" class="form-control text-right" id="name" name="userName" placeholder="اسم المشارك" required>
					</div>

					<div class="row flex-row-reverse ">
						<div class="col-xs-3 col-sm-3 col-md-12	col-lg-12	">
							<h5>: مجال المشاركة</h5>
							<div class="form-check-inline ">
						
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="optradio" value="مدخل بيانات" required>مدخل بيانات 
								</label>

							</div>

							<div class="form-check-inline">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="optradio" value="مدقق بيانات" required>مدقق بيانات
								</label>
							</div>

						</div>
					</div>
	
					<div class="row justify-content-center text-center py-3">
						<!-- <div class=" col-lg-5 col-md-5 col-sm-5 col-xs-5 " > -->
							<button type="submit" class="btn btn-purple btn-block text-center btn btn-primary" id="buttonStyle" value="Send">ارسال</button>
						<!-- </div> -->
					</div>
					<a href="login.php"><h6 class="text-center" style="color:#687089; padding:5px 0px 0px 0px; font-weight: bold"> مشترك بالفعل في المبادرة ؟ تسجيل الدخول </h6></a>
		
				</form>
					
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