<?php $getProkerData = $this->M_proker->getProkerNama($_GET['id_proker']);?>
      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h1 id="refNamaProker"><strong>
                                <?php 
                                    foreach ($proker_data as $pd) {
                                        $default_date = date_create($pd->proker_tanggal);
                                        $date = date_format($default_date,"d M Y");
                                        $date_selection = date_format($default_date,"Y-m-d");
                                        $nama_proker = $pd->proker_nama;
                                        $deskripsi = $pd->proker_deskripsi;
                                        $proker_jenis = $pd->proker_jenis;
                                        $output = $pd->proker_output;

                                        echo $nama_proker;
                                ?>
                                
                                <?php if (($pd->proker_tahun == $_SESSION['user_tahun']) && $pd->proker_lembaga == $_SESSION['user_role'] ) { ?>
                                <button class="btn btn-info get-id" data-toggle="modal" data-target="#Modal_edit_proker" id="round" value="<?php echo $nama_proker . ',' . $proker_jenis . ',' . $date_selection . ','. $deskripsi  ?>" onclick="return getValue(this.value)" ><i class="material-icons">edit</i></button>
                                <?php } ?>
                            </h1></strong> 
                        </div>
                        
                        <div class="body">
                            <div class="row" id="refDataProker">
                                <div class="col-lg-4">
                                    <?php if ($proker_jenis == "event") {
                                        echo "<strong>Rencana Pelaksanaan : </strong>" . $date;
                                    }
                                    else {
                                        echo "<strong>Rencana Pelaksanaan : </strong>" . "<font color='red'> non-event </font>";
                                    } ?>
                                </div>
                                <div class="col-lg-4">
                                    <?php if ($pd->proker_nilai) {
                                            echo "<strong>Penilaian : </strong>" . $pd->proker_nilai;
                                        }
                                      else {
                                            echo "<strong>Penilaian : </strong>" . "<font color='red'>Proker belum dinilai</font>";
                                        } ?>
                                </div>
                                <div class="col-lg-4">
                                    <?= "<strong>Deskripsi : </strong>" . $deskripsi; } ?>
                                </div>
                            </div>

                            <!-- Widgets -->
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                    <a href="<?php echo base_url('Proker_C/prokerTugas?id_proker='.$_GET['id_proker']) ?>">
                                        <div style="cursor: pointer;" class="info-box bg-pink hover-zoom-effect" id="round">
                                            <div class="icon">
                                                <i class="material-icons">assignment_turned_in</i>
                                            </div>
                                            <div class="content">
                                                <div class="text">DAFTAR TUGAS</div>
                                                <div class="number count-to" data-from="0" data-to="<?php echo $totalTugas; ?>" data-speed="1000" data-fresh-interval="20"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                    <a href="<?php echo base_url('Proker_C/prokerAnggota?id_proker='.$_GET['id_proker']) ?>">
                                        <div style="cursor: pointer;" class="info-box bg-light-blue hover-zoom-effect" id="round">
                                            <div class="icon">
                                                <i class="material-icons">people</i>
                                            </div>
                                            <div class="content">
                                                <div class="text">Daftar Panitia</div>
                                                <div class="number count-to" data-from="0" data-to="<?php echo $totalAnggotaKepanitiaan; ?>" data-speed="1000" data-fresh-interval="20"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <?php if ($getProkerData['0']['proker_lembaga'] == $_SESSION['user_role']) { ?>
                                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                    <a href="<?php echo base_url('Berkas_C/proker?id_proker='.$_GET['id_proker']) ?>">
                                        <div style="cursor: pointer;" class="info-box bg-orange hover-zoom-effect" id="round">
                                            <div class="icon">
                                                <i class="material-icons">description</i>
                                            </div>
                                            <div class="content">
                                                <div class="text">Dokumen</div>
                                                <div class="number count-to" data-from="0" data-to="<?php echo $totalBerkas; ?>" data-speed="1000" data-fresh-interval="20"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php } ?>
                                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                    <a href="<?php echo base_url('Keuangan_C/keuangan_proker?id_proker='.$_GET['id_proker']) ?>">
                                    <div style="cursor: pointer;" class="info-box bg-green hover-zoom-effect" id="round">
                                        <div class="icon">
                                            <i class="material-icons">timeline</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Laporan Keuangan</div>
                                           
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                
                                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                    <a href="<?php echo base_url('Proker_C/prokerPosisi?id_proker='.$_GET['id_proker']) ?>">
                                    <div style="cursor: pointer;" class="info-box bg-light-green hover-zoom-effect" id="round">
                                        <div class="icon">
                                            <i class="material-icons">people</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Posisi Kepanitiaan</div>
                                            <div class="number count-to" data-from="0" data-to="<?php echo $totalPosisiKepanitiaan; ?>" data-speed="1000" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                    </a>
                                </div>

                                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                    <a href="<?php echo base_url('Proker_C/prokerEvaluasi?id_proker='.$_GET['id_proker']) ?>">
                                    <div style="cursor: pointer;" class="info-box bg-light-green hover-zoom-effect" id="round">
                                        <div class="icon">
                                            <i class="material-icons">people</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">Evaluasi Proker</div>
                                            <div class="number count-to" data-from="0" data-to="<?php echo $totalEvaluasi; ?>" data-speed="1000" data-fresh-interval="20"></div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>

                        </div>


                        <div class="header" align="center">
                            <h3>
                               <i>Output</i> dari program kerja                                         
                            </h3> 
                            <div class="alert alert-warning" id="round">
                                <strong>Informasi!</strong> Output program kerja merupakan penjelasan mengenai akhir/hasil dari terlaksananya program kerja. Untuk penjelasan lebih lanjut bisa <a href="javascript:void(0)" data-toggle="modal" data-target="#Modal_informasi">klik disini</a> 
                            </div>
                            <button class="btn btn-info get-id" data-toggle="modal" data-target="#Modal_output" id="round" ><i class="material-icons">edit</i></button>
                        </div>

                        <div class="body" id="refOutput">
                            <?= $output; ?>
                        </div>

                    </div>
                </div>
            </div> 
            <!-- #END# Basic Examples -->
        </div>
    </section>


