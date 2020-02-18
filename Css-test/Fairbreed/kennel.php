<?php
$dbh = new PDO('mysql:host='.$server.';dbname=fairbree_fairbreed;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare("SELECT id, naam, contact_persoon, adres, tel, mail, ubn, kvk, bio, img FROM kennelhouders WHERE id = ?");
    $stmt->bindParam(1, $_GET['kennel'], PDO::PARAM_STR, 255);
    $stmt->execute();
    $kennelhouder = $stmt->fetch(PDO::FETCH_ASSOC);                        
    $dbh = null;
    $stmt = null;
    
$dbh = new PDO('mysql:host='.$server.';dbname=fairbree_fairbreed;charset=utf8', $user, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $dbh->prepare("SELECT o.naam AS onaam, o.chipnummer AS ochipnummer, o.ras AS oras, o.leeftijd AS oleeftijd, o.img AS oimg, p.naam AS pnaam, p.chipnummer AS pchipnummer, p.leeftijd AS pleeftijd, p.ras AS pras, p.img AS pimg FROM ouder_honden AS o JOIN pups AS p ON p.ouder_hond = o.id WHERE kennelhouder = ?");
$stmt->bindParam(1, $kennelhouder['id'], PDO::PARAM_STR, 255);
$stmt->execute();
$honden = $stmt->fetchAll(PDO::FETCH_ASSOC);                        
$dbh = null;
$stmt = null;
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
                </div>                
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