<?php
    require '../Modelo/modelo_volumen.php';
    
    $volumenes = new modeloVolumen();
    $opcion_volumen = $_POST['funcion_volumen'] ?? null;

    //--------------------------------------- MOSTRAR TODOS LO VOLUMENES ---------------------------------------
    if($opcion_volumen=='mostrar_volumenes')
    {
        $volumenes->mostrarVolumenes();
        $json = array();
        foreach ($volumenes->volumen as $data)
        {
            $json['data'][]=$data;
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    //---------------------------------------------- CREAR VOLUMEN ----------------------------------------------
    if ($opcion_volumen== "crear_volumen")
    {
        $titulo_volumen = $_POST['titulo_volumen'];
        $no_volumen = $_POST['no_volumen'];
        $codigo_ubicacion = $_POST['codigo_ubicacion'];
        $consulta = $volumenes ->crearVolumen($titulo_volumen, $no_volumen, $codigo_ubicacion);
        echo json_encode($consulta);
    }

    //------------------------------------------- ACTUALIZAR VOLUMEN --------------------------------------------
    if ($opcion_volumen== "editar_volumen")
    {
        $volumen_codigo = $_POST['volumen_codigo'];
        $titulo_volumen = $_POST['titulo_volumen'];
        $no_volumen = $_POST['no_volumen'];
        $codigo_ubicacion = $_POST['codigo_ubicacion'];
        $consulta = $volumenes ->editarVolumen($titulo_volumen, $no_volumen, $codigo_ubicacion, $volumen_codigo);
        echo json_encode($consulta);
    }

    //--------------------------------------------- ELIMINAR VOLUMEN --------------------------------------------
    if ($opcion_volumen== "borrar_volumen")
    {
        $volumen_codigo = $_POST['codigo_volumen'];
        $consulta = $volumenes ->eliminarVolumen($volumen_codigo);
        echo json_encode($consulta);
    }

    //------------------------------------------- VALIDAR TÍTULO VOLUMENES ---------------------------------------
    if ($opcion_volumen== "validar_volumen")
    {
        $titulo_volumen = $_POST['titulo_volumen'];
        $no_volumen = $_POST['no_volumen'];
        $consulta = $volumenes ->validarVolumen($titulo_volumen, $no_volumen);
        echo json_encode($consulta);
    }
?>