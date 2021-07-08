<!--- Navigation -->
<nav class="navbar navbar-dark  navbar-expand-md fixed-top ">
		<div class="container-fluid " >
			<a class="navbar-brand  " href="index.php"><img src="img/Picture 2.png" width=90 height=60></a> <button class="navbar-toggler" data-target="#navbarResponsive" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse " id="navbarResponsive">
				<ul class="navbar-nav ml-auto " style="margin-right: 100px; font-weight: bold;">

					<li class="nav-item">
						<a class="nav-link <?php if ($page=='login'){echo 'active';}?>" href="logout.php">تسجيل خروج </a>
					</li>

					<li class="nav-item">
						<a class="nav-link <?php if ($page=='home'){echo 'active';}?>" href="Admin.php">مبادرة تبيّن</a>
					</li>

					<li class="nav-item">
                        <a class="nav-link " 
                        href="index.php"></a>
					</li>                    
				</ul>
			</div>
		</div>
	</nav>
	<!--- End Navigation -->