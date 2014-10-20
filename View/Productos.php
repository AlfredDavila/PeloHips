<!DOCTYPE html>

<?php 
$utl = new Controller_Utilities();
$tituloPagina = "Productos | Superlots";
$pagina = "productos"; 
?>

<html lang="en">
<head>
	<!-- Headers -->
    <?php include('./includes/encabezado.php');?>

</head>
<body>
	<!-- Navbar -->
	<?php include('./includes/navbar.php');?>


	<!-- Cuerpo -->
	<div class="container">
	    <div class="well well-sm">
	        <strong><?php echo $data['categoria']['nombre'];?></strong>
	        <!--<div class="btn-group">
	            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
	            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
	                class="glyphicon glyphicon-th"></span>Grid</a>
	        </div>-->
	    </div>
	    <div id="products" class="row list-group">
	    <?php foreach ($data['productos'] as $value) { ?>
	    	
	    
	        <div class="item  col-xs-4 col-lg-4 list-group-item">
	            <div class="thumbnail">
	                <img class="group list-group-image" src="http://placehold.it/400x250/000/fff" alt="" />
	                <div class="caption">
	                    <h4 class="group inner list-group-item-heading">
	                        <?php echo $value['nombre']; ?></h4>
	                    <p class="group inner list-group-item-text">
	                        <?php echo $value['descripcion']; ?></p>
	                    <div class="row">
	                        <div class="col-xs-12 col-md-6">
	                            <p class="lead">
	                                $<?php echo $value['precio']; ?></p>
	                        </div>
	                        <div class="col-xs-12 col-md-6">
	                            <button type='button' class="btn btn-success producto"  <?php  echo $utl->getDataAttr('add', $value); 
	                            echo $utl->popOver('Agregar', $value['nombre'] . ' agregado correctamente'); ?> >Agregar al carrito</button>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    <?php } ?>    
	    </div>
	</div>


	<?php include('./View/CarritoModal.php');?>
	<!-- Footer -->
    <?php include('./includes/footer.php');?>

    <!-- Script para el grid y list -->
    <script>
    $(document).ready(function() {
        $('#list').click(function(event){
        	event.preventDefault();
        	$('#products .item').addClass('list-group-item');
        });
        $('#grid').click(function(event){
        	event.preventDefault();
        	$('#products .item').removeClass('list-group-item');
        	$('#products .item').addClass('grid-group-item');});
    });
    </script>
	
</body>
</html>
