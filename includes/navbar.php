<?php $utl = new Controller_Utilities(); ?>
<!-- Navbar -->
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" class="img-responsive"><img src="img/superlotsLogo.png"  height="50" width="65"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class=<?php if($pagina=="principal"){echo "active";}?>><a <?php echo $utl->getLink('Inicio'); ?>><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
                <!-- Categorias -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-list"></span> Categorías<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                    <?php foreach ($data['categorias'] as  $value) {
                        ?>
                        <li><a <?php echo $utl->getLink('Categoria', array('Categoria'=>$value['nombre'])); ?>><?php echo $value['nombre'];?></a></li>
                        <li class="divider"></li>
                        <?php
                    }?>
                    </ul>
                </li>
                <li class=<?php if($pagina=="productos"){echo "active";}?>><a <?php echo $utl->getLink('Productos'); ?>><span class="glyphicon glyphicon-certificate"></span> Productos</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nombre del producto">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <button type="button" class="btn btn-primary navbar-btn botonCarritoModal" data-toggle="modal" data-target="#carritoModal"><span class="glyphicon glyphicon-shopping-cart">
                </span> <span class="badge"><?php echo $data['productosCarrito']['numeroArticulos']; ?></span></button>&nbsp;
                <li class=<?php if($pagina=="contacto"){echo "active";}?>><a <?php echo $utl->getLink('Contacto'); ?> ><span class="glyphicon glyphicon-inbox"></span> Contacto</a></li>

            </ul>
        </div>
    </div>
</nav>







            
