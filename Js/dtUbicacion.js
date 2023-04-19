//----------------------------------------- VARIABLES GLOBALES -----------------------------------------
var datatable_ubicaciones=''; //Variable para el datatable
var ubicacion_codigo=''; //Variable para tomar el código de la ubicación que se desea actualizar
var ubicacion_sala_temp=''; //Variable para tomar la sala actual de la ubicación que se desea actualizar
var ubicacion_estante_temp=''; //Variable para tomar el estante actual la ubicación que se desea actualizar
var ubicacion_librero_temp=''; //Variable para tomar el librero actual de la ubicación que se desea actualizar
var ubicacion_posicion_temp=''; //Variable para tomar la posición actual de la ubicación que se desea actualizar

//------------------------------------------ FUCIÓN AL INICIAR -----------------------------------------
$(document).ready(function () {
    mostrarDatosUbicacion();
});

//------------------------------------------ MOSTRAR UBICACIONES ----------------------------------------
function mostrarDatosUbicacion()
{
    var funcion='mostrar_ubicaciones';
    datatable_ubicaciones = $('#tabla_ubicacion').DataTable({
        aLengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Todo"] ],
        columnDefs: [
          {
            target: 1,
            visible: false,
            searchable: false,
          }
        ],
        dom: 'lfrtp',
        ajax: {
            "url": "Controlador/controlador_ubicacion.php",
            "method": "POST",
            "data":{funcion_ubicacion:funcion}
          },
        columns: [
            { "defaultContent": `<button title="Editar ubicación" class="update_ubicacion btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#editarUbicación">
                                <i class="bi bi-pencil-square"></i></button>
                                <button title="Eliminar ubicación" class="delete_ubicacion btn btn-danger"><i class="bi bi-trash-fill"></i></button>`},
            { "data": "codigo_ubicacion" },
            { "data": "sala" },
            { "data": "estante" },
            { "data": "librero" },
            { "data": "posicion", className: "center" }
        ],
        language: espanol
    }); 
}

//------------------------------------------- ALTA DE UBICACIONES ------------------------------------------
$('#form-crearUbicacion').submit(e=>{
    let sala = $('#salaUbicacionCrear').val();
    sala = sala.trim();
    let estante = $('#estanteUbicacionCrear').val();
    estante = estante.trim();
    let librero = $('#libreroUbicacionCrear').val();
    librero = librero.trim();
    let posicion = $('#posicionUbicacionCrear').val();
    posicion = posicion.trim();
  
    if(sala.length==0) // Comprobar que el dato no esté vacío
    {
      $('#salaUbicacionCrear').val('');
      event.preventDefault();
      swal({
        icon: 'warning',
        title: '¡Coloca la sala!'
      });
    }
    else if(estante.length==0) // Comprobar que el dato no esté vacío
    {
      $('#estanteUbicacionCrear').val('');
      event.preventDefault();
      swal({
        icon: 'warning',
        title: '¡Coloca el estante!'
      });
    }
    else if(librero.length==0) // Comprobar que el dato no esté vacío
    {
      $('#libreroUbicacionCrear').val('');
      event.preventDefault();
      swal({
        icon: 'warning',
        title: '¡Coloca el librero!'
      });
    }
    else if(posicion.length==0) // Comprobar que el dato no esté vacío
    {
      $('#posicionUbicacionCrear').val('');
      event.preventDefault();
      swal({
        icon: 'warning',
        title: '¡Coloca la posición!'
      });
    }
    else
    {
      event.preventDefault();
      let ubicacion_bd = validarUbicacion(sala, estante, librero, posicion); // Comprobar que los datos de la ubicación no se repitan no exista
      if(ubicacion_bd=='true')
      {
        swal({
          icon: 'error',
          title: '¡Ubicación existente!',
          text: "La sala: "+sala +', con estante: '+ estante + ', librero: '+librero+" y posición: "+posicion+", ya existe en el sistema"
        });
      }
      else
      {
        // Crear ubicación
        var funcion = 'crear_ubicacion';
        $.ajax({
            url:'Controlador/controlador_ubicacion.php',
            type:'POST',
            async: false,
            data: {funcion_ubicacion:funcion, sala:sala, estante:estante, librero:librero, posicion:posicion},
        }).done(function(resp){
          swal("¡La ubicación ha sido creada!", {
            icon: "success",
          })
          .then((value)=>{
            if(value==true)
            {location.reload();}
          });
        });
      }
    }
});

//------------------------------------------ CAMBIO EN UBICACIÓN -----------------------------------------
//-----> Mostrar datos a editar
$('#tabla_ubicacion tbody').on('click','.update_ubicacion', function(){
    let data = datatable_ubicaciones.row($(this).parents()).data();
    ubicacion_codigo = data.codigo_ubicacion;
    ubicacion_sala_temp = data.sala;
    ubicacion_estante_temp = data.estante;
    ubicacion_librero_temp = data.librero;
    ubicacion_posicion_temp = data.posicion;
  
    $('#salaUbicacionEditar').val(data.sala);
    $('#estanteUbicacionEditar').val(data.estante);
    $('#libreroUbicacionEditar').val(data.librero);
    $('#posicionUbicacionEditar').val(data.posicion);
  })
  
  //-----> Guardar Cambios
