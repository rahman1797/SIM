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
                                        echo "<strong>Tanggal Pelaksanaan : </strong>" .date_format($date,"d M Y");
                                    ?>
                                </div>
                                <div class="col-lg-3">
                                    <?php 
                                        echo "<strong>Penilaian Proker : </strong>" . $pd->proker_nilai;
                                    ?>
                                </div>
                                <div class="col-lg-3">
                                    <?php 
                                        echo "<strong>Jumlah Panitia Terdaftar : </strong>" . "100"; 
                                    ?>
                                </div>
                                <div class="col-lg-3">
                                    <?php 
                                        echo "<strong>Tanggal Pelaksanaan : </strong>" .date_format($date,"d-M-Y");
                                    }
                                    ?>
                                </div>
                            </div>

                            <!-- Widgets -->
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box bg-pink hover-expand-effect" id="round">
                                    <div class="icon">
                                        <i class="material-icons">assignment_turned_in</i>
                                    </div>
                                    <div class="content">
                                        <div class="text">DAFTAR TUGAS</div>
                                        <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box bg-light-green hover-expand-effect" id="round">
                                    <div class="icon">
                                        <i class="material-icons">people</i>
                                    </div>
                                    <div class="content">
                                        <div class="text">Daftar Panitia</div>
                                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box bg-orange hover-expand-effect" id="round">
                                    <div class="icon">
                                        <i class="material-icons">description</i>
                                    </div>
                                    <div class="content">
                                        <div class="text">Dokumen</div>
                                        <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        </div>
                    </div>
                </div>
            </div> 

            <!-- #END# Basic Examples -->
        </div>
    </section>





<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">

</script>