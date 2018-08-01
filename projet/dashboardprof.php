<?php

 ?>
 <?php
 session_start();
  if (isset($_SESSION["username"],$_SESSION["matricule"]))
  {
      header("Location: professeur.php");
  }
  require_once("connexion.php");

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
    <script type="text/javascript" src="js/emploi.js"></script>
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
          <a class="navbar-brand" href="dashboard.php">Professeur</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="selected"><a href=""><i class="fa fa-bullseye"></i> voir emploi du temps</a></li>


          </ul>
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown messages-dropdown">
              <a href="logout1.php" class="dropdown-toggle" data-toggle="dropdown"> Se déconnecter</a>
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
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="logout1.php"><i class="fa fa-power-off"></i> Deconnexion</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>

      <div id="page-wrapper">

        <div class="row ">
            <div class="center col-lg-6 ">
              <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title" >voir emploi du temps</h4>
                </div>
                <div class="panel-body">

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
                        $arrayHour = ["8-10","10-12","15-17","17-19"];
                        $idProf = 1; //$_SESSION["matricule"];
                        for ($i=0; $i < count($arrayHour); $i++) {
                          $tds = "";
                          for ($j=0; $j < count($arrayDay); $j++) {
                              $reqEmploi = $bdd->prepare("SELECT * FROM emploitemps WHERE idJour=:idJour AND heure=:heure AND idCour != 0 AND idProfesseur = :idProf");
                              $reqEmploi->execute(array(":idJour"=>$j+1,":heure"=>$arrayHour[$i],":idProf"=>$idProf));
                              $dataEmploi = $reqEmploi->fetch(PDO::FETCH_ASSOC);
                              $tds .= (!($dataEmploi==false)?"<td>V</td>":"<td></td>");
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
                </div>

              </div>







            </div>


            </div>
      </div>
    </div>

  </body>
  </html>
