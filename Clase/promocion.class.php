<?php
    require_once "conexion/conexion.php";
    require_once "respuestas.class.php";

    class promocion extends conexion{
        private $tabla = "promociones";
        private $IdPromocion = "";
        private $Nombre = "";
        private $InicioPromo = "";
        private $FinPromo = "";
        private $Precio = "";
        private $Contenido = "";
        private $Imagen = "";


        public function listaPromociones( $pagina = 1 ){
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

        public function obtenerPromociones( $id ){
            $query = "SELECT * FROM ". $this->tabla ." WHERE IdPromocion = $id";
            return parent::obtenerDatos( $query );
        }

        public function post( $json ){
            $_respuestas = new respuestas;
            $datos = json_decode( $json, true );
            if( !isset($datos['Nombre']) || !isset($datos['InicioPromo']) || !isset($datos['FinPromo']) || !isset($datos['Precio']) || !isset($datos['Contenido']) || !isset($datos['Imagen']) ){
                return $_respuestas->error_400();
            } else {
                if( isset( $datos[ 'IdPromocion' ] ) ){ $this->IdPromocion = $datos[ 'IdPromocion' ]; }
                $this->Nombre = $datos['Nombre'];
                $this->InicioPromo = $datos['InicioPromo'];
                $this->FinPromo = $datos['FinPromo'];
                $this->Precio = $datos['Precio'];
                $this->Contenido = $datos['Contenido'];
                $this->Imagen = $datos['Imagen'];

                $resp = $this->insertarUsuario();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "promocionID" => $resp
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function insertarUsuario(){
            $query = "INSERT INTO ". $this->tabla ."(IdPromocion, Nombre, InicioPromo, FinPromo, Precio, Contenido, Imagen) 
                      VALUES ('". $this->IdPromocion ."', '". $this->Nombre ."','". $this->InicioPromo ."','". $this->FinPromo ."','". $this->Precio ."','". $this->Contenido ."','". $this->Imagen ."')";
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
            if( !isset($datos['IdPromocion']) ){
                return $_respuestas->error_400();
            } else {
                $this->IdPromocion = $datos['IdPromocion'];
                if( isset( $datos[ 'Nombre' ] ) ){ $this->Nombre = $datos[ 'Nombre' ]; }
                if( isset( $datos[ 'InicioPromo' ] ) ){ $this->InicioPromo = $datos[ 'InicioPromo' ]; }
                if( isset( $datos[ 'FinPromo' ] ) ){ $this->FinPromo = $datos[ 'FinPromo' ]; }
                if( isset( $datos[ 'Precio' ] ) ){ $this->Precio = $datos[ 'Precio' ]; }
                if( isset( $datos[ 'Contenido' ] ) ){ $this->Contenido = $datos[ 'Contenido' ]; }
                if( isset( $datos[ 'Imagen' ] ) ){ $this->Imagen = $datos[ 'Imagen' ]; }
                
                $resp = $this->modificarPromociones();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "promocionID" => $this->IdPromocion
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function modificarPromociones(){
            $query = "UPDATE ". $this->tabla ." SET IdPromocion='". $this->IdPromocion ."',Nombre='". $this->Nombre ."',InicioPromo='". $this->InicioPromo ."',FinPromo='". $this->FinPromo ."',Precio='". $this->Precio ."',Contenido='". $this->Contenido ."',Imagen='". $this->Imagen ."' WHERE IdPromocion = '". $this->IdPromocion ."'";
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
            if( !isset($datos['IdPromocion']) ){
                return $_respuestas->error_400();
            } else {
                $this->IdPromocion = $datos['IdPromocion'];
                $resp = $this->eliminarPelicula();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "promocionID" => $this->IdPromocion
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function eliminarPelicula(){
            $query = "DELETE FROM ". $this->tabla ." WHERE IdPromocion = '". $this->IdPromocion ."'";
            $resp = parent::nonQuery( $query );
            if( $resp >= 1 ){
                return $resp;
            } else {
                return 0;
            }
        }

    }
?>