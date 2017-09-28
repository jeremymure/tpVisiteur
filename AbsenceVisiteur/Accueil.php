<?php include "entete.html";?>
<?php include "menu.html";?>
 <div>
                <?php
                $bdd = new PDO('mysql:host=localhost;dbname=TP_visiteur;charset=utf8',
                        'jeremy', 'linux');
                        ?>
                Liste des Visiteurs absent hier :</br>
                        <?php
                        $reponse = $bdd->query('
                        	SELECT NomVisiteur,refVisiteur
                			FROM Visiteur,Absences
                			WHERE idVisiteur=refVisiteur AND DateDebut=DATE_SUB(curdate(),INTERVAL 1 DAY)');


					while ($donnees = $reponse->fetch())
					{
    				echo $donnees['NomVisiteur'] . '<br />';
					}
					$reponse->closeCursor();
					?>
					</br>
					Liste des visiteurs jamais absent:</br>
					<?php
                        $reponse = $bdd->query('
                        	SELECT NomVisiteur
                			FROM Visiteur
                			WHERE idVisiteur NOT IN (SELECT refVisiteur FROM Absences)');


					while ($donnees = $reponse->fetch())
					{
    				echo $donnees['NomVisiteur'] . '<br />';
					}
					$reponse->closeCursor();
					?>
					</br>
					Quel visiteur a le plus d'absence:</br>
					<?php
                        $reponse = $bdd->query('
                        	SELECT NomVisiteur,refVisiteur, SUM(nbjour) as NJAV
                			FROM Visiteur,Absences
                			WHERE idVisiteur=refVisiteur
                			GROUP BY refVisiteur
                			ORDER BY NJAV DESC');



					while ($donnees = $reponse->fetch())
					{
    				echo $donnees['NomVisiteur'] .' absent : '.$donnees['NJAV'].' jours.'.'<br />';
					}
					$reponse->closeCursor();
					?>
					</br>
					Liste des visiteurs ayant le plus d'absence et pour motif "Maladie":</br>
					<?php
                        $reponse = $bdd->query('
                        	SELECT NomVisiteur,libelleMotif, SUM(nbjour) AS NJAV
                			FROM Visiteur,Absences,Motif
                			WHERE refMotif=2 AND refMotif=codeMotif AND refVisiteur=idVisiteur
                			GROUP BY refVisiteur
                			ORDER BY NJAV DESC');



					while ($donnees = $reponse->fetch())
					{
    				echo $donnees['NomVisiteur'] .' absent : '.$donnees['NJAV'].' jours.'.'<br />';
					}
					$reponse->closeCursor();

?>


       		</div>
    </body>
</html>
