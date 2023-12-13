<?php
    require_once "conexion/conexion.php";
    require_once "respuestas.class.php";

    class usuario extends conexion{
        private $tabla = "usuarios";
        private $IdUsuarios = "";
        private $Nombre = "";
        private $Telefono = "";
        private $Correo = "";
        private $Nacimiento = "";
        private $Usuario = "";
        private $Password = "";
        private $tipoMembresia = "";
        private $MetodoPago = "";


        public function listaUsuarios( $pagina = 1 ){
            $inicio = 0;
            $cantidad = 4;
            if( $pagina > 1 ){
                $inicio = ( $cantidad * ($pagina - 1 ) ) + 1;
                $cantidad = $cantidad * $pagina;
            }

            $query = "SELECT * FROM ". $this->tabla ." limit $inicio, $cantidad";
            $datos = parent::obtenerDatos( $query );

            return ( $datos );
        }

        public function obtenerUsuarios( $id ){
            $query = "SELECT * FROM ". $this->tabla ." WHERE IdUsuarios = $id";
            return parent::obtenerDatos( $query );
        }

        public function post( $json ){
            $_respuestas = new respuestas;
            $datos = json_decode( $json, true );
            if( !isset($datos['Nombre']) || !isset($datos['Telefono']) || !isset($datos['Correo']) || !isset($datos['Nacimiento']) || !isset($datos['Usuario']) || !isset($datos['Password']) || !isset($datos['TipoMembresia']) || !isset($datos['MetodoPago']) ){
                return $_respuestas->error_400();
            } else {
                if( isset( $datos[ 'IdUsuarios' ] ) ){ $this->IdUsuarios = $datos[ 'IdUsuarios' ]; }
                $this->Nombre = $datos['Nombre'];
                $this->Telefono = $datos['Telefono'];
                $this->Correo = $datos['Correo'];
                $this->Nacimiento = $datos['Nacimiento'];
                $this->Usuario = $datos['Usuario'];
                $this->Password = $datos['Password'];
                $this->TipoMembresia = $datos['TipoMembresia'];
                $this->MetodoPago = $datos['MetodoPago'];

                $resp = $this->insertarUsuario();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "usuarioID" => $resp
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function insertarUsuario(){
            $query = "INSERT INTO ". $this->tabla ."(IdUsuarios, nombre, telefono, correo, nacimiento, usuario, pass, tipoMembresia, metodo_pago) 
                      VALUES ('". $this->IdUsuarios ."', '". $this->Nombre ."','". $this->Telefono ."','". $this->Correo ."','". $this->Nacimiento ."','". $this->Usuario ."','". $this->Password ."','". $this->TipoMembresia ."','". $this->MetodoPago ."')";
            $resp = parent::nonQuery( $query );
            if( $resp ){
                return $resp;
            } else {
                return 0;
            }
        }

        public function put( $json ){
            $_respuestas = new respuestas;
            $datos = json_decode( $json, true );
            if( !isset($datos['IdUsuarios']) ){
                return $_respuestas->error_400();
            } else {
                $this->IdUsuarios = $datos['IdUsuarios'];
                if( isset( $datos[ 'Nombre' ] ) ){ $this->Nombre = $datos[ 'Nombre' ]; }
                if( isset( $datos[ 'Telefono' ] ) ){ $this->Telefono = $datos[ 'Telefono' ]; }
                if( isset( $datos[ 'Correo' ] ) ){ $this->Correo = $datos[ 'Correo' ]; }
                if( isset( $datos[ 'Nacimiento' ] ) ){ $this->Nacimiento = $datos[ 'Nacimiento' ]; }
                if( isset( $datos[ 'Usuario' ] ) ){ $this->Usuario = $datos[ 'Usuario' ]; }
                if( isset( $datos[ 'Password' ] ) ){ $this->Password = $datos[ 'Password' ]; }
                if( isset( $datos[ 'TipoMembresia' ] ) ){ $this->TipoMembresia = $datos[ 'TipoMembresia' ]; }
                if( isset( $datos[ 'MetodoPago' ] ) ){ $this->MetodoPago = $datos[ 'MetodoPago' ]; }
                
                $resp = $this->modificarUsuarios();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "usuarioID" => $this->IdUsuarios
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function modificarUsuarios(){
            $query = "UPDATE ". $this->tabla ." SET IdUsuarios='". $this->IdUsuarios ."',nombre='". $this->Nombre ."',telefono='". $this->Telefono ."',correo='". $this->Correo ."',nacimiento='". $this->Nacimiento ."',usuario='". $this->Usuario ."',pass='". $this->Password ."',tipoMembresia='". $this->TipoMembresia ."',metodo_pago='". $this->MetodoPago ."' WHERE IdUsuarios = '". $this->IdUsuarios ."'";
            $resp = parent::nonQuery( $query );
            if( $resp >= 1 ){
                return $resp;
            } else {
                return 0;
            }
        }

        public function delete( $json ){
            $_respuestas = new respuestas;
            $datos = json_decode( $json, true );
            if( !isset($datos['IdUsuarios']) ){
                return $_respuestas->error_400();
            } else {
                $this->IdUsuarios = $datos['IdUsuarios'];
                $resp = $this->eliminarPelicula();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "usuarioID" => $this->IdUsuarios
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function eliminarPelicula(){
            $query = "DELETE FROM ". $this->tabla ." WHERE IdUsuarios = '". $this->IdUsuarios ."'";
            $resp = parent::nonQuery( $query );
            if( $resp >= 1 ){
                return $resp;
            } else {
                return 0;
            }
        }

    }
?>