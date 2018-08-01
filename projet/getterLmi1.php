<?php
$niveau = 2;
$filiere = "lmi";
require_once "connexion.php";
if (isset($_GET["idCours"]) AND !isset($_GET["idSalle"]))
{
    $idCours = intval($_GET["idCours"]);
    $reqProf = $bdd->prepare("SELECT * FROM enseigne".
          " INNER JOIN professeur ON enseigne.idProfesseur = professeur.matricule ".
          "WHERE enseigne.idCours =:idCours");
    $reqProf->execute(  array(':idCours' => $idCours ));
    $dataProf = $reqProf->fetchAll(PDO::FETCH_ASSOC);
    $html = "";
    foreach ($dataProf as $key => $value) {
        $html .= "<option value='$value[matricule]'  >$value[nomProf]</option>";
    }
    echo $html;
}
else
  if (isset($_GET["idSalle"]))
  {
      ?>
      <div class="text text-center">
          Choisissez les heures de cours

      </div>
        <table class="table table-striped table-bordered" >
          <thead>
            <tr>
              <th>Heures</th>
              <?php
                $arrayDay = ["Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"];

                for ($i=0; $i < count($arrayDay); $i++) {
                    echo <<<Table
                    <th>$arrayDay[$i]</th>
Table;
                }
               ?>

            </tr>
          </thead>
          <tbody>
            <?php
              $idSalle = intval($_GET["idSalle"]);
              $arrayHour = ["8-10","10-12","15-17","17-19"];
              for ($i=0; $i < count($arrayHour); $i++) {
                $tds = "";
                for ($j=0; $j < count($arrayDay); $j++) {

                    $reqEmploi = $bdd->prepare("SELECT * FROM emploitemps  INNER JOIN cours ON cours.filiere = :filiere WHERE emploitemps.idCour = cours.idCours AND idJour=:idJour AND heure=:heure AND cours.niveau= 1");
                    $reqEmploi->execute(array(":idJour"=>$j+1,":heure"=>$arrayHour[$i],":filiere"=>$filiere));
                    $dataEmploi = $reqEmploi->fetch(PDO::FETCH_ASSOC);


                    $reqSalle = $bdd->prepare("SELECT * FROM emploitemps  INNER JOIN cours ON cours.niveau = :niveau WHERE idJour=:idJour AND heure=:heure AND idCour != 0 AND idSalle=:idSalle");
                    $reqSalle->execute(array(":idJour"=>$j+1,":heure"=>$arrayHour[$i],":idSalle"=>$idSalle,":niveau"=>$niveau));
                    $dataSalle = $reqSalle->fetch(PDO::FETCH_ASSOC);
                    $tds .= (!($dataEmploi==false)?"<td>X</td>":((!($dataSalle==false))?"<td>O</td>":"<td><input class='form-control' type='checkbox' name='$arrayDay[$j]$i'/></td>"));
                }

                  echo <<<Table
                    <tr>
                      <td>$arrayHour[$i]</td>
                      $tds
                    </tr>
Table;
              }
             ?>
          </tbody>
        </table>
        <?php
  }

 ?>
