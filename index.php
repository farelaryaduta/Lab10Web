<?php 
include("database.php");
$sql = "SELECT * FROM data_barang";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
.container {
    max-width: 877px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    margin-top: 20px;
    font-family: Arial, sans-serif;
    font-size: 14px;
    background-color: #fff;
    border: 10px  #ddd;
    border-radius: 8px;
}

table th {
    background-color: #007BFF;
    border-collapse: collapse;
    border: 1 solid;
    color: white;
    text-align: center;
    padding: 12px;
    font-weight: bold;
}

table tr {
    border-bottom: 1px solid #ddd;
}

table td {
    text-align: center;
}

table td a {
    text-decoration: none;
    border: 20px solid transparent;
}



.kaciw {
    max-width: 100px;
    height: auto;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
    </style>
    <title>Data Barang</title>
</head>
<body>
    <?php 
    require('header.php')
    ?>
    <div class="container">
        <h1>Data Barang</h1>
        <a href="tambah.php">Tambah Barang</a>
        <div class="main">
            <table border="1">
                <tr>
                    <th>Gambar</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php if ($result): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td> 
                        <img src="gambar/<?= $row['gambar'];?>"  alt=" <?= $row ['nama'];?>" class="kaciw"> 
                    </td>
                    <td><?= $row['id_barang'];?></td>
                    <td><?= $row['nama'];?></td>
                    <td><?= $row['kategori'];?></td>
                    <td><?= $row['harga_jual'];?></td>
                    <td><?= $row['harga_beli'];?></td>
                    <td><?= $row['stok'];?></td>
                    <td><a href="ubah.php?id_barang=<?php echo $row['id_barang']; ?>">Ubah</a> 
                    <a href="hapus.php?id_barang=<?php echo $row['id_barang']; ?>" onclick="return confirm('Yakin ingin menghapus barang ini?')">Hapus</a>
                    </td>
                    
                </tr>
                <?php endwhile; else: ?>
                    <tr>
                        <td colspan="7">Belum ada data</td>
                    </tr>
                    <?php endif; ?>
            </table>
        </div>
    </div>
    <?php 
    require('footer.php');
    ?>
    
</body>
</html>