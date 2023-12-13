<?php
    require_once "conexion/conexion.php";
    require_once "respuestas.class.php";

    class auth extends conexion{
        public function login( $json ){
            $_respuestas = new respuestas;
            $datos = json_decode( $json, true );

            if( !isset( $datos['usuario'] ) || !isset( $datos['pass'] ) ){
                //error con los campos
                return $_respuestas->error_400();
            } else {
                //todo esta bien
                $usuario = $datos['usuario'];
                $pass = $datos['pass'];
                $pass = parent::encriptar( $pass );
                $datos = $this->obtenerDatosUsuario( $usuario );
                if( $datos ){
                    //Verificar si la contraseña es igual 
                    if( $pass == $datos[0]['pass'] ){
                        if( $datos[0]['puesto'] == "adminadmin" ){
                            //crear token
                            $verificar = $this->insertarToken( $datos[0]['id'] );
                            if( $verificar ){
                                //si se guardo
                                $result = $_respuestas->response;
                                $result["result"] = array(
                                    "token" => $verificar
                                );
                                return $result;
                            } else {
                                //la contraseña no es igual
                                return $_respuestas->error_500( "Error, no hemos podido guardar" );    
                            }
                        } else {
                            //la contraseña no es igual
                            return $_respuestas->error_200( "La puesto es adminadmin" );
                        }
                    } else {
                        //la contraseña no es igual
                        return $_respuestas->error_200( "La contraseña es invalida" );
                    }
                } else {
                    //No existe el usuario
                    return $_respuestas->error_200( "El usuario $usuario no existe" );
                }
            }
        }

        private function obtenerDatosUsuario( $usuario ){
            $query = "SELECT id, usuario, pass, puesto FROM empleados WHERE usuario = '$usuario'";
            $datos = parent::obtenerDatos( $query );
            if( isset( $datos[0]["usuario"] ) ){
                return $datos;
            } else {
                return 0;
            }
        }

        private function insertarToken( $usuarioID ){
            $val = true;
            $token = bin2hex( openssl_random_pseudo_bytes( 16, $val ) );
            $date = date("Y:m:d H:i");
            $estado = "Activo";
            $query = "INSERT INTO empleados_token ( usuarioID, token, estado, fecha ) VALUES ('$usuarioID', '$token', '$estado', '$date')";
            $verifica = parent::nonQuery( $query );
            if( $verifica ){
                return $token;
            } else {
                return 0;
            }
        }
    }
?>