<!DOCTYPE html>

<?php 
$productos = array();
$productos[0] = array(
    "nombre" => "Playera",
    "precio" => 50,
    "descripcion" => "Playera bonita"
    );

$categorias = array("Electrodomesticos","Limpieza","Lavanderia","Alimentos");
?>


<?php 
$tituloPagina = "Super Lots | Tienda online"; 
$pagina = "principal";
?>

<html lang="en">
<head>
    <!-- Headers -->
    <?php include('/includes/encabezado.php');?>
</head>
<body>
    <!-- Navbar -->
    <?php include('includes/navbar.php');?>
    <!-- Contentenido -->
    <div class="container">
        <div class="page-header">
            <h1>Super Lots <small>Tienda online</small></h1>
        </div>
        <div class="row">
            <div class="col-md-2">
                
            </div>
            <div class="col-md-8">
                
            </div>
            <div class="col-md-2">
                <ol class="breadcrumb">
                    <li data-toggle="tooltip" data-placement="bottom" title="¿Tienes alguna pregunta? Tan sólo consulta. Habla con un especialista de Superlots por teléfono de Lunes a Viernes en el horario de 6 a.m - 6 p.m"><span class="glyphicon glyphicon-earphone"></span> (55) 55 55 55 55</li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <!-- Categorias -->
            <div class="col-md-2">
                <p class="lead">Categorías</p>
                <div class="list-group">
                    <?php foreach ($categorias as $categoria) { ?>
                        <a href="#" class="list-group-item"><?php echo $categoria; ?></a>
                    <?php } ?>
                </div>
            </div>
            <!-- Productos principales -->
            <div class="col-md-8">
                <div class="row">
                    <!-- Carrousel -->
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="http://placehold.it/800x300" alt="img">
                                    <div class="carousel-caption">
                                    Hola mundo 1
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="http://placehold.it/800x300" alt="img">
                                    <div class="carousel-caption">
                                    Hola mundo 2
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="http://placehold.it/800x300" alt="img">
                                    <div class="carousel-caption">
                                    Hola mundo 3
                                    </div>
                                </div>
                            </div>
                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <br>
                <!-- Productos solos -->
                <div class="row">
                    <?php foreach ($productos as $producto) { ?>
                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="http://placehold.it/320x150" alt="">
                                <div class="caption">
                                    <h4><?php echo $producto["nombre"]; ?></h4>
                                    <p><?php echo $producto["descripcion"]; ?></p>
                                    <p>$<?php echo $producto["precio"]; ?> <a href="#" class="btn btn-default btn-xs" role="button">Agregar</a></p>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
            <!-- Ofertas o promociones -->
            <p class="lead">Promociones</p>
            <div class="col-md-2 column productbox">
                <img src="http://placehold.it/460x250/e67e22/ffffff&text=HTML5" class="img-responsive">
                <div class="producttitle">Producto 1</div>
                <div class="productprice"><div class="pull-right"><a href="#" class="btn btn-danger btn-sm" role="button">Comprar</a></div><div class="pricetext">$ 8.95</div></div>
            </div>
            <div class="col-md-2 column productbox">
                <img src="http://placehold.it/460x250/e67e22/ffffff&text=HTML5" class="img-responsive">
                <div class="producttitle">Producto 2</div>
                <div class="productprice"><div class="pull-right"><a href="#" class="btn btn-danger btn-sm" role="button">Comprar</a></div><div class="pricetext">$ 6.25</div></div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('includes/footer.php');?>
    
</body>
</html>