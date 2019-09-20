<div class="panel panel-headline">
            <div class="panel-heading">
              <h3 class="panel-title">Data Tarif</h3>
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
                <a href="#tambah" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah</a>                     
                 <table class="table table-hover table-striped datatable">
                    <tr>
                        <th>NO</th><th>DAYA</th><th>TARIF PERKWH</th><th> AKSI</th>
                    </tr>
                   
                    <?php 
                    $no=0;
                    foreach ($data_tarif as $dt_tarif) {
                        $no++;
                        echo '<tr>
                                <td>'.$no.'</td>
                                <td>'.$dt_tarif->daya.' KWH</td>
                                <td>Rp. '.$dt_tarif->tarifperkwh.'</td>
                                <td>
                                <a href="#update_tarif" data-toggle="modal" onclick="tm_detail('.$dt_tarif->id_tarif.')"><button type="button" class="btn btn-primary"><i class="fa fa-refresh"></i> Update</button></a>
                               
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
        <h4 class="modal-title">Tambah Tarif</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/tarif/simpan_tarif')?>" method="post" enctype="multipart/form-data">
            <?php $arr_tarif=array("direktur","Manager","Receptionist");?>
          DAYA
          <input type="number" class="form-control" name="daya">
          <br>
          Tarif PerKWH
          <input type="number" class="form-control" name="tarifperkwh">
          <br>
         <button class="btn btn-success btn-md btn-block" type="submit" name="simpan" value="Simpan">Simpan</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="update_tarif">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update tarif</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/tarif/update_tarif')?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_tarif" id="id_tarif">
          Daya 
          <input id="daya" type="number" name="daya" class="form-control"><br>
          Tarif perKHW 
          <input id="tarifperkwh" type="number" name="tarifperkwh" class="form-control"><br>
          <button class="btn btn-success btn-md btn-block" type="submit" name="simpan" value="Simpan">Simpan</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

                            

<script>
  
  function tm_detail(id_tarif) {
    $.getJSON("<?=base_url()?>index.php/tarif/get_detail_tarif/"+id_tarif,function(data){
        $("#id_tarif").val(data['id_tarif']);
        $("#daya").val(data['daya']);
        $("#tarifperkwh").val(data['tarifperkwh']);
    });
  }
  $(".datatable").dataTable();

</script>