$('#form-editarUbicación').submit(e=>{
    let sala = $('#salaUbicacionEditar').val();
    sala = sala.trim();
    let estante = $('#estanteUbicacionEditar').val();
    estante = estante.trim();
    let librero = $('#libreroUbicacionEditar').val();
    librero = librero.trim();
    let posicion = $('#posicionUbicacionEditar').val();
    posicion = posicion.trim();
  
    if(sala.length==0) // Comprobar que el dato no esté vacío
    {
      $('#salaUbicacionEditar').val('');
      event.preventDefault();
      swal({
        icon: 'warning',
        title: '¡Coloca la sala!'
      });
    }
    else if(estante.length==0) // Comprobar que el dato no esté vacío
    {
      $('#estanteUbicacionEditar').val('');
      event.preventDefault();
      swal({
        icon: 'warning',
        title: '¡Coloca el estante!'
      });
    }
    else if(librero.length==0) // Comprobar que el dato no esté vacío
    {
      $('#libreroUbicacionEditar').val('');
      event.preventDefault();
      swal({
        icon: 'warning',
        title: '¡Coloca el librero!'
      });
    }
    else if(posicion.length==0) // Comprobar que el dato no esté vacío
    {
      $('#posicionUbicacionEditar').val('');
      event.preventDefault();
      swal({
        icon: 'warning',
        title: '¡Coloca la posición!'
      });
    }
    else
    {
      event.preventDefault();
      let ubicacion_bd = validarUbicacion(sala, estante, librero, posicion); // Comprobar que el título con el número del volumen no exista
      if(ubicacion_bd=='true' && (sala!=ubicacion_sala_temp || estante!=ubicacion_estante_temp || librero!=ubicacion_librero_temp || posicion!=ubicacion_posicion_temp))
      {
        swal({
          icon: 'error',
          title: '¡Ubicación existente!',
          text: "La sala: "+sala +', con estante: '+ estante + ', librero: '+librero+" y posición: "+posicion+", ya existe en el sistema"
        });
      }
      else
      {
        var cantidad_vol = obtenerCantidadVolumenes(ubicacion_codigo);
        // Actualizar ubicación
        var funcion = 'editar_ubicacion';
        $.ajax({
            url:'Controlador/controlador_ubicacion.php',
            type:'POST',
            async: false,
            data: {funcion_ubicacion:funcion, sala:sala, estante:estante, librero:librero, posicion:posicion, codigo_ubicacion:ubicacion_codigo},
        }).done(function(resp){
          swal("¡La ubicación ha sido creada!", {
            icon: "success",
            text: "También se actualizaron "+ cantidad_vol+" volumenes"
          })
          .then((value)=>{
            if(value==true)
            {location.reload();}
          });
        });
      }
    }
});

//------------------------------------------- BAJA DE UBICACIÓN ------------------------------------------
$('#tabla_ubicacion tbody').on('click','.delete_ubicacion', function(){
  let data = datatable_ubicaciones.row($(this).parents()).data();
  let codigo_ubicacion = data.codigo_ubicacion;
  var cantidad_vol = obtenerCantidadVolumenes(codigo_ubicacion);

  swal({
      title: "¿Estás seguro de eliminarlo?",
      text: "También se eliminarán "+cantidad_vol+" volumenes, y no se podrá revertir la acción",
      icon: "warning",
      buttons: {
          cancel: "Cancelar",
          confirm: "Eliminar",
        },
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) 
      {
        funcion ='borrar_ubicacion';
        $.ajax({
          url:'Controlador/controlador_ubicacion.php',
          type:'POST',
          async: false,
          data: {funcion_ubicacion:funcion, codigo_ubicacion:codigo_ubicacion},
        }).done(function(resp){
          swal("¡La ubicación ha sido eliminada!", {
            icon: "success",
          })
          .then((value)=>{
            if(value==true)
            {location.reload();}
          });
        });
      } else {
        swal("¡La ubicación NO ha sido afectada!", {
          icon: "info",
        });
      }
    });
});

//----------------------------------------------- FUNCIÓN PARA VALIDAR UBICACIÓN -----------------------------------------------
function validarUbicacion(sa, es, lib, pos)
{
    var respuesta_validar = '';
    var funcion = 'validar_ubicacion';
    $.ajax({
      url:'Controlador/controlador_ubicacion.php',
      type:'POST',
      async: false,
      data: {funcion_ubicacion:funcion, sala:sa, estante:es, librero:lib, posicion:pos},
    }).done(function(resp){
      let data = JSON.parse(resp);
      if(data.length>0)
      {
        respuesta_validar = data[0][0];
        respuesta_validar = respuesta_validar.toLowerCase();
      }
    });
  
    return respuesta_validar;
}

function obtenerCantidadVolumenes(codigo_ubicacion)
{
    var respuesta_cantidad = '';
    var funcion = 'obtenerCantidad_volumenes';
    $.ajax({
      url:'Controlador/controlador_ubicacion.php',
      type:'POST',
      async: false,
      data: {funcion_ubicacion:funcion, codigo_ubicacion:codigo_ubicacion},
    }).done(function(resp){
      let data = JSON.parse(resp);
      if(data.length>0)
      {
        respuesta_cantidad = data[0][0];
      }
    });
  
    return respuesta_cantidad;
}