<!-- Modal Ubah Proker -->
<div class="modal fade" id="Modal_edit_proker" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="round">
           <center>
            <div class="modal-body">
                  <!-- Form Proker -->
              <div class="alert alert-warning" id="round">
                  <strong>Informasi!</strong> Tahun periode kepengurusan dan lembaga akan menyesuaikan dengan ketua/ sekretaris yang meng-input.
                </div>
                    <form id="form_validation" name="form_edit_proker" class="form_edit_proker" method="POST" style="margin: 20px" onsubmit="return edit_proker()">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="proker_nama" id="proker_nama" required>
                            </div>
                        </div>
                         <div class="form-group form-float">
                            <div class="form-line">
                                <textarea type="text" class="form-control" name="proker_deskripsi" id="proker_deskripsi" required></textarea>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <select class="form-control" name="proker_jenis" id="proker_jenis" onchange="return date_hide_show(this.value)">
                                    <option id="test"></option>
                                    <option value="event">Event</option>
                                    <option value="non_event">Non Event</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-float hidden" id="date">
                             <div class="form-group">
                                <div class="form-line">
                                    <input type="date" class="form-control" id="proker_tanggal" name="proker_tanggal" >
                                </div>
                            </div>
                        </div>
                         <input type="hidden" name="proker_tahun" value="<?php echo $_SESSION['user_tahun'] ?>">
                         <input type="hidden" name="proker_lembaga" value="<?php echo $_SESSION['user_role'] ?>">
                         <input type="hidden" name="id_proker" value="<?= $_GET['id_proker'] ?>">
                        <button class="btn btn-primary waves-effect btn-lg" type="submit" id="round">Simpan</button>
                    </form>
                <!-- #END# Form Proker -->
            </div>
            </center>
        </div>
    </div>
</div>


