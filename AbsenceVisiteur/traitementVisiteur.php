<?php

$id=$_POST['id'];
$nom=$_POST['nom'];

 $bdd = new PDO('mysql:host=localhost;dbname=TP_visiteur;charset=utf8','jeremy','linux');

if(empty($id) || empty($nom) ) {
  echo "Veuillez entrer tous les champs";}


else {
  $reponse = $bdd->query('
    SELECT idVisiteur,NomVisiteur
FROM Visiteur
');

while ($donnees = $reponse->fetch())
{
  if ($donnees['idVisiteur'] == $id){
echo "id deja pris";
header("Refresh:3; url=Visiteur.php");
exit;
}
elseif ($donnees['NomVisiteur'] == $nom) {
  echo "nom deja pris";
  header("Refresh:3; url=Visiteur.php");
  exit;
}
}$reponse->closeCursor();


$req = $bdd->prepare('INSERT INTO Visiteur(idVisiteur,NomVisiteur) VALUES (:identity,:nomFamillial)');


$req->execute(array(
	':identity' =>$id,
    ':nomFamillial' =>$nom
    ));
echo 'Le visiteur a bien ete ajoute !';
  }

header("Refresh:3; url=Visiteur.php");

?>
