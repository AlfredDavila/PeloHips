<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'Autoloader.php';

Autoloader::register('.');

$storage = new Model_Storage('www.tradex.cc:1434','app','app');
$productos = new Controller_Productos($storage);
$carrito = new Model_Cart();

$main = new Main($productos, $carrito);

//Acciones por ajax 
$metodo = 'index';
if(isset($_POST['accion']) || isset($_GET['loc'])){
    $metodo = 'index';
    if(isset($_POST['accion'])){
        if(method_exists( $main , $_POST['accion'])){
            $metodo = $_POST['accion'];
        }    
    }elseif(method_exists ( $main ,'loc'.$_GET['loc'])){
        $metodo = 'loc' . $_GET['loc'];
    }
}

$main->$metodo();

class Main{
    protected $productos;
    protected $carrito;

    public function __construct($productos, $carrito)
    {
        $this->productos = $productos;
        $this->carrito = $carrito;
    }
    
    public function add(){

        $this->productos->setProducto($_POST['nombre'],
            $_POST['id'], $_POST['cantidad'], $_POST['precio'], $_POST['descripcion'], $_POST['categoria']);
    }
    public function mostrar(){
        $this->productos->mostrarCarrito();
    }
    public function remove(){
        $this->productos->setProducto($_POST['nombre'],
            $_POST['id'], 0, $_POST['precio'], $_POST['descripcion'], $_POST['categoria']);
    }
    public function removeAll(){
        $this->productos->vaciarCarrito();
    }
    public function recargarModal(){
        $this->productos->getCarritoModal();
    }
    public function getNumeroArticulos(){
        echo $this->carrito->getNumeroArticulos();
    }
    public function index(){
    $prod = $this->productos->getProductosCategoria('Liquidacion');
    $categorias = $this->productos->getCategorias();
    $this->productos->sendToView('Inicio', 
        array('productos'=>$prod, 
            'categorias'=>$categorias, 
            'productosCarrito' => array(
                'productos' => $this->carrito->getContent(),
                'total' => $this->carrito->getTotal(),
                'numeroArticulos'=> $this->carrito->getNumeroArticulos(),
                'isRecarga' => false
                )
            ));
    }
    public function locCategoria(){
        $prod = $this->productos->getProductosCategoria($_GET['Categoria']);
        $categoria = array('nombre' => $_GET['Categoria'] );
        $categorias = $this->productos->getCategorias();
        $this->productos->sendToView('Productos', array('productos'=>$prod, 
            'categoria'=>$categoria, 
            'categorias'=>$categorias, 
            'productosCarrito' => array(
                'productos' => $this->carrito->getContent(),
                'total' => $this->carrito->getTotal(),
                'numeroArticulos'=> $this->carrito->getNumeroArticulos(),
                'isRecarga' => false
                )
            ));
    }
    public function locProductos(){
        $prod = $this->productos->getProductosCategoria('Todos');
        $categoria = array('nombre' => 'Todos' );
        $categorias = $this->productos->getCategorias();
        $this->productos->sendToView('Productos', array('productos'=>$prod, 
            'categoria'=>$categoria, 
            'categorias'=>$categorias, 
            'productosCarrito' => array(
                'productos' => $this->carrito->getContent(),
                'total' => $this->carrito->getTotal(),
                'numeroArticulos'=> $this->carrito->getNumeroArticulos(),
                'isRecarga' => false
                )
            ));
    }
    public function locCheckOut(){

     $prod = $this->productos->getProductosCategoria('Cosas');
        $categoria = array('nombre' => 'Cosas' );
        $categorias = $this->productos->getCategorias();
        $this->productos->sendToView('CheckOut', array('productos'=>$prod, 
            'categoria'=>$categoria, 
            'categorias'=>$categorias, 
            'productosCarrito' => array(
                'productos' => $this->carrito->getContent(),
                'total' => $this->carrito->getTotal(),
                'numeroArticulos'=> $this->carrito->getNumeroArticulos(),
                'isRecarga' => false
                )
            ));
    }
    public function locContacto(){
        $prod = $this->productos->getProductos();
        $categorias = $this->productos->getCategorias();
        $this->productos->sendToView('Contacto', array('productos'=>$prod, 
            'categorias'=>$categorias,
            'productosCarrito' => array(
                'productos' => $this->carrito->getContent(),
                'total' => $this->carrito->getTotal(),
                'numeroArticulos'=> $this->carrito->getNumeroArticulos(),
                'isRecarga' => false
                )
            ));
    }

}