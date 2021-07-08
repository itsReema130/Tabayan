<!--- Connect With Database And Initialize Variables -->
<?php
		require_once('config.php');

		if(isset($_GET['page'])){
			$pages=$_GET['page'];
			
		}else{
			$pages=1;
			
		}

		if(isset($_GET['ID'])){
			$ID=$_GET['ID'];
		}

		$num_per_page =01;
		$start_from= ($pages-1)*01;

		session_start();
		$userEmail=$_SESSION["UserEmail"];
		$query="SELECT *  FROM data WHERE data_ID NOT IN(SELECT data_id FROM data_checked WHERE user_email='$userEmail') limit $start_from,$num_per_page";
		$result=mysqli_query($con,$query);
		$numOfRow=mysqli_num_rows($result);
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

<!--- Start header -->
<?php $page ='home'; include 'includes/navbar2.php';?>
<!--- End header -->

<!-- IF Not Logged In --> 
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


<!-- IF No Result From Database-->
<?php if(!$result){?>

<div class="container ">
	<div class="row justify-content-center text-center  py-5">
		<div class="col-lg-5 col-md-5 col-sm-4 col-xs-4 first py-5 ">
			<div class="style py-2">
			
				<?php
				if (!$result) {
					printf("لا يوجد بيانات مدخلة ");
				}?>

			</div>	
		</div>
	</div>	
</div>
<!--There Is Result From Database-->
<?php }else ?>
<!--IF All Data Are Checked-->
	<?php  {if($numOfRow==0){ ?>
		<div class="container ">
			<div class="row justify-content-center text-center  py-5">
				<div class="col-lg-5 col-md-5 col-sm-4 col-xs-4 first py-5 ">
					<div class="style py-2">
					
						<?php
						printf("شكراً لك لقد قمت بتدقيق جميع البيانات المدخلة ");    
						?>

					</div>	
				</div>
			</div>	
		</div>
<!--IF There Are Data Not Checked Yet-->
	<?php }else{ ?>
		<div class="container ">
			<div class="row justify-content-center text-center  py-5">
				<div class="col-lg-5 col-md-5 col-sm-4 col-xs-4 first py-3 ">
					<h3	 class="text-center py-3" style="font-weight: bold">: تحقق من البيانات المدخلة</h3>	
					<div class="style py-3 text-right" style="padding: 15px">
			
						<?php
							while($row=mysqli_fetch_array($result)){	
						?>
						<?php if($row['data_date']==""){
 						echo "<font color='#1e4072'; font size=4px >الخبر : "."<font color='black' ; font size=4px >". $row['Data']."<br/>"."<br/>"." <font color='#1e4072'; font size=4px >نوع الخبر : "."<font color='black' ; font size=4px >".$row['data_kind']."<br/>"."<br/>"." <font color='#1e4072'; font size=4px >تاريخ نشر الخبر : "."<font color='black' ; font size=4px > لا يوجد تاريخ مدخل";
						} else {?>
						<?php echo "<font color='#1e4072'; font size=4px >الخبر : "."<font color='black' ; font size=4px >". $row['Data']."<br/>"."<br/>"." <font color='#1e4072'; font size=4px >نوع الخبر : "."<font color='black' ; font size=4px >".$row['data_kind']."<br/>"."<br/>"." <font color='#1e4072'; font size=4px >تاريخ نشر الخبر : "."<font color='black' ; font size=4px >".$row['data_date'];
						$ID=$row['data_ID'];}
						?>
					
						<?php } ?><!--Close While-->
					
						<?php echo "<a id='ID' data-title='$ID'></a>"; ?>
					</div>
			
					<div class="form-group">
							<div id="radioBtn" class="btn-group py-3">
									<a class="btn btn-primary btn-sm active" data-toggle="happy" data-value="No" name="type" data-title="N" style="width:90px; height:35px ; font-size:20px; border-color: #1e4072">لا اعلم</a>
									<a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-value="rumor" name="type" data-title="rumor"style="width:90px; height:35px ; font-size:20px; border-color: #1e4072">إشاعة</a>
									<a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-value="non-rumor" name="type" data-title="non-rumor"style="width:90px; height:35px ; font-size:20px; border-color: #1e4072">حقيقة</a>
							</div>
							<input type="hidden" name="happy" id="happy">
					</div>
				</div>
			</div>	
		</div>

		<div class="container">
			<div class="row d-flex justify-content-around ">
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
					<?php
						$pr_query = "SELECT *  FROM data WHERE data_ID NOT IN(SELECT data_id FROM data_checked WHERE user_email='$userEmail')";
						$pr_result = mysqli_query($con,$pr_query);
						$total_record=mysqli_num_rows($pr_result);
						$total_page=ceil($total_record/$num_per_page);
					// if($pages>1){
					// echo "<a id='before' href='DataChecker.php?page=".($pages-1)."&ID=".($ID-1)."' class='previous btn btn-purple btn-block text-center btn btn-primary' style='background-color:#9c2025; border-color:#9c2025' method='get'>&laquo;  السابق</a>";
					// }

						for($i=1;$i<$total_page;$i++){

						}//End For Loop					
					?>
				</div>

				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" >
					<?php
					if($i>$pages){
						echo "<a id='next' href='DataChecker.php?page=".($pages+1)."&ID=".($ID+1)."' class= 'next btn btn-purple btn-block text-center btn btn-primary' style='background-color:#60bad0; border-color:#60bad0' method='get'>التالي  &raquo;</a>";	  
							
						}//End IF	
					?>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row justify-content-center text-center">
				<div class="col-lg-3 col-md-3 col-sm-5 col-xs-5 py-5">
					<a href="#" class= "next btn btn-purple btn-block text-center btn btn-primary" onclick="validation();"  >انهاء التدقيق</a>
			
				</div>
			</div>	
		</div>
	<?php } ?><!--End Internal Else-->
<?php } ?>

<!--- Start Footer -->
<?php include 'includes/footer.php';?>
<!--- End of Footer -->

<!--- Script Source Files -->
<?php include 'includes/scripts.php';?>
<!--- End of Script Source Files -->

</body>
</html>


