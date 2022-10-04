<?php

header('Content-type:application/json');

require_once '../../configuracion/database.php';
require_once '../../modelo/producto.php';
require_once 'request/modificarRequest.php';
require_once 'responses/modificarResponse.php';

$json = file_get_contents('php://input', true);
$req = json_decode($json);

$pModificar = new Producto();
$pModificar->Id = $req->Id;
$pModificar->Codigo = $req->Codigo;
$pModificar->Nombre = $req->Nombre;
$pModificar->Marca = $req->Marca;
$pModificar->PrecioCompra = $req->PrecioCompra;
$pModificar->PrecioVenta = $req->PrecioVenta;
$pModificar->Categoria = $req->Categoria;
$pModificar->Modificar();

$res = new ModificarResposes();
$res->IsOk = true;

echo json_encode($res);
