<?php

$choixUtilisateur=$_POST['choixUtilisateur'];
$nombreJours=$_POST['nombreJours'];
$choixMotif=$_POST['choixMotif'];
$ajoutMotif=$_POST['ajoutMotif'];

 $bdd = new PDO('mysql:host=localhost;dbname=TP_visiteur;charset=utf8','jeremy','linux');

if(empty($choixUtilisateur) || empty($nombreJours) || empty($choixMotif) ) {
  echo "Veuillez entrer tous les champs";}


$req = $bdd->prepare('INSERT INTO Visiteur(idVisiteur,NomVisiteur) VALUES (:identity,:nomFamillial)');


$req->execute(array(
	':identity' =>$id,
    ':nomFamillial' =>$nom
    ));
echo 'Le visiteur a bien ete ajoute !';
  }

header("Refresh:3; url=Absence.php");

?>
