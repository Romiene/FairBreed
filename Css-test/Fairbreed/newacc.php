<?php
//
// ALERT NEW ACCOUNT
//
if (
  isset($_POST['kennelAanmelding']) &&
  !empty($_POST['newKennelKennelnaam']) &&
  !empty($_POST['newKennelNaam']) &&
  !empty($_POST['newKennelWachtwoord']) &&
  ($_POST['newKennelWachtwoordConfirm'] == $_POST['newKennelWachtwoord']) &&
  preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/', $_POST['newKennelWachtwoord']);
  !empty($_POST['newKennelAddress']) &&
  !empty($_POST['newKennelTel']) &&
  !empty($_POST['newKennelEmail']) &&
  preg_match('/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/', $_POST['email']) &&
  !empty($_POST['newKennelUbn']) &&
  !empty($_POST['newKennelKvk']) &&
  !empty($_POST['newKennelFoto'])
) {
      $options = array('cost' => 12);
      $password = password_hash($_POST['newKennelWachtwoord'], PASSWORD_DEFAULT, $options);
       try{
         include 'database.php';
         $dbh = new PDO('mysql:host='.$server.';dbname=student57_fairbreed;charset=utf8', $user, $pass);
         $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $stmt= $dbh->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
         $stmt->bindParam(':username', $_POST['newKennelNaam'], PDO::PARAM_STR, 60);
         $stmt->bindParam(':password', $password, PDO::PARAM_STR, 60);
         $stmt->execute();
      }catch (PDOException $e){
      echo '<p>Oeps! Er is iets foutgegaan!</p>';
      file_put_contents('PDOErrors.txt', $e->getMessage().PHP_EOL, FILE_APPEND);
      }
      try {
        $dbh = new PDO('mysql:host='.$server.';dbname=student57_fairbreed;charset=utf8', $user, $pass);
           $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $stmt= $dbh->prepare("SELECT * FROM users ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $userid = $stmt->fetch(PDO::FETCH_ASSOC);

        $dbh = new PDO('mysql:host='.$server.';dbname='.$db.';charset=utf8', $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $dbh->prepare("INSERT INTO kennelhouders (naam, contact_persoon, adres, tel, mail, ubn, kvk, bio, img, user_id) VALUES (:naam, :contactpersoon, :adres, :telefoon, :email, :ubn, :kvk, :bio, :img, :userid)");
        $stmt->bindParam(':naam', $_POST['newKennelKennelnaam'], PDO::PARAM_STR, 255);
        $stmt->bindParam(':contactpersoon', $_POST['newKennelNaam'], PDO::PARAM_STR, 255);
        $stmt->bindParam(':adres', $_POST['newKennelAddress'], PDO::PARAM_STR, 255);
        $stmt->bindParam(':telefoon', $_POST['newKennelTel'], PDO::PARAM_STR, 255);
        $stmt->bindParam(':email', $_POST['newKennelEmail'], PDO::PARAM_STR, 255);
        $stmt->bindParam(':ubn', $_POST['newKennelUbn'], PDO::PARAM_STR, 255);
        $stmt->bindParam(':kvk', $_POST['newKennelKvk'], PDO::PARAM_STR, 255);
        $stmt->bindParam(':bio', $_POST['newKennelBio'], PDO::PARAM_STR, 255);
        $stmt->bindParam(':img', $_POST['newKennelFoto'], PDO::PARAM_STR, 255);
        $stmt->bindParam(':userid', $userid, PDO::PARAM_STR, 255);
        $stmt->execute();
        $dbh = null;
        $stmt = null;
        swiftmailer('de nieuwe kennel '.$_POST['newKennelKennelnaam'].' heeft zich net aangemeld', 'caddymid@gmail.com', 'FairBreed Alert', 'caddymid@gmail.com', 'caddy');
      } catch (PDOException $e) {
        echo '<p>an error occured or connection failed</p>';
      }
}
?>
