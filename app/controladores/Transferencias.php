<?php
ini_set('display_errors', '1');
session_start();
require_once 'RegistrosNotificaciones.php';
$action = '';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'agregarTransferencia' :
            agregarTransferencia();
            break;
        case 'listaTransferencia' :
            listaTransferencia();
            break;
    }
}

function modelo($modelo){
    require_once '../modelos/'.$modelo.'.php';
    return new $modelo();
}

function listaTransferencia(){
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];

    $datos = array($origen, $destino);
    $modelo = modelo('Transferencia');
    $lista = $modelo->listaTransferencia($datos);

    for($i = 0 ; $i < sizeof($lista) ; $i++){
        $lista[$i]["fecha_traspaso_producto"] = date("d/m/Y", strtotime($lista[$i]["fecha_traspaso_producto"])).' '.$lista[$i]["hora_traspaso_producto"];
        $lista[$i]["compra_unit_producto"] = 'Bs. '.$lista[$i]["compra_unit_producto"];
        $lista[$i]["cantidad_producto"] = $lista[$i]["cantidad_producto"].' Uds.';
    }
    $data = array();
    $data = ['data' => $lista];
    echo json_encode($data);
}

function agregarTransferencia(){
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $codProducto = $_POST['codProducto'];
    $cantidad = $_POST['cantidad'];
    $costo = $_POST['costo'];
    $precio = $_POST['precio'];
    $observacion = $_POST['observacion'];
    $usuario = $_SESSION['codigo'];
    date_default_timezone_set('America/La_Paz');
    $hora = date("H:i:s");
    $fecha = date("Y-m-d");

    $datos = array($codProducto, $origen, $costo, $precio);
    $modelo = modelo('Inventario');
    $listaOrigen = $modelo->listaInventarioCodigoAlmanenamiento($datos);

    $cant = $listaOrigen[0]['cant_producto'] - $cantidad;
    $datos = array($cant, $listaOrigen[0]['cod_inventario']);
    $modelo = modelo('Inventario');
    $resp = $modelo->actualizarCantidadInventario($datos);


    $datos = array($codProducto, $destino, $costo, $precio);
    $modelo = modelo('Inventario');
    $listaDestino = $modelo->listaInventarioCodigoAlmanenamiento($datos);
    if(sizeof($listaDestino) > 0){
        $cant = $listaDestino[0]['cant_producto'] + $cantidad;
        $datos = array($cant, $listaDestino[0]['cod_inventario']);
        $modelo = modelo('Inventario');
        $resp = $modelo->actualizarCantidadInventario($datos);

        $datos = array($origen, $destino, $listaOrigen[0]['cod_inventario'], $listaDestino[0]['cod_inventario'], $codProducto, $cantidad, $costo, $precio, $observacion, $fecha, $hora, $usuario);
        $modelo = modelo('Transferencia');
        $resp = $modelo->agregarTransferencia($datos);

    }else{
        $datos = array($destino, $codProducto, $cantidad, $costo, $precio);
        $modelo = modelo('Inventario');
        $resp = $modelo->agregarInventario($datos);

        $datos = array($codProducto, $destino, $costo, $precio);
        $modelo = modelo('Inventario');
        $listaDestino = $modelo->listaInventarioCodigoAlmanenamiento($datos);

        $datos = array($origen, $destino, $listaOrigen[0]['cod_inventario'], $listaDestino[0]['cod_inventario'], $codProducto, $cantidad, $costo, $precio, $observacion, $fecha, $hora, $usuario);
        $modelo = modelo('Transferencia');
        $resp = $modelo->agregarTransferencia($datos);
    }

    $nombreOrigen = "";
    $nombreDestino = "";
    $tipoOrigen = "";
    $tipoDestino = "";

    $pos = strpos($origen, "ALM");
    if($pos === false){
        $datos = array($origen);
        $modelo = modelo('Sucursal');
        $sucursalOrigen = $modelo->sucursalEspecifico($datos);
        $nombreOrigen = $sucursalOrigen[0]['nombre_sucursal'];
        $tipoOrigen = "de la Sucursal";
    }else{
        $datos = array($origen);
        $modelo = modelo('Almacen');
        $almacenOrigen = $modelo->almacenEspecifico($datos);
        $nombreOrigen = $almacenOrigen[0]['nombre_almacen'];
        $tipoOrigen = "del Almacen";
    }

    $posDes = strpos($destino, "ALM");
    if($posDes === false){
        $datos = array($destino);
        $modelo = modelo('Sucursal');
        $sucursalDestino = $modelo->sucursalEspecifico($datos);
        $nombreDestino = $sucursalDestino[0]['nombre_sucursal'];
        $tipoDestino = "la Sucursal";
    }else{
        $datos = array($destino);
        $modelo = modelo('Almacen');
        $almacenDestino = $modelo->almacenEspecifico($datos);
        $nombreDestino = $almacenDestino[0]['nombre_almacen'];
        $tipoDestino = "el Almacen";
    }

    $datos = array($codProducto);
    $modelo = modelo('Producto');
    $producto = $modelo->productoEspecifico($datos);

    $registrosNotificaciones = new RegistrosNotificaciones();
    $registrosNotificaciones->agregarRegistro($_SESSION['codigo'], "Se registro una nueva Transferencia de producto ".$tipoOrigen." ".$nombreOrigen." hacia ".$tipoDestino." ".$nombreDestino.", Nombre: ".$producto[0]['nombre_producto'].", Cantidad: ".$cantidad." Uds.");

    $data = ['resp' => $resp];
    echo json_encode($data);
}

?>