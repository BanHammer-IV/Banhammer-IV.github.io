<?php 
    require_once "../Clase/respuestas.class.php";
    require_once "../Clase/usuarios.class.php";

    $_respuestas = new respuestas;
    $idUsuarios = new usuario;

    if( $_SERVER['REQUEST_METHOD'] == 'GET'){
        if( isset( $_GET["page"] ) ){
            $pagina = $_GET["page"];
            $listaUsuarios = $idUsuarios->listaUsuarios( $pagina );
            header('Content-Type: application/json');
            echo json_encode( $listaUsuarios );
            http_response_code( 200 );

        } else if( isset($_GET['id']) ){
            $usuarioID = $_GET['id'];
            $datosUsuarios = $idUsuarios->obtenerUsuarios( $usuarioID );
            header('Content-Type: application/json');
            echo json_encode( $datosUsuarios );
            http_response_code( 200 );
        }
    } else if( $_SERVER['REQUEST_METHOD'] == 'POST'){
        //Recibimos los datos enviados
        $postBody = file_get_contents( "php://input" );

        //enviarmos los datos al manejador
        $datosArray = $idUsuarios->post( $postBody );
        
        //devolvemos una respuesta
        header('Content-Type: aplication/json');
        if( isset( $datosArray["result"]["error_id"] ) ){
            $responseCode = $datosArray["result"]["error_id"];
            http_response_code( $responseCode );
        } else {
            http_response_code( 200 );
        }
        echo json_encode( $datosArray );

    } else if( $_SERVER['REQUEST_METHOD'] == 'PUT'){
        //Recibimos los datos enviados
        $postBody = file_get_contents( "php://input" );
        //enviarmos los datos al manejador
        $datosArray = $idUsuarios->put( $postBody );
        
        //devolvemos una respuesta
        header('Content-Type: aplication/json');
        if( isset( $datosArray["result"]["error_id"] ) ){
            $responseCode = $datosArray["result"]["error_id"];
            http_response_code( $responseCode );
        } else {
            http_response_code( 200 );
        }
        echo json_encode( $datosArray );

    } else if( $_SERVER['REQUEST_METHOD'] == 'DELETE'){
        //Recibimos los datos enviados
        $postBody = file_get_contents( "php://input" );
        //enviarmos los datos al manejador
        $datosArray = $idUsuarios->delete( $postBody );
        
        //devolvemos una respuesta
        header('Content-Type: aplication/json');
        if( isset( $datosArray["result"]["error_id"] ) ){
            $responseCode = $datosArray["result"]["error_id"];
            http_response_code( $responseCode );
        } else {
            http_response_code( 200 );
        }
        echo json_encode( $datosArray );
    } else {
        header('Content-Type: application/json');
        $datosArray = $_respuestas->error_405();
        echo json_encode( $datosArray );
    }
?>