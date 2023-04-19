//------------------------------------------------------------- CREAR VOLUMEN -------------------------------------------------------------
//------------> Selector para mostrar las salas
function selectorSalas()
{ 
    var funcion='selector_salas';
    var sala='';
     $.ajax({
        url:'Controlador/controlador_ubicacion.php',
        type:'POST',
        async: false,
        data:{funcion_ubicacion:funcion}
    }).done(function(resp){
        let data=JSON.parse(resp);
        let cadena="";
        if(data.length>0){
            for (let i = 0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][0]+"</option>";
            }
            sala = data[0][0];
            document.getElementById('salaVolumenCrear').innerHTML=cadena;
            
            }else{
                document.getElementById('salaVolumenCrear').innerHTML="<option value=''>No se encontraron registros</option>";
        }
    });
    return sala;
}

//------------> Selector para mostrar estantes según la sala
function selectorEstante(sala)
{ 
    var funcion='selector_estantes';
    var estante = '';
     $.ajax({
        url:'Controlador/controlador_ubicacion.php',
        type:'POST',
        async: false,
        data:{funcion_ubicacion:funcion, sala:sala}
    }).done(function(resp){
        let data=JSON.parse(resp);
        let cadena="";
        if(data.length>0){
            for (let i = 0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][0]+"</option>";
            }
            estante = data[0][0];
            document.getElementById('estanteVolumenCrear').innerHTML=cadena;
            
            }else{
                document.getElementById('estanteVolumenCrear').innerHTML="<option value=''>No se encontraron registros</option>";
        }
    });
    return estante;
}

//------------> Selector para mostrar libreros según la sala y el estante
function selectorLibrero(sala, estante)
{ 
    var funcion='selector_librero';
    var lib = '';
     $.ajax({
        url:'Controlador/controlador_ubicacion.php',
        type:'POST',
        async: false,
        data:{funcion_ubicacion:funcion, sala:sala, estante:estante}
    }).done(function(resp){
        let data=JSON.parse(resp);
        let cadena="";
        if(data.length>0){
            for (let i = 0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][0]+"</option>";
            }
            
            lib = data[0][0];
            document.getElementById('libreroVolumenCrear').innerHTML=cadena;
            
            }else{
                document.getElementById('libreroVolumenCrear').innerHTML="<option value=''>No se encontraron registros</option>";
        }
    })

    return lib;
}

