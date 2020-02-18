<?php
$dbh = new PDO('mysql:host='.$server.';dbname=fairbree_fairbreed;charset=utf8', $user, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $dbh->prepare("SELECT o.naam AS onaam, o.chipnummer AS ochipnummer, o.ras AS oras, o.leeftijd AS oleeftijd, o.img AS oimg, p.naam AS pnaam, p.chipnummer AS pchipnummer, p.leeftijd AS pleeftijd, p.ras AS pras, p.img AS pimg FROM ouder_honden AS o JOIN pups AS p ON p.ouder_hond = o.id WHERE kennelhouder = ?");
$stmt->bindParam(1, $_SESSION['uid'], PDO::PARAM_STR, 255);
$stmt->execute();
$honden = $stmt->fetchAll(PDO::FETCH_ASSOC);                        
$dbh = null;
$stmt = null;
if (isset($_POST['verander'])) {
    $dbh = new PDO('mysql:host='.$server.';dbname='.$db.';charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare("UPDATE kennelhouders SET naam = :naam, contact_persoon = :contactpersoon, adres = :adres, tel = :tel, mail = :mail, ubn = :ubn, kvk = :kvk, bio = :bio WHERE id = :id");    
    $stmt->bindParam(':naam', $_POST['kennelnaam'], PDO::PARAM_STR, 255);
    $stmt->bindParam(':contactpersoon', $_POST['naam'], PDO::PARAM_STR, 255);
    $stmt->bindParam(':adres', $_POST['adres'], PDO::PARAM_STR, 255);
    $stmt->bindParam(':tel', $_POST['tel'], PDO::PARAM_STR, 255);
    $stmt->bindParam(':mail', $_POST['email'], PDO::PARAM_STR, 255);
    $stmt->bindParam(':ubn', $_POST['ubn'], PDO::PARAM_STR, 255);
    $stmt->bindParam(':kvk',$_POST['kvk'], PDO::PARAM_STR, 255);
    $stmt->bindParam(':bio', $_POST['bio'], PDO::PARAM_STR, 255);    
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR, 255);
    $stmt->execute();                           
    $dbh = null;
    $stmt = null;
}
 echo '<div class="profiel-kennel">
                                    <h2><'.$kennelhouder['naam'].'</h2>
					<ul class="kennel-details">
						<li>Contact persoon: '.$kennelhouder['contact_persoon'].' </li>
						<li>adres:'.$kennelhouder['adres'].' </li>
						<li>Tel: '.$kennelhouder['tel'].'</li>
						<li>Mail: '.$kennelhouder['mail'].'</li>
						<li>Ubn:'.$kennelhouder['ubn'].' </li>
						<li>Kvk:'.$kennelhouder['kvk'].' </li>
					</ul>
					<div class="profiel-foto">
						<img src="'.$kennelhouder['img'].'" height="200" width="200">
					</div>
					<div class="kennel-bio">
						<p>
						'.$kennelhouder['bio'].'						
						</p>
					</div>
				</div>
                                <form id="edit-knop" action="" method="post">
                        <input type="submit" value="aanpassen" name="aanpassen">
                    </form>
                </div>
                <div class="profiel-kennel-edit">
                     <form action="https://fairbreed.nl/keurmerk_houders/mijnkennel/" method="post">
                                      <input type="text" id="kennelnaam" name="kennelnaam" value="'.$kennelhouder['naam'].'" >
				    	<fieldset class="kennel-details">
                            <label for="naam">Contact persoon: </label>
                            <input type="text" id="naam" name="naam" value="'.$kennelhouder['contact_persoon'].'"> 
                            <label for="adres">adres: </label> 
                            <input type="text" id="adres" name="adres" value="'.$kennelhouder['adres'].'" >
                            <label for="tel">Tel: </label> 
                            <input type="tel" id="tel" name="tel" value="'.$kennelhouder['tel'].'" >
                            <label for="email">Mail: </label> 
                            <input type="email" id="email" name="email" value="'.$kennelhouder['mail'].'" >
                            <label for="ubn">Ubn: </label> 
                            <input type="text" id="ubn" name="ubn" value="'.$kennelhouder['ubn'].'" >
                            <label for="kvk">Kvk: </label> 
                            <input type="text" id="kvk" name="kvk" value="'.$kennelhouder['kvk'].'" >
				    	</fieldset>
				    	<div class="profiel-foto">
				    		<input type="file" id="foto" name="foto">
				    	</div>
				    	<div class="kennel-bio">

                            <input type="text" id="bio" name="bio" value="'.$kennelhouder['bio'].'">
                            <input type ="hidden" name ="id" value="'.$kennelhouder['id'].'">
                        </div>
                        <input type="submit" value="verander" name="verander">
                    </form>
                    <section class="kennelhonden">
                        <div class="kennelhonden-ouder">
                            
                            <!-- dit is hetzelfde als in ouderhonden.html  dus moet nog personlijk gemaakt worden per kennelhouder -->
                            <div class="ouderhonden-lijst">
			                	<h2>Ouderhonden</h2>';                                 
                                  foreach($honden as $hond){                                      
                                echo '<div class="ouderhond">
					        	    <img src="'.$hond['oimg'].'" height="150" width="150" class="hond-foto">
					        	    <section class="ouderhond-info">
					    	        	<p class="hond-nummer">'.$hond['onaam'].'</p>
					    	        	<p class="hond-titel">'.$hond['ochipnummer'].'</p>
                                                                <p class="hond-titel">'.$hond['oras'].'</p>
                                                                <p class="hond-titel">'.$hond['oleeftijd'].'</p>
					        	    </section>
				            	</div>
                            </div>
                                
                        </div>
                        <div class="kennelhonden-pup">

                            <!-- Hetzelfde hier als met de ouderhonden maar dan pups -->
                            <div class="pup-lijst">
				        	    <h2>Pups</h2>
					            <div class="pup">
					            	<img src="'.$hond['pimg'].'" height="150" width="150" class="hond-foto">
					        	    <section class="ouderhond-info">
					    	        	<p class="hond-nummer">'.$hond['pnaam'].'</p>
					    	        	<p class="hond-titel">'.$hond['pchipnummer'].'</p>
                                                                <p class="hond-titel">'.$hond['pras'].'</p>
                                                                <p class="hond-titel">'.$hond['pleeftijd'].'</p>
					        	    </section>
					            </div>
                                  </div>';}
                       echo'</div>
                    </section>';
?>