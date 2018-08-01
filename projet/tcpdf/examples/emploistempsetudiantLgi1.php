<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information


// set default header data
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)


// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print

$tableHtml =<<<Table
<div class="text text-center">
          Choisissez les heures de cours

      </div>
        <table class="table table-striped table-bordered" >
          <thead>
            <tr>
              <th>Heures</th>
Table;
                $arrayDay = ["Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"];

                for ($i=0; $i < count($arrayDay); $i++) {
                    $tableHtml .= <<<Table
                    <th>$arrayDay[$i]</th>
Table;
                }
               
$tableHtml .="

            </tr>
          </thead>
          <tbody>
";         
              //$idSalle = intval($_GET["idSalle"]);
              require_once("../../connexion.php");
              $filiere = "lgi";
              $arrayHour = ["8-10","10-12","15-17","17-19"];
              for ($i=0; $i < count($arrayHour); $i++) {
                $tds = "";
                for ($j=0; $j < count($arrayDay); $j++) {

                    $reqEmploi = $bdd->prepare("SELECT * FROM emploitemps  INNER JOIN cours ON cours.filiere = :filiere INNER JOIN salles ON salles.numSalle = emploitemps.idSalle WHERE emploitemps.idCour = cours.idCours AND idJour=:idJour AND heure=:heure AND cours.niveau= 1 ");
                    $reqEmploi->execute(array(":idJour"=>$j+1,":heure"=>$arrayHour[$i],":filiere"=>$filiere));
                    $dataEmploi = $reqEmploi->fetch(PDO::FETCH_ASSOC);


                   /* $reqSalle = $bdd->prepare("SELECT * FROM emploitemps WHERE idJour=:idJour AND heure=:heure AND idCour != 0 AND idSalle=:idSalle");
                    $reqSalle->execute(array(":idJour"=>$j+1,":heure"=>$arrayHour[$i],":idSalle"=>$idSalle));
                    $dataSalle = $reqSalle->fetch(PDO::FETCH_ASSOC);*/
                    $tds .= (!($dataEmploi==false)?"<td>$dataEmploi[libelle]($dataEmploi[nom] )</td>":"<td></td>");
                }

                  $tableHtml .=  <<<Table
                    <tr>
                      <td>$arrayHour[$i]</td>
                      $tds
                    </tr>
Table;
              }
$tableHtml .= "</tbody>
        </table>";
             
          


$html = <<<EOD
<h1>EMPLOIS DU TEMPS LGI 1ERE ANNEE année.</h1>
$tableHtml
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>
