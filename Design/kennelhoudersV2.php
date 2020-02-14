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
                        <h3>Bio</h3>
						<p>
						<?= $kennelhouder['bio']?>
						
						</p>
                    </div>
                    <form id="edit-knop" action="" method="post">
                        <input type="submit" value="aanpassen" name="aanpassen">
                    </form>
                </div>
                <div class="profiel-kennel-edit">
                     <form action="" method="post">
                                      <input type="text" id="kennelnaam" name="kennelnaam" value="<?= $kennelhouder['naam']?>" >
				    	<fieldset class="kennel-details">
                            <label for="naam">Contact persoon: </label>
                            <input type="text" id="naam" name="naam" value="<?= $kennelhouder['contact_persoon']?>"> 
                            <label for="adres">adres: </label> 
                            <input type="text" id="adres" name="adres" value="<?= $kennelhouder['adres']?>" >
                            <label for="tel">Tel: </label> 
                            <input type="tel" id="tel" name="tel" value="<?= $kennelhouder['tel']?>" >
                            <label for="email">Mail: </label> 
                            <input type="email" id="email" name="email" value="<?= $kennelhouder['mail']?>" >
                            <label for="ubn">Ubn: </label> 
                            <input type="text" id="ubn" name="ubn" value="<?= $kennelhouder['ubn']?>" >
                            <label for="kvk">Kvk: </label> 
                            <input type="text" id="kvk" name="kvk" value="<?= $kennelhouder['kvk']?>" >
				    	</fieldset>
				    	<div class="profiel-foto">
				    		<input type="file" id="foto" name="foto">
				    	</div>
				    	<div class="kennel-bio">

                            <input type="text" id="bio" name="bio" value="<?= $kennelhouder['bio']?>">
					    	
                        </div>
                        <input type="submit" value="verander" name="verander">
                    </form>
                    <section class="kennelhonden">
                        <div class="kennelhonden-ouder">
                            
                            <!-- dit is hetzelfde als in ouderhonden.html  dus moet nog personlijk gemaakt worden per kennelhouder -->
                            <div class="ouderhonden-lijst">
			                	<h2>Ouderhonden</h2> 
                                <div class="ouderhond">
					        	    <img src="" height="" width="" class="hond-foto">
					        	    <section class="ouderhond-info">
					    	        	<p class="hond-nummer"></p>
					    	        	<p class="hond-titel"></p>
					        	    </section>
				            	</div>
                            </div>
                        </div>
                        <div class="kennelhonden-pup">

                            <!-- Hetzelfde hier als met de ouderhonden maar dan pups -->
                            <div class="pup-lijst">
				        	    <h2>Pups</h2>
					            <div class="pup">
					            	<img src="" height="" width="" class="pup-foto">
					            	<section class="pup-info">
						            	<p class="pup-nummer"></p>
						            	<p class="pup-titel"></p>
						            </section>
					            </div>
			            	</div>
                        </div>
                    </section>
                </div>
			</main>
			<footer></footer>
		</div>
	</body>
</html>