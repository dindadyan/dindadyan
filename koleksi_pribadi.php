<h1 class="mt-4">Koleksi Pribadi</h1>
<div class="card">
  <div class="card-body">
    
<div class="row">
    <div class="col-md-12">
      <a href="?page=buku_tambah" class="btn btn-primary">+ Tambah Data</a>
      <table class="table table-bordered">
        <tr>
            <th>no</th>
            <th>Nama Kategori</th>
            <th>Judul</th>
            <th>Aksi</th>

        </tr>
        <?php 
        $i = 1;
         $query = mysqli_query($koneksi, "SELECT*FROM buku LEFT JOIN kategori on buku.id_kategori = kategori.id_kategori");
         while($data = mysqli_fetch_array($query)){
            ?>
            <tr> 
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['kategori']; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td>

                    <a href="?page=buku_ubah&&id=<?php echo $data['id_buku']; ?>" class="btn btn-info">ubah</a>
                    <a onclick="return confirm('Apakah Anda Yakin Menghapus Buku Ini?');" href="?page=buku_hapus&&id=<?php echo $data['id_buku']; ?>" class="btn btn-info">hapus</a>
                </td>    

            <?php
         }
        ?>
      </table>
    </div>
    
</div>
  </div>
</div>