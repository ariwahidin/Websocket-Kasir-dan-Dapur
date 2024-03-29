<?php
// Include library Ratchet
require 'vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\WebSocket\WsServer;
use Ratchet\Http\HttpServer;
use Ratchet\Http\HttpServerInterface;
use Ratchet\Server\IoServer;

// Definisikan kelas Chat
class KitchenChat implements MessageComponentInterface
{
    protected $kasirClients;
    protected $dapurClients;

    public function __construct()
    {
        $this->kasirClients = new \SplObjectStorage;
        $this->dapurClients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        // Tambahkan koneksi klien ke daftar koneksi yang aktif
        if (strpos($conn->httpRequest->getUri()->getPath(), '/kasir') !== false) {
            $this->kasirClients->attach($conn);
            echo "Kasir terhubung ({$conn->resourceId})\n";
        } elseif (strpos($conn->httpRequest->getUri()->getPath(), '/dapur') !== false) {
            $this->dapurClients->attach($conn);
            echo "Dapur terhubung ({$conn->resourceId})\n";
        }
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        // Kirim pesan ke klien yang sesuai
        foreach ($this->kasirClients as $kasirClient) {
            if ($from !== $kasirClient) {
                $kasirClient->send($msg);
            }
        }

        foreach ($this->dapurClients as $dapurClient) {
            if ($from !== $dapurClient) {
                $dapurClient->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        // Hapus koneksi klien dari daftar koneksi yang aktif
        $this->kasirClients->detach($conn);
        $this->dapurClients->detach($conn);
        echo "Klien terputus ({$conn->resourceId})\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "Kesalahan: {$e->getMessage()}\n";
        $conn->close();
    }
}

// Jalankan server WebSocket dengan HTTP
$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new KitchenChat()
        )
    ),
    8000 // Port yang ingin Anda gunakan
);

echo "Server WebSocket berjalan di port 8000...\n";

$server->run();
