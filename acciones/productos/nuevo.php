<?php

header('Content-type:application/json');

require_once '../../configuracion/database.php';
require_once '../../modelo/producto.php';
require_once 'request/nuevoRequest.php';
require_once 'responses/nuevoResponse.php';

$json = file_get_contents('php://input', true);
$req = json_decode($json);

$pAgregar = new Producto();
$pAgregar->Codigo = $req->Codigo;
$pAgregar->Nombre = $req->Nombre;
$pAgregar->Marca = $req->Marca;
$pAgregar->PrecioCompra = $req->PrecioCompra;
$pAgregar->PrecioVenta = $req->PrecioVenta;
$pAgregar->Categoria = $req->Categoria;
$pAgregar->Agregar();

$res = new NuevoResponse();
$res->IsOk = true;

echo json_encode($res);
