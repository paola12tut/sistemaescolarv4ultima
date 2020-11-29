<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as DB;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

// Instantiate app
$app = AppFactory::create();
$app->setBasePath('/sistemaescolarv4/api/index.php');
// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

// Add route callbacks
$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write('Hello World');
    return $response;
});

$app->post('/login/{user}', function (Request $request, Response $response, array $args) {

    //$data = json_decode($request->getBody()->getContents(), false);
    
   /* $user = DB::table('usuarios')
    ->leftJoin('perfiles','usuarios.idperfil','=','perfiles.idperfil')
    ->where('usuarios.nombreusuario',$args['user'])
    ->first();   
*/
    $msg = new stdClass();
    $msg->aceptado = true;
/*
     if ($user->password == $data->password){
         $msg->aceptado = true;
         $msg->nombreperfil=$user->nombreperfil;
    
     }else {
        $msg->aceptado = false; 
     }
*/
    $response->getBody()->write(json_decode($msg));
    return $response;
});
// Run application
$app->run();