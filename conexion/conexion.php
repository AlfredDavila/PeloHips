<?php
$server = 'www.tradex.cc:1434';
$user = 'app';
$password = 'app';

$link = mssql_connect($server, $user, $password);

if(!$link){
    die('MSSQL error: ' . mssql_get_last_message());
}/* else{
    echo "Conectado";
} */


/* Prueba para la conexion */ 

$query = mssql_query('select Categoria from listaoferdir');

if (!mssql_num_rows($query)) {
    echo 'No se encontraron registros';
} else {
    while ($row = mssql_fetch_array($query)) {
        echo $row['Categoria'], PHP_EOL;
    }
}

mssql_free_result($query);
?>