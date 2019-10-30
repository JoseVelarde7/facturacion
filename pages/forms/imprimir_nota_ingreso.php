<?php
session_start();
setlocale(LC_TIME, 'spanish');
date_default_timezone_set("America/La_Paz");
//$_SESSION['num_conjunta'] = 50;
include "php/conexion_facturacion.php";
//$numero_ingreso = $_SESSION['numero_ingreso'];
$id_nota_ingreso = $_SESSION['id_ingresoo'];
//echo ("SELECT * FROM nota_ingreso n, area a where n.id_area=a.id_area and n.id_nota_ingreso=".$id_nota_ingreso);
$qa2=pg_query("SELECT * FROM nota_ingreso n, area a where n.id_area=a.id_area and n.id_nota_ingreso=".$id_nota_ingreso);

 $row2 = pg_fetch_array($qa2);

        if (is_array($row2)) {

            $id_nota_ingreso = $row2['id_nota_ingreso'];
            $fecha = $row2['fecha'];
            $gestion = $row2['gestion'];
            $usr_registro = $row2['usr_registro'];
            $estado = $row2['estado'];
            $nombre_area = $row2['nombre_area'];
             $numero_ingreso = $row2['numero'];
          
        }

$qa22=pg_query("SELECT (p.nombres||' '||p.paterno||' '||p.materno) as nombre from nota_ingreso n, usuario u, persona p where n.usr_registro=u.id_usuario and u.id_persona=p.id_persona and id_nota_ingreso=".$id_nota_ingreso);

 $row22 = pg_fetch_array($qa22);

        if (is_array($row22)) {

            $responsable = $row22['nombre'];
          
        }

?>



    <html>
    <head>


        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" href="../../images/user1.png">

        <link rel="stylesheet" type="text/css" href="CSS.css">
        <title>Factura </title>
        <style type="text/css" media="print">
            @page {size: portrait;}
            @page rotada{size: letter;}

           @page  {margin: 25;}




        </style>
  <style media="all">

p {
  font: monospace 150%;
  /* el orden no es correcto */
}

        .css-title{
            font-weight: bolder;
            font-size: 1.5em;
        }
        
        .css-business_data div {
            padding: 5px;
        }

        .css-user_data_panel, .css-business_data_panel {
            padding-left: 20px;
            padding-right: 20px;
        }

        .css-invoice_data {
            margin-left: auto;
            margin-right: auto;
           /* border: 1px solid #000000;*/
        }

        .css-invoice_data td {
            padding-left: 5px;
            padding-right: 5px;
        }

        .css-logo{
            max-width: 300px;
            max-height: 100px;
        }

        .table > tbody > tr > td,
        .table > tbody > tr > th,
        .table > tfoot > tr > td,
        .table > tfoot > tr > th,
        .table > thead > tr > td,
        .table > thead > tr > th{
            padding: 0;
        }
div.hprint {
position: fixed;
height: 5px;
display:block;
}
div.fprint {
position: fixed;
height: 25px;
margin-top: 20px;
display:block;
bottom: 0;
left: 0;
}

 
    </style>
     
        <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">


        <script type="text/javascript">
          function imprimir() {
                if (window.print) {
                    window.print();
 

                } else {
                    alert("La función de impresion no esta soportada por su navegador.");
                }
            }



        </script>
    </head>





<body onload="imprimir();">
    <div class="">
        <section id="" style="background-color: white; ">
    <div class="row">
    <div class="col-xs-4" align="center">
        <p class="size-h2"><img src="../../images/user3.png" class="css-logo"></p>

        <!--<FONT SIZE=2><?php echo "empresa" ?></FONT><br>
        <FONT SIZE=2 ><?php echo  "empresa"  ?></FONT><br>
         <FONT SIZE=1 ><?php echo "Direccion : "  ?></FONT><br>
         <FONT SIZE=1 ><?php echo "Telefono : " ?></FONT><br>-->
    </div>


<div class="col-xs-4" align="center">
   <h5> <?php echo strtoupper($nombre_area) ?> </h5>
   <h5>NOTA INGRESO </h5>
</div>

    <div class="col-xs-4 css-business_data_panel text-center ">
        <div class="css-business_data text-right">
            <div>
                <table class="css-invoice_data">
                    <tbody>
                 
                        <tr>
                            <td><FONT SIZE=3><b>FECHA:</b></FONT></td>
                            <td align="left"><FONT SIZE=2 ><?php echo substr($fecha, 0, 10) ?></FONT></td>
                        </tr>
                        <tr>
                            <td><FONT SIZE=3 ><b>CODIGO No.:</b></FONT></td>
                            <td align="left"><FONT SIZE=2 ><?php echo $numero_ingreso." / ".$gestion ?></FONT></td>
                        </tr>
                       

                    </tbody>
                </table>
            </div>
        </div>
           

        </div>
