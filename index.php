<?php
// Data Dummy Array
$data_hewan = [
    ["idHewan" => 1, "nama" => "Miko", "jenis" => "Kucing", "ras" => "Persia", "umur" => "1 bulan"],
    ["idHewan" => 2, "nama" => "Bruno", "jenis" => "Anjing", "ras" => "Bulldog", "umur" => "3 bulan"],
    ["idHewan" => 3, "nama" => "Luna", "jenis" => "Kucing", "ras" => "Anggora", "umur" => "2 bulan"],
];

$data_adopter = [
    ["idAdopter" => 1, "nama" => "Budi Santoso", "alamat" => "Jl. Merdeka No. 10", "nomorTelepon" => "08123456789", "email" => "budi@email.com"],
    ["idAdopter" => 2, "nama" => "Siti Aminah", "alamat" => "Jl. Sudirman No. 5", "nomorTelepon" => "08987654321", "email" => "siti@email.com"],
];

$message_hewan = "";
$class_hewan = "";
$message_adopter = "";
$class_adopter = "";

// Proses form hewan
if(isset($_POST["submit_hewan"])){
    $idHewan = count($data_hewan) + 1;
    $nama = $_POST["nama_hewan"];
    $jenis = $_POST["jenis"];
    $ras = $_POST["ras"];
    $umur = $_POST["umur"];
    
    $list_nama = [];
    foreach($data_hewan as $hewan){
        $list_nama[] = $hewan["nama"];
    }
    
    if(in_array($nama, $list_nama)){
        $message_hewan = "Nama hewan sudah ada!";
        $class_hewan = "danger";
    }else{
        $data_hewan[] = [
            "idHewan" => $idHewan,
            "nama" => $nama,
            "jenis" => $jenis,
            "ras" => $ras,
            "umur" => $umur
        ];
        $message_hewan = "Data hewan berhasil disimpan!";
        $class_hewan = "success";
    }
}

// Proses form adopter
if(isset($_POST["submit_adopter"])){
    $idAdopter = count($data_adopter) + 1;
    $nama = $_POST["nama_adopter"];
    $alamat = $_POST["alamat"];
    $nomorTelepon = $_POST["nomorTelepon"];
    $email = $_POST["email"];
    
    $list_email = [];
    foreach($data_adopter as $adopter){
        $list_email[] = $adopter["email"];
    }
    
    if(in_array($email, $list_email)){
        $message_adopter = "Email sudah terdaftar!";
        $class_adopter = "danger";
    }else{
        $data_adopter[] = [
            "idAdopter" => $idAdopter,
            "nama" => $nama,
            "alamat" => $alamat,
            "nomorTelepon" => $nomorTelepon,
            "email" => $email
        ];
        $message_adopter = "Data adopter berhasil disimpan!";
        $class_adopter = "success";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Adoption Center | Landing Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>🐾 Animal Adoption Center</h1>
            <p>Temukan teman baru dan berikan mereka rumah yang hangat</p>
        </div>

        <!-- Form Grid -->
        <div class="grid">
            <!-- Form Hewan -->
            <div class="card">
                <h2>🐕 Form Pendaftaran Hewan (028)</h2>
                <form method="POST" action="">
                    <div class="form-group">
                        <label>Nama Hewan</label>
                        <input type="text" name="nama_hewan" required placeholder="Contoh: Miko">
                    </div>
                    <div class="form-group">
                        <label>Jenis Hewan</label>
                        <select name="jenis" required>
                            <option value="">Pilih Jenis</option>
                            <option value="Kucing">Kucing</option>
                            <option value="Anjing">Anjing</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ras</label>
                        <input type="text" name="ras" required placeholder="Contoh: Persia">
                    </div>
                    <div class="form-group">
                        <label>Umur</label>
                        <input type="text" name="umur" required placeholder="Contoh: 2 bulan">
                    </div>
                    <button type="submit" name="submit_hewan">Daftarkan Hewan</button>
                </form>
                <?php if($message_hewan): ?>
                    <div class="alert <?php echo $class_hewan; ?>">
                        <?php echo $message_hewan; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Form Adopter -->
            <div class="card">
                <h2>👤 Form Pendaftaran Adopter (026) </h2>
                <form method="POST" action="">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_adopter" required placeholder="Contoh: Budi Santoso">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" required placeholder="Contoh: Jl. Merdeka No. 10">
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="tel" name="nomorTelepon" required placeholder="Contoh: 08123456789">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" required placeholder="Contoh: email@example.com">
                    </div>
                    <button type="submit" name="submit_adopter">Daftar Sebagai Adopter</button>
                </form>
                <?php if($message_adopter): ?>
                    <div class="alert <?php echo $class_adopter; ?>">
                        <?php echo $message_adopter; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Data Tables -->
        <div class="data-section">
            <h3>📋 Daftar Hewan yang Tersedia</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Ras</th>
                        <th>Umur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_hewan as $hewan): ?>
                    <tr>
                        <td><?php echo $hewan['idHewan']; ?></td>
                        <td><?php echo htmlspecialchars($hewan['nama']); ?></td>
                        <td><?php echo htmlspecialchars($hewan['jenis']); ?></td>
                        <td><?php echo htmlspecialchars($hewan['ras']); ?></td>
                        <td><?php echo htmlspecialchars($hewan['umur']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="data-section">
            <h3>👥 Daftar Adopter</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_adopter as $adopter): ?>
                    <tr>
                        <td><?php echo $adopter['idAdopter']; ?></td>
                        <td><?php echo htmlspecialchars($adopter['nama']); ?></td>
                        <td><?php echo htmlspecialchars($adopter['alamat']); ?></td>
                        <td><?php echo htmlspecialchars($adopter['nomorTelepon']); ?></td>
                        <td><?php echo htmlspecialchars($adopter['email']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>