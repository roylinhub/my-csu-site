</head>
<body>

<!--banner!-->
<div class="banner">
<a href="index.php"><img style="height: 60px; margin-left: 3%; "src="./images/logo.png"></img></a>
</div>
<div class="main_wrapper">
	<?php include('p3_nav.php');?>
			<div class="main_container">
				<?php
				if (isset($_SESSION['cUser'])){memberForm();}
				?>

