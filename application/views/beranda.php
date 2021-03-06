<?php if ($_SESSION['user_role'] == 0) {
    redirect(base_url('Dosen_C'));
}
$data_opmawa_user = $this->M_sys->getOpmawaData($_SESSION['user_opmawa']); ?>

<section class="content">
        <div class="container-fluid">
            
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <a href="<?php echo base_url('Rapat_C') ?>">
                    <div class="info-box bg-light-green hover-zoom-effect" id="round" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">Jadwal Rapat Terdekat</div>

                            <?php foreach ($rapat_terdekat as $r) {
                                if (strtotime($r->rapat_tanggal) > strtotime("now")) {
                                    echo date('d F Y', strtotime($r->rapat_tanggal));
                                    break;
                            } } ?>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <a href="<?php echo base_url('Berkas_C') ?>">
                    <div class="info-box bg-orange hover-zoom-effect" id="round" style="cursor: pointer;">
                        <div class="icon">
                            <i class="material-icons">attachment</i>
                        </div>
                        <div class="content">
                            <div class="text">Semua berkas</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $allBerkas ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <!-- #END# Widgets -->
            
            <div class="row clearfix">
               
                <!-- INFO STATUS PROKER -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card" id="round">
                        <div class="header">
                            <h2>INFO PROGRAM KERJA</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="refDaftarProker" class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Proker</th>
                                            <!-- <th>Status</th> -->
                                            <th>Tanggal Pelaksanaan</th>
                                            <th>Progres</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach ($data_proker as $dp) {

                                        $data_opmawa_proker = $this->M_sys->getOpmawaData($dp->id_opmawa);
                                        
                                        // Memfilter opmawa berdasarkan tingkatan level dan prodi
                                        if ($data_opmawa_user["0"]["opmawa_level"] == $data_opmawa_proker["0"]["opmawa_level"]) {
                                            
                                            if ($dp->proker_tahun == $_SESSION['user_tahun']) {
                                            $id_proker = $dp->proker_ID;
                                            $progress = $this->M_proker->Progress_proker($id_proker);
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><a href="<?php echo base_url('Proker_C/prokerDetail?id_proker='.$id_proker)?>"><?php echo $dp->proker_nama . "</a>"; ?></a></td>
                                                <!-- <td><span class="label bg-green">Pending</span></td> -->
                                                <td><?php if ($dp->proker_jenis == "event") {
                                                        echo date('d F Y', strtotime($dp->proker_tanggal));
                                                    }
                                                    else {
                                                        echo "<font color='red'>non-event</font>";
                                                    } ?>
                                                </td>
                                                <td>
                                                    <div class="progress">
                                                        <?php if (is_nan($progress)) {
                                                            $progress = 100 ?>
                                                            <div id="progress" class="progress-bar bg-orange" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?= $progress; ?>%"></div>
                                                        <?php } else { ?>
                                                            <div id="progress" class="progress-bar bg-green" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?= $progress; ?>%"></div>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# INFO STATUS PROKER -->

                <!-- Info Tugas Saya -->
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="card" id="round">
                        <div class="header">
                            <h2>INFO Tugas Saya</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos" id="refTugasSaya">
                                    <thead>
                                        <tr>
                                            <th>Proker</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>     
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data_tugasSaya as $ts) {
                                            $idProker = $ts->id_proker;
                                            $idToProker = $this->M_proker->getProkerNama($idProker);
                                            $idTugas = $ts->prokerTugas_ID;
                                            $statusTugas = $ts->prokerTugas_status;
                                        ?>
                                        <tr onclick="return check(<?php echo $idTugas ?>, <?php echo $statusTugas ?>)" style="cursor: pointer;">
                                            <td><?php echo $idToProker['0']['proker_nama'];  ?></td>
                                            <td><?php if ($statusTugas == 0) {
                                                echo $ts->prokerTugas_deskripsi ?></td>
                                            <td><?php 
                                                 echo "<span class='label bg-red'>Belum</span>";
                                                 }
                                                  elseif ($statusTugas == 1) {
                                                     echo '<del>'.$ts->prokerTugas_deskripsi.'</del>' ?></td>
                                            <td><?php 
                                                 echo "<span class='label bg-green'>Clear</span>";
                                                  }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php } ?>                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Info Tugas Saya -->

            </div>           
        </div>
    </section>
  
    <script>
      

      function check($idTugas, $statusTugas){

        $.ajax({

            data: {
                prokerTugas_ID : $idTugas, 
                prokerTugas_status : $statusTugas
            },
            url: "<?php echo base_url('Proker_C/checkTugas') ?>",
            type: "POST",

            success: function(){  
                $('#refTugasSaya').load(document.URL +  ' #refTugasSaya');
                var ref = $('#refDaftarProker'); 
                $('#refDaftarProker').load(document.URL +  ' #refDaftarProker', function() {
                ref.children('#refDaftarProker').unwrap();});
                 //You can remove here
            },
            //on error
            error: function(){
                    console.log("***********Error***************"); //You can remove here
            }
        });
    }



// $('#progress').attr("style","width:"+ <?= $progress ?> + ""); 
</script>