<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
    <?php
include "process/koneksi.php";
 
 session_start();
 
 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['id_admin']==""){
     header("location: login.php?pesan=belum");
 }
 ?>
    <center>
		<h2>Cetak Laporan Pemesanan</h2>
		<h4>CV. SUBE</h4>
	</center>
<table>
<thead>
                  <tr>
                    <th>ID Transaksi</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Tanggal Pemesanan</th>
                    <th scope="col">Jumlah Pemesanan</th>
                    <th scope="col">Total Biaya</th>
                    <th scope="col">Deskripsi Pesanan</th>
                    <th scope="col">Status Pesanan</th>
                  </tr>
                </thead>
                <?php
              $no = 1;
              $tampil = mysqli_query($koneksi, "SELECT * FROM transaksi INNER JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan INNER JOIN produk ON transaksi.id_produk = produk.id_produk WHERE status='Selesai'");
              function rupiah($angka){
											
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                return $hasil_rupiah;
              
              } 
              while ($data = mysqli_fetch_array($tampil)) {
                ?>
                <tbody>
                  <tr>
                    <th><?= $data['id_transaksi']; ?></th>
                    <td><?= $data['nama_pelanggan']; ?></td>
                    <td><?= $data['nama_produk']; ?></td>
                    <td><?= $data['tgl_pemesanan']; ?></td>
                    <td><?= $data['jumlah_pemesanan']; ?></td>
                    <td><?= rupiah($data['total_biaya']); ?></td>
                    <td><?= $data['deskripsi']; ?></td>
                    <td><?php 
                    if($data['status'] == "Belum Dikonfirmasi"){
                        echo "Belum Dikonfirmasi";
                    }
                    if($data['status'] == "Dalam Proses"){
                        echo "Dalam Proses";
                    }
                    if($data['status'] == "Dibatalkan"){
                        echo "Dibatalkan";
                    }
                    if($data['status'] == "Selesai"){
                        echo "Selesai";
                    }
                    ?></td>
                  </tr>
                  <?php
                $no++;
                }
                 ?>
                </tbody>
              </table>
              <script>
		window.print();
	</script>
</body>
</html>