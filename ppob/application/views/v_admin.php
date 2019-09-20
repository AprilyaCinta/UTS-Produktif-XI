<div class="panel panel-headline">
            <div class="panel-heading">
              <h3 class="panel-title">Data Akun Admin</h3>
              <p class="panel-subtitle">Last Update: <?php echo date("D, d m Y h:i:sa") ?></p>
            </div>
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
                <a href="#tambah" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah</a>                      
                  <table class="table table-hover table-striped datatable">
                    <tr>
                        <th>NO</th><th>ID ADMIN</th><th>NAMA ADMIN</th><th>AKSI</th>
                    </tr>
                   
                    <?php 
                    $no=0;
                    foreach ($data_admin as $dt_admin) {
                        $no++;
                        echo '<tr>
                                <td>'.$no.'</td>
                                <td>'.$dt_admin->id_admin.'</td>
                                <td>'.$dt_admin->nama_admin.'</td>
                                <td>'.$dt_admin->nama_level.'</td>
                                <td>
                                <a href="#update_admin" data-toggle="modal" onclick="tm_detail('.$dt_admin->id_admin.')"><button type="button" class="btn btn-primary"><i class="fa fa-refresh"></i> Update</button></a> 
                               
                             </tr>';
                    }
                    ?>
                 </table>
            </div>
        </div>
<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah admin</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/admin/simpan_admin')?>" method="post" enctype="multipart/form-data">
          Nama admin 
          <input type="text" class="form-control" name="nama_admin">
          <br>
          Username 
          <input type="text" class="form-control" name="username">
          <br>
         Password
          <input type="text" class="form-control" name="password">
          <br>
          Level 
          <select name="id_level" class="form-control">
              <option></option>
              <?php foreach ($data_level as $level): ?>
                  <option value="<?=$level->id_level?>"><?=$level->nama_level?></option>
              <?php endforeach ?>
          </select>
          <br>
         <button class="btn btn-success btn-md btn-block" type="submit" name="simpan" value="Simpan">Simpan</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="update_admin">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update admin</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/admin/update_admin')?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_admin" id="id_admin">
          Nama admin 
          <input id="nama_admin" type="text" name="nama_admin" class="form-control"><br>
          <button class="btn btn-success btn-md btn-block" type="submit" name="simpan" value="Simpan">Simpan</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

                            

<script>
  
  function tm_detail(id_admin) {
    $.getJSON("<?=base_url()?>index.php/admin/get_detail_admin/"+id_admin,function(data){
        $("#id_admin").val(data['id_admin']);
        $("#nama_admin").val(data['nama_admin']);
    });
  }
  $(".datatable").dataTable();
</script>