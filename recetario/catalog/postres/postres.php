<?php
include_once("../../libs/db.php");
    $con = db();    
if ($con->connect_errno)
{
    echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
    exit();
}
@mysqli_query($con, "SET NAMES 'utf8'");
  $sql = 'SELECT * FROM postres';
  $resultado= $con->query($sql,MYSQLI_USE_RESULT);
  
   while($campos=$resultado->fetch_object()){ 
         $postres[]=$campos;
   }
   $num_rows=$resultado->num_rows;
  // print_r($num_rows);
?>
<!DOCTYPE html>
<html>
<head runat="server">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../../css_recetario/reseter.css">
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/style-preparacion.css" rel="stylesheet" />
    <script src="javascript/jquery-1.3.2.js"></script>
    <script src="javascript/jquery.paginate.js"></script>
</head>
<body class="fondo">
    <form id="form1">
        <div class="content">
            <div id="cuadro" class="cuerpo">
                <h1><img src="images/logo.png"></h1>
            <?php foreach ($postres as $p):?>
                 <? $pagina=$pagina+1; ?>
                <div id="p<?= $pagina;?>" class="contenedor <?= ($p->id==1)?'_current':'';?>" style="<?=($p->id==1)?'':'display: none;';?>">
                    <p><?= $p->nombre?></p>
                    <div id="img">
                        <img src="images/<?= $p->img?>">
                    </div>
                    <div id="recipe-ingredients">
                        <h2 class="title">Ingredientes</h2>
                        <ul>   
                                                  <?php 
                            $ingredientes=array();
                            $sql = "SELECT * FROM ingre_proce_postres WHERE id_postres = $p->id ORDER BY num_pasos ASC";
                            $resultado= $con->query($sql,MYSQLI_USE_RESULT);
                            while($campos=$resultado->fetch_object()){ 
                                    $ingredientes[]=$campos;
                            }
                        ?>
                        <?php foreach ($ingredientes as $ing):?>
                             <li>
                                <span itemprop="ingredients"><?= $ing->ingrediente?></span>
                            </li>
                        <?php endforeach ?>

                        </ul>
                        <div style="display:none;" id="recipeNumberOfSpecials">0</div>
                    </div>
                    <div id="recipe-directions"> 
                        <h2 class="title" size="15px">Direcciones</h2>
                        <ul>
                        <?php 
                            $proceso=array();
                            $sql = "SELECT * FROM proce_ingre_postres WHERE id_postre = $p->id ORDER BY num_pasos ASC";
                            $resultado= $con->query($sql,MYSQLI_USE_RESULT);
                            while($campos=$resultado->fetch_object()){ 
                                    $proceso[]=$campos;
                            }
                        ?>
                        <?php foreach ($proceso as $pro):?>                       
                            <li>
                                <span itemprop="recipeInstructions"><?= $pro->proceso?></span>
                            </li>
                        <?php endforeach ?> 
                        </ul>
                    </div>
                </div>
            <?php endforeach ?>
                <div id="paginas"></div>
            </div>
        </div>
    </form>
    <footer>
        <div class="content2">
            <ul>
                <li class="primero"><a href="../../catalog/main.php">Home</a></li>
                <li><a href="../../catalog/contacto.php">Contact</a></li>
            </ul>
        </div>
    </footer>
</body>
    <script type="text/javascript">
    var num_rows=<?= $num_rows?>;
        $(function () {            
            $("#paginas").paginate({
                count: num_rows,
                start: 1,
                display: 7,
                border: true,
                border_color: '#fff',
                text_color: '#fff',
                background_color: '',
                border_hover_color: '#ccc',
                text_hover_color: '#000',
                background_hover_color: '#fff',
                images: false,
                mouse: 'press',
                onChange: function (page) {
                    $('._current', '#cuadro').removeClass('_current').fadeOut();
                    $('#p' + page).addClass('_current').show().fadeIn();
                }
            });
        });
	</script>