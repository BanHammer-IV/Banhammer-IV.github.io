<?php 
    require_once "../Clase/respuestas.class.php";
    require_once "../Clase/empleados.class.php";

    $_respuestas = new respuestas;
    $idEmpleados = new empleado;

    if( $_SERVER['REQUEST_METHOD'] == 'GET'){
        if( isset( $_GET["page"] ) ){
            $pagina = $_GET["page"];
            $listaUsuarios = $idEmpleados->listaUsuarios( $pagina );
            header('Content-Type: application/json');
            echo json_encode( $listaEmpleados );
            http_response_code( 200 );

        } else if( isset($_GET['id']) ){
            $empleadoID = $_GET['id'];
            $datosEmpleados = $idEmpleados->obtenerEmpleados( $empleadoID );
            header('Content-Type: application/json');
            echo json_encode( $datosEmpleados );
            http_response_code( 200 );
        }
    } else if( $_SERVER['REQUEST_METHOD'] == 'POST'){
        //Recibimos los datos enviados
        $postBody = file_get_contents( "php://input" );

        //enviarmos los datos al manejador
        $datosArray = $idEmpleados->post( $postBody );
        
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
        $datosArray = $idEmpleados->put( $postBody );
        
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
        $datosArray = $idEmpleados->delete( $postBody );
        
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