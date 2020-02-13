<?php
    include 'database.php';
    // kennelhouder getter
    $dbh = new PDO('mysql:host='.$server.';dbname=student57_fairbreed;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare("SELECT naam, contact_persoon, adres, tel, mail, ubn, kvk, bio FROM kennelhouders WHERE id = 1");
   // $stmt->bindParam(1, $page, PDO::PARAM_STR, 255);
    $stmt->execute();
    $kennelhouder = $stmt->fetch(PDO::FETCH_ASSOC);                        
    $dbh = null;
    $stmt = null;
    if(isset($_POST['submitReg'])){
            $options = array('cost' => 12);
            $password = password_hash($_POST['regPassword'], PASSWORD_DEFAULT, $options);
            try{               
               include 'database.php';
               $stmt= $dbh->prepare("INSERT INTO users (username, password, powerlevel) VALUES (:username, :password, :powerlevel)");
               $stmt->bindParam(':username', $_POST['regUsername'], PDO::PARAM_STR, 60);
               $stmt->bindParam(':password', $password, PDO::PARAM_STR, 60);
               $stmt->bindParam(':powerlevel', $_POST['powerlevel'], PDO::PARAM_STR, 60);
               $stmt->execute();
               header('Location:http://localhost/EindopdrachtPhp/admin/users/');
            }catch (PDOException $e){
            echo '<p>Oeps! Er is iets foutgegaan!</p>';
            file_put_contents('PDOErrors.txt', $e->getMessage().PHP_EOL, FILE_APPEND); 
	}
        }
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="stylesheet.php">
	</head>
	<body>
		<div id="container">
			<header></header>
			<nav></nav>
			<main>
				<div class="login-form">
					<form class="" action="http://localhost/FairBreed/" method="post">
						<label for="gebruikersnaam">Gebruikersnaam: </label>
						<input type="text" name="gebruikersnaam" id="gebruikersnaam">
						<label for="wachtwoord">Wachtwoord: </label>
						<input type="text" name="wachtwoord" id="wachtwoord">
					</form>
				</div>
				<div class="profiel-kennel">
					<ul class="kennel-details">
						<li>Contact persoon:<?= $kennelhouder['naam']?> </li>
						<li>adres: </li>
						<li>Tel: </li>
						<li>Mail: </li>
						<li>Ubn: </li>
						<li>Kvk: </li>
					</ul>
					<div class="profiel-foto">
						<img src="" height="" width="">
					</div>
					<div class="kennel-bio">
						<p>
						
						
						</p>
					</div>
				</div>
			</main>
			<footer></footer>
		</div>
	</body>
</html>