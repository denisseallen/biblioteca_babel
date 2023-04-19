# Índice "Biblioteca de Babel"
El presente proyecto es un sitio web desarrollado para la "Biblioteca de Babel". Dicho sitio representa un índice que guarda todos los datos relevantes de los volúmenes, así como su localización en coordenadas dentro de la biblioteca.

## Análisis
### Diagrama E-R
En la *Figura 1* se muestra el diagrama entidad-relación que representa la base de datos desarrollada, donde:
- **entidad UBICACION.** Representa a la tabla que guarda las coordenadas para ubicar a los volúmenes en la biblioteca. Esta información incluye la sala, el estante, el librero y la posición, así como el código que idenficia como única a cada ubicación.
- **entidad VOLUMEN.** Representa a la tabla que guarda la información referenete a los volúmenes, como el título del volumen, número de vólumen y el código que identifica a cada volumen como único. Esta tabla se encuentra relacionada de uno a muchos con la tabla *UBUCACION*  ya que pueden existir diversos volumenes en una sola ubicación, pero no se puede localizar un volumen en diversas ubicaciones.

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
### Administrar ubicaciones
![](https://bibliotecababel.000webhostapp.com/documentacion/admin_ubicaciones.png)
### Administrar volúmenes
![](https://bibliotecababel.000webhostapp.com/documentacion/admin_volumen.png)
