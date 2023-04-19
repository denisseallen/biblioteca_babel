# Índice "Biblioteca de Babel"
El presente proyecto es un sitio web desarrollado para la "Biblioteca de Babel". Dicho sitio representa un índice que guarda todos los datos relevantes de los volúmenes, así como su localización en coordenadas dentro de la biblioteca.

## Análisis
### Diagrama E-R
En la *Figura 1* se muestra el diagrama entidad-relación que representa la base de datos desarrollada, donde:
- **entidad UBICACION.** Representa a la tabla que guarda las coordenadas para ubicar a los volúmenes en la biblioteca. Esta información incluye la sala, el estante, el librero y la posición, así como el código que idenficia como única a cada ubicación.
- **entidad VOLUMEN.** Representa a la tabla que guarda la información referenete a los volúmenes, como el título del volumen, número de vólumen y el código que identifica a cada volumen como único. Esta tabla se encuentra relacionada de uno a muchos con la tabla *UBICACION*  ya que pueden existir diversos volumenes en una sola ubicación, pero no se puede localizar un volumen en diversas ubicaciones.

> Figura 1. Diagrama ER
![Figura 1. Diagrama ER](https://bibliotecababel.000webhostapp.com/documentacion/diagrama_er.png "Figura 1. Diagrama ER")


### Diagrama de casos de uso
La *Figura 2* presenta las diversas acciones que el usuario puede realizar sobre el sistema, donde:
- Llega el lector a la biblioteca y solicita un libro. Para atenter a su petición, el bibliotecario debe cosultar las coordenadas para ubicar al libro en cuestión.
- El bibliotecario o usuario administrador puede administrar la información de cada volumen, es decir, puede ingresar un nuevo volumen al sistema, editar la información de cada volumen, o bien, eliminarlos.
- Así mismo, el bibliotecario o usuario administrador puede administrar las coordenadas de la biblioteca.

> Figura 2. Diagrama de casos de uso
![](https://bibliotecababel.000webhostapp.com/documentacion/UseCaseDiagram.png)
## Acceso al sitio
Para acceder al sitio es necesario lo siguiente:
1. Contar con un dispositivo electrónico con acceso a internet.
1. El dispositivo debe tener con un navegador web (Chrome, Edge, Firefox, etc). No versiones resagadas.
1. Acceder al navegador web.
1.  Ingresar a la dirección electrónica:  https://bibliotecababel.000webhostapp.com/

## Funcionamiento
### Administrar volúmenes
Al ingresar al sistema, se podrá visualzar la ventana de la *Figura 3*, donde se muestra como primera opción la sección de "Administrar volúmenes". Esta sección está compuesta por un apartado de tres listas desplegables que tienen la función de filtrar los volúmenes de acuerdo a sus coordenadas, como la sala, el estante y el librero.

> Figura 3. Sección administrar volúmenes
![](https://bibliotecababel.000webhostapp.com/documentacion/admin_volumen.png)

#### Altas
Para ingresar un nuevo volumen al sistema el usuario debe dar clic sobre el botón *Nuevo volumen*. Posteriormente, el sitio mostrará la ventana emergente, que se observa en la *Figura 4*, sobre la cual el usuario debe completar los datos solicitados. En caso de existir algún error en la información ingresada, el sitio mostrará un mensaje indicando el error. 
Al completar los campos, se debe dar clic en el botón *Guardar*.
> Figura 4. Nuevo volumen
![](https://bibliotecababel.000webhostapp.com/documentacion/nuevo_volumen.png)

Uno de los errores que se pueden cometer es que se desee ingresar un título con un número de volumen que ya se encuentre registrado en el sitio. Para esto, se mostrará el mensaje de alerta que se muestra en la *Figura 5*.

> Figura 5. Validación volumen
![](https://bibliotecababel.000webhostapp.com/documentacion/validar_volumen.png)

**NOTA:** Antes de agregar los volumenes en el sistema, se deben agregar todas las coordenadas de la biblioteca, o bien, verifcar que las coordenadas del volumen que se desee dar de alta existan en el sistema. 

#### Filtros
Para localizar volúmenes de acuerdo a la sala, estante y/o librero, el usuario debe elegir su respectiva opción en las listas deplegables. Esto se muestra en la *Figura 6*, donde el usuario:
1. Primero debe elegir la sala, para que el sitio muestre los estantes disponibles.
1. Posteriormente, se debe seleccionar el estate, para mostrar sus respectivos libreros.
1. Finalmente, debe seleccionar el librero deseado.

> Figura 6. Filtros
![](https://bibliotecababel.000webhostapp.com/documentacion/filtros.png)

**NOTA:** Los filtros se van aplicando sobre la tabla con forme se vayan seleccionando las diferentes opciones.

#### Cambios
Para realizar algún o algunos cambios en la información sobre algún volumen éste debe ser ubicado en la tabla de volúmenes y dar clic sobre su respectivo *Botón editar volumen*. Posteriormente, el sitio mostrará la ventana emergente ilustrada en la *Figura 7* que muestra los datos a actualizar. En caso de haber algún error con la información ingresada, el sitio mostrará un mensaje de advertencia.
Una vez realizados los cambios, se debe dar clic en el botón *Guardar*.

> Figura 7. Actualizar volumen
![](https://bibliotecababel.000webhostapp.com/documentacion/editar_volumen.png)

#### Bajas
Para dar de baja algún volumen del sitio, dicho volumen debe ser ubicado en la tabla y dar clic sobre su respectivo botón "*Eliminar volumen*". Posteriormente, el sitio mostrará el mensaje de confirmación representado en la *Figura 8*. Al confirmar este mensaje el volumen será eliminado.
> Figura 8. Eliminar volumen
![](https://bibliotecababel.000webhostapp.com/documentacion/eliminar_volumen.png)

### Administrar ubicaciones
La *Figura 9* muestra como primera opción la sección de "Administrar volúmenes". Esta sección está compuesta por un botón para dar de alta coordenadas y la tabla que muestra dichas coordenadas.

> Figura 9. Sección administrar coordenadas
![](https://bibliotecababel.000webhostapp.com/documentacion/admin_ubicaciones.png)

#### Altas
Para ingresar una nueva coordenada al sitio el usuario debe dar clic sobre el botón *Nuevo ubicación*. Posteriormente, el sitio mostrará la ventana emergente, que se observa en la *Figura 10*, sobre la cual el usuario debe completar los datos solicitados. En caso de existir algún error en la información ingresada, el sitio mostrará un mensaje indicando el error. 
Al completar los campos, se debe dar clic en el botón *Guardar*.
> Figura 10. Nueva coordenada
![](https://bibliotecababel.000webhostapp.com/documentacion/nueva_ubicacion.png)

Uno de los errores que se pueden cometer es que se desee ingresar coordenadas que ya se encuentren registradas, es decir, una ubicación con la misma sala, estante, librero y posición. Para esto, se mostrará el mensaje de alerta que se muestra en la *Figura 11*.

> Figura 11. Validación coordenadas
![](https://bibliotecababel.000webhostapp.com/documentacion/validar_coordenadas.png)

#### Cambios
Para realizar algún o algunos cambios en la información sobre alguna coordenada ésta debe ser ubicada en la tabla de ubicaciones y dar clic sobre su respectivo *Botón editar ubicación*. Posteriormente, el sitio mostrará la ventana emergente ilustrada en la *Figura 12* que muestra los datos a actualizar. En caso de haber algún error con la información ingresada, el sitio mostrará un mensaje de advertencia.
Una vez realizados los cambios, se debe dar clic en el botón *Guardar*.

> Figura 12. Actualizar coordenadas
![](https://bibliotecababel.000webhostapp.com/documentacion/editar_ubicacion.png)

#### Bajas
Para dar de baja a alguna coordenada, ésta debe ser ubicada en la tabla y dar clic sobre su respectivo botón "*Eliminar ubicación*". Posteriormente, el sitio mostrará el mensaje de confirmación representado en la *Figura 13*, índicando el número de volúmenes que se encuentran en dicha ubicación que también serán eliminadas debido a su relación. Al confirmar este mensaje la coordenada será eliminada.
> Figura 13. Eliminar coordenada
![](https://bibliotecababel.000webhostapp.com/documentacion/eliminar_ubicacion.png)
