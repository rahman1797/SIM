<?php $idToProker = $this->M_proker->getProkerNama($_GET['id_proker']); ?>
      <section class="content">
        <div class="container-fluid">
        
            <div class="row clearfix">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round"> 

                            <div class="dropdown">
                              <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%; background-color: #FF9800 !important">Kelola lainnya
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('Proker_C/prokerTugas?id_proker='.$_GET['id_proker']) ?>">Daftar Tugas</a></li>
                                <li><a href="<?php echo base_url('Proker_C/prokerAnggota?id_proker='.$_GET['id_proker']) ?>">Daftar Anggota Panitia</a></li>
                                <li><a href="<?php echo base_url('Berkas_C/proker?id_proker='.$_GET['id_proker']) ?>">Dokumen/berkas</a></li>
                                <li><a href="<?php echo base_url('Keuangan_C/index?id_proker='.$_GET['id_proker']) ?>">Keuangan</a></li>
                                <li><a href="<?php echo base_url('Proker_C/prokerPosisi?id_proker='.$_GET['id_proker']) ?>">Posisi Kepanitiaan</a></li>
                                <li><a href="<?php echo base_url('Proker_C/prokerEvaluasi?id_proker='.$_GET['id_proker']) ?>">Evaluasi</a></li>
                              </ul>
                            </div>
                        
                        <div class="body">
                            <table class="table">
                                <tr>
                                    <th>Pemasukan</th>
                                    <td>:</td>
                                    <td> <div id="totalPemasukan"></div></td>
                                </tr>
                                <tr>
                                    <th>Pengeluaran</th>
                                    <td>:</td>
                                    <td> <div id="totalPengeluaran"></div></td>
                                </tr>
                                <tr>
                                    <th>Saldo</th>
                                    <td>:</td>
                                    <td><div id="saldo"></div></td>
                                </tr>
                            </table>   
                        </div>
                    </div>
                </div> 
            </div>

            <div class="row clearfix">
     
<!-- TABEL DATA PEMASUKAN -->
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>PEMASUKAN</strong></h2>
                            <p></p>
                            <?php if ($idToProker['0']['proker_lembaga'] == $_SESSION['user_role']) { ?>

                            <?php if ($idToProker['0']['proker_tahun'] == $_SESSION['user_tahun']) { ?>
                            <button class="btn btn-lg btn-success waves-effect" data-toggle="modal" data-target="#ModalPemasukan" id="round"><i class="material-icons">add_circle_outline</i> Pemasukan</button>  
                            <?php } ?>

                            <?php } ?>
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="refPemasukan" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nominal</th>
                                            <th>Deskripsi</th>
                                            <th>Bukti File</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nominal</th>
                                            <th>Deskripsi</th>
                                            <th>Bukti File</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $totalPemasukan = 0;
                                            foreach($proker_pemasukan as $masuk){ 
                                            $totalPemasukan += $masuk->pemasukan_nominal; 
                                            $date = date_create($masuk->pemasukan_tanggal)
                                            ?>
                                            <tr>
                                                <td><?php echo date_format($date, "d M Y") ?></td>
                                                <td><?php echo $masuk->pemasukan_nominal ?></td>
                                                <td><?php echo $masuk->pemasukan_deskripsi ?></td>
                                                <td><?php if (isset($masuk->pemasukan_file)) { ?>
                                                    <a href="<?php echo base_url('uploads/keuangan/'. $masuk->pemasukan_file) ?>" class="btn btn-sm btn-success" id="round"><i class="material-icons">image_search</i></a>
                                                <?php } 
                                                else { ?>
                                                    <a href="javascript:void(0)" class="btn btn-sm" disabled id="round"><i class="material-icons">image_search</i></a>
                                                <?php }
                                                ?></td>   
                                                <td>
                                                  <button class="btn btn-danger" id="round" value="<?= $masuk->pemasukan_ID ?>" onclick="return hapus_pemasukan(this.value)"><i class="material-icons">delete_forever</i>
                                                </td>                                               
                                            </tr>
                                        <?php } ?>
                               
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

