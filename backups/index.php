<?php
if(isset($_GET['page'])) {
    $pagina = $_GET['page'];
}else{
    $pagina ='home';
}

if($page == 'aanmelden'){
    include 'swiftmailer.php';
}
include 'database.php';
if($page == 'aanmelden') {
    include 'newacc.php';
}
    // menu getter
    $dbh = new PDO('mysql:host='.$server.';dbname='.$db.';charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare("SELECT href, name FROM menu");
    $stmt->execute();
    $menu= $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    $stmt = null;
    // content getter
    $dbh = new PDO('mysql:host='.$server.';dbname='.$db.';charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare("SELECT text, title FROM content WHERE pagina = ?");
    $stmt->bindParam(1, $pagina, PDO::PARAM_STR, 255);
    $stmt->execute();
    $content = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    $stmt = null;
if (isset($_POST['gebruikersnaam']) && isset($_POST['wachtwoord'])) {
       $username = $_POST['gebruikersnaam'];
       $password = $_POST['wachtwoord'];
       $dbh = new PDO('mysql:host='.$server.';dbname='.$db.';charset=utf8', $user, $pass);
       $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $stmt= $dbh->prepare("SELECT u.id AS id, u.password, u.adminlevel AS adminlevel, k.id AS uid FROM users AS u JOIN kennelhouders AS k ON k.user_id = u.id WHERE username = :user");
       $stmt->bindParam(':user', $username, PDO::PARAM_STR, 60);
       $stmt->execute();
       $result= $stmt->fetch(PDO::FETCH_ASSOC);
       $stored_hash= $result['password'];
       if(password_verify($password, $stored_hash)) {
           $_SESSION['logged'] = true;
           $_SESSION['id'] = $result['id'];
           $_SESSION['uid'] = $result['uid'];
           $_SESSION['adminlevel'] = $result['adminlevel'];
            header('Location:https://fairbreed.nl/keurmerk_houders/mijnkennel/');
       } else {
           echo 'Inloggegevens komen niet overeen!';
       }
   }
if (isset($_POST['logout'])){
   session_destroy();
   header('Location:https://fairbreed.nl/');
}
if($pagina == 'mijnkennel'){
    $dbh = new PDO('mysql:host='.$server.';dbname=fairbree_fairbreed;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare("SELECT id, naam, contact_persoon, adres, tel, mail, ubn, kvk, bio, img FROM kennelhouders WHERE user_id = ?");
    $stmt->bindParam(1, $_SESSION['id'], PDO::PARAM_STR, 255);
    $stmt->execute();
    $kennelhouder = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbh = null;
    $stmt = null;
}
if($pagina == 'kennels'){
    $dbh = new PDO('mysql:host='.$server.';dbname=fairbree_fairbreed;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare("SELECT naam, CONCAT(LEFT(bio, 25), '...') AS bio, img FROM kennelhouders");
    $stmt->execute();
    $profielen = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    $stmt = null;
}
if($pagina == 'ouderdieren'){
    $dbh = new PDO('mysql:host='.$server.';dbname=fairbree_fairbreed;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare("SELECT naam, ras, leeftijd, img FROM ouder_honden");
    $stmt->execute();
    $profielen = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    $stmt = null;
}
if($pagina == 'pups'){
    $dbh = new PDO('mysql:host='.$server.';dbname=fairbree_fairbreed;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare("SELECT naam, ras, leeftijd, img FROM pups");
    $stmt->execute();
    $profielen = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    $stmt = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="https://fairbreed.nl//" target="_self">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Stylesheet.css">
	<link rel="stylesheet" href="CSS/Stylesheet2.css">
    <title><?= $content['title']?></title>
</head>
<body>
    <div id="container">
        <nav>
            <ul>
                <?php
                    foreach($menu as $button)
                        echo '<li >
                            <a href="'.$button['href'].'">'.$button['name'].'</a>
                        </li>';
                ?>
				<li class="login-button">Inloggen</li>
            </ul>
        </nav>
        <header>
             <?php if(!isset($_SESSION['logged'])){
				echo '<div class="login-form">
					<form class="" action="https://fairbreed.nl/" method="post">
						<label for="gebruikersnaam">Gebruikersnaam: </label>
						<input type="text" name="gebruikersnaam" id="gebruikersnaam">
						<label for="wachtwoord">Wachtwoord: </label>
						<input type="password" name="wachtwoord" id="wachtwoord">
                                                <input type="submit" value="Login" name="login">
					</form>
                                        <a href="https://fairbreed.nl/aanmelden/">Aanmelden</a>
				</div>';
                            }elseif (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
                                echo '<form class="" action="https://fairbreed.nl/" method="post">
                                                <input type="submit" value="Logout" name="logout">
					</form>';
                            }
                                ?>

        </header>
        <?php
            if($_GET['submenu'] == 'yes'){
                include 'submenu.php';
            }
        ?>
        <main>
            <?php
                if($pagina == 'mijnkennel'){
                    include 'kennelhouder.php';
                } elseif ($pagina == 'kennels'){
                    echo '<h1>'.$pagina.'</h1>';
                    foreach($profielen as $profiel){
                       echo '<div class="profiel-lijst">

                                    <div class="'.$pagina.'">
                                            <img src="'.$profiel['img'].'" height="150" width="150" class="pup-foto">
                                            <section class="pup-info">
                                                    <p class="pup-nummer">'.$profiel['naam'].'</p>
                                                    <p class="pup-titel">'.$profiel['bio'].'</p>
                                            </section>
                                    </div>
                            </div>';
                    }
                }elseif ($pagina == 'ouderdieren' || $pagina == 'pups'){
                    foreach($profielen as $profiel){
                        echo '<h1>'.$pagina.'</h1>';
                        echo '<div class="profiel-lijst">

                                        <div class="'.$pagina.'">
                                                <img src="'.$profiel['img'].'" height="150" width="150" class="pup-foto">
                                                <section class="pup-info">
                                                        <p class="pup-nummer">'.$profiel['naam'].'</p>
                                                        <p class="pup-titel">'.$profiel['ras'].'</p>
                                                        <p class="pup-titel">'.$profiel['leeftijd'].'</p>
                                                </section>
                                        </div>
                                </div>';
                    }
                }
                else{
                    foreach($content as $text){
                    echo $text['text'];
                    }
                }
            ?>
           </main>
        <footer>
            <?php include 'footer.php'?>
        </footer>
    </div>
</body>
</html>
