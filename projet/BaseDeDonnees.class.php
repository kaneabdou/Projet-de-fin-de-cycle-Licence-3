 <?php 
 /**
 * 
 */
 class BaseDeDonnees   
 {
 	private   $NomBase="banque";
 	private   $adresse="localhost";
 	private   $User="root";
 	private   $Password="";
 	private $bdd;
 	function __construct()
 	{
 		$this->bdd=$this->Connexion();
 	}
 	public function Connexion(){

 		try {
 			//$this->bdd= new PDO('mysql:host='.$adresse.';dbname='.$NomBase,$User,$Password,array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));
 			$this->bdd= new PDO('mysql:host=localhost;dbname=adminsco','root','',array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));

 		} catch (Exception $e) {
 			die('Erreur : '.$e->getMessage());
 		}
 		return $this->bdd;
 	}
 	public function selection($SQL){
 		$req=$this->bdd->prepare($SQL);
 		$req->execute();
 		return $req;
 	}

 	public function insertionProfesseur($donnees){
 		$req =$this->bdd->prepare('INSERT INTO professor(nomProf, prenomProf, specialisation) VALUES(?,?,?)');
 		$req->execute( array($donnees[0],$donnees[1],$donnees[2],$donnees[3]));  

 	}
 	public function insertioncours($donnees){
 	
 		$req = $bdd->prepare('INSERT INTO cours(libelle) VALUES(?)');
 		$req->execute( array($donnees[0]);  

 	}
 	public function insertionclasse($donnees){
 		$req =$this->bdd->prepare('INSERT INTO classe(nomClass, capacite) VALUES(?,?)');
 		$req->execute( array($donnees[0],$donnees[1])); 
 		
 		//$idChauffeur=$this->selection("SELECT idChauffeur FROM chauffeur ORDER BY idChauffeur DESC LIMIT 1");
 		//while ($dd=$idChauffeur->fetch()) {
 		//	$update=$this->bdd->prepare('UPDATE taxi SET idChauffeur=:id where immatricule=:imm');
 		//$update->execute(array('id'=>$dd['idChauffeur'],'imm'=>$donnees[4])); 

 		//}
 		
 	}
 	
 }

 ?>