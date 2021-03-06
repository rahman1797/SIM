     <style type="text/css">
         .wrapper {
            width: 850px;
            margin: auto;
            border: 2px solid #444;
            padding: 20px;
        }
        #konvert {
            background: #444;
            border: 2px solid #444;
            border-radius: 1px;
            padding: 10px;
            color: #fff;
            font-weight: bold;
        }
        #konvert:hover {
            background: #fff;
            color: #444;
        }
     </style>

      <section class="content">
        <div class="container-fluid">
      
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>DATA PROGRAM KERJA</strong></h2>
                        </div>
                        <div class="row clearfix">
                           <div class="body col-lg-6">
                            <div class="table-responsive" id="examples">
                                <table id="refProker" class="table table-bordered table-striped round_edge"> 
                                        <?php 
                                            foreach($proker_data as $pd) { 
                                            $date = date_create($pd->proker_tanggal);
                                            $id_proker = $pd->proker_ID
                                            ?>
                                            <tr>
                                                <th>Nama proker</th>
                                                <td><?php echo $pd->proker_nama ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal</th>
                                                <td><?php echo date_format($date,"d M Y"); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Lembaga</th>
                                                <td><?php if ($pd->proker_lembaga == 1) 
                                                            {
                                                                echo "Eksekutif";
                                                            }
                                                          elseif ($pd->proker_lembaga == 2) 
                                                            {
                                                                echo "Legislatif";
                                                            }
                                                 ?></td>
                                            </tr>
                                            <tr>
                                                <th>Periode Opmawa pelaksana</th>
                                                <td><?php echo $pd->proker_tahun." - ".(($pd->proker_tahun) + 1); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Deskripsi</th>
                                                <td><?php echo $pd->proker_deskripsi; ?></td>
                                            </tr>   
                                            <tr>
                                                <th>Output / Tujuan</th>
                                                <td><?php echo $pd->proker_output; ?></td>
                                            </tr>             
                                        <?php } ?>  
                                        <tr>
                                            <th><button class="btn btn-warning" onclick="generate()">Generate pdf</button></th>
                                        </tr>                  
                                </table>
                            </div>
                            </div> 

                            <div class="body col-lg-6">
                                <div class="table-responsive">
                                    <table id="refProkerAnggota" class="table table-bordered table-striped round_edge">
                                        <thead>
                                            <tr>
                                                <th>Nama Panitia</th>
                                                <th>Sie Kepanitiaan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($proker_anggota as $pa){ 
                                                $idPosisi = $pa->id_posisi;
                                                $idUser = $pa->id_user;
                                                $id_anggota = $pa->prokerAnggota_ID;
                                                $idToPosisi = $this->M_proker->getPosisiNama($idPosisi);
                                                $idToNama = $this->M_user->getUserNama($idUser); ?>
                                                <tr>
                                                    <td><?php echo $idToNama['0']['user_nama']; ?></td>
                                                    <td><?php echo $idToPosisi['0']['prokerPosisi_nama']; ?> </td>              
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

<div class="row clearfix">          
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card" id="round"> 
            <div class="header" align="center">
                <h2><strong>BERKAS LEMBAR PERTANGGUNG JAWABAN PROKER</strong></h2>
            </div>
            <div class="body">
                <table id="refBerkas" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                        <thead>
                            <tr>
                                <th>Nama / Link</th>
                                <th>Oleh</th>
                                <th>Tanggal</th>
                                <th>Kelola</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama / Link</th>
                                <th>Diupload Oleh</th>
                                <th>Tanggal upload</th>
                                <th>Kelola</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php                     
                                foreach($proker_berkas_lpj as $bd){ 
                                    $idUser = $bd->id_user;
                                    $idProker = $bd->id_proker;
                                    $idToUser = $this->M_user->getUserNama($idUser);
                                    if ($idProker == $_GET['id_proker']) { ?>
                                <tr>
                                    <td><?php echo $bd->berkas_nama; ?></td>
                                    <td><?php echo $idToUser['0']['user_nama']; ?></td>           
                                    <td><?php echo $bd->berkas_tanggal; ?></td>           
                                    <td>
                                        <?php if($bd->berkas_jenis != 'link') { ?>
                                          <a href="<?php echo base_url('Berkas_C/download?name='.$bd->berkas_nama.'&id_proker='.$idProker) ?>"><button button class="btn btn-info" id="round"><i class="material-icons">cloud_download</i></button></a>
                                        <?php } ?>                        
                                    </td>
                                </tr>
                            <?php } } ?>
                        </tbody>
                </table> 
            </div>
        </div>
    </div> 
</div>


<div class="row clearfix">
   
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

     
<!-- TABEL DATA PEMASUKAN -->
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="card" id="round">
            <div class="header" align="center">
                <h2><strong>PEMASUKAN</strong></h2>
                <p></p>
                <?php if ($getProkerData['0']['proker_lembaga'] == $_SESSION['user_role']) { ?>

                <?php if ($idToProker['0']['proker_tahun'] == $_SESSION['user_tahun']) { ?>
                <button class="btn btn-lg btn-success waves-effect" data-toggle="modal" data-target="#ModalPemasukan" id="round"><i class="material-icons">add_circle_outline</i> Pemasukan</button>  
                <?php } } ?>
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
                        <tbody>
                            <?php 
                                $totalPemasukan = 0;
                                foreach($proker_pemasukan as $masuk){ 
                                $totalPemasukan += $masuk->pemasukan_nominal; 
                                ?>
                                <tr>
                                    <td><?php echo date(" d M Y", $masuk->pemasukan_tanggal) ?></td>
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
                        <?php if ($getProkerData['0']['proker_lembaga'] == $_SESSION['user_role']) { ?>

                        <?php if ($idToProker['0']['proker_tahun'] == $_SESSION['user_tahun']) { ?>
                        <button class="btn btn-lg btn-danger waves-effect" data-toggle="modal" data-target="#ModalPengeluaran" id="round"><i class="material-icons">add_circle_outline</i> Pengeluaran</button>  
                        <?php } } ?>
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
                                <tbody>
                                    <?php 
                                        $totalPengeluaran = 0;
                                        foreach($proker_pengeluaran as $keluar){ 
                                        $totalPengeluaran += $keluar->pengeluaran_nominal; 
                                        ?>
                                        <tr>
                                            <td><?php echo date(" d M Y", $keluar->pengeluaran_tanggal)  ?></td>
                                            <td><?php echo $keluar->pengeluaran_nominal ?></td>
                                            <td><?php echo $keluar->pengeluaran_deskripsi ?></td>
                                            <td><?php if (isset($keluar->pengeluaran_file)) { ?>
                                                <a href="<?php echo base_url('uploads/keuangan/'. $keluar->pengeluaran_file) ?>" class="btn btn-sm btn-success" id="round"><i class="material-icons">image_search</i></a>
                                            <?php } 
                                            else { ?>
                                                <a href="javascript:void(0)" class="btn btn-sm" disabled id="round"><i class="material-icons">image_search</i></a>
                                            <?php } ?>
                                            </td>  
                                        </tr>
                                    <?php } ?>  
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script src="<?php echo base_url('assets/js/jspdf.debug.js')?>"></script>
<script src="<?php echo base_url('assets/js/jspdf.plugin.autotable.min.js')?>"></script>

<script type="text/javascript">

function generate() {
    var doc = new jsPDF();
    
    doc.autoTable({
        margin: {top: 30},
        head: [['Nama Program Kerja / Kegiatan Opmawa']],
        body: [["<?php echo $pd->proker_nama ?>"]],
        beforePageContent: function(data) {
            doc.text("Data Program Kerja <?php echo $pd->proker_nama ?>", 15, 20);
        }
    });

    doc.autoTable({
        head: [['Periode Opmawa Pelaksana']],
        body: [["<?php echo $pd->proker_tahun ?> - <?php echo ($pd->proker_tahun + 1) ?>"]]
    });

    doc.autoTable({
        head: [['Deskripsi Program Kerja']],
        body: [["<?php echo $pd->proker_deskripsi ?>"]]
    });

    doc.autoTable({
        head: [['Output / Tujuan Dari Program Kerja']],
        body: [["<?php echo $pd->proker_output ?>"]]
    });

    doc.autoTable({html: '#refProkerAnggota'});

    doc.save('<?php echo $pd->proker_nama ?> - <?php echo $pd->proker_tahun ?>.pdf');
}

document.getElementById('totalPemasukan').innerHTML = "Rp" + <?php echo $totalPemasukan ?>;
document.getElementById('totalPengeluaran').innerHTML = "Rp" + <?php echo $totalPengeluaran ?>;
document.getElementById('saldo').innerHTML = "Rp" + <?php echo $totalPemasukan - $totalPengeluaran ?>;  
</script>