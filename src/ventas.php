<?php 
    require_once "../Clase/respuestas.class.php";
    require_once "../Clase/ventas.class.php";

    $_respuestas = new respuestas;
    $idVentas = new ventas;

    if( $_SERVER['REQUEST_METHOD'] == 'GET'){
        if( isset( $_GET["page"] ) ){
            $pagina = $_GET["page"];
            $listaVentas = $idVentas->listaVentas( $pagina );
            header('Content-Type: application/json');
            echo json_encode( $listaVenta );
            http_response_code( 200 );

        } else if( isset($_GET['id']) ){
            $ventasID = $_GET['id'];
            $datosVentas = $idVentas->obtenerVentas( $ventasID );
            header('Content-Type: application/json');
            echo json_encode( $datosVentas );
            http_response_code( 200 );
        }
    } else if( $_SERVER['REQUEST_METHOD'] == 'POST'){
        //Recibimos los datos enviados
        $postBody = file_get_contents( "php://input" );

        //enviarmos los datos al manejador
        $datosArray = $idVentas->post( $postBody );
        
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
        $datosArray = $idVentas->put( $postBody );
        
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
        $datosArray = $idVentas->delete( $postBody );
        
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