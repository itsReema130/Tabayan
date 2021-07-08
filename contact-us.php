<!DOCTYPE html>
<html lang="en">
<head>
		<?php include 'includes/head.php';?>
</head>
<body>
<!-- Start Header-->
<?php $page ='contact-us';include 'includes/navbar.php';?>
<!-- End Header-->

<!-- Start Contact-Us-->
<div id="bgimage">
    </div>
		<div class="container feature">
			<div class="row justify-content-center flex-row-reverse text-right">				
				<div class="col-lg-5 col-md-6 col-sm-12 col-xs-6 first" id="top3" >					
						<h1 class ="text-center" style="padding: 30px 30px 80px 15px ;color:white; "> نسعد باقتراحاتكم</h1>
											
						<form action="sendSuggestions.php" method="POST">

						<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.2/sweetalert2.all.min.js"></script>
							<?php 
								//Send Suggestion Succ
								if(@$_GET['sendEmail']==true){
									if(@$_GET['sendEmail']=='Yes'){
										echo '<script type="text/javascript">';
										echo 'setTimeout(function () {swal("تم ارسال الاقتراح", "شكراً لك للمحاولة في تطوير مبادرة تبيّن", "success", { buttons: { catch: { text: "تم",value: "catch",},},timer: 2000}).then((value) => { window.location.href="contact-us.php"; });';
										echo '}, 500);</script>';

									//Fail to Send Suggestion
									}elseif (@$_GET['sendEmail']=='No') {
										echo '<script type="text/javascript">';
										echo 'setTimeout(function () {swal("عذراً، حدث خطأ ما", " لم يتم ارسال الاقتراح بنجاح", "error", { buttons: { catch: { text: "تم",value: "catch",},},timer: 2000}).then((value) => { window.location.href="contact-us.php"; });';
										echo '}, 500);</script>';
									}
								}
							?>

							<!-- Start Suggestion Form-->
							<div class="form-group">
									<label for="name"  style="color:#1e4072; font-weight: bold">:الاسم</label>
									<input type="text" class="form-control text-right" id="name" name="userName" placeholder="اسم المشارك">
								</div>
							<div class="form-group ">
								<label for="email"  style="color:#1e4072; font-weight: bold">:البريد الاكتروني</label>
								<input type="email" class="form-control text-right" id="Email" name="Email" placeholder="البريد الإلكتروني" required >
							</div>
							
							<div class="form-group">
								<label for="suggestion"  style="color:#1e4072; font-weight: bold">:الاقتراح</label>
								<textarea class="form-control" name="Suggestion" aria-label="With textarea" style="padding:0px 30px 15px; "dir="rtl" required></textarea>
							</div>
							<div class="form-group py-3">
							<a href=""><button type="submit" class="btn btn-purple btn-block text-center btn btn-primary" id="buttonStyle" value="send" > ارسال</button></a>
							</div>		
						</form>				
				</div>

				<div class="col-lg-6 col-md-6  col-sm-12 col-xs-6 text-left">
					<img src="img/cropped-dsSIGlogoL-1.png" width=80% height=100% >				
				</div>

			</div>	
		</div>						
	</div>
 </div><!--- End bgimage -->
<!-- End Contact-Us Info-->

<!--- Start Footer -->
<?php include 'includes/footer.php';?>
<!--- End of Footer -->

<!--- Script Source Files -->
<?php include 'includes/scripts.php';?>
<!--- End of Script Source Files -->

</body>
</html>