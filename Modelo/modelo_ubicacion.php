<?php
    include_once 'conexion_db.php';
    
    class modeloUbicacion{
        var $ubicacion;

        public function __construct()
        {
            $this->acceso = Conexion::conectar();
        }

        //------------------------------------------ MOSTRAR TODAS LAS UBICACIONES -----------------------------------------
        function mostrarUbicaciones()
        {
            $sql = "SELECT * FROM ubicacion ORDER BY sala, estante, librero, posicion;";
            $resultado = $this->acceso->query($sql);
            $this->ubicacion = $resultado->fetch_all(MYSQLI_ASSOC);
            return $this->ubicacion;
        }

        //------------------------------------------------- CREAR UBICACIÓN ------------------------------------------
        function crearUbicacion($sala, $estante, $librero, $posicion){
            $sql="INSERT INTO ubicacion (sala, estante, librero, posicion)
            VALUES ('$sala', '$estante', '$librero', '$posicion')";
            $resultado = $this->acceso->query($sql);
        }

        //------------------------------------------------- EDITAR UBICACIÓN ------------------------------------------
        function editarUbicacion($sala, $estante, $librero, $posicion, $codigo_ubicacion){
            $sql="UPDATE ubicacion 
            SET sala='$sala', estante='$estante', librero='$librero', posicion='$posicion' 
            WHERE codigo_ubicacion='$codigo_ubicacion'";
            $resultado = $this->acceso->query($sql);
        }

        //------------------------------------------------- ELIMINAR UBICACIÓN ------------------------------------------
        function eliminarUbicacion($codigo_ubicacion){
            $sql="DELETE FROM ubicacion WHERE codigo_ubicacion='$codigo_ubicacion'";
            $resultado = $this->acceso->query($sql);
        }

        //------------------------------------------------ VALIDAR UBICACIÓN ----------------------------------------
        function validarUbicacion($sala, $estante, $librero, $posicion)
        {
            $data = [];
            $query = "SELECT IF (EXISTS (SELECT * FROM ubicacion WHERE sala='$sala' AND estante='$estante' AND librero='$librero' AND posicion='$posicion'), 'TRUE', 'FALSE') validar";
            if ($sql = $this->acceso->query($query)) {
                while ($row = mysqli_fetch_array($sql)) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        //------------------------------- OBTENER CATIDAD DE VOLUMENES QUE OCUPAN ESTA UBICACIÓN --------------------
        function obtenerCantidadVolumenes($codigo_ubicacion)
        {
            $data = [];
            $query = "SELECT count(*) FROM volumen WHERE ubicacion_volumen='$codigo_ubicacion'";
            if ($sql = $this->acceso->query($query)) {
                while ($row = mysqli_fetch_array($sql)) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        //--------------------------------------> Seleccionadores para CREAR VOLUMEN <--------------------------------------
        function selectorSalas()
        {
            $data = [];
            $query = "SELECT DISTINCT sala FROM ubicacion;";
            if ($sql = $this->acceso->query($query)) {
                while ($row = mysqli_fetch_array($sql)) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        function selectorEstantes($sala)
        {
            $data = [];
            $query = "SELECT DISTINCT estante FROM ubicacion WHERE sala='$sala'";
            if ($sql = $this->acceso->query($query)) {
                while ($row = mysqli_fetch_array($sql)) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        function selectorLibrero($sala, $estante)
        {
            $data = [];
            $query = "SELECT DISTINCT librero FROM ubicacion WHERE sala='$sala' AND estante='$estante'";
            if ($sql = $this->acceso->query($query)) {
                while ($row = mysqli_fetch_array($sql)) {
                    $data[] = $row;
                }
            }
            return $data;
        }

        function selectorPosicion($sala, $estante, $librero)
        {
            $data = [];
            $query = "SELECT DISTINCT codigo_ubicacion, posicion FROM ubicacion WHERE sala='$sala' AND estante='$estante' AND librero='$librero'";
            if ($sql = $this->acceso->query($query)) {
                while ($row = mysqli_fetch_array($sql)) {
                    $data[] = $row;
                }
            }
            return $data;
        }
    }

?>