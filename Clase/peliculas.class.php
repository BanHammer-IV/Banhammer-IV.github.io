<?php
    require_once "conexion/conexion.php";
    require_once "respuestas.class.php";

    class peliculas extends conexion{
        private $tabla = "peliculas";
        private $idPelicula = "";
        private $nombre = "";
        private $descripcion = "";
        private $director = "";
        private $clasificacion = "";
        private $genero = "";
        private $salas = "";
        private $horario = "";
        private $estreno = "0000-00-00";
        private $idiomas = "";
        private $trailer = "";

        public function listaPeliculas( $pagina ){
            $inicio = 0;
            $cantidad = 4;
            if( $pagina > 1 ){
                $inicio = ( $cantidad * ($pagina - 1 ) );
                $cantidad = $cantidad * $pagina;
            }

            $query = "SELECT * FROM ". $this->tabla ." limit $inicio, $cantidad";
            //print_r( $query );
            $datos = parent::obtenerDatos( $query );

            return ( $datos );
        }

        public function obtenerPelicula( $id ){
            $query = "SELECT * FROM ". $this->tabla ." WHERE idPelicula = $id";
            return parent::obtenerDatos( $query );
        }

        public function post( $json ){
            $_respuestas = new respuestas;
            $datos = json_decode( $json, true );
            if( !isset($datos['nombre']) || !isset($datos['director']) || !isset($datos['genero']) ){
                return $_respuestas->error_400();
            } else {
                $this->nombre = $datos['nombre'];
                $this->director = $datos['director'];
                $this->genero = $datos['genero'];
                if( isset( $datos[ 'clasificacion' ] ) ){ $this->clasificacion = $datos[ 'clasificacion' ]; }
                if( isset( $datos[ 'descripcion' ] ) ){ $this->descripcion = $datos[ 'descripcion' ]; }
                if( isset( $datos[ 'salas' ] ) ){ $this->salas = $datos[ 'salas' ]; }
                if( isset( $datos[ 'horario' ] ) ){ $this->horario = $datos[ 'horario' ]; }
                if( isset( $datos[ 'estreno' ] ) ){ $this->estreno = $datos[ 'estreno' ]; }
                if( isset( $datos[ 'idiomas' ] ) ){ $this->idiomas = $datos[ 'idiomas' ]; }
                if( isset( $datos[ 'trailer' ] ) ){ $this->trailer = $datos[ 'trailer' ]; }
                if( isset( $datos[ 'idPelicula' ] ) ){ $this->idPelicula = $datos[ 'idPelicula' ]; }
                $resp = $this->insertarPelicula();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "peliculaID" => $resp
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function insertarPelicula(){
            $query = "INSERT INTO ". $this->tabla ." ( nombre, idPelicula, descripcion, director, clasificacion, genero, salas, horario, estreno, idiomas, trailer ) 
                     VALUES (' ". $this->nombre ." ',' ". $this->idPelicula ." ',' ". $this->descripcion ." ',' ". $this->director ." ',' ". $this->clasificacion ." ',' ". $this->genero ." ',' ". $this->salas ." ',' ". $this->horario ." ',' ". $this->estreno ." ',' ". $this->idiomas ." ',' ". $this->trailer ." ')";
            
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
            if( !isset($datos['idPelicula']) ){
                return $_respuestas->error_400();
            } else {
                $this->idPelicula = $datos['idPelicula'];
                if( isset( $datos[ 'nombre' ] ) ){ $this->nombre = $datos[ 'nombre' ]; }
                if( isset( $datos[ 'descripcion' ] ) ){ $this->descripcion = $datos[ 'descripcion' ]; }
                if( isset( $datos[ 'director' ] ) ){ $this->director = $datos[ 'director' ]; }
                if( isset( $datos[ 'clasificacion' ] ) ){ $this->clasificacion = $datos[ 'clasificacion' ]; }
                if( isset( $datos[ 'genero' ] ) ){ $this->genero = $datos[ 'genero' ]; }
                if( isset( $datos[ 'salas' ] ) ){ $this->salas = $datos[ 'salas' ]; }
                if( isset( $datos[ 'horario' ] ) ){ $this->horario = $datos[ 'horario' ]; }
                if( isset( $datos[ 'estreno' ] ) ){ $this->estreno = $datos[ 'estreno' ]; }
                if( isset( $datos[ 'idiomas' ] ) ){ $this->idiomas = $datos[ 'idiomas' ]; }
                if( isset( $datos[ 'trailer' ] ) ){ $this->trailer = $datos[ 'trailer' ]; }
                $resp = $this->modificarPelicula();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "peliculaID" => $this->idPelicula
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function modificarPelicula(){
            $query = "UPDATE ". $this->tabla . " SET nombre= '". $this->nombre ."', descripcion= '". $this->descripcion ."', director = '". $this->director ."', clasificacion = '". $this->clasificacion ."', genero = '". $this->genero ."', salas = '". $this->salas ."', horario = '". $this->horario ."', estreno = '". $this->estreno ."', idiomas = '". $this->idiomas ."',trailer = '". $this->trailer ."' WHERE idPelicula = '". $this->idPelicula ."'";
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
            if( !isset($datos['idPelicula']) ){
                return $_respuestas->error_400();
            } else {
                $this->idPelicula = $datos['idPelicula'];
                $resp = $this->eliminarPelicula();
                if( $resp ){
                    $respuesta = $_respuestas->response;
                    $respuesta["result"] = array(
                        "peliculaID" => $this->idPelicula
                    );
                    return $respuesta;
                } else {
                    return $_respuestas->error_500();
                }
            }
        }

        private function eliminarPelicula(){
            $query = "DELETE FROM ". $this->tabla ." WHERE idPelicula = ". $this->idPelicula ." ";
            $resp = parent::nonQuery( $query );
            if( $resp >= 1 ){
                return $resp;
            } else {
                return 0;
            }
        }

    }
?>