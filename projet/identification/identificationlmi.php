<?php
session_start();
if (isset($_SESSION["username"]))
{
  header ("Location: ../dashboard11.php");
}
//require_once('verification.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LGI</title>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/local.css" />

    <script type="text/javascript" src="../styles/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../styles/bootstrap/js/bootstrap.min.js"></script>
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
                <a class="navbar-brand" href="dashboard11.php">Departement Mathematiques</a>
            </div>

                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">2</span> <b class="caret"></b></a>
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
        </nav><br><br><br><br><br><br><br><br>

       <div id="page-wrapper">

            <div class="row ">
                <div class="center col-lg-6 ">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title" >Connexion Admin</h4>
                    </div>
                    <div class="panel-body">
<form class="form" method="post" action="../verifierlmi.php">
                                       <table class="table formul"><tr><br><td><br>
                                         <div class="form-group">
                                           <label for="username" >Nom d'utilisateur:</label></td><td><input type="text" class="form-control" name="username" id="username"/></td></tr>
                                         </div>
                                         <div class="form-group">
                                          <tr><td><label for="pass" >Mot de passe:</label></td><td><input type="password" class="form-control" name="pass" id="pass" /></td></tr>

                                         </div>
                                    <tr><td></td><td><br><div class="button1"><input type="submit" value="Se connecter" class="btn btn-primary"></div></td></tr></table>

                      </form>
                    </div>

                  </div>







                </div>


                </div>
            </div>
        </div>
    </div>

</body>
</html>
