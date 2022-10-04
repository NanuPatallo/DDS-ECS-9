<?php

header('Content-type:application/json');

require_once '../../configuracion/database.php';
require_once '../../modelo/producto.php';
require_once 'responses/consultarTodasResponse.php';

$res = new ConsultarTodasResponse();
$res->ListProductos = Producto::BuscarTodas();

echo json_encode($res);
