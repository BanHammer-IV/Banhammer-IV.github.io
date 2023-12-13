<?php
    require_once "conexion/conexion.php";
    require_once "respuestas.class.php";

    class empleado extends conexion{
        private $tabla = "empleados";
        private $IdEmpleado = "";
        private $Nombre = "";
        private $Usuario = "";
        private $Password = "";
        private $Puesto = "";


        public function listaEmpleados( $pagina = 1 ){
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

        public function obtenerEmpleados( $id ){
            $query = "SELECT * FROM ". $this->tabla ." WHERE IdEmpleado = $id";
            return parent::obtenerDatos( $query );
        }

        public function post( $json ){
            $_respuestas = new respuestas;
            $datos = json_decode( $json, true );
            if( !isset($datos['Nombre']) || !isset($datos['Usuario']) || !isset($datos['Password']) || !isset($datos['Puesto']) ){
                return $_respuestas->error_400();
            } else {
                if( isset( $datos[ 'IdEmpleado' ] ) ){ $this->IdEmpleado = $datos[ 'IdEmpleado' ]; }
                $this->Nombre = $datos['Nombre'];
                $this->Usuario = $datos['Usuario'];
                $this->Password = $datos['Password'];
                $this->Puesto = $datos['Puesto'];

                $resp = $this->insertarUsuario();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "empleadosID" => $resp
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function insertarUsuario(){
            $query = "INSERT INTO ". $this->tabla ."(IdEmpleado, Nombre, Usuario, Password, Puesto) 
                      VALUES ('". $this->IdEmpleado ."', '". $this->Nombre ."','". $this->Usuario ."','". $this->Password ."','". $this->Puesto ."')";
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
            if( !isset($datos['IdEmpleado']) ){
                return $_respuestas->error_400();
            } else {
                $this->IdEmpleado = $datos['IdEmpleado'];
                if( isset( $datos[ 'Nombre' ] ) ){ $this->Nombre = $datos[ 'Nombre' ]; }
                if( isset( $datos[ 'Usuario' ] ) ){ $this->Usuario = $datos[ 'Usuario' ]; }
                if( isset( $datos[ 'Password' ] ) ){ $this->Password = $datos[ 'Password' ]; }
                if( isset( $datos[ 'Puesto' ] ) ){ $this->Puesto = $datos[ 'Puesto' ]; }
                
                $resp = $this->modificarEmpleados();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "empleadosID" => $this->IdEmpleado
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function modificarEmpleados(){
            $query = "UPDATE ". $this->tabla ." SET IdEmpleado='". $this->IdEmpleado ."',Nombre='". $this->Nombre ."',Usuario='". $this->Usuario ."',Password='". $this->Password ."',Puesto='". $this->Puesto ."' WHERE IdEmpleado = '". $this->IdEmpleado ."'";
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
            if( !isset($datos['IdEmpleado']) ){
                return $_respuestas->error_400();
            } else {
                $this->IdEmpleado = $datos['IdEmpleado'];
                $resp = $this->eliminarEmpleado();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "empleadosID" => $this->IdEmpleado
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function eliminarEmpleado(){
            $query = "DELETE FROM ". $this->tabla ." WHERE IdEmpleado = '". $this->IdEmpleado ."'";
            $resp = parent::nonQuery( $query );
            if( $resp >= 1 ){
                return $resp;
            } else {
                return 0;
            }
        }

    }
?>