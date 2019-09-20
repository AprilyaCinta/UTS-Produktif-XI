<div class="panel panel-headline">
            <div class="panel-heading">
              <h3 class="panel-title">Data Akun Pelanggan</h3>
              <p class="panel-subtitle">Last Update: <?php echo date("D, d m Y h:i:sa") ?></p>
            </div
            <div class="body">
               <?php if ($this->session->flashdata('pesan')!=null): ?>
                  <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?=$this->session->flashdata('pesan')?>
                  </div>
                <?php endif ?>
                <?php if ($this->session->flashdata('pesaneror')!=null): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?=$this->session->flashdata('pesaneror')?>
                  </div>
                <?php endif ?>
              <br>
                <a href="#tambah" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah</a><br><br>    
                <table class="table table-hover table-striped datatable">
                  <thead>
                    <tr>
                        <th>NO</th><th>ID PELANGGAN</th><th>NAMA PELANGGAN</th><th>ALAMAT</th><th>no KWH</th><th>DAYA</th><th>AKSI</th>
                    </tr>
                   </thead>
                    <tbody>
                    
                    <?php 
                    $no=0;
                    foreach ($data_pelanggan as $dt_pelanggan) {
                        $no++;
                        echo '<tr>
                                <td>'.$no.'</td>
                                <td>'.$dt_pelanggan->id_pelanggan.'</td>
                                <td>'.$dt_pelanggan->nama_pelanggan.'</td>
                                 <td>'.$dt_pelanggan->alamat.'</td>
                                  <td>'.$dt_pelanggan->nomor_kwh.'</td>
                                
                                <td>'.$dt_pelanggan->daya.' KWH</td>
                                <td>
                                <a href="#update_pelanggan"data-toggle="modal" onclick="tm_detail('.$dt_pelanggan->id_pelanggan.')"><button type="button" class="btn btn-primary"><i class="fa fa-refresh"></i> Update</button></a>
                                
                             </tr>';
                    }
                    ?>

                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah Pelanggan</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/pelanggan/simpan_pelanggan')?>" method="post" enctype="multipart/form-data">
          Nama pelanggan 
          <input type="text" class="form-control" name="nama_pelanggan">
          <br>
         Alamat
         <textarea name="alamat" class="form-control"></textarea>
          <br>
          NO KWH 
          <input type="text" class="form-control" name="nomor_kwh">
          <br>
          Username 
          <input type="text" class="form-control" name="username">
          <br>
         Password
          <input type="text" class="form-control" name="password">
          <br>
          Daya 
          <select name="id_tarif" class="form-control">
              <option></option>
              <?php foreach ($data_tarif as $tarif): ?>
                  <option value="<?=$tarif->id_tarif?>"><?=$tarif->daya?></option>
              <?php endforeach ?>
          </select>
          <br>
          <button class="btn btn-success btn-md btn-block" type="submit" name="simpan" value="Simpan">Simpan</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="update_pelanggan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update pelanggan</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/pelanggan/update_pelanggan')?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_pelanggan" id="id_pelanggan">
          Nama pelanggan 
          <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan">
          <br>
         Alamat
         <textarea name="alamat" class="form-control" id="alamat"></textarea>
          <br>
          NO KWH 
          <input type="text" class="form-control" name="nomor_kwh" id="nomor_kwh">
          <br>
          Username 
          <input type="text" class="form-control" name="username" id="username">
          <br>
         Password
          <input  type="password" class="form-control" name="password">
          <br>
          Daya 
          <select name="id_tarif" id="id_tarif" class="form-control">
              <option></option>
              <?php foreach ($data_tarif as $tarif): ?>
                  <option value="<?=$tarif->id_tarif?>"><?=$tarif->daya?></option>
              <?php endforeach ?>
          </select>
          <br>
          <button class="btn btn-success btn-md btn-block" type="submit" name="simpan" value="Simpan">Simpan</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

                            
<script>
  
  function tm_detail(id_pelanggan) {
    $.getJSON("<?=base_url()?>index.php/pelanggan/get_detail_pelanggan/"+id_pelanggan,function(data){
        $("#id_pelanggan").val(data['id_pelanggan']);
        $("#nama_pelanggan").val(data['nama_pelanggan']);
        $("#alamat").val(data['alamat']);
        $("#nomor_kwh").val(data['nomor_kwh']);
        $("#username").val(data['username']);
        $("#password").val(data['password']);
        $("#id_tarif").val(data['id_tarif']);
    });
  }

$(".datatable").dataTable();
</script>