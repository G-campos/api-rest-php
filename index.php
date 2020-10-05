<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

/* Padrao PSR7 */
$app->get('/postagens', function(Request $request, Response $response){

   /* Escreve no corpo da resposta utilizando o padrao PSR7 */
   $response->getBody()->write("Listagem de postagens");

   return $response;
});

$app->run();

/*
Tipos de requisicoes ou Verbos HTTP

get    -> Recuperar recursos do servidor (select)
post   -> Criar dado no servidor (Insert)
put    -> Atualizar dados no servidor (Update)
delete -> Deletar dados do servidor (delete)

*/


/*Placeholders 
$app->get('/postagens2', function () {
   echo "Lista de postagens";
});

/*paramentos obrigatoriso{} ou opcionais[] 
$app->get('/usuarios[/{id}]', function ($request, $response) {
   $id = $request->getAttribute('id');

   echo "Lista de usuarios ou ID: " . $id;
});

$app->get('/postagens[/{ano}[/{mes}]]', function ($request, $response) {

   $ano = $request->getAttribute('ano');
   $mes = $request->getAttribute('mes');

   echo "Lista de postagens Ano:" . $ano . " mes: " . $mes;
});

/*Estrutura de url +dinamica *
$app->get('/lista/{itens:.*}', function ($request, $response) {

   $itens = $request->getAttribute('itens');
   
   var_dump(explode("/", $itens));
});

/* Nomear rotas 
$app->get('/blog/postagens/{id}', function ($request, $response) {
   echo "Listar postagens para um ID ";
})->setName("blog");

$app->get('/meusite', function($request, $response){

   $retorno = $this->get("router")->pathFor("blog", ["id" => "10"] );

   echo $retorno;
});

/* Agrupar rotas
$app->group('/v1', function () {
   
   $this->get('/usuarios', function () {
      echo "Listagem de usuarios";
   });
   
   $this->get('/postagens', function () {
      echo "Listagem de postagens";
   });
});


$app->run();
