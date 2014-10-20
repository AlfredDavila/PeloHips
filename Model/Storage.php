<?php

class Model_Storage {

	private $db;
	protected $config;


	public function __construct($dsn, $user, $pass/*, array $config*/){
		mssql_connect($dsn, $user, $pass);
		/*$this->db = new PDO($dsn, $user, $pass);
		/*$this->config = array_merge(array(
            'productos_table' => '--',
        ), $config);*/
	}

    

    public function getItem($code) {
    	return array('code' => $code,'precio'=> 10.25,'existencias' => 20, 'status' => 'stock');
        //Existe
    	$stmt = $this->db->prepare(sprintf('SELECT * from %s where code = :code', $this->config['productos_table']));
        $stmt->execute(compact('code'));
        $result = $stmt->fetch();
        return $result;
    }

    //return stmt->fetchAll();
    public function getItems(array $productos) {
    	return array(0=>array('nombre'=>'producto','code' => $code,'precio'=> 10.25,'existencias' => 20, 'status' => 'stock'));
        //Existe
    	$stmt = $this->db->prepare(sprintf('SELECT * from %s where code IN (' . join(',', array_fill(0, count($productos), '?')) . ')', $this->config['productos_table']));
        $stmt->execute($productos);
        $result = $stmt->fetchAll();
        return $result;
    }
    
    /**
     * Obtiene el producto por codigo
     * @param string $codigo
     * @return array 
     *          id=> codigo
     *          nombre => 
     *          marca=>
     *          precio=>
     *          status=>
     *          categoria=>
     */
    public function getProducto($codigo){
    	/*$producto=array();
    	$consulta = sprintf("SELECT Sucursal, Almacen, Categoria, Articulo, Descripcion, InvCantidad, UltimoCosto, Costoexisnoiva, UltimoCosto_IVA, CostoExistencias, Precio1_IVA, TotalPrecio1, Precio2_IVA, TotalPrecio2, Precio3_IVA, TotalPrecio3, Precio4_IVA, TotalPrecio4, Proveedor, CodigoBarras, CantidadCaja FROM listaoferdir WHERE Articulo = '%s' ORDER BY Articulo ASC",$nombreCategoria);
    	$resultado = mssql_query($consulta);
    	while ($fila = mssql_fetch_array($resultado)) {
    		if (!is_null($fila['Articulo'])) {
    			array_push($productos,array('nombre'=>$fila['Articulo']));
    		}
    	}
    	mssql_free_result($resultado);*/
        return $producto;
    }
    
    /**
     * Obriene los productos de una determinada categoria
     * @param string $nombreCategoria
     * @return array de productos
     */
    public function getProductosCategoria($nombreCategoria){
    	$productos=array();
    	$consulta = sprintf("SELECT Articulo, Categoria, TotalPrecio1, InvCantidad, Descripcion, CodigoBarras FROM listaoferdir WHERE Categoria = '%s' AND TotalPrecio1 > 0 ORDER BY Articulo ASC",$nombreCategoria);
    	$resultado = mssql_query($consulta);
    	while ($fila = mssql_fetch_array($resultado)) {
    		if (!is_null($fila['Articulo'])) {
    			array_push($productos,array(
    				'nombre'=>$fila['Articulo'],
    				'precio'=>$fila['TotalPrecio1'],
    				'status'=>$fila['InvCantidad'],
    				'descripcion'=>$fila['Descripcion'],
    				'id'=>$fila['CodigoBarras'],
                    'categoria'=>$fila['Categoria']
    				));
    		}
    	}
    	mssql_free_result($resultado);
        return $productos;
    }

    //Obtiene los nombres de las categorias
    /**
     * 
     * @return array Arreglo con los nombres de las categorias
     */
    public function getProductosCategorias(){
    	$categorias=array();
    	$consulta = sprintf("SELECT DISTINCT Categoria FROM listaoferdir");
    	$resultado = mssql_query($consulta);
    	while ($fila = mssql_fetch_array($resultado)) {
    		if (!is_null($fila['Categoria'])) {
    			array_push($categorias,array('nombre'=>$fila['Categoria']));
    		}
    	}
    	mssql_free_result($resultado);
        return $categorias;
    } 
}

/* 
	$c = new PDO("sqlsrv:Server=localhost,1521;Database=testdb", "NombreUsuario", "Contraseña");
	mssql:host=localhost;dbname=testdb

try{
	$con = new Model_Storage('www.tradex.cc:1434','app','app');
}catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
 }

var_dump($con->getProductosCategoriagorias());

*/

?>
