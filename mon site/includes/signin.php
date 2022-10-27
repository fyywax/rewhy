<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/test/css/styles.css">
	
	<title>Signin</title>
</head>
<body>
	

	<center><h1>Signin</h1>
		<form method="post">
			<input type="pseudo" name="pseudo" id="spseudo" placeholder="Votre pseudo"><br/>
			<input type="email" name="email" id="semail" placeholder="Votre adresse électronique"><br/>
			<input type="password" name="password" id="spassword" placeholder="Mot de passe" required><br/>
			<input type="password" name="cpassword" id="cpassword" placeholder="Confirmez votre mot de passe"><br/>
			<input type="submit" name="Formsend" id="formsend" ><br/>

		</form>
	</center>
</body>
</html>
	<?php
		
		include 'databases.php';
			global $db;
			

			if(isset($_POST['Formsend'])){

				extract($_POST);

				if(!empty($password) && !empty($cpassword) && !empty($email) && !empty($pseudo)){

					if($password == $cpassword){
							$options = [
							'cost' => 12,
						];

						$hashpass = password_hash($password, PASSWORD_BCRYPT, $options);

						

						$c = $db->prepare("SELECT email FROM user WHERE email = :email");
						$c->execute(['email' => $email]);

						$result = $c->rowCount();

						if($result == 0){
							$q = $db->prepare("INSERT INTO user(email,password,pseudo) VALUES(:email,:password,:pseudo)");
							$q->execute([
								'email' => $email,
								'password' => $hashpass,
								'pseudo' => $pseudo
							]);
							header ('Location:/accueil.php');
						}else{
							echo "Cet email est déja utilisé";
						}

					}



				}
			}


	?>