<!-- TABEL DATA PENGELUARAN -->
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>PENGELUARAN</strong></h2>
                            <p></p>
                            <?php if ($idToProker['0']['proker_lembaga'] == $_SESSION['user_role']) { ?>

                            <?php if ($idToProker['0']['proker_tahun'] == $_SESSION['user_tahun']) { ?>
                            <button class="btn btn-lg btn-danger waves-effect" data-toggle="modal" data-target="#ModalPengeluaran" id="round"><i class="material-icons">add_circle_outline</i> Pengeluaran</button>  
                            <?php } ?>

                            <?php } ?>
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="refPengeluaran" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nominal</th>
                                            <th>Deskripsi</th>
                                            <th>Bukti File</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nominal</th>
                                            <th>Deskripsi</th>
                                            <th>Bukti File</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $totalPengeluaran = 0;
                                            foreach($proker_pengeluaran as $keluar){ 
                                            $totalPengeluaran += $keluar->pengeluaran_nominal; 
                                            $date = date_create($keluar->pengeluaran_tanggal) ?>
                                            <tr>
                                                <td><?php echo date_format($date, "d M Y") ?></td>
                                                <td><?php echo $keluar->pengeluaran_nominal ?></td>
                                                <td><?php echo $keluar->pengeluaran_deskripsi ?></td>
                                                <td><?php if (isset($keluar->pengeluaran_file)) { ?>
                                                    <a href="<?php echo base_url('uploads/keuangan/'. $keluar->pengeluaran_file) ?>" class="btn btn-sm btn-success" id="round"><i class="material-icons">image_search</i></a>
                                                <?php } 
                                                else { ?>
                                                    <a href="javascript:void(0)" class="btn btn-sm" disabled id="round"><i class="material-icons">image_search</i></a>
                                                <?php }
                                                ?></td>
                                                <td>
                                                  <button class="btn btn-danger" id="round" value="<?= $keluar->pengeluaran_ID ?>" onclick="return hapus_pengeluaran(this.value)"><i class="material-icons">delete_forever</i>
                                                </td>  
                                                
                                            </tr>
                                        <?php } 
                                        ?>                  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            <!-- #END# Basic Examples -->
        </div>
    </section>

<!-- Modal Pemasukan -->
<div class="modal fade" id="ModalPemasukan" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="round">
           <center>
            <div class="modal-body">
                  <!-- Form Angggota -->
                    <!-- <form id="form_validation" name="formPemasukan" class="formPemasukan" method="POST" style="margin: 20px" onsubmit="return submitPemasukan()"> -->
                    <form enctype="multipart/form-data" id="form_validation" action="<?php echo base_url('Keuangan_C/inputPemasukan') ?>" name="pemasukan_file" class="formPemasukan" method="POST" style="margin: 20px">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input class="form-control" type="text" id="pemasukan_nominal" name="pemasukan_nominal">
                                <label class="form-label">Nominal</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input class="form-control" type="text" name="pemasukan_deskripsi">
                                <label class="form-label">Deskripsi</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input class="form-control" type="date" name="pemasukan_tanggal">
                                
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input class="form-control-file" type="file" id="pemasukan_file" name="pemasukan_file">
                            </div>
                        </div>
                         <input type="hidden" name="id_proker" value="<?php echo $_GET['id_proker'] ?>">
                         <input type="hidden" name="pemasukan_lembaga" value="<?php echo $_SESSION['user_role'] ?>">
                         <input type="hidden" name="id_opmawa" value="<?php echo $_SESSION['user_opmawa'] ?>">
                        <button class="btn btn-primary waves-effect btn-lg" type="submit" id="round">Simpan</button>
                    </form>
            </div>
            </center>
        </div>
    </div>
</div>


