<?php

$link = @mysql_connect("localhost", "root", "");
mysql_select_db("main", $link);
$limit = 5;
$pag = (int) $_GET["pag"];
if ($pag < 1)
{
   $pag = 1;
}
$offset = ($pag-1) * $limit;


$sql = "SELECT SQL_CALC_FOUND_ROWS id, nombre, img FROM vegetales LIMIT $offset, $limit";
$sqlTotal = "SELECT FOUND_ROWS() as total";

$rs = mysql_query($sql);
$rsTotal = mysql_query($sqlTotal);

$rowTotal = mysql_fetch_assoc($rsTotal);
$total = $rowTotal["total"];

?>

<script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../../js/semantic.min.js"></script>
<script type="text/javascript" src="../../js/semantic.js"></script>
<link rel="STYLESHEET" type="text/css" href="../../estilos/semantic.css"></link>
<link rel="STYLESHEET" type="text/css" href="../../estilos/semantic.min.css"></link>


<table class="ui celled striped table">
   <thead>
      <tr>
         <td>ID</td>
         <td>Nombre</td>
         <td>Imagen</td>
         <td>Acciones</td>
      </tr>
   </thead>
   <tbody>
      <form action="" method="GET" enctype="multipart/form-data">
         <?php
            while ($row = mysql_fetch_assoc($rs))
            {
               $id = $row["id"];
               $s = "elimiar";
               $name = htmlentities($row["nombre"]);
               $img = $row["img"];
               ?>
               <tr>
                  <td><?php echo $id; ?></td>
                  <td><?php echo $name; ?></td>
                  <td><?php echo "<img class='ui medium rounded image' src='../../../catalog/vegetales/images/".$img."' width='300' height='100'>"; ?></td>
                  <td>
                     <a href="modificar.php?id=<?php echo $row['id'];?>" class="ui button">Modificar</a>
                     <a href="eliminar.php?id=<?php echo $row['id'];?>" class="ui button">Eliminar</a>
                  </td>
               </tr>
               <?php
            }
         ?>
      </form>
   </tbody>
   <tfoot>
      <tr align="center">
         <td colspan="4">
      <?php
         $totalPag = ceil($total/$limit);
         $links = array();
         for( $i=1; $i<=$totalPag ; $i++)
         {
            $links[] = "<a href=\"?pag=$i\" class='ui button'>$i</a>"; 
         }
         echo implode(" - ", $links);
      ?>
         </td>
      </tr>
   </tfoot>
</table>