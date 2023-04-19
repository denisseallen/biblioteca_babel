<?php
    include_once 'conexion_db.php';
    
    class modeloVolumen{
        var $volumen;

        public function __construct()
        {
            $this->acceso = Conexion::conectar();
        }

        //------------------------------------------ MOSTRAR TODOS LOS VOLUMENES -----------------------------------
        function mostrarVolumenes()
        {
            $sql = "SELECT  v.codigo_volumen, v.titulo_volumen, v.no_volumen, u.codigo_ubicacion, u.sala, u.estante, u.librero, u.posicion
            FROM volumen v, ubicacion u
            WHERE v.ubicacion_volumen=u.codigo_ubicacion ORDER BY v.titulo_volumen, v.no_volumen";
            $resultado = $this->acceso->query($sql);
            $this->volumen = $resultado->fetch_all(MYSQLI_ASSOC);
            return $this->volumen;
        }

        //------------------------------------------------- CREAR VOLUMEN ------------------------------------------
        function crearVolumen($titulo_volumen, $no_volumen, $codigo_ubicacion){
            $sql="INSERT INTO volumen (titulo_volumen, no_volumen, ubicacion_volumen) 
            VALUES ('$titulo_volumen', '$no_volumen', '$codigo_ubicacion')";
            $resultado = $this->acceso->query($sql);
        }

        //------------------------------------------------- EDITAR VOLUMEN ------------------------------------------
        function editarVolumen($titulo_volumen, $no_volumen, $codigo_ubicacion, $volumen_codigo){
            $sql="UPDATE volumen 
            SET titulo_volumen='$titulo_volumen', no_volumen='$no_volumen', ubicacion_volumen='$codigo_ubicacion' 
            WHERE codigo_volumen='$volumen_codigo'";
            $resultado = $this->acceso->query($sql);
        }

        //------------------------------------------------- ELIMINAR VOLUMEN ------------------------------------------
        function eliminarVolumen($volumen_codigo){
            $sql="DELETE FROM volumen WHERE codigo_volumen='$volumen_codigo'";
            $resultado = $this->acceso->query($sql);
        }

        //------------------------------------------------ VALIDAR VOLUMEN ----------------------------------------
        function validarVolumen($titulo_volumen, $no_volumen)
        {
            $data = [];
            $query = "SELECT IF (EXISTS (SELECT * FROM volumen WHERE titulo_volumen='$titulo_volumen' AND no_volumen='$no_volumen'), 'TRUE', 'FALSE') validar";
            if ($sql = $this->acceso->query($query)) {
                while ($row = mysqli_fetch_array($sql)) {
                    $data[] = $row;
                }
            }
            return $data;
        }
        
    }

?>