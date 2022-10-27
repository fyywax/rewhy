<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="test/css/styles.css">

	<title>Rewhy</title>
</head>
<body>
	
	<h1 align="center">Bienvenue</h1>
	<center>
		<?php		
			if(isset($_SESSION['nom']) && (isset($_SESSION['email'])))
			{
				?>

				<p>Votre nom : <?php echo $_SESSION['nom']; ?></p>
				<p>Votre email : <?php echo $_SESSION['email']; ?></p>

				<?php

			}else{
				echo "Veuillez vous connecter à votre compte";
			}
		
		?>
	</center>


	<?php  

		include 'includes/databases.php';
		global $db;
	
	?>
	<center>
		<nav class = "menu-nav">
			<ul>
				<li class = "bouton">
					<a href="includes/login.php">Login</a>
				</li>
				<br><br>
				<li class = "bouton">
					<a href="includes/signin.php">Signin</a>
				</li>
			</ul>
		</nav>
	</center>

</body>
</html>