<!-- Modal Pengeluaran -->
<div class="modal fade" id="ModalPengeluaran" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="round">
           <center>
            <div class="modal-body">
                  <!-- Form Angggota -->
                    <!-- <form id="form_validation" name="formPengeluaran" class="formPengeluaran" method="POST" style="margin: 20px" onsubmit="return submitPengeluaran()"> -->
                   <form enctype="multipart/form-data" id="form_validation" action="<?php echo base_url('Keuangan_C/inputPengeluaran') ?>" name="pemasukan_file" class="formPemasukan" method="POST" style="margin: 20px">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input class="form-control" type="text" id="pengeluaran_nominal" name="pengeluaran_nominal">
                                <label class="form-label">Nominal</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input class="form-control" type="text" name="pengeluaran_deskripsi">
                                <label class="form-label">Deskripsi</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input class="form-control" type="date" name="pengeluaran_tanggal">
                                
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input class="form-control-file" type="file" id="pengeluaran_file" name="pengeluaran_file">
                            </div>
                        </div>
                         <input type="hidden" name="id_proker" value="<?php echo $_GET['id_proker'] ?>">
                         <input type="hidden" name="pengeluaran_lembaga" value="<?php echo $_SESSION['user_role'] ?>">
                         <input type="hidden" name="id_opmawa" value="<?php echo $_SESSION['user_opmawa'] ?>">
                        <button class="btn btn-primary waves-effect btn-lg" type="submit" id="round">Simpan</button>
                    </form>
            </div>
            </center>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">

// function submitPemasukan() {

//     var data = $('.formPemasukan').serialize();

//     $.ajax({
//         type: 'POST',
//         data: data,
//         url: "<?php echo base_url('Keuangan_C/inputPemasukan') ?>",
//         success: function() {
//             Swal.fire({
//               position: 'top-end',
//               type: 'success',
//               title: 'Berhasil',
//               showConfirmButton: false,
//               timer: 1300
//             }).then(function(){
//                 $('#refPemasukan').load(document.URL +  ' #refPemasukan');
//             })     
//         }
//     });
    
//     return false;
// }

// function submitPengeluaran() {

//     var data = $('.formPengeluaran').serialize();
          
//     $.ajax({
//         type: 'POST',
//         data: data,
//         url: "<?php echo base_url('Keuangan_C/inputPengeluaran') ?>",
//         success: function() {
//             Swal.fire({
//               position: 'top-end',
//               type: 'success',
//               title: 'Berhasil',
//               showConfirmButton: false,
//               timer: 1300
//             }).then(function(){
//                 $('#refPengeluaran').load(document.URL +  ' #refPengeluaran');
//             })     
//         }
//     });
    
//     return false;
// }

function hapus_pemasukan(id)
  {
      job = confirm("Are you sure to delete permanently?");
      
      if(job != true)
      {
          return false;
      }

      else {
        
        $.ajax({
            data: id,
            type: "GET",
            url: "<?php echo base_url('Keuangan_C/delete_pemasukan?id=') ?>" + id,
            success: function(data){
                Swal.fire({
                  position: 'top-end',
                  type: 'success',
                  title: 'Berhasil Menghapus pemasukan',
                  showConfirmButton: false,
                  timer: 1300
                }).then(function(){
                    var ref = $('$refPemasukan');
                    $('#refPemasukan').load(document.URL +  ' #refPemasukan', function() {
                    ref.children('#refPemasukan').unwrap();});
                }) 
              },
              error: function(data){
                alert('Failed deleting data ');
              }
        })
      
      }
  }
   
 function hapus_pengeluaran(id)
  
  {
      job = confirm("Are you sure to delete permanently?");
      
      if(job != true)
      {
          return false;
      }

      else
      {
        $.ajax({
            data: id,
            type: "GET",
            url: "<?php echo base_url('Keuangan_C/delete_pengeluaran?id=') ?>" + id,
            success: function(data){
                Swal.fire({
                  position: 'top-end',
                  type: 'success',
                  title: 'Berhasil Menghapus pengeluaran',
                  showConfirmButton: false,
                  timer: 1300
                }).then(function(){
                    var ref = $('#refPengeluaran');
                    $('#refPengeluaran').load(document.URL +  ' #refPengeluaran', function() {
                    ref.children('#refPengeluaran').unwrap();});
                }) 
              },
              error: function(data){
                alert('Failed deleting data ');
              }
        })
      }
  }

document.getElementById('totalPemasukan').innerHTML = "Rp" + <?php echo $totalPemasukan ?>;
document.getElementById('totalPengeluaran').innerHTML = "Rp" + <?php echo $totalPengeluaran ?>;
document.getElementById('saldo').innerHTML = "Rp" + <?php echo $totalPemasukan - $totalPengeluaran ?>;
</script>