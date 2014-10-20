<?php
class Controller_Productos extends Controller_Controller{
	protected $storage;
	protected $cart;
	public function __construct($storage){
		$this->storage = $storage;
		$this->cart = new Model_Cart();

	}
	public function setProducto($nombre, $id, $cantidad, $precio, $descripcion, $categoria){
		$this->cart->setProducto(array('nombre'=>$nombre,
		 'id'=>$id,
		 'cantidad'=>$cantidad,
		 'precio'=>$precio,
		 'descripcion' => $descripcion, 
		 'categoria' => $categoria));
	}
	
	public function mostrarCarrito(){
		$productos = $this->cart->getContent();
		
		$this->sendToView('CheckOut', array('productosCarrito'=>array('productos'=>$productos,
			'numeroArticulos'=>$this->cart->getNumeroArticulos(),
			'totalCosto'=>$this->cart->getTotal())));

	}
	public function vaciarCarrito(){
		return $this->cart->vaciarCarrito();
		$this->sendToView('CheckOut');
	}
	public function getCarritoModal(){
		$this->sendToView('CarritoModal', array('productosCarrito'=>array(
			'productos'=>$this->cart->getContent(),
			'numeroArticulos'=>$this->cart->getNumeroArticulos(),
			'total'=>$this->cart->getTotal(),
			'isRecarga'=>true)));
	}
	public function getProductos()
	{
		$articulos = array();
        for ($i = 0; $i < 10; $i++) {
            array_push($articulos, array(
                'id' => uniqid(),
                'nombre' => 'Producto ' . $i,
                'descripcion' => 'Producto X',
                'cantidad' => 1,
                'precio' => rand(20, 999) / 10,
                'categoria' => 'Una categoria'));
        }
        return $articulos;
	}
	public function getCategorias()
	{
        return $this->storage->getProductosCategorias();
	}
	public function getProductosCategoria($categoria)
	{
        return $this->storage->getProductosCategoria($categoria);
	}
}