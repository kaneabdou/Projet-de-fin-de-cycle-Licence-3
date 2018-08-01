<?php
session_start();
 if (!isset($_SESSION["username"]))
 {
     header("Location: admin.php");
 }
 require_once("connexion.php");
$filiere = "lgi";
$mess = "";
  if (isset($_POST["ajout"]))
  {
      if (isset($_POST["nom"]) AND isset($_POST["cour"]) AND isset($_POST["username"]) AND isset($_POST["pass"]))
      {
          $nom = htmlspecialchars(trim($_POST["nom"]));
           $module = htmlspecialchars(trim($_POST["cour"]));
           $user = htmlspecialchars(trim($_POST["username"]));
           $pass = htmlspecialchars(trim($_POST["pass"]));
          $req = $bdd->prepare("INSERT INTO professeur (matricule,nomProf,username,pass,cours) VALUES ('',:nom,:username,:pass,,:cour)");
          $req->execute(array(":nom"=>$nom,":username"=>$user,":pass"=>$pass,":cours"=>$module));
          $mess = "Ajouté avec succès";
      }
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
         <a class="navbar-brand" href="dashboard.php">Chef de departement</a>
       </div>
       <div class="collapse navbar-collapse navbar-ex1-collapse">
         <ul class="nav navbar-nav side-nav">
           <li class="selected"><a href="dashboard.php"><i class="fa fa-bullseye"></i> Creer emploi du temps</a></li>

          
           <li><a href="events.php"><i class="fa fa-font"></i> Ajouter un module de Cours</a></li>
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
               <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
               <li class="divider"></li>
               <li><a href="logout.php"><i class="fa fa-power-off"></i> Deconnexion</a></li>
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
                   <h4 class="panel-title" >Ajout Professeur</h4>
               </div>
               <div class="panel-body">
                 <?php
                  if ($mess != "")
                  {
                      echo $mess;
                  }
                  ?>
                    <form class="form" method="post" action="">
                        <table class="table formul">
                          <div class="form-group">
                            <tr><td><label for="nom" >Nom:</label></td><td><input type="text" class="form-control" name="nomProf" id="nom"/></td></tr>
                          </div>
                          
                            <div class="form-group">
                            <tr><br><td><label for="cour" >Module:</label></td><td><input type="text" class="form-control" name="cour" id="cour"/></td></tr>
                          </div>
                          <div class="form-group">
                            <tr><br><td><label for="username" >Mot d'utilisateur:</label></td><td><input type="text" class="form-control" name="username" id="username"/></td></tr>
                          </div>
                          <div class="form-group">
                            <tr><br><td><label for="pass" >Mot de passe:</label></td><td><input type="text" class="form-control" name="pass" id="pass"/></td></tr>
                          </div>
                     <tr><td></td><td><br><div class="button1"><input name="ajout" type="submit" value="Ajouter" class="btn btn-primary"></div></td></tr></table>

                 </form>
               </div>

             </div>







           </div>


           </div>
     </div>
   </div>

 </body>
 </html>
