<?php
    $options = array('cost' => 12);
    $password = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT, $options);
     try{               
       include 'database.php';
       $dbh = new PDO('mysql:host='.$server.';dbname=student57_fairbreed;charset=utf8', $user, $pass);
       $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $stmt= $dbh->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
       $stmt->bindParam(':username', $_POST['gebruikersnaam'], PDO::PARAM_STR, 60);
       $stmt->bindParam(':password', $password, PDO::PARAM_STR, 60);               
       $stmt->execute();       
    }catch (PDOException $e){
    echo '<p>Oeps! Er is iets foutgegaan!</p>';
    file_put_contents('PDOErrors.txt', $e->getMessage().PHP_EOL, FILE_APPEND);
    }
    $dbh = new PDO('mysql:host='.$server.';dbname=student57_fairbreed;charset=utf8', $user, $pass);
       $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $stmt= $dbh->prepare("SELECT * FROM users ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    $userid = $stmt->fetch(PDO::FETCH_ASSOC);
     
    $dbh = new PDO('mysql:host='.$server.';dbname='.$db.';charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare("INSERT INTO kennelhouders (naam, contact_persoon, adres, tel, mail, ubn, kvk, bio, img, user_id) VALUES (:naam, :contactpersoon, :adres, :telefoon, :email, :ubn, :kvk, :bio, :img, :userid)");
    $stmt->bindParam(':naam', $pagina, PDO::PARAM_STR, 255);
    $stmt->bindParam(':contactpersoon', $pagina, PDO::PARAM_STR, 255);
    $stmt->bindParam(':naam', $pagina, PDO::PARAM_STR, 255);
    $stmt->bindParam(':naam', $pagina, PDO::PARAM_STR, 255);
    $stmt->bindParam(':naam', $pagina, PDO::PARAM_STR, 255);
    $stmt->bindParam(':naam', $pagina, PDO::PARAM_STR, 255);
    $stmt->bindParam(':naam', $pagina, PDO::PARAM_STR, 255);
    $stmt->bindParam(':naam', $pagina, PDO::PARAM_STR, 255);
    $stmt->bindParam(':naam', $pagina, PDO::PARAM_STR, 255);
    $stmt->bindParam(':userid', $pagina, PDO::PARAM_STR, 255);
    $stmt->execute();                           
    $dbh = null;
    $stmt = null;
?>