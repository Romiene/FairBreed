<?php if(isset($_POST['galleryImg'])){
        $target_dir = "images/user/";
        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($newfilename,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($newfilename)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"img/" . $newfilename)) {
                $filename = "img/" . $newfilename;
                try{
               include 'database.php';
               $stmt= $dbh->prepare("INSERT INTO img_gallery (src, alt, figcaption) VALUES (:src, :alt, :figcaption)");
               $stmt->bindParam(':src', $filename, PDO::PARAM_STR, 60);
               $stmt->bindParam(':alt', $_POST['alt'], PDO::PARAM_STR, 60);
               $stmt->bindParam(':figcaption', $_POST['figcaption'], PDO::PARAM_STR, 60);
               $stmt->execute();
               header('Location:http://localhost/EindopdrachtPhp/admin/users/');
            }catch (PDOException $e){
            echo '<p>Oeps! Er is iets foutgegaan!</p>';
            file_put_contents('PDOErrors.txt', $e->getMessage().PHP_EOL, FILE_APPEND);}
                header('Location:http://localhost/EindopdrachtPhp/admin/gallery/');
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        }
