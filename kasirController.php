<?php
include 'koneksi.php';

if (isset($_POST['new_order'])) {

    $no_meja = $_POST['tableNumber'];
    $pesanan = $_POST['items'];
    $intruksi = $_POST['specialInstructions'];

    $sql_create = "INSERT INTO orders (no_meja, pesanan, intruksi) VALUES ('$no_meja', '$pesanan', '$intruksi')";
    if ($koneksi->query($sql_create) === TRUE) {
        $response = array(
            'success' => true,
            'message' => 'New order created'
        );
    } else {
        $response = array(
            'success' => false,
            'message' => 'Failed create order'
        );
    }

    echo json_encode($response);
}

if (isset($_POST['get_order'])) {
    $sql_read = "SELECT * FROM orders WHERE is_done = 'N'";
    $result = $koneksi->query($sql_read);
    $order = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $order[] = $row;
        }
    }

    $response = array(
        'success' => true,
        'data' => $order,
    );

    echo json_encode($response);
}

if (isset($_POST['order_done'])) {
    $id = $_POST['id'];
    $sql_update = "UPDATE orders SET is_done = 'Y' WHERE id='$id'";
    if ($koneksi->query($sql_update) === TRUE) {
        $response = array(
            'success' => true,
            'message' => 'Update data successfully'
        );
    } else {
        $response = array(
            'success' => false,
            'message' => "Error updating record: " . $koneksi->error
        );
    }

    echo json_encode($response);
}
