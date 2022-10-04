<?php

header('Content-type:application/json');

require_once '../../configuracion/database.php';
require_once '../../modelo/producto.php';
require_once 'responses/consultarResponse.php';

$Id = $_GET['Id'];

$res = new ConsultarResponse();
$res->Producto = Producto::Buscar($Id);

echo json_encode($res);
