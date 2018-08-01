<?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=adminsco','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch (exception $e)
        {
            die ('{"error":"-77","status":"connexion à la bd impossible"}');
        }
?>
