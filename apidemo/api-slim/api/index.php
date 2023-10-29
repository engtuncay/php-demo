<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, PATCH, DELETE');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Authorization, Content-Type, x-xsrf-token, x_csrftoken, Cache-Control, X-Requested-With');

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';
require 'MolMikroService.php';

$app = AppFactory::create();

$app->setBasePath("/api"); // /myapp/api is the api folder (http://domain/myapp/api)

$app->addRoutingMiddleware();
//$app->add(new BasePathMiddleware($app));

// hata middleware en son eklenir

$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->get('', function (Request $request, Response $response) {
  $response->getBody()->write('Ozpas Api Php...');
  return $response;
});

$app->get('/', function (Request $request, Response $response) {
  $response->getBody()->write('Ozpas Api Php');
  return $response;
});

$app->get('/hello', function (Request $request, Response $response) {
  $response->getBody()->write('Hello World!');
  return $response;
});

$app->post('/mikro/{action}', function (Request $request, Response $response, array $args) {
  $action = $args['action'];
  //$response->getBody()->write("Hello, $action");
  $allPostPutVars = $request->getParsedBody();
  $response->getBody()->write(MolMikroService::request($action, $allPostPutVars));
  $response->withHeader('Access-Control-Allow-Origin', '*');
  return $response;
});

$app->run();

// use Psr\Http\Message\ResponseInterface as Response;
// use Psr\Http\Message\ServerRequestInterface as Request;
// use Slim\Factory\AppFactory;

// // use Psr\Http\Server\MiddlewareInterface;
// // use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

// // class JsonBodyParserMiddleware implements MiddlewareInterface
// // {
// //   public function process(Request $request, RequestHandler $handler): Response
// //   {
// //     $contentType = $request->getHeaderLine('Content-Type');

// //     if (strstr($contentType, 'application/json')) {
// //       $contents = json_decode(file_get_contents('php://input'), true);
// //       if (json_last_error() === JSON_ERROR_NONE) {
// //         $request = $request->withParsedBody($contents);
// //       }
// //     }

// //     return $handler->handle($request);
// //   }
// // }

// $app = AppFactory::create();

// $app->addBodyParsingMiddleware();

// $app->post('/', function (Request $request, Response $response, $args) {
//   $response->getBody()->write("Hello world!");
//   $allPostPutVars = $request->getParsedBody();

//   $response->getBody()->write(json_encode($allPostPutVars));
//   // foreach ($allPostPutVars as $key => $param) {
//   //POST or PUT parameters list
//   // }
//   return $response;
// });

// // If you are adding the pre-packaged ErrorMiddleware set `displayErrorDetails` to `false`
// $app->addErrorMiddleware(false, true, true);

// $app->run();