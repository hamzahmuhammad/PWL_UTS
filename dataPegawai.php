<?php 
    require_once 'models/Pegawai.php';
    //membuat objek dari kelas Produk
    $obj = new Pegawai();
    //panggil method tampilkan data
    $rs = $obj->dataPegawai();
?>
<h3>Data Pegawai</h3>
<?php 
    if(isset($member)) {
?>
<a href="index.php?hal=formPegawai" class="btn btn-primary">Tambah</a>
<?php } ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIP</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Agama</th>
      <th scope="col">Divisi</th>
      <th scope="col" style="text-align:center">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $no = 1;
        foreach($rs as $prod){
    
    ?>
    <tr>
      <td><?= $no; ?></td>
      <td><?= $prod['nip']; ?></td>
      <td><?= $prod['nama']; ?></td>
      <td><?= $prod['email']; ?></td>
      <td><?= $prod['agama']; ?></td>
      <td><?= $prod['divisi']; ?></td>
      <td style="text-align:center">
      <form method="POST" action="controllers/pegawaiController.php">
      <a href="index.php?hal=detailPegawai&id=<?= $prod['id']; ?>" 
      class="mr-0" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-info-circle fa-2x"></i></a>
      <?php
        $role = $member['role'];
        if(isset($member)) {
      ?>
      <a href="index.php?hal=formEditPegawai&id=<?= $prod['id']; ?>" 
      class="mr-0" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit fa-2x"></i></a>
      <?php
        if($role != 'staff') {
      ?>
      
      <button name="proses" value="hapus"
          onclick="return confirm('Anda Yakin Data diHapus?')"
      class="mr-0" data-toggle="tooltip" data-placement="top" title="Hapus" style="border: none; background-color: white;"><i class="far fa-trash-alt fa-2x"></i></button>
      <?php } ?>
      <input type="hidden" name="idx" value="<?= $prod['id']; ?>">
      <?php } ?>
      </form>
      </td>
    </tr>
    <?php
        $no++;
        }
    ?>
  </tbody>
</table>