<!-- Modal informasi -->
  <div class="modal fade" id="Modal_informasi" role="dialog" id="round">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Informasi detail mengenai output program kerja</h4>
        </div>
        <hr>
        <div class="modal-body">
           <strong>Penjelasan singkat</strong><br>
              Output dari proker adalah sebuah penjelasan mengenai tujuan dari program kerja yang telah tercapai atau akan tercapai.
              <p>
              <hr>
              <strong>Mengapa disarankan untuk diisi ?</strong><br>
              Penjelasan yang dibuat dapat memudahkan para pengurus Opmawa terutama pada periode berikutnya untuk mengetahui hasil / prestasi dari pelaksanaan program kerja. Selain itu, informasi mengenai output program kerja juga dapat mempermudah dosen dalam memeroleh informasi mengenai program kerja Opmawa yang nantinya informasi tersebut akan digunakan untuk kepentingan peningkatan kualitas dan sangat berguna pada saat dilaksanakannya akreditasi jurusan / program studi.
              <p>
              <hr>
              <strong>Saran tata cara mengisi yang disarankan</strong><br>
              Dalam pengisian, bisa dilakukan berdasarkan jenis proker.
              <ul>
                  <li>Event</li>
                  Pada program kerja event, pengisian dapat dengan cara menjelaskan apa yang dilakukan dan siapa yang mengikuti acara tersebut. Jika acara tersebut berupa kompetisi, dapat ditambahkan informasi mengenai kontestan dan siapa saja yang memeroleh penghargaan.
                  <li>Non event</li>
                  Pada program kerja non event, pengisian dapat dengan cara hanya menjelaskan tujuan dan hasil yang telah didapatkan dari pelaksanaan program kerja tersebut. 
              </ul>
              Dalam kata lain, pengisian output program kerja hampir sama dengan field report dari program kerja. Hanya saja sebagai informasi yang lebih ringkas dan mudah untuk dipahami.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal Output -->
  <div class="modal fade" id="Modal_output" role="dialog" id="round">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Informasi detail mengenai output program kerja</h4>
        </div>
        <hr>
        <div class="modal-body">
          <form class="form_output_proker" method="post" onsubmit="return output_proker()">
              <textarea style="width: 100%; min-height: 300px" name="proker_output"><?= $output ?></textarea>
              <input type="hidden" name="id_proker" value="<?= $_GET['id_proker'] ?>">

              <button class="btn btn-info" id="round" type="submit">Simpan</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">

function getValue(value) {
        
    var val = value;
    var split = val.split(",");

    document.getElementById('proker_nama').value = split[0];
    document.getElementById('proker_jenis').value = split[1];
    document.getElementById('proker_tanggal').value = split[2];
    document.getElementById('proker_deskripsi').value = split[3];
    
    if (split[1] == 'event') {
        $('#date').removeClass('hidden');
    }

    return false;
    
}

function date_hide_show(value){
    
    if (value == 'event') {
        $('#date').removeClass('hidden');
        return false;
    }

    else if (value == 'non_event') {
        $('#date').addClass('hidden');
        return false;    
    }
}

function edit_proker() {
    var data = $('.form_edit_proker').serialize();

    $.ajax({
        type: 'POST',
        data: data,
        url: "<?php echo base_url('Proker_C/ubah_proker') ?>",
        success: function() {
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'Data proker diubah',
              showConfirmButton: false,
              timer: 1500
            }).then(function(){
                var ref = $('#refDataProker');
                $('#refDataProker').load(document.URL +  ' #refDataProker', function() {
                    ref.children('#refDataProker').unwrap();});
                $('#refNamaProker').load(document.URL +  ' #refNamaProker');
            })     
        }
    });

    return false;
}


function output_proker() {

    var data = $('.form_output_proker').serialize();

    $.ajax({
        type: 'POST',
        data: data,
        url: "<?php echo base_url('Proker_C/ubah_output') ?>",
        success: function() {
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'Output diubah',
              showConfirmButton: false,
              timer: 1500
            }).then(function(){
                $('#refOutput').load(document.URL +  ' #refOutput');
            })     
        }
    });

    return false;
}
</script>