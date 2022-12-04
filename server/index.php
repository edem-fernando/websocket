<?php

require __DIR__ . '/../vendor/autoload.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Server\Socket;

$app = new Ratchet\App('localhost', 8080);

// Configura a rota de envio de mensagem
$app->route('/chat', new Socket(), array('*'));

// Configura a rota para receber mensagens
$app->route('/echo', new Ratchet\Server\EchoServer, array('*'));
$app->run();
