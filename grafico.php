<?php
 require_once ('jpgraph-4.0.1/src/jpgraph.php');
 require_once ('jpgraph-4.0.1/src/jpgraph_bar.php');

 $mysqli= new mysqli("localhost","root", "", "agenda");

if($mysqli->connect_errno){
   // echo "Fallo al conectar a MySQL:(". $mysqli->connect_errno.")". $mysqli->connect_errno;
}

$resultado=$mysqli->query("SELECT nombre,tipo from datos");

$usuarios=array();
$tipo=array();

$contadorA=0;
$contadorF=0;
$contadorC=0;

while($row=$resultado->fetch_assoc()){

   if($row['tipo']=='Amigo'){
   ++$contadorA;
   }
   if($row['tipo']=='Familia'){
    ++$contadorF;
   }
   if($row['tipo']=='Compañero'){
     ++$contadorC;
   }

}
$usuarios[]="Amigo";
$usuarios[]="Familia";
$usuarios[]="Compañero";
$tipo[]=$contadorA;
$tipo[]=$contadorF;
$tipo[]=$contadorC;

// Creamos el grafico
$grafico = new Graph(700, 600, 'auto');
$grafico->SetScale("textint");
$grafico->title->Set("Grafica");
$grafico->xaxis->SetTickLabels($usuarios);
$grafico->yaxis->title->Set("Tipo");
$barplot1 =new BarPlot($tipo);
// Un gradiente Horizontal de morados
$barplot1->SetFillGradient("#BE81F7", "#E3CEF6", GRAD_HOR);
// 30 pixeles de ancho para cada barra
$barplot1->SetWidth(30);
$grafico->Add($barplot1);
$grafico->Stroke();
?>
