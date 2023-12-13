<?php
    require_once "conexion/conexion.php";
    require_once "respuestas.class.php";

    class ventas extends conexion{
        private $tabla = "ventas";
        private $IdVentas = "";
        private $CorreoElectronico = "";
        private $CodigoPostal = "";
        private $NumeroTarjeta = "";
        private $nombre = "";


        public function listaVentas( $pagina = 1 ){
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

        public function obtenerVentas( $id ){
            $query = "SELECT * FROM ". $this->tabla ." WHERE IdVentas = $id";
            return parent::obtenerDatos( $query );
        }

        public function post( $json ){
            $_respuestas = new respuestas;
            $datos = json_decode( $json, true );
            if( !isset($datos['CorreoElectronico']) || !isset($datos['CodigoPostal']) || !isset($datos['NumeroTarjeta']) || !isset($datos['Nombre']) ){
                return $_respuestas->error_400();
            } else {
                if( isset( $datos[ 'IdVentas' ] ) ){ $this->IdVentas = $datos[ 'IdVentas' ]; }
                $this->CorreoElectronico = $datos['CorreoElectronico'];
                $this->CodigoPostal = $datos['CodigoPostal'];
                $this->NumeroTarjeta = $datos['NumeroTarjeta'];
                $this->Nombre = $datos['Nombre'];

                $resp = $this->insertarVenta();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "ventasID" => $resp
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function insertarVenta(){
            $query = "INSERT INTO ". $this->tabla ."(IdVentas, CorreoElectronico, CodigoPostal, NumeroTarjeta, Nombre) 
                        VALUES ('". $this->IdVentas ."','". $this->CorreoElectronico ."','". $this-> CodigoPostal."','". $this->NumeroTarjeta ."','". $this->Nombre ."')";
            
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
            if( !isset($datos['IdVentas']) ){
                return $_respuestas->error_400();
            } else {
                $this->IdVentas = $datos['IdVentas'];
                if( isset( $datos[ 'CorreoElectronico' ] ) ){ $this->CorreoElectronico = $datos[ 'CorreoElectronico' ]; }
                if( isset( $datos[ 'CodigoPostal' ] ) ){ $this->CodigoPostal = $datos[ 'CodigoPostal' ]; }
                if( isset( $datos[ 'NumeroTarjeta' ] ) ){ $this->NumeroTarjeta = $datos[ 'NumeroTarjeta' ]; }
                if( isset( $datos[ 'Nombre' ] ) ){ $this->Nombre = $datos[ 'Nombre' ]; }
                
                $resp = $this->modificarVentas();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "ventasID" => $this->IdVentas
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function modificarVentas(){
            $query = "UPDATE ". $this->tabla ." SET CorreoElectronico='". $this->CorreoElectronico ."',CodigoPostal='". $this->CodigoPostal ."',NumeroTarjeta='". $this->NumeroTarjeta ."',Nombre='". $this->Nombre ."' WHERE IdVentas = '". $this->IdVentas ."' ";
            print_r( $query );
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
            if( !isset($datos['IdVentas']) ){
                return $_respuestas->error_400();
            } else {
                $this->IdVentas = $datos['IdVentas'];
                $resp = $this->eliminarPelicula();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "ventasID" => $this->IdVentas
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function eliminarPelicula(){
            $query = "DELETE FROM ". $this->tabla ." WHERE IdVentas = '". $this->IdVentas ."'";
            $resp = parent::nonQuery( $query );
            if( $resp >= 1 ){
                return $resp;
            } else {
                return 0;
            }
        }

    }
?>