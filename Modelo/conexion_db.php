<?php
class Conexion
{
    public static function conectar()
    {
        DEFINE ('DB_USER', 'user_biblioteca');
        DEFINE ('DB_PASSWORD', '-~b#L92-hOZ4jbj_');
        DEFINE ('DB_HOST', 'localhost');
        DEFINE ('DB_NAME', 'biblioteca_babel');

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if(!$dbc){
            die('Error al conectar la base de datos');    
        }
        
        return $dbc;
    }
}

?>