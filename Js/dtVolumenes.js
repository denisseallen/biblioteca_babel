//----------------------------------------- VARIABLES GLOBALES -----------------------------------------
var datatable_volumenes=''; //Variable para el datatable
var volumen_titulo_temp=''; //Variable para tomar el titulo actual del volumen que se desea actualizar
var volumen_vol_temp=''; //Variable para tomar el número actual del volumen que se desea actualizar
var volumen_codigo=''; //Variable para tomar el código actual del volumen que se desea actualizar

const selector_sala = document.getElementById('salaVolumenCrear');
const selector_estante = document.getElementById('estanteVolumenCrear');
const selector_librero = document.getElementById('libreroVolumenCrear');
const selector_salaEditar = document.getElementById('salaVolumenEditar');
const selector_estanteEditar = document.getElementById('estanteVolumenEditar');
const selector_libreroEditar = document.getElementById('libreroVolumenEditar');

const filtro_sala = document.getElementById('filtro_sala');
const filtro_estante = document.getElementById('filtro_estante');
const filtro_librero = document.getElementById('filtro_librero');

//------------------------------------------ FUCIÓN AL INICIAR -----------------------------------------
$(document).ready(function () {
    mostrarDatos();
    
    var sala = selectorSalas();
    var estante = selectorEstante(sala);
    var librero = selectorLibrero(sala, estante);
    selectorPosicion(sala, estante, librero);

    selectorSalasFilro();
});

//------------------------------------------ MOSTRAR VOLUMENES -----------------------------------------
function mostrarDatos()
{
    var funcion='mostrar_volumenes';
    datatable_volumenes = $('#tabla_volumenes').DataTable({
        aLengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Todo"] ],
        columnDefs: [
          {
            target: 1,
            visible: false,
            searchable: false,
          },
          {
            target: 4,
            visible: false,
            searchable: false,
          }
        ],
        dom: 'lfrtp',
        ajax: {
            "url": "Controlador/controlador_volumen.php",
            "method": "POST",
            "data":{funcion_volumen:funcion}
          },
        columns: [
            { "defaultContent": `<button title="Editar volumen" class="update_volumen btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#editarVolumenes">
                                <i class="bi bi-pencil-square"></i></button>
                                <button title="Eliminar volumen" class="delete_volumen btn btn-danger"><i class="bi bi-trash-fill"></i></button>`},
            { "data": "codigo_volumen" },
            { "data": "titulo_volumen" },
            { "data": "no_volumen", className: "center"},
            { "data": "codigo_ubicacion"},
            { "data": "sala" },
            { "data": "estante" },
            { "data": "librero" },
            { "data": "posicion", className: "center" }
        ],
        language: espanol
    }); 
}