//------------> Selector para mostrar posición según la sala, estante y librero
function selectorPosicion(sala, estante, librero)
{ 
    var funcion='selector_posicion';
     $.ajax({
        url:'Controlador/controlador_ubicacion.php',
        type:'POST',
        async: false,
        data:{funcion_ubicacion:funcion, sala:sala, estante:estante, librero:librero}
    }).done(function(resp){
        let data=JSON.parse(resp);
        let cadena="";
        if(data.length>0){
            for (let i = 0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            document.getElementById('posicionVolumenCrear').innerHTML=cadena;
            
            }else{
                document.getElementById('posicionVolumenCrear').innerHTML="<option value=''>No se encontraron registros</option>";
        }
    })
}


//------------------------------------------------------------- EDITAR VOLUMEN -------------------------------------------------------------
//------------> Selectores para mostrar datos automáticamente
function selectorSalasEditar(sala_actual)
{ 
    var funcion='selector_salas';
     $.ajax({
        url:'Controlador/controlador_ubicacion.php',
        type:'POST',
        async: false,
        data:{funcion_ubicacion:funcion}
    }).done(function(resp){
        let data=JSON.parse(resp);
        let cadena="";
        if(data.length>0){
            for (let i = 0; i < data.length; i++){
                if (data[i][0]!=sala_actual)
                {
                    cadena+="<option value='"+data[i][0]+"'>"+data[i][0]+"</option>";
                }
            }
            document.getElementById('salaVolumenEditar').innerHTML+=cadena;
            
            }else{
                document.getElementById('salaVolumenEditar').innerHTML="<option value=''>No se encontraron registros</option>";
        }
    });
}
function selectorEstanteEditar(sala, estante_actual)
{ 
    var funcion='selector_estantes';
     $.ajax({
        url:'Controlador/controlador_ubicacion.php',
        type:'POST',
        async: false,
        data:{funcion_ubicacion:funcion, sala:sala}
    }).done(function(resp){
        let data=JSON.parse(resp);
        let cadena="";
        if(data.length>0){
            for (let i = 0; i < data.length; i++){
                if (data[i][0]!=estante_actual)
                {
                    cadena+="<option value='"+data[i][0]+"'>"+data[i][0]+"</option>";
                }
            }
            document.getElementById('estanteVolumenEditar').innerHTML+=cadena;
            
            }else{
                document.getElementById('estanteVolumenEditar').innerHTML="<option value=''>No se encontraron registros</option>";
        }
    });
}
function selectorLibreroEditar(sala, estante, librero_actual)
{ 
    var funcion='selector_librero';
     $.ajax({
        url:'Controlador/controlador_ubicacion.php',
        type:'POST',
        async: false,
        data:{funcion_ubicacion:funcion, sala:sala, estante:estante}
    }).done(function(resp){
        let data=JSON.parse(resp);
        let cadena="";
        if(data.length>0){
            for (let i = 0; i < data.length; i++){
                if (data[i][0]!=librero_actual)
                {
                    cadena+="<option value='"+data[i][0]+"'>"+data[i][0]+"</option>";
                }
            }
            document.getElementById('libreroVolumenEditar').innerHTML+=cadena;
            
            }else{
                document.getElementById('libreroVolumenEditar').innerHTML="<option value=''>No se encontraron registros</option>";
        }
    })
}
function selectorPosicionEditar(sala, estante, librero, posicion_actual)
{ 
    var funcion='selector_posicion';
     $.ajax({
        url:'Controlador/controlador_ubicacion.php',
        type:'POST',
        async: false,
        data:{funcion_ubicacion:funcion, sala:sala, estante:estante, librero:librero}
    }).done(function(resp){
        let data=JSON.parse(resp);
        let cadena="";
        if(data.length>0){
            for (let i = 0; i < data.length; i++){
                if (data[i][0]!=posicion_actual)
                {
                    cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
                }
            }
            document.getElementById('posicionVolumenEditar').innerHTML+=cadena;
            
            }else{
                document.getElementById('posicionVolumenEditar').innerHTML="<option value=''>No se encontraron registros</option>";
        }
    })
}

//------------> Selectores para mostrar datos al cambio del selecctor
function selectorEstanteEditarCambio(sala)
{ 
    var funcion='selector_estantes';
    var estante = '';
     $.ajax({
        url:'Controlador/controlador_ubicacion.php',
        type:'POST',
        async: false,
        data:{funcion_ubicacion:funcion, sala:sala}
    }).done(function(resp){
        let data=JSON.parse(resp);
        let cadena="";
        if(data.length>0){
            for (let i = 0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][0]+"</option>";
            }
            estante = data[0][0];
            document.getElementById('estanteVolumenEditar').innerHTML=cadena;
            
            }else{
                document.getElementById('estanteVolumenEditar').innerHTML="<option value=''>No se encontraron registros</option>";
        }
    });
    return estante;
}
function selectorLibreroEditarCambio(sala, estante)
{ 
    var funcion='selector_librero';
    var lib = '';
     $.ajax({
        url:'Controlador/controlador_ubicacion.php',
        type:'POST',
        async: false,
        data:{funcion_ubicacion:funcion, sala:sala, estante:estante}
    }).done(function(resp){
        let data=JSON.parse(resp);
        let cadena="";
        if(data.length>0){
            for (let i = 0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][0]+"</option>";
            }
            
            lib = data[0][0];
            document.getElementById('libreroVolumenEditar').innerHTML=cadena;
            
            }else{
                document.getElementById('libreroVolumenEditar').innerHTML="<option value=''>No se encontraron registros</option>";
        }
    })

    return lib;
}
function selectorPosicionEditarCambio(sala, estante, librero)
{ 
    var funcion='selector_posicion';
     $.ajax({
        url:'Controlador/controlador_ubicacion.php',
        type:'POST',
        async: false,
        data:{funcion_ubicacion:funcion, sala:sala, estante:estante, librero:librero}
    }).done(function(resp){
        let data=JSON.parse(resp);
        let cadena="";
        if(data.length>0){
            for (let i = 0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            document.getElementById('posicionVolumenEditar').innerHTML=cadena;
            
            }else{
                document.getElementById('posicionVolumenEditar').innerHTML="<option value=''>No se encontraron registros</option>";
        }
    })
}

//------------------------------------------------------------- FILTROS -------------------------------------------------------------
//------------> Selector para mostrar las salas
function selectorSalasFilro()
{ 
    var funcion='selector_salas';
    var sala='';
     $.ajax({
        url:'Controlador/controlador_ubicacion.php',
        type:'POST',
        async: false,
        data:{funcion_ubicacion:funcion}
    }).done(function(resp){
        let data=JSON.parse(resp);
        let cadena="";
        if(data.length>0){
            for (let i = 0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][0]+"</option>";
            }
            sala = data[0][0];
            document.getElementById('filtro_sala').innerHTML+=cadena;
            
            }else{
                document.getElementById('filtro_sala').innerHTML="<option value=''>No se encontraron registros</option>";
        }
    });
    return sala;
}

//------------> Selector para mostrar estantes según la sala
function selectorEstanteFiltro(sala)
{ 
    var funcion='selector_estantes';
    var estante = '';
     $.ajax({
        url:'Controlador/controlador_ubicacion.php',
        type:'POST',
        async: false,
        data:{funcion_ubicacion:funcion, sala:sala}
    }).done(function(resp){
        let data=JSON.parse(resp);
        let cadena="";
        if(data.length>0){
            for (let i = 0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][0]+"</option>";
            }
            estante = data[0][0];
            document.getElementById('filtro_estante').innerHTML= "<option value='Seleccionar'>Seleccionar</option>"
            document.getElementById('filtro_estante').innerHTML+=cadena;
            
            }else{
                document.getElementById('filtro_estante').innerHTML="<option value=''>No se encontraron registros</option>";
        }
    });
    return estante;
}

//------------> Selector para mostrar libreros según la sala y el estante
function selectorLibreroFiltro(sala, estante)
{ 
    var funcion='selector_librero';
     $.ajax({
        url:'Controlador/controlador_ubicacion.php',
        type:'POST',
        async: false,
        data:{funcion_ubicacion:funcion, sala:sala, estante:estante}
    }).done(function(resp){
        let data=JSON.parse(resp);
        let cadena="";
        if(data.length>0){
            for (let i = 0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][0]+"</option>";
            }
            document.getElementById('filtro_librero').innerHTML= "<option value='Seleccionar'>Seleccionar</option>";
            document.getElementById('filtro_librero').innerHTML+=cadena;
            }else{
                document.getElementById('filtro_librero').innerHTML="<option value=''>No se encontraron registros</option>";
        }
    })
}