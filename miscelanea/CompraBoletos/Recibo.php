<?php

include("../Conexion.php");




//GENERACION DEL PDF
include("../../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

//ESTO ES LO QUE SERA VISIBLE EN EL PDF
$dompdf->loadHtml("Hola");

$dompdf->setPaper("letter");

$dompdf->render();
$dompdf->stream("archivo.pdf", array("Attachment" => false));

?>