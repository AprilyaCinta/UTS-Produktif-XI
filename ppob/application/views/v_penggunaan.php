<div class="panel panel-headline">
            <div class="panel-heading">
              <h3 class="panel-title">Data Penggunaan</h3>
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
                <table class="table table-hover table-striped datatable">
                  <thead>
                    <tr>
                        <th>PELANGGAN</th><th>NOMOR KWH</th><th>DAYA</th><th>AKSI</th>
                    </tr>
                   </thead>
                   <tbody>
                    <?php 
                     $no=0;
                      foreach ($data_Penggunaan as $Penggunaan) {
                          $no++;
                          echo '<tr>
                                  <td>'.$Penggunaan->nama_pelanggan.'</td>
                                  <td>'.$Penggunaan->nomor_kwh.'</td>
                                  <td>'.$Penggunaan->daya.' KWH</td>
                                  <td>
                                  <a href="'.base_url('index.php/penggunaan/tambah_guna/'.$Penggunaan->id_pelanggan).'" class="btn btn-success">Tambah Penggunaan</a> 
                                  <a href="'.base_url('index.php/penggunaan/get_detail_Penggunaan/'.$Penggunaan->id_pelanggan).'" class="btn btn-info">Detail Penggunaan</a> 
                                  <a href="'.base_url('index.php/penggunaan/get_detail_tagihan/'.$Penggunaan->id_pelanggan).'" class="btn btn-primary">Detail Tagihan</a></td>
                               </tr>';
                      }
                      ?>
                   </tbody>
                 </table>
            </div>
        </div>
<script>
  $(".datatable").dataTable();
</script>
