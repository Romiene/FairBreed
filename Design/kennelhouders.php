<?php
    include 'database.php';    
    // kennelhouder getter
    $dbh = new PDO('mysql:host='.$server.';dbname=student57_fairbreed;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare("SELECT naam, contact_persoon, adres, tel, mail, ubn, kvk, bio FROM kennelhouders WHERE user_id = ?");
    $stmt->bindParam(1, $_SESSION['id'], PDO::PARAM_STR, 255);
    $stmt->execute();
    $kennelhouder = $stmt->fetch(PDO::FETCH_ASSOC);                        
    $dbh = null;
    $stmt = null;
    if (isset($_POST['gebruikersnaam']) && isset($_POST['wachtwoord'])) {
            $username = $_POST['gebruikersnaam'];
            $password = $_POST['wachtwoord'];
            $dbh = new PDO('mysql:host='.$server.';dbname=student57_fairbreed;charset=utf8', $user, $pass);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt= $dbh->prepare("SELECT id, password, adminlevel FROM users WHERE username = :user");
            $stmt->bindParam(':user', $username, PDO::PARAM_STR, 60);
            $stmt->execute();
            $result= $stmt->fetch(PDO::FETCH_ASSOC);            
            $stored_hash= $result['password'];
            if(password_verify($password, $stored_hash)) {
                $_SESSION['logged'] = true;
                $_SESSION['id'] = $result['id'];
                $_SESSION['adminlevel'] = $result['adminlevel'];
                 header('Location:http://localhost/FairBreed/kennelhouders.php');
            } else {
                echo 'Inloggegevens komen niet overeen!';
            }
        }
    if (isset($_POST['logout'])){
        session_destroy();
        header('Location:http://localhost/FairBreed/kennelhouders.php');
    }
   // if(isset($_POST['submitReg'])){
    //        $options = array('cost' => 12);
    //        $password = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT, $options);
    //        try{               
    //           include 'database.php';
    //           $dbh = new PDO('mysql:host='.$server.';dbname=student57_fairbreed;charset=utf8', $user, $pass);
    //           $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //           $stmt= $dbh->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    //           $stmt->bindParam(':username', $_POST['gebruikersnaam'], PDO::PARAM_STR, 60);
    //           $stmt->bindParam(':password', $password, PDO::PARAM_STR, 60);               
    //           $stmt->execute();
    //           header('Location:http://localhost/FairBreed/kennelhouders.php');
   //         }catch (PDOException $e){
   //         echo '<p>Oeps! Er is iets foutgegaan!</p>';
   //         file_put_contents('PDOErrors.txt', $e->getMessage().PHP_EOL, FILE_APPEND); 
//	}
   //     }
    
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
                            <?php if(!isset($_SESSION['logged'])){
				echo '<div class="login-form">
					<form class="" action="http://localhost/FairBreed/kennelhouders.php" method="post">
						<label for="gebruikersnaam">Gebruikersnaam: </label>
						<input type="text" name="gebruikersnaam" id="gebruikersnaam">
						<label for="wachtwoord">Wachtwoord: </label>
						<input type="password" name="wachtwoord" id="wachtwoord">
                                                <input type="submit" value="Login" name="login">
					</form>
				</div>';
                            }elseif (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
                                echo '<form class="" action="http://localhost/FairBreed/kennelhouders.php" method="post">						
                                                <input type="submit" value="Logout" name="logout">
					</form>';
                            }
                                ?>
				<div class="profiel-kennel">
                                    <h2><?= $kennelhouder['naam']?></h2>
					<ul class="kennel-details">
						<li>Contact persoon: <?= $kennelhouder['contact_persoon']?> </li>
						<li>adres:<?= $kennelhouder['adres']?> </li>
						<li>Tel: <?= $kennelhouder['tel']?></li>
						<li>Mail: <?= $kennelhouder['mail']?></li>
						<li>Ubn:<?= $kennelhouder['ubn']?> </li>
						<li>Kvk:<?= $kennelhouder['kvk']?> </li>
					</ul>
					<div class="profiel-foto">
						<img src="" height="" width="">
					</div>
					<div class="kennel-bio">
						<p>
						<?= $kennelhouder['bio']?>
						
						</p>
					</div>
				</div>
			</main>
			<footer></footer>
		</div>
	</body>
</html>