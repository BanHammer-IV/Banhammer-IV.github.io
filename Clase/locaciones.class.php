<?php
    require_once "conexion/conexion.php";
    require_once "respuestas.class.php";

    class locacion extends conexion{
        private $tabla = "locaciones";
        private $IdLocacion = "";
        private $Direccion = "";
        private $Apertura = "";
        private $Cierre = "";
        private $CantidadSalas = "";
        private $Peliculas = "";


        public function listaLocacion( $pagina = 1 ){
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

        public function obtenerLocacion( $id ){
            $query = "SELECT * FROM ". $this->tabla ." WHERE IdLocacion = $id";
            return parent::obtenerDatos( $query );
        }

        public function post( $json ){
            $_respuestas = new respuestas;
            $datos = json_decode( $json, true );
            if( !isset($datos['Direccion']) || !isset($datos['Apertura']) || !isset($datos['Cierre']) || !isset($datos['CantidadSalas']) || !isset($datos['Peliculas']) ){
                return $_respuestas->error_400();
            } else {
                if( isset( $datos[ 'IdLocacion' ] ) ){ $this->IdLocacion = $datos[ 'IdLocacion' ]; }
                $this->Direccion = $datos['Direccion'];
                $this->Apertura = $datos['Apertura'];
                $this->Cierre = $datos['Cierre'];
                $this->CantidadSalas = $datos['CantidadSalas'];
                $this->Peliculas = $datos['Peliculas'];

                $resp = $this->insertarLocacion();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "locacionesID" => $resp
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function insertarLocacion(){
            $query = "INSERT INTO ". $this->tabla ."(IdLocacion, Direccion, Apertura, Cierre, CantidadSalas, Peliculas ) 
                      VALUES ('". $this->IdLocacion ."', '". $this->Direccion ."','". $this->Apertura ."','". $this->Cierre ."','". $this->CantidadSalas ."', '". $this->Peliculas ."')";
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
            if( !isset($datos['IdLocacion']) ){
                return $_respuestas->error_400();
            } else {
                $this->IdLocacion = $datos['IdLocacion'];
                if( isset( $datos[ 'Direccion' ] ) ){ $this->Direccion = $datos[ 'Direccion' ]; }
                if( isset( $datos[ 'Apertura' ] ) ){ $this->Apertura = $datos[ 'Apertura' ]; }
                if( isset( $datos[ 'Cierre' ] ) ){ $this->Cierre = $datos[ 'Cierre' ]; }
                if( isset( $datos[ 'CantidadSalas' ] ) ){ $this->CantidadSalas = $datos[ 'CantidadSalas' ]; }
                if( isset( $datos[ 'Peliculas' ] ) ){ $this->Peliculas = $datos[ 'Peliculas' ]; }
                
                $resp = $this->modificarLocacions();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "locacionesID" => $this->IdLocacion
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function modificarLocacions(){
            $query = "UPDATE ". $this->tabla ." SET IdLocacion='". $this->IdLocacion ."',Direccion='". $this->Direccion ."',Apertura='". $this->Apertura ."',Cierre='". $this->Cierre ."',CantidadSalas='". $this->CantidadSalas ."',Peliculas='". $this->Peliculas ."' WHERE IdLocacion = '". $this->IdLocacion ."'";
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
            if( !isset($datos['IdLocacion']) ){
                return $_respuestas->error_400();
            } else {
                $this->IdLocacion = $datos['IdLocacion'];
                $resp = $this->eliminarLocacion();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "locacionesID" => $this->IdLocacion
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function eliminarLocacion(){
            $query = "DELETE FROM ". $this->tabla ." WHERE IdLocacion = '". $this->IdLocacion ."'";
            $resp = parent::nonQuery( $query );
            if( $resp >= 1 ){
                return $resp;
            } else {
                return 0;
            }
        }

    }
?>