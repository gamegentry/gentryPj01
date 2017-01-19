<?php
  use Ratchet\MessageComponentInterface;
  use Ratchet\ConnectionInterface;
  use Ratchet\Server\IoServer;
  use Ratchet\WebSocket\WsServer;
  use Ratchet\Http\HttpServer;

  require '/usr/local/bin/vendor/autoload.php';

  /**
  * chat.php
  * Send any incoming messages to all connected clients (except sender)
  */
  class Chat implements MessageComponentInterface {

      protected $clients;

      public function __construct() {
          $this->clients = new \SplObjectStorage;
      }

      public function onOpen(ConnectionInterface $conn) {
          $this->clients->attach($conn);
      }

      public function onMessage(ConnectionInterface $from, $msg) {
          foreach ($this->clients as $client) {
              if ($from != $client) {
                  $client->send($msg);
              }
          }
      }

      public function onClose(ConnectionInterface $conn) {
          $this->clients->detach($conn);
      }

      public function onError(ConnectionInterface $conn, \Exception $e) {
          $conn->close();
      }
  }

  // Run the server application through the WebSocket protocol on port 8080
  $server = IoServer::factory(new HttpServer(new WsServer(new Chat())), 9000);
  $server->run();