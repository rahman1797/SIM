<?php $idToKeuangan = $this->M_keuangan->getKeuanganAll(0);?>

  <style type="text/css">
    .box-header {
      padding: 10px;
      margin-bottom: 10px;
    }
    .box-tools {
      right: 10px;
      top: 5px;
    }
    .dropzone-wrapper {
    
      border: 2px dashed #91b0b3;
      color: #92b0b3;
      position: relative;
      height: 150px;
    }
    .dropzone-desc {
    position: absolute;
      margin: 0 auto;
      left: 0;
      right: 0;
      text-align: center;
      width: 40%;
      top: 50px;
      font-size: 16px;
    }
    .dropzone,
    .dropzone:focus {
      outline: none !important;
      width: 100%;
      height: 150px;
      cursor: pointer;
      opacity: 0;
    }
    .dropzone-wrapper:hover,
    .dropzone-wrapper.dragover {
      background: #ecf0f5;
    }
    .preview-zone {
      text-align: center;
    }
    .preview-zone .box {
      box-shadow: none;
      border-radius: 0;
      margin-bottom: 0;
    }
  </style>



<section class="content">
        <div class="container-fluid">
        
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" id="round"> 

                  <div class="body">
                      <div class="row">
                          <center>
                              <?php 
                              
                              foreach($data_proker as $dp){ 
                                  $date = date_create($dp->proker_tanggal);
                                  $id_proker = $dp->proker_ID;
                                   ?>
                              <a href="<?php echo base_url('Keuangan_C/keuangan_proker?id_proker='.$id_proker) ?>">
                                  <div class="col-lg-3">

                                      <div style="cursor: pointer;" class="info-box bg-green hover-zoom-effect" id="round">
                                          <div class="icon">
                                              <i class="material-icons">timeline</i>
                                          </div>
                                          <div class="content">
                                              <div class="text"> <?= $dp->proker_nama; ?> </div>
                                              <!-- <div class="number count-to" data-from="0" data-to="<?= $jumlah; ?>" data-speed="1000" data-fresh-interval="20"></div> -->
                                          </div>
                                      </div>                                  
                                  </div>

                                  <?php } ?>
                              </a>
                          </center>
                      </div>    
                  </div>

                  <div class="body">
                      <div id="barchart_material" style="height: 300px; max-width: 800px; margin: 0px auto;"></div>
                  </div>

        
                </div>
             </div> 

                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round"> 
                        
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
                            <?php if ($idToKeuangan['0']['keuangan_lembaga'] == $_SESSION['user_role']) { ?>

                            <?php if ($idToKeuangan['0']['id_opmawa'] == $_SESSION['user_opmawa']) { ?>
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
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nominal</th>
                                            <th>Deskripsi</th>
                                            <th>Bukti File</th>
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
                            <?php if ($idToKeuangan['0']['keuangan_lembaga'] == $_SESSION['user_role']) { ?>

                            <?php if ($idToKeuangan['0']['id_opmawa'] == $_SESSION['user_opmawa']) { ?>
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
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nominal</th>
                                            <th>Deskripsi</th>
                                            <th>Bukti File</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                            $totalPengeluaran = 0;
                                            foreach($proker_pengeluaran as $keluar){ 
                                            $totalPengeluaran += $keluar->pengeluaran_nominal; 
                                            $date = date_create($keluar->pengeluaran_tanggal)

                                            ?>
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">



function readFile(input) {
   if (input.files && input.files[0]) {
   var reader = new FileReader();
   
   reader.onload = function (e) {
   var htmlPreview = input.files[0].name;
   var wrapperZone = $(input).parent();
   var previewZone = $(input).parent().parent().find('.preview-zone');
   var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');
   
   wrapperZone.removeClass('dragover');
   previewZone.removeClass('hidden');
   boxZone.empty();
   boxZone.append(htmlPreview);
   };
   
 reader.readAsDataURL(input.files[0]);
 }
}

function reset(e) {
   e.wrap('<form>').closest('form').get(0).reset();
   e.unwrap();
}

$(".dropzone").change(function(){
 readFile(this);
});
$('.dropzone-wrapper').on('dragover', function(e) {
 e.preventDefault();
 e.stopPropagation();
 $(this).addClass('dragover');
});
$('.dropzone-wrapper').on('dragleave', function(e) {
 e.preventDefault();
 e.stopPropagation();
 $(this).removeClass('dragover');
});
$('.remove-preview').on('click', function() {
 var boxZone = $(this).parents('.preview-zone').find('.box-body');
 var previewZone = $(this).parents('.preview-zone');
 var dropzone = $(this).parents('.form-group').find('.dropzone');
 boxZone.empty();
 previewZone.addClass('hidden');
 reset(dropzone);
});



    
google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    
    ['Program Kerja', 'Pemasukan', 'Pengeluaran'],
   
    <?php foreach ($data_proker as $dp) {   
      $masuk = $this->M_keuangan->pemasukan($dp->proker_ID);
      $keluar = $this->M_keuangan->pengeluaran($dp->proker_ID);
    ?>

    ['<?php echo $dp->proker_nama; ?>',  <?php if(is_null($masuk)){echo 0;}else{echo $masuk;}?> , <?php if(is_null($keluar)){echo 0;}else{echo $keluar;} ?>],
    
   <?php } ?>
 
  ]);

  var options = {
    hAxis: {format: 'decimal',
    title: 'Total nominal (Rp)'},
    bars: 'horizontal' // Required for Material Bar Charts.
  };

  var chart = new google.charts.Bar(document.getElementById('barchart_material'));
  chart.draw(data, google.charts.Bar.convertOptions(options));
}


document.getElementById('totalPemasukan').innerHTML = "Rp" + <?php echo $totalPemasukan ?>;
document.getElementById('totalPengeluaran').innerHTML = "Rp" + <?php echo $totalPengeluaran ?>;
document.getElementById('saldo').innerHTML = "Rp" + <?php echo $totalPemasukan - $totalPengeluaran ?>;

//   function check($idTugas, $statusTugas){

//     $.ajax({

//         data: {
//             prokerTugas_ID : $idTugas, 
//             prokerTugas_status : $statusTugas
//         },
//         url: "<?php echo base_url('Proker_C/checkTugas') ?>",
//         type: "POST",

//         success: function(){  
//             $('#refTugasSaya').load(document.URL +  ' #refTugasSaya');
//              //You can remove here
//         },
//         //on error
//         error: function(){
//                 console.log("***********Error***************"); //You can remove here
//         }
//     });
// }



// $('#progress').attr("style","width:"+ <?= $progress ?> + ""); 
</script>