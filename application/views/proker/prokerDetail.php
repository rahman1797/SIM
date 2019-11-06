      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h1><strong>
                                <?php 
                                    foreach ($proker_data as $pd) {
                                        $date = date_create($pd->proker_tanggal);
                                        echo $pd->proker_nama;
                                ?>
                            </h1></strong>  
                        </div>
                        
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php 
                                        echo "<strong>Rencana Pelaksanaan : </strong>" .date_format($date,"d M Y");
                                    ?>
                                </div>
                                <div class="col-lg-3">
                                    <?php 
                                                
                                      if ($pd->proker_nilai) 
                                        {
                                            echo "<strong>Penilaian : </strong>" . $pd->proker_nilai;
                                        }

                                      else 
                                        {
                                            echo "<strong>Penilaian : </strong>" . "<font color='red'>Proker belum dinilai</font>";
                                        };
                                    ?>
                                </div>
                                <div class="col-lg-3">
                                    <?php 
                                        echo "<strong>Jumlah Panitia : </strong>" . "100"; 
                                    ?>
                                </div>
                                <div class="col-lg-3">
                                    <?php 
                                        echo "<strong>Status : </strong>" ."Sedang Berjalan";
                                    }
                                    ?>
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
                            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                <a href="<?php echo base_url('Berkas_C/index?id_proker='.$_GET['id_proker']) ?>">
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
                            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                <a href="<?php echo base_url('Keuangan_C/index?id_proker='.$_GET['id_proker']) ?>">
                                <div style="cursor: pointer;" class="info-box bg-green hover-zoom-effect" id="round">
                                    <div class="icon">
                                        <i class="material-icons">timeline</i>
                                    </div>
                                    <div class="content">
                                        <div class="text">Laporan Keuangan</div>
                                        <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
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
                    </div>
                </div>
            </div> 
            <!-- #END# Basic Examples -->
        </div>
    </section>

<script type="text/javascript">

</script>