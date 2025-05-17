<?php
// Cek apakah form dikirim
$pesan = "";
if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $makanan = htmlspecialchars($_POST['makanan']);
    $jumlah = intval($_POST['jumlah']);

    $pesan = "✅ Pesanan atas nama <strong>$nama</strong> untuk <strong>$jumlah</strong> porsi <strong>$makanan</strong> berhasil dilakukan.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Website Pemesanan Makanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f4f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            background: white;
            margin: 50px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-top: 15px;
            color: #555;
        }

        input[type="text"], select, input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        button {
            margin-top: 20px;
            width: 100%;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .message {
            margin-top: 20px;
            padding: 15px;
            background-color: #e0ffe5;
            border: 1px solid #a3d9a5;
            border-radius: 6px;
            color: #155724;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Pemesanan Makanan</h2>
        <?php if ($pesan): ?>
            <div class="message"><?= $pesan ?></div>
        <?php endif; ?>
        <form method="post">
            <label for="nama">Nama Pemesan:</label>
            <input type="text" name="nama" id="nama" required>

            <label for="makanan">Pilih Makanan:</label>
            <select name="makanan" id="makanan" required>
                <option value="">-- Pilih Makanan --</option>
                <option>Nasi Goreng</option>
                <option>Mie Ayam</option>
                <option>Sate Ayam</option>
                <option>Ayam Geprek</option>
                <option>Soto Ayam</option>
            </select>

            <label for="jumlah">Jumlah Porsi:</label>
            <input type="number" name="jumlah" id="jumlah" min="1" required>

            <button type="submit" name="submit">Pesan Sekarang</button>
        </form>
    </div>
</body>
</html>
