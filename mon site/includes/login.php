<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/test/css/styles.css">
	
	<title>Login</title>
</head>
<body>
	
		
	<center><h1>Login</h1>
		<form method="post">
			<input type="email" name="email" id="email" placeholder="Votre adresse électronique"><br/>
			<input type="password" name="password" id="password" placeholder="Mot de passe" required><br/>
			<input type="submit" name="Formlogin" id="formlogin" ><br/>

		</form>
	</center>
</body>
</html>

<?php 
	include 'databases.php';
		global $db;
	
	if(isset($_POST['Formlogin']))
	{
		extract($_POST);

		if(!empty($email) && !empty($password))
		{
			$q = $db->prepare("SELECT * FROM user WHERE email = :email");
			$q->execute(['email' => $email]);
			$result = $q->fetch();

			if($result == true)
			{
				$hashpassword = $result['password'];
				if(password_verify($password, $hashpassword))
				{ 
					header ('Location:/accueil.php');
				}	
				else
				{
					echo "Le mot de passe n'est pas correct";
				}
			}
			else
			{
				echo "Il n'existe aucun compte avec l'email " . $email;
			}
		}
		else
		{
			echo "Veuillez compléter tout les champs";
		}
	}


?>