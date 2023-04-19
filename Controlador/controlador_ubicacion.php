<?php
    require '../Modelo/modelo_ubicacion.php';
    $ubicaciones = new modeloUbicacion();
    $opcion_ubicacion = $_POST['funcion_ubicacion'] ?? null;

    //------------------------------------------ MOSTRAR TODAS LAS UBICACIONES --------------------------------------------
    if($opcion_ubicacion=='mostrar_ubicaciones')
    {
        $ubicaciones->mostrarUbicaciones();
        $json = array();
        foreach ($ubicaciones->ubicacion as $data)
        {
            $json['data'][]=$data;
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
    
    //---------------------------------------------- CREAR UBICACIÓN ----------------------------------------------
    if ($opcion_ubicacion== "crear_ubicacion")
    {
        $sala = $_POST['sala'];
        $estante = $_POST['estante'];
        $librero = $_POST['librero'];
        $posicion = $_POST['posicion'];
        $consulta = $ubicaciones ->crearUbicacion($sala, $estante, $librero, $posicion);
        echo json_encode($consulta);
    }

    //------------------------------------------- ACTUALIZAR UBICACIÓN --------------------------------------------
    if ($opcion_ubicacion== "editar_ubicacion")
    {
        $codigo_ubicacion = $_POST['codigo_ubicacion'];
        $sala = $_POST['sala'];
        $estante = $_POST['estante'];
        $librero = $_POST['librero'];
        $posicion = $_POST['posicion'];
        $consulta = $ubicaciones ->editarUbicacion($sala, $estante, $librero, $posicion, $codigo_ubicacion);
        echo json_encode($consulta);
    }

    //--------------------------------------------- ELIMINAR UBICACIÓN --------------------------------------------
    if ($opcion_ubicacion== "borrar_ubicacion")
    {
        $codigo_ubicacion = $_POST['codigo_ubicacion'];
        $consulta = $ubicaciones ->eliminarUbicacion($codigo_ubicacion);
        echo json_encode($consulta);
    }

    //----------------------------------------------- VALIDAR UBICACIÓN -----------------------------------------------
    if ($opcion_ubicacion== "validar_ubicacion")
    {
        $sala = $_POST['sala'];
        $estante = $_POST['estante'];
        $librero = $_POST['librero'];
        $posicion = $_POST['posicion'];
        $consulta = $ubicaciones ->validarUbicacion($sala, $estante, $librero, $posicion);
        echo json_encode($consulta);
    }

    if ($opcion_ubicacion== "obtenerCantidad_volumenes")
    {
        $codigo_ubicacion = $_POST['codigo_ubicacion'];
        $consulta = $ubicaciones ->obtenerCantidadVolumenes($codigo_ubicacion);
        echo json_encode($consulta);
    }

    //-------------------------------------------------- SELECCIONADORES --------------------------------------------------
    if ($opcion_ubicacion == "selector_salas")
    {
        $consulta = $ubicaciones ->selectorSalas();
        echo json_encode($consulta);
    }

    if ($opcion_ubicacion == "selector_estantes")
    {
        $sala = $_POST['sala'];
        $consulta = $ubicaciones ->selectorEstantes($sala);
        echo json_encode($consulta);
    }

    if ($opcion_ubicacion == "selector_librero")
    {
        $sala = $_POST['sala'];
        $estante = $_POST['estante'];
        $consulta = $ubicaciones ->selectorLibrero($sala, $estante);
        echo json_encode($consulta);
    }

    if ($opcion_ubicacion == "selector_posicion")
    {
        $sala = $_POST['sala'];
        $estante = $_POST['estante'];
        $librero = $_POST['librero'];
        $consulta = $ubicaciones ->selectorPosicion($sala, $estante, $librero);
        echo json_encode($consulta);
    }
?>