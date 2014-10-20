<?php $utl = new Controller_Utilities(); 
 
$tituloPagina = "Super Lots | Tienda online"; 
$pagina = "checkout";

?>
<html lang="en">
<head>
    <!-- Headers -->
    <?php include('./includes/encabezado.php');?>
</head>
<body>
    <form id='CheckOutForm' method='POST'>
        <input type='hidden' name='X'>
    </form>
    <!-- Navbar -->
    <?php include('./includes/navbar.php');?>
    <!-- Contentenido -->
<div id='CheckOut'>
        <div class="jumbotron jumbotron-sm">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <h1 class="h1">
                            Checkout <small>Articulos actuales</small></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Total</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(!count($data['productosCarrito']['productos'])){ ?>
                            <tr>
                                <td>   </td>
                                <td colspan='3'><h3 class='text-info'>Carrito Vacío</h3></td>
                                <td>   </td>
                            </tr>
                            <tr>
                                    <td>   </td>
                                    <td>   </td>
                                    <td>   </td> 
                                    <td>
                                        <a class="btn btn-default" <?php echo $utl->getLink('Productos');?> >
                                            <span class="glyphicon glyphicon-shopping-cart"></span> Continuar Comprando
                                        </a></td>
                                    <td>   </td>
                            </tr>
                        <?php  }else{ ?>
                            <tr>
                                <?php
                                foreach ($data['productosCarrito']['productos'] as $value) {
                                    ?>
                                    <td class="col-sm-8 col-md-6">
                                        <div class="media">
                                            <!-- <a class="thumbnail pull-left" href="#"> -->
                                                <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> 
                                            <!-- </a> -->
                                            <div class="media-body">
                                                <h4 class="media-heading"><?php echo $value['nombre']; ?></h4>
                                                <h5 class="media-heading">  <?php echo $value['categoria']; ?></h5>
                                                <span>Descripción: </span><span class="text-success"><strong><?php echo $value['descripcion']; ?></strong></span>
                                            </div>
                                        </div></td>
                                    <td class="col-sm-1 col-md-1" style="text-align: center">
                                        <input type="numeric" class="form-control productoInp" <?php echo $utl->getDataAttr('add', $value); ?> value="<?php echo $value['cantidad']; ?>">
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $value['precio']; ?></strong></td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $value['precio'] * $value['cantidad']; ?></strong></td>
                                    <td class="col-sm-1 col-md-1">
                                        <button type="button" class="btn btn-danger producto" <?php echo $utl->getDataAttr( 'remove', $value); ?>>
                                            <span class="glyphicon glyphicon-remove"></span> Remove
                                        </button></td>
                                </tr>
                                
                                <?php
                            }
                            ?>
                            <!-- Fin de los productos !-->
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h5>Subtotal</h5></td>
                                <td class="text-right"><h5><strong>$<?php echo $data['productosCarrito']['total'] ?></strong></h5></td>
                            </tr>
                            <!--<tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h5>Impuesto</h5></td>
                                <td class="text-right"><h5><strong>$150.25</strong></h5></td>
                            </tr> -->
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h3>Total</h3></td>
                                <td class="text-right"><h3><strong>$<?php echo $data['productosCarrito']['total'] ?></strong></h3></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td> 
                                    <button type="button" class="btn btn-danger producto" <?php echo $utl->getDataAttr('removeAll'); ?>>
                                        <span class="glyphicon glyphicon-remove" ></span> Borrar Todo
                                    </button>
                                </td> 
                                <td>
                                    <a class="btn btn-default" <?php echo $utl->getLink('Productos');?> >
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Continuar Comprando
                                    </a></td>
                                <td>
                                    <button type="button" class="btn btn-success">
                                        Checkout <span class="glyphicon glyphicon-play"></span>
                                    </button></td>
                            </tr>
                        <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</div>

    <?php include('./View/CarritoModal.php');?>
    <!-- Footer -->
    <?php include('./includes/footer.php');?>
    
</body>
</html>
        



