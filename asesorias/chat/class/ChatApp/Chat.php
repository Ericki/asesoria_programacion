<?php
namespace ChatApp;



//$link=mysql_connect($host, $usuario, $pass)or die("¡Imposible conectar!");
//mysql_select_db("baseasesorias", $link)or die("Ups!, no se encuentra la BD");

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);    }

    public function onMessage(ConnectionInterface $from, $msg) {
        foreach ($this->clients as $client) {
            if ($from !== $client) {

                $client->send($msg);
                  echo "({$msg})\n";
                  $array = json_decode($msg);
                  print_r($array);

            }
        }
    }

    public function onClose(ConnectionInterface $conn) {

        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
