<?php
include "../../config/koneksi.php";
include "../../config/fungsi.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Ambil data dari POST
$idUser = mysqli_real_escape_string($koneksi, $_POST['idUser']); // Sanitasi input
$idppak = mysqli_real_escape_string($koneksi, $_POST['idppak']); // Sanitasi input

$sql_ = mysqli_query($koneksi, "SELECT * FROM ppak WHERE id='$idppak'");
$data_ = mysqli_fetch_array($sql_);
$kode_ppak = $data_['kode'];

$sql = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE nik='$idUser'");
$data = mysqli_fetch_array($sql);

// Update status ppak
$sql1 = mysqli_query($koneksi, "UPDATE ppak 
                                SET status = 1
                                WHERE id = '$idppak'");

if ($sql1) {
    // Kirim email setelah berhasil update dan insert
    $tujuan_email = "hris@mitrasuzuki.com"; // Ganti sesuai kebutuhan
    $judul_email = "HRIS INFO PERMOHONONAN ATK (PPAK)";
    $link = "http://localhost/hris_ver_0/?p=ppak&aksi=view_admin&idppak=$idppak";

    $emailResult = kirimEmail($tujuan_email, $judul_email, $link);
    if ($emailResult === true) {
        echo "success";
    } else {
        echo "Update berhasil, tapi gagal kirim email: " . $emailResult;
    }
} else {
    echo "Gagal update status ppak.";
}

// Fungsi kirim email
function kirimEmail($to, $subject, $link)
{
    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'byuqu97@gmail.com'; // Email pengirim
        $mail->Password   = 'xpqgmgycnbalaqkh';  // App password, bukan password asli
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->setFrom('hris@mitrasuzuki.com', 'SYSTEM ADMINISTRATOR MITRA');
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = "
            <html>
                <head>
                    <style>
                        body { font-family: Arial, sans-serif; }
                        .header { background-color: #007bff; color: white; padding: 20px; text-align: center; font-size: 24px; }
                        .main { padding: 30px; text-align: center; }
                        .main a { font-size: 18px; color: #dc3545; text-decoration: none; font-weight: bold; }
                        .footer { text-align: center; font-size: 12px; color: #aaa; margin-top: 30px; }
                    </style>
                </head>
                <body>
                    <div class='header'>PT. MITRA MEGAH PROFITAMAS</div>
                    <div class='main'>
                        <p>Permohonan ATK telah diajukan, silakan verifikasi melalui link berikut:</p>
                        <p><a href='$link'>Klik di sini untuk verifikasi</a></p>
                    </div>
                    <div class='footer'>Copyright &copy; 2025 IT Mitra Suzuki</div>
                </body>
            </html>
        ";

        return $mail->send();
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
}
?> 