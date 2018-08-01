<?php
session_start();
  require_once("connexion.php");
  $filiere  = "lsee";
  if(isset($_POST["username"]) AND isset($_POST["pass"]) )
  {
      $req = $bdd->prepare("SELECT * FROM deptchef WHERE nom = :username AND password = :pass AND filiere=:fili");
      $req->execute(array(":username"=>$_POST["username"],
                          ":pass"=>$_POST["pass"],
                          ":fili"=>$filiere));
      $data = $req->fetch(PDO::FETCH_ASSOC);
      if ($data)
      {
          $_SESSION["username"] = $_POST["username"];
        //  $_SESSION["matricule"] = $_POST["matricule"]; //pour professeur
          header("Location: dashboard.php");
        //  header("Location: dashboardprof.php");
      }
      else
      {
        header("Location: admin.php?mess=Mot de pass non valide");
      }
  }
 ?>