//------------------------------------------- ALTA DE VOLUMEN ------------------------------------------
$('#form-crearVolumen').submit(e=>{
    let titulo_volumen = $('#tituloVolumenCrear').val();
    titulo_volumen = titulo_volumen.trim();
    let no_volumen = $('#noVolumenCrear').val();
    let codigo_ubicacion = $('#posicionVolumenCrear').val();
  
    if(titulo_volumen.length==0) // Comprobar que el dato no esté vacío
    {
      $('#tituloVolumenCrear').val('');
      event.preventDefault();
      swal({
        icon: 'warning',
        title: '¡Coloca el título del volumen'
      });
    }
    else
    {
      event.preventDefault();
      let volumen_bd = validarVolumenCrear(titulo_volumen, no_volumen); // Comprobar que el título con el número del volumen no exista
      if(volumen_bd=='true')
      {
        event.preventDefault();
        swal({
          icon: 'error',
          title: '¡Volumen existente!',
          text: titulo_volumen +' vol. '+ no_volumen + ' ya existe en el sistema'
        });
      }
      else
      {
        // Crear volumen
        var funcion = 'crear_volumen';
        $.ajax({
            url:'Controlador/controlador_volumen.php',
            type:'POST',
            async: false,
            data: {funcion_volumen:funcion, titulo_volumen:titulo_volumen, no_volumen:no_volumen, codigo_ubicacion:codigo_ubicacion},
        }).done(function(resp){
          swal("¡El volumen ha sido creado!", {
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

//------------------------------------------ CAMBIO EN VOLUMEN -----------------------------------------
//-----> Mostrar datos a editar
$('#tabla_volumenes tbody').on('click','.update_volumen', function(){
  let data = datatable_volumenes.row($(this).parents()).data();
  volumen_codigo = data.codigo_volumen;
  volumen_titulo_temp = data.titulo_volumen;
  volumen_vol_temp = data.no_volumen;

  $('#tituloVolumenEditar').val(data.titulo_volumen);
  $('#noVolumenEditar').val(data.no_volumen);
  document.getElementById('salaVolumenEditar').innerHTML="<option value='"+data.sala+"'>"+data.sala+"</option>";
  document.getElementById('estanteVolumenEditar').innerHTML="<option value='"+data.estante+"'>"+data.estante+"</option>";
  document.getElementById('libreroVolumenEditar').innerHTML="<option value='"+data.librero+"'>"+data.librero+"</option>";
  document.getElementById('posicionVolumenEditar').innerHTML="<option value='"+data.codigo_ubicacion+"'>"+data.posicion+"</option>";

  selectorSalasEditar(data.sala);
  selectorEstanteEditar(data.sala, data.estante);
  selectorLibreroEditar(data.sala, data.estante, data.librero);
  selectorPosicionEditar(data.sala, data.estante, data.librero, data.codigo_ubicacion);
})

//-----> Guardar Cambios
$('#form-editarVolumenes').submit(e=>{
  let titulo_volumen = $('#tituloVolumenEditar').val();
  titulo_volumen = titulo_volumen.trim();
  let no_volumen = $('#noVolumenEditar').val();
  let codigo_ubicacion = $('#posicionVolumenEditar').val();

  if(titulo_volumen.length==0) // Comprobar que el dato no esté vacío
  {
    $('#tituloVolumenCrear').val('');
    event.preventDefault();
    swal({
      icon: 'warning',
      title: '¡Coloca el título del volumen'
    });
  }
  else
  {
    event.preventDefault();
    let volumen_bd = validarVolumenCrear(titulo_volumen, no_volumen); // Comprobar que el título con el número del volumen no exista
    if(volumen_bd=='true' && (titulo_volumen!=volumen_titulo_temp || no_volumen!=volumen_vol_temp))
    {
      event.preventDefault();
      swal({
        icon: 'error',
        title: '¡Volumen existente!',
        text: titulo_volumen +' vol. '+ no_volumen + ' ya existe en el sistema'
      });
    }
    else
    {
      // editar volumen
      var funcion = 'editar_volumen';
      $.ajax({
          url:'Controlador/controlador_volumen.php',
          type:'POST',
          async: false,
          data: {funcion_volumen:funcion, titulo_volumen:titulo_volumen, no_volumen:no_volumen, codigo_ubicacion:codigo_ubicacion, volumen_codigo:volumen_codigo},
      }).done(function(resp){
        swal("¡El volumen ha sido actualizado!", {
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

//------------------------------------------- BAJA DE VOLUMEN ------------------------------------------
$('#tabla_volumenes tbody').on('click','.delete_volumen', function(){
  let data = datatable_volumenes.row($(this).parents()).data();
  let codigo_volumen = data.codigo_volumen;

  swal({
      title: "¿Estás seguro de eliminarlo?",
      text: "Una vez eliminado, no se podrá revertir la acción",
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
        funcion ='borrar_volumen';
        $.ajax({
          url:'Controlador/controlador_volumen.php',
          type:'POST',
          async: false,
          data: {funcion_volumen:funcion, codigo_volumen:codigo_volumen},
        }).done(function(resp){
          swal("¡El volumen ha sido eliminado!", {
            icon: "success",
          })
          .then((value)=>{
            if(value==true)
            {location.reload();}
          });
        });
      } else {
        swal("¡El volumen NO ha sido afectado!", {
          icon: "info",
        });
      }
    });
});

//---------------------------------------------- SELECTORES --------------------------------------------
//-----------> Para crear volumen <-----------
selector_sala.addEventListener('change', function (e)
{
    var sala = $('#salaVolumenCrear').val();
    var estante = selectorEstante(sala);
    var librero = selectorLibrero(sala, estante);
    selectorPosicion(sala, estante, librero);
});
selector_estante.addEventListener('change', function (e)
{
    var sala = $('#salaVolumenCrear').val();
    var estante = $('#estanteVolumenCrear').val();
    var librero = selectorLibrero(sala, estante);
    selectorPosicion(sala, estante, librero);
});
selector_librero.addEventListener('change', function (e)
{
    var sala = $('#salaVolumenCrear').val();
    var estante = $('#estanteVolumenCrear').val();
    var librero = $('#libreroVolumenCrear').val();
    selectorPosicion(sala, estante, librero);
});

//-----------> Para editar volumen <-----------
selector_salaEditar.addEventListener('change', function (e)
{
    var sala = $('#salaVolumenEditar').val();
    var estante = selectorEstanteEditarCambio(sala);
    var librero = selectorLibreroEditarCambio(sala, estante);
    selectorPosicionEditarCambio(sala, estante, librero);
});
selector_estanteEditar.addEventListener('change', function (e)
{
    var sala = $('#salaVolumenEditar').val();
    var estante = $('#estanteVolumenEditar').val();
    var librero = selectorLibreroEditarCambio(sala, estante);
    selectorPosicionEditarCambio(sala, estante, librero);
});
selector_libreroEditar.addEventListener('change', function (e)
{
    var sala = $('#salaVolumenEditar').val();
    var estante = $('#estanteVolumenEditar').val();
    var librero = $('#libreroVolumenEditar').val();
    selectorPosicionEditarCambio(sala, estante, librero);
});

//------------------------------ FUNCIÓN PARA VALIDAR TÍTULO / NO. VOLUMEN -----------------------------
function validarVolumenCrear(titulo, no_vol)
{
    var respuesta_validar = '';
    var funcion = 'validar_volumen';
    $.ajax({
      url:'Controlador/controlador_volumen.php',
      type:'POST',
      async: false,
      data: {funcion_volumen:funcion, titulo_volumen:titulo, no_volumen:no_vol},
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

//---------------------------------------------- FILTROS --------------------------------------------
filtro_sala.addEventListener('change', function (e)
{
  var sala = $('#filtro_sala').val();
  if(sala!='Seleccionar')
  {
    var estante = selectorEstanteFiltro(sala);
    datatable_volumenes.columns(5).search(sala).draw();
  }
  else{
    document.getElementById('filtro_estante').innerHTML="<option value='Seleccionar'>Selecciona la sala</option>";
    document.getElementById('filtro_librero').innerHTML="<option value='Seleccionar'>Selecciona el estante</option>";
    datatable_volumenes.destroy();
    mostrarDatos();
  }
});

filtro_estante.addEventListener('change', function (e)
{
  var sala = $('#filtro_sala').val();
  var estante = $('#filtro_estante').val();
  if(estante!='Seleccionar')
  {
    selectorLibreroFiltro(sala, estante);
    datatable_volumenes.columns(6).search(estante).draw();
  }
  else{
    document.getElementById('filtro_sala').innerHTML="<option value='Seleccionar'>Seleccionar</option>";
    selectorSalasFilro();
    document.getElementById('filtro_estante').innerHTML="<option value='Seleccionar'>Selecciona la sala</option>";
    document.getElementById('filtro_librero').innerHTML="<option value='Seleccionar'>Selecciona el estante</option>";
    datatable_volumenes.destroy();
    mostrarDatos();
  }
});

filtro_librero.addEventListener('change', function (e)
{
  var librero = $('#filtro_librero').val();
  if(librero!='Seleccionar')
  {
    datatable_volumenes.columns(7).search(librero).draw();
  }
  else{
    document.getElementById('filtro_sala').innerHTML="<option value='Seleccionar'>Seleccionar</option>";
    selectorSalasFilro();
    document.getElementById('filtro_estante').innerHTML="<option value='Seleccionar'>Selecciona la sala</option>";
    document.getElementById('filtro_librero').innerHTML="<option value='Seleccionar'>Selecciona el estante</option>";
    datatable_volumenes.destroy();
    mostrarDatos();
  }
});