</div>
<br>
<br>
   <div class="row css-user_data_panel">
   
                <div class="col-xs-6 css-pdf_left">
                    <FONT SIZE=3 > <b>Responsable de Ingreso: </b> <?php echo  $responsable ?></FONT><br>
                 </div>
   </div>

 
 <?php 

for ($i=1;$i<=4;$i++)
{

    $qa10 = pg_query("SELECT * from articulo a, nota_ingreso n, detalle_ingreso d where a.id_articulo=d.id_articulo and d.id_nota_ingreso=n.id_nota_ingreso and n.id_nota_ingreso=".$id_nota_ingreso." and id_empresa=".$i);


   if (pg_num_rows($qa10) > 0) {  


    ?>

<br>


   <table class="" border="1">
                <thead>
                        <tr class="">
                              <th class="text-center" colspan="6"><FONT SIZE=3><?PHP ECHO empresa($i) ?></FONT></th>
                        </tr>
                        <tr class="">
                                <th class="text-center"  WIDTH="10"><FONT SIZE=3>No.</FONT></th>
                                <th class="text-center"  WIDTH="100"><FONT SIZE=3>CODIDO</FONT></th>
                                <th class="text-center"  WIDTH="500"><FONT SIZE=3>DESCRIPCION</FONT></th>
                                <th class="text-center"  WIDTH="60"><FONT SIZE=3>UNIDAD</FONT></th>
                                 <th class="text-center" WIDTH="60"><FONT SIZE=3>CANT.</FONT></th>
                                  <th class="text-center" WIDTH="100"><FONT SIZE=3>OBS.</FONT></th>
                         </tr>
                           <!--  <tr class="">
                                <th class="text-center"  WIDTH="780"><FONT SIZE=3>sdadsadsadsad</FONT></th>
                             
                         </tr>-->
                </thead>
      <?PHP
      $numero=1;
            while ($array = pg_fetch_assoc($qa10)) {
               echo '<tbody class="table">';
                echo '<tr><td align="center" WIDTH="10"><FONT SIZE=2><small>' . $numero . '</small></FONT></td>
                  <td align="center" WIDTH="100"><FONT SIZE=2>' . $array['codigo_articulo'] . '</FONT></td>
                  <td WIDTH="500"><FONT SIZE=1>' . $array['descripcion_articulo'] . '</FONT></td>
                  <td align="center" WIDTH="60"><FONT SIZE=2>' . $array['unidad_representativa'] . '</FONT></td>
                  <td align="center" WIDTH="60"><FONT SIZE=2>' . $array['cantidad'] . '</FONT></td>
                  <td align="center" WIDTH="100"><FONT SIZE=1>' . $array['observaciones'] . '</FONT></td>
                
                  </tr>';
            $numero=$numero+1;
            }


            ?>
   
           
 <tbody>
    </table>

<br>
<?php
}

}

?>


<br>


            <table>         
                 <tr>
                    <td width="80"></td>
                    <td width="120" align="center">__________________________</td>
                    <td width="180" align="center"></td><td width="120">__________________________</td>
                </tr>
            <tr>
                <td width="80"></td>
                <td width="120" align="center">Responsable de Almacen</td>
                <td width="180" ></td>
                <td width="120" align="center">Unidad Administrativa</td>
            </tr>
            </table>



</body>
    <div class="fprint">
        <h5><?php  echo "Sistema de Facturacion Conjunta (SFC)  -   SEDEM"  ?></h5>
    </div>
</html>

<?php

function empresa($id_empresa){
    if($id_empresa==1){$empresa="EMPRESA BOLIVIANA DE ALIMENTOS Y DERIVADOS - EBA";}
    if($id_empresa==2){$empresa="EMPRESA BOLIVIANA DE ALMENDRA Y DERIVADOS - EBA";}
    if($id_empresa==3){$empresa="EMPRESA PUBLICA PRODUCTIVA PAPELES DE BOLIVIA - PAPELBOL";}
     if($id_empresa==4){$empresa="EMPRESA PUBLICA PRODUCTIVA APICOLA - PROMIEL";}
    return $empresa;
}

?>