<?php
//require_once('verification.php');
session_start();
if (!isset($_SESSION["username"]))
{
    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chef de departement</title>

  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="css/local.css" />

  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/emploiLgi2.js"></script>
</head>
<body>

  <div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="dashboard11.php">Chef de departement</a>
      </div>
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li class="selected"><a href="dashboard11.php"><i class="fa fa-bullseye"></i> Creer emploi du temps</a></li>

         
          <li><a href="ajoutmoduleLgi.php"><i class="fa fa-font"></i> Ajouter un module de Cours</a></li>
          <li><a href="events.php"><i class="fa fa-font"></i> Ajouter professeur</a></li>
          <li><a href="forms.php"><i class="fa fa-list-ol"></i> Supprimer professeur</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right navbar-user">
          <li class="dropdown messages-dropdown">
            <a href="logout.php" class="dropdown-toggle" data-toggle="dropdown"> Se déconnecter</a>
            <ul class="dropdown-menu">
              <li class="dropdown-header">2 New Messages</li>
              <li class="message-preview">
                <a href="#">
                  <span class="avatar"><i class="fa fa-bell"></i></span>
                  <span class="message">Security alert</span>
                </a>
              </li>
              <li class="divider"></li>
              <li class="message-preview">
                <a href="#">
                  <span class="avatar"><i class="fa fa-bell"></i></span>
                  <span class="message">Security alert</span>
                </a>
              </li>
              <li class="divider"></li>
              <li><a href="#">Go to Inbox <span class="badge">2</span></a></li>
            </ul>
          </li>
          <li class="dropdown user-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php //echo $prenom." ".$nom?><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
              <li><a href="#"><i class="fa fa-gear"></i> Parametrages</a></li>
              <li class="divider"></li>
              <li><a href="logout.php"><i class="fa fa-power-off"></i> Deconnexion</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

    <div id="page-wrapper">

      <div class="row">
        <div class="col-lg-6">

          <form method="POST" class="form" action="enregistrementLgi3.php" enctype="multipart/form-data">




            <div class="form-group">
              <?php
                  $niveau = 3;
                  $filiere = "lgi";
                  require_once "connexion.php";
                  $reqCours = $bdd->prepare("SELECT * FROM cours WHERE filiere=:filiere AND niveau = :niveau");
                  $reqCours->execute(  array(':filiere' => $filiere,':niveau'=>$niveau ));
                  $dataCours = $reqCours->fetchAll(PDO::FETCH_ASSOC);
                  $reqSalle = $bdd->prepare("SELECT * FROM salles");
                  $reqSalle->execute(  array(':filiere' => $filiere,':niveau'=>$niveau ));
                  $dataSalle = $reqSalle->fetchAll(PDO::FETCH_ASSOC);

               ?>
              <label>Module :</label>
              <span>
                <select  id="selectCours" class="form-control" name="cours" title="heure" class="_5dba" aria-owns="js_0" aria-haspopup="true">
                  <option value="">...</option>
                  <?php
                    foreach ($dataCours as $key => $value) {
                        echo "<option value='$value[idCours]'  >$value[libelle]</option>";
                    }
                   ?>
                </select></span></span>
              </span><br/>
              <div class="form-group">
                  <span class="label label-default">Professeur : </span>
                  <select id="selectProf" class="form-control" name="prof">
                    <option value=""></option>
                  </select>
              </div>

              <div class="form-group">


              <label> Date début du module  &nbsp;</label>
              <span><select aria-label="Jour" class="form-control " name="day" title="Jour" class="_5dba" aria-owns="js_0" aria-haspopup="true">
                <option value="0" selected="1">Jour</option>
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
                <option value="10">10 </option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>
              <select aria-label="Mois" class="form-control" name="month" title="Mois" class="_5dba">
                <option value="0" selected="1">Mois</option>
                <option value="1">jan</option>
                <option value="2">fév</option>
                <option value="3">mar</option>
                <option value="4">avr</option>
                <option value="5">mai</option>
                <option value="6">jun</option>
                <option value="7">juil</option>
                <option value="8">aoû</option>
                <option value="9">sep</option>
                <option value="10">oct</option>
                <option value="11">nov</option>
                <option value="12">déc</option>
              </select><select aria-label="Année"  class='form-control' name="year" title="Année" class="_5dba">
                <option value="0" selected="1">Année</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>

                <option value="2030">2030</option>
                <option value="2031">2031</option>

                <option value="2032">2032</option>
                <option value="2033">2033</option>
                <option value="2034">2034</option>
                <option value="2035">2035</option>
                <option value="2036">2036</option>
                <option value="2037">2037 </option>
              </select></span></span>
            </div>
              <div class="form-group">
                <label for="">Salle : </label>
                <select id="selectSalle" class="" name="">
                  <option value="">...</option>
                  <?php
                  foreach ($dataSalle as $key => $value) {
                      echo "<option value='$value[numSalle]'  >$value[nom]</option>";
                  }
                   ?>
                </select>
              </div>
              <div class="">

                    <div id="tableContent">

                    </div>
                  </div>
                  <label> Durée :</label>
                  <span>
                    <select aria-label="heure_deb"  name="heure_deb" title="heure" class="_5dba" aria-owns="js_0" aria-haspopup="true">
                      <option value="0" selected="1">heures</option>

                      <?php
                        for ($i=0; $i < 22; $i++) {
                          echo '<option value="'.($i+1).'" >'.($i+1).'</option>';
                        }
                       ?>
                    </select></span></span>
                      <span>
                        <select aria-label="minute_deb"  name="minute_deb" title="heure" class="_5dba" aria-owns="js_0" aria-haspopup="true">
                          <option value="0" selected="0">minutes</option>
                        <?php
                          for ($i = 0; $i < 59 ; $i++)
                          {
                              echo '<option value="'.($i+1).'" >'.($i+1).'</option>';
                          }
                         ?>
                          </select></span></span><br>




                              </div>

                              <div class="col-md-8">
                                <button id="button1id" name="valid" class="btn btn-success">Valider</button>
                                <button id="button2id" name="button2" class="btn btn-danger" type="reset">Annuler</button>
                              </div>


                            </div>

                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                </body>
                </html>
