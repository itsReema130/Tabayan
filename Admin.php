<!--- Connect With Database And Initialize Variables -->
<?php
		require_once('config.php');

		session_start();
		// $userEmail=$_SESSION["UserEmail"];
		$query="SELECT * FROM user WHERE user_status ='pending'";
		$result=mysqli_query($con,$query);
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'includes/head.php';?>
	<meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
	<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	
<style>  

	#bgimage{
	background-image: url('img/data-image3.png');
	background-position: center center;
	background-size: cover;
	height: 220px;
	}   
</style>
	
</head>
<body>
	
<?php $page ='home'; include 'includes/navbar4.php';?>



<?php if(!isset($_SESSION['UserEmail']))
{
    // not logged in
    header('Location: index.php');
	exit();
}
?>

<!-- Start Title -->
<div id="bgimage">
<h1 class="text-center" style="padding:100px 0px 0px; color:white; font-weight: bold">طلبات المشاركة في مبادرة تبيّن</h1>
</div>
<!-- End Title-->
<?php if(mysqli_num_rows($result)>0){?>

<!--list User Request -->

<div class="container">

	<table class="table table-condensed table-bordered">
		
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.2/sweetalert2.all.min.js"></script>

					<!--Send Request Successfully-->
					<?php 
						if(@$_GET['Done']==true){
							if(@$_GET['Done']=='delete'){
								echo '<script type="text/javascript">';
								echo 'setTimeout(function () {swal( " ", " تم حذف طلب المشارك" ,"success", { buttons: { catch: { text: "تم",value: "catch",},},timer: 2000}).then((value) => { window.location.href="Admin.php"; });';
								echo '}, 500);</script>';

							//Fail to Send Request
							}elseif (@$_GET['Done']=='update') {
								echo '<script type="text/javascript">';
								echo 'setTimeout(function () {swal( " ", " تم تفعيل حساب المشارك" ,"success", { buttons: { catch: { text: "تم",value: "catch",},},timer: 2000}).then((value) => { window.location.href="Admin.php"; });';
								echo '}, 500);</script>';
							}elseif (@$_GET['Done']=='error') {
								echo '<script type="text/javascript">';
								echo 'setTimeout(function () {swal( " حدث خطأ ما", " حاول المحاولة مرة أٌخرى " ,"error", { buttons: { catch: { text: "تم",value: "catch",},},timer: 2000}).then((value) => { window.location.href="Admin.php"; });';
								echo '}, 500);</script>';
							}

						} 
						if(@$_GET['email']==true){
							echo '<script type="text/javascript">';
							echo 'setTimeout(function () {swal( "  خطا في ارسال الايميل ", " حاول المحاولة مرة أٌخرى" ,"error", { buttons: { catch: { text: "تم",value: "catch",},},timer: 2000}).then((value) => { window.location.href="Admin.php"; });';
							echo '}, 500);</script>';
						}?>	
			<thead>
				<tr>
					<th>الاسم </th>
					<th>الايميل </th>
					<th>مجال المشاركة </th>
					<th>قبول </th>
					<th>رفض </th>
				</tr>
			</thead>
		
			<tbody>
				<?php
				$sr=1;    
				while ( $row = mysqli_fetch_array($result)){?>
				<tr>
					<form action="AcceptOrRejectUser.php" method="post" role="form">
						<td><?php echo $row["user_name"];?> </td>
						<td> <?php echo $row["user_email"];?> </td>			
						<td><?php $type= $row["user_type"]; ?> </td>			
						<td><button type="submit" class="btn btn-success btn-block"  name="Accept" value=<?php echo $row["user_email"].",".$row["user_type"];?> >قبول </button></td>
						<td><button type="submit" class="btn btn-danger btn-block"  name="Delete"  value=<?php echo $row["user_email"].",".$row["user_type"];?> >رفض</button></td>
					</form>  
				</tr> <?php $sr++;  }?>
			</tbody>
	</table>

</div>
<?php }else {?>
	<div class="container ">
			<div class="row justify-content-center text-center  py-5">
				<div class="col-lg-5 col-md-5 col-sm-4 col-xs-4 first py-5 ">
					<div class="style py-2">
					
						<?php
						printf("لا يوجد طلبات انظمام جديدة  للمبادرة ");    
						?>

					</div>	
				</div>
			</div>	
		</div>
<?php } ?>
<!--- Start Footer -->
<?php include 'includes/footer.php';?>
<!--- End of Footer -->

<!--- Script Source Files -->
<?php include 'includes/scripts.php';?>


<!--- End of Script Source Files -->

</body>
</html>


