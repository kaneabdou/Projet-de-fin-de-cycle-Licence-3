<?php 
function chargerClasse($classname)
{
require "../".$classname.'.class.php';
}
spl_autoload_register('chargerClasse');

if (isset($_POST['immatricule'])) 
	$immatricule=$_POST['immatricule'];
else 
	$immatricule="";
if(isset($_POST['annee']))
	$annee=$_POST['annee'];
else
	$annee="";
 if (isset($_POST['nom'])) 
	$nom=$_POST['nom'];
else 
	$nom="";
if(isset($_POST['prenom']))
	$prenom=$_POST['prenom'];
else
	$prenom="";
 
if(isset($_POST['telephone']))
	$telephone=$_POST['telephone'];
if (empty($nom) OR empty($prenom) OR empty($telephone) OR empty($immatricule) OR empty($annee) ) {
	echo "string";
}
else{
	$bd= new BaseDeDonnees();
	$infoTaxi=array($immatricule,$annee) ;
	$infoChauffeur=array($nom,$prenom,$telephone,$immatricule) ;
	$bd->insertionTaxi($infoTaxi);
	$bd->insertionChauffeur($infoChauffeur);
	require('gerertaxi.php');
	?>
	<script>
	alert("ok");
	</script>
	<?php
	 
}
?>