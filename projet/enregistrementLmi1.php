<?php
  require_once ("connexion.php");
  if (isset($_POST["valid"]) )
  {

      if (isset($_POST["cours"],$_POST["prof"],$_POST["heure_deb"]))
      {
        $idCours = intval($_POST["cours"]);
        $idProfesseur = intval($_POST["prof"]);
        $arrayHour = ["8-10","10-12","15-17","17-19"];
        $arrayDay = ["Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"];
        for ($i=0; $i < count($arrayHour); $i++) {

          for ($j=0; $j < count($arrayDay); $j++) {
            $name = $arrayDay[$j].$i;

            if (isset($_POST[$name]))
            {
                $idJour = $j +1;
                $reqEmploi = $bdd->prepare("UPDATE emploitemps SET idCour =$idCours, idProfesseur =$idProfesseur WHERE idjour=$idJour AND heure = '$arrayHour[$i]'");

                $reqEmploi->execute();
                $mess = "Ajouté avec succès";
            }


          }
      }
      header("Location: dashboard11.php?mess=$mess");
  }
  else
  {
      echo "remplir tout le formulaire";
  }
}
else {
    header("Location: dashboard11.php");
}

 ?>
