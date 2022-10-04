<?php
class Producto
{

    public static function BuscarTodas()
    {
        $con  = Database::getInstance();
        $sql = "select * from Productos";
        $queryProducto = $con->db->prepare($sql);
        $queryProducto->execute();
        $queryProducto->setFetchMode(PDO::FETCH_CLASS, 'producto');

        $claseProductoDevolver = array();

        foreach ($queryProducto as $p) {
            $claseProductoDevolver[] = $p;
        }

        return $claseProductoDevolver;
    }

    public static function Buscar($Id)
    {
        $con  = Database::getInstance();
        $sql = "select * from Productos where Id = :p1";
        $queryProducto = $con->db->prepare($sql);
        $params = array("p1" => $Id);
        $queryProducto->execute($params);
        $queryProducto->setFetchMode(PDO::FETCH_CLASS, 'producto');
        foreach ($queryProducto as $p) {
            return $p;
        }
    }

    public function Agregar()
    {
        $con  = Database::getInstance();
        $sql = "insert into Productos (Codigo,Nombre,Marca,PrecioCompra,PrecioVenta,Categoria) values (:p1,:p2,:p3,:p4,:p5,:p6)";
        $productoNuevo = $con->db->prepare($sql);
        $params = array("p1" => $this->Codigo, "p2" => $this->Nombre, "p3" => $this->Marca, "p4" => $this->PrecioCompra, "p5" => $this->PrecioVenta, "p6" => $this->Categoria);
        $productoNuevo->execute($params);
    }

    public function Modificar()
    {
        $con = Database::getInstance();
        $sql = "UPDATE Productos
                    SET
                    Codigo = :p1,
                    Nombre = :p2,
                    Marca = :p3,
                    PrecioCompra = :p4,
                    PrecioVenta = :p5,
                    Categoria = :p6
                    WHERE Id = :p7";
        $productoModificar = $con->db->prepare($sql);
        $params = array("p1" => $this->Codigo, "p2" => $this->Nombre, "p3" => $this->Marca, "p4" => $this->PrecioCompra, "p5" => $this->PrecioVenta, "p6" => $this->Categoria, "p7" => $this->Id);
        $productoModificar->execute($params);
    }
}
