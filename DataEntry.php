<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.2/sweetalert2.all.min.js"></script>
						<?php 
							if(@$_GET['Save']==true){
								if(@$_GET['Save']=='Yes'){
									echo '<script type="text/javascript">';
									echo 'setTimeout(function () {swal("شكراً لك", " تم حفظ البيانات بنجاح  ", "success", { buttons: { catch: { text: "تم",value: "catch",},},}).then((value) => { window.location.href="EnterUsersInfo.php"; });';
									echo '}, 500);</script>';
								}elseif (@$_GET['Save']=='No') {
									echo '<script type="text/javascript">';
            						echo 'setTimeout(function () {swal("!عذراً، حدث خطأ ما", " لم يتم حفظ البيانات   ", "error", { buttons: { catch: { text: "تم",value: "catch",},},}).then((value) => { window.location.href="EnterUsersInfo.php"; });';
            						echo '}, 500);</script>';
								}
							}
						?>


<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'includes/head.php';?>
	<meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	
</head>
<body>
	
<?php $page ='home'; include 'includes/navbar3.php';?>

<?php session_start();?>

<?php if(!isset($_SESSION['UserEmail']))
{
    // not logged in
    header('Location: index.php');
	exit();
}
?>

<!-- Tabayan description -->
<div id="bgimage">
        <div class="container">
			<div class="row flex-row-reverse">
                <div class="col-lg-12 col-md-12 col-sm-12 text-right first" id="top" >
					
						<p class="lead" style="padding:15px">تهدف مبادرة تبيّن لتكوين مجموعة بيانات عربية مفتوحة المصدر لمساعدة الباحثين في مجال التعرف على الشائعات<br>
										.في وسائل التواصل الاجتماعي وتصويب المحتوى غير الصحيح<br>
										وتقوم هذه المبادرة على مساهمة العديد من المتطوعين برصد بعض ما يتم تداوله من أخبار ومعلومات في وسائل التواصل الاجتماعي<br>
										.الاجتماعي وتصنيفه بعد اتباع الإرشادات والقواعد الضابطة ورفع ما تم رصده لمنصة تبيّن</p>
				</div>

			</div>
		</div>
</div>
<!-- End Tabayan description -->

<!-- Enter Data-->
<form action="SaveData.php" method="POST">
		<div class="container">
		
		


			<div class="row flex-row-reverse text-right">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
					
					<form action="SaveData.php" method="POST">

					<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.2/sweetalert2.all.min.js"></script>

					<!--Send Request Successfully-->
					<?php 
						if(@$_GET['Save']==true){
							if(@$_GET['Save']=='Successful'){
								echo '<script type="text/javascript">';
								echo 'setTimeout(function () {swal("عمل جميل", "تم حفظ البيانات بنجاح ", "success", { buttons: { catch: { text: "تم",value: "catch",},},timer: 2000}).then((value) => { window.location.href="DataEntry.php"; });';
								echo '}, 500);</script>';

							//Fail to Send Request
							}elseif (@$_GET['Save']=='Fail') {
								echo '<script type="text/javascript">';
								echo 'setTimeout(function () {swal("!عذراً، حدث خطأ ما", " لم يتم حفظ البيانات    ", "error", { buttons: { catch: { text: "تم",value: "catch",},},timer: 2000}).then((value) => { window.location.href="DataEntry.php"; });';
								echo '}, 500);</script>';
							}
						}

						if(@$_GET['Error']==true)
							{?>
								<div class=" text-danger py-3 "><?php echo "كلمات المرور غير متطابقة"?></div>
						<?php } ?>
						
				        <h4 class="text-right pt-5 pb-3" style="color:#1e4072;">: ادخل الخبر</h3>
						<textarea class="form-control" name="dataen" aria-label="With textarea" style="padding:0px 30px 15px; "dir="rtl" required></textarea>
						<h4 class="text-right pt-5 pb-3" style="color:#1e4072;">: نوع الخبر </h4>

						<div class="form-group">
    					
    								<div id="radioBtn" class="btn-group">
    									<a class="btn btn-primary btn-sm active" data-toggle="happy" data-title="لا اعلم" style="width:130px; height:35px ; font-size:20px; border-color: #1e4072">لا اعلم</a>
										<a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="حقيقة"style="width:130px; height:35px ; font-size:20px; border-color: #1e4072">حقيقة</a>
										<a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="إشاعة"style="width:130px; height:35px ; font-size:20px; border-color: #1e4072">إشاعة</a>
    								</div>
    								<input type="hidden" name="happy" id="happy">
    							
						</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >		
						<h4 class="text-right pt-5 pb-3" style="color:#1e4072;">: مجال الخبر </h4>
										
						<div class="form-group">
							<div class="box">
								<select name="dataSubject" id="dataSubject" required >
								<option selected disabled="disabled" value="">اختر مجال معين</option>
										<option value="الصحة"  >الصحة</option 	>
										<option value="الرياضة" >الرياضة</option>
										<option value="التعليم" >التعليم</option>
										<option value="السياسة" >السياسه</option>
										<option value="الاقتصاد" >الاقتصاد</option>
										<option value="غير ذلك" >غير ذلك</option>
								</select>
								<input type="hidden" name="datasup">
						 	</div>
						</div>
						<!-- datePicker -->
						<h4 class="text-right pt-5 pb-3" style="color:#1e4072;">: تاريخ نشر الخبر </h4>

						<div class="form-group float-right ">
							<div class="row jus " >
								<div class="col-md-12 " >
									<input  name="datepicker" id="datepicker" width="270" style="padding:20px 30px 30px; margin-right: 20px; "/>
								</div>
							</div>
						</div>
					
		</div>
					<!-- js for datepicker-->
					<script>
					// $('#datepicker').datepicker({
					// uiLibrary: 'bootstrap'});

					$('#datepicker').datepicker({
						format: 'yyyy/mm/dd',
						uiLibrary: 'bootstrap'
					});
					
					$('#datepicker').on('changeDate',function(e){
						var date = $("#datepicker").datepicker("getDate");
					})
					</script>
				</div>
			</div>	
				<!---End if DatePicker---->	
					 
		</div>
<!-- End Enter Data-->

<!-- Save Button-->
<div class="container">
	<div class="row justify-content-center text-center">
		<div class="col-lg-3 col-md-3 col-sm-5 col-xs-5" style ="padding:0px 0px 50px">
			<br><br><button type="submit" class="btn btn-purple btn-block text-center btn btn-primary"style="font-size:20px;font-weight: bold; ">حفظ البيانات</button>
		</div>
	</div>	
</div>
</form>
<!-- End Save Button-->

</form>

<!--- Start Footer -->
<?php include 'includes/footer.php';?>
<!--- End of Footer -->

<!--- Script Source Files -->
<?php include 'includes/scripts.php';?>


<!--- End of Script Source Files -->

</body>
</html>


