<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

/* Conteiner dependecy injection */
class Servico{

}

/*Container Pimple */
$container = $app->getContainer();
$container['servico'] = function(){
   return new Servico;
};

$app->get('/servico', function(Request $request, Response $response){

   $servico = $this->get('servico');
   var_dump( $servico );

});

/* Controllers como serviço */
$app->get('/usuario', '\MyApp\controllers\Home:index');

/* Padrao PSR7 
$app->get('/postagens', function(Request $request, Response $response){
   
   /* Escreve no corpo da resposta utilizando o padrao PSR7
   $response->getBody()->write("Listagem de postagens");
   
   return $response;
});


/*
Tipos de requisicoes ou Verbos HTTP

get    -> Recuperar recursos do servidor (Select)
post   -> Criar dado no servidor         (Insert)
put    -> Atualizar dados no servidor    (Update)
delete -> Deletar dados do servidor      (Delete)



$app->post('/usuarios/adiciona', function (Request $request, Response $response) {

   //Recupera post ($_POST)
   $post = $request->getParsedBody();
   $nome = $post['nome'];
   $email = $post['email'];

   /* Salvar no BD com INSERT INTO ....

   return $response->getBody()->write("Sucesso");
});

$app->put('/usuarios/atualiza', function (Request $request, Response $response) {

   //Recupera post ($_POST)
   $post = $request->getParsedBody();
   $id = $post['id'];
   $nome = $post['nome'];
   $email = $post['email'];

   /* Atualizar no BD com UPDATE ....

   return $response->getBody()->write("Sucesso ao atualizar: " . $id);
});

$app->delete('/usuarios/remove/{id}', function (Request $request, Response $response) {

   $id = $request->getAttribute('id');

   /* Remove no BD com DELETE ....

   return $response->getBody()->write("Sucesso ao deletar: " . $id);
});


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
*/

$app->run();
