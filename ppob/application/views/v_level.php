<div class="panel panel-headline">
            <div class="panel-heading">
              <h3 class="panel-title">Data Level</h3>
              <p class="panel-subtitle">Last Update: <?php echo date("D, d m Y h:i:sa") ?></p>
            </div>
            <div class="body">
              <br>
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
                <table class="table table-hover table-striped">
                    <tr>
                        <th>NO</th><th>ID LEVEL</th><th>NAMA LEVEL</th><th> DESKRIPSI</th><th> AKSI</th>
                    </tr>

                    <?php 
                    $no=0;
                    foreach ($data_level as $dt_level) {
                        $no++;
                        echo '<tr>
                                <td>'.$no.'</td>
                                <td>'.$dt_level->id_level.'</td>
                                <td>'.$dt_level->nama_level.'</td>
                                <td>'.$dt_level->deskripsi.'</td>
                                <td>
                                <a href="#update_level" data-toggle="modal" onclick="tm_detail('.$dt_level->id_level.')"><button type="button" class="btn btn-primary"><i class="fa fa-refresh"></i> Update</button></a> 
                             </tr>';
                    }
                    ?>

                 </table>                
            </div>
        </div>

<div class="modal fade" id="update_level">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update Level</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/level/update_level')?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_level" id="id_level">
          Nama level 
          <input id="nama_level" type="text" name="nama_level" class="form-control"><br>
          Deskripsi 
          <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"></textarea><br>
          <button class="btn btn-success btn-md btn-block" type="submit" name="simpan" value="Simpan">Simpan</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

                            

<script>
  
  function tm_detail(id_level) {
    $.getJSON("<?=base_url()?>index.php/level/get_detail_level/"+id_level,function(data){
        $("#id_level").val(data['id_level']);
        $("#nama_level").val(data['nama_level']);
        $("#deskripsi").val(data['deskripsi']);
    });
  }

</script>