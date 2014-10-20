<?php
session_start();


require 'Autoloader.php';
Autoloader::register('.');
$lista = new View_Lista();
$productos = new Controller_Productos();
class Test {

    function botones($productos) {
        $articulos = array();
        for ($i = 0; $i < 10; $i++) {
            array_push($articulos, array(
                'id' => uniqid(),
                'nombre' => 'Producto ' . $i,
                'marca' => 'patito',
                'cantidad' => rand(20, 30),
                'precio' => rand(20, 999) / 10,
                'status' => 'En Stock'));
        }

        foreach ($articulos as $value) {
            ?>
            <button type="button" class="btn btn-default producto" 
                    <?php echo $productos->getDataAttr('add', $value)?>
                    >
            <?php echo $value['nombre']; ?>
            </button>
            
            <?php
        }
        ?>
        <button type="button" class="btn btn-default producto" data-accion="mostrar">Mostrar</button>
        <?php
    }

}

if(!isset($_POST['accion'])){
    
    $lista->head();

    $Test = new Test();
    $Test->botones($lista);

    $lista->footer();    
}elseif($_POST['accion']=='add'){
    
    $productos->setProducto($_POST['nombre'],
     $_POST['id'], $_POST['cantidad'], $_POST['precio'], $_POST['status'], $_POST['marca']);

}elseif($_POST['accion'] == 'mostrar'){
    $productos->mostrarCarrito();
}
elseif($_POST['accion'] == 'remove'){
    
    $productos->setProducto($_POST['nombre'],
     $_POST['id'], 0, $_POST['precio'], $_POST['status'], $_POST['marca']);
}
elseif($_POST['accion'] == 'removeAll'){
    
    $productos->vaciarCarrito();
}