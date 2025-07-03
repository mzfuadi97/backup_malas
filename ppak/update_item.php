<?php
include_once '../../config/koneksi.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $field = $_POST['field'] ?? '';
    $value = $_POST['value'] ?? '';

    // Validasi input
    if (empty($id) || empty($field)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Data tidak lengkap'
        ]);
        exit;
    }

    // Validasi field yang diizinkan
    $allowed_fields = ['qty'];
    if (!in_array($field, $allowed_fields)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Field tidak diizinkan'
        ]);
        exit;
    }

    // Update data
    $sql_update = mysqli_query($koneksi, "UPDATE ppak_detail SET $field = '$value' WHERE id = '$id'");

    if ($sql_update) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Data berhasil diupdate'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Gagal mengupdate data: ' . mysqli_error($koneksi)
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Method tidak diizinkan'
    ]);
}
?> 