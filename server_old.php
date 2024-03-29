<?php
// Include library Ratchet
require 'vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\WebSocket\WsServer;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;

// Definisikan kelas Chat
class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Tambahkan koneksi klien ke daftar koneksi yang aktif
        $this->clients->attach($conn);
        echo "Klien terhubung ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        // Kirim pesan ke semua klien yang terhubung
        var_dump($from);
        // echo $msg;   
        foreach ($this->clients as $client) {
            if ($client !== $from) {
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // Hapus koneksi klien dari daftar koneksi yang aktif
        $this->clients->detach($conn);
        echo "Klien terputus ({$conn->resourceId})\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Kesalahan: {$e->getMessage()}\n";
        $conn->close();
    }
}

// Jalankan server WebSocket dengan HTTP
$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Chat()
        )
    ),
    8000 // Port yang ingin Anda gunakan
);

echo "Server WebSocket berjalan di port 8000...\n";

$server->run();
?>
