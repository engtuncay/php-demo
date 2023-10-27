<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';

$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->add(new BasePathMiddleware($app));
// hata middleware en son eklenir

$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, true, true);

// $app->post('/', function (Request $request, Response $response) {
//   $response->getBody()->write('Hello World!');
//   $allPostPutVars = $request->getParsedBody();
//   $response->getBody()->write(json_encode($allPostPutVars));
//   return $response;
// });

$app->get('', function (Request $request, Response $response) {
  $response->getBody()->write('Hello World! Root2');
  return $response;
});

$app->get('/', function (Request $request, Response $response) {
  $response->getBody()->write('Hello World! Root');
  return $response;
});

$app->get('/add', function (Request $request, Response $response) {
  $response->getBody()->write('Hello World!');
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