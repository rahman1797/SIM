<section class="content">
        <div class="container-fluid">
            
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-zoom-effect" id="round">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">DAFTAR TUGAS</div>
                            <div class="number count-to" data-from="0" data-to="10" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-zoom-effect" id="round">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">Komentar</div>
                            <div class="number count-to" data-from="0" data-to="1" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-zoom-effect" id="round">
                        <div class="icon">
                            <i class="material-icons">attachment</i>
                        </div>
                        <div class="content">
                            <div class="text">File</div>
                            <div class="number count-to" data-from="0" data-to="120" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
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
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Proker</th>
                                            <th>Status</th>
                                            <th>Ketua Pelaksana</th>
                                            <th>Progres</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                        $no = 1;
                                        foreach ($data_proker as $dp) {
                                         
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $dp->proker_nama; ?></td>
                                            <td><span class="label bg-green">Pending</span></td>
                                            <td>Orang 1</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-orange" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 80%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php    
                                            }
                                        ?>
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
                                            <th>Nama Proker</th>
                                            <th>Tugas</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data_tugasSaya as $ts) {
                                            $idProker = $ts->id_proker;
                                            $idToProker = $this->M_proker->getProkerNama($idProker);
                                        ?>
                                        <tr onclick="return check()" style="cursor: pointer;">
                                            <td><?php echo $idToProker['0']['proker_nama'];  ?></td>
                                            <td><?php echo $ts->prokerTugas_deskripsi; ?></td>
                                            <td><span class="label bg-green">Clear</span></td>
                                            
                                        </tr>
                                        <?php 
                                            } 
                                        ?>                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Info Tugas Saya -->

                  <!-- Keuangan Chart -->
                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header">
                            <h2>Grafik Keuangan</h2>
                        </div>
                        <div class="body">
                            <div id="chartContainer" style="height: 300px; max-width: 800px; margin: 0px auto;"></div>
                        </div>
                    </div>
                </div>
                <!-- #END# Keuangan Chart -->

            </div>           
        </div>
    </section>


    <script>
        window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
              
            axisY: {
                title: "Rupiah (Rp)",
                titleFontColor: "#4F81BC",
            },
             
            toolTip: {
                shared: true
            },

            data: [{
                type: "column",
                name: "Pemasukkan",         
                dataPoints:[
                    { label: "BINER", y: 200000 },
                    { label: "BINER 2.0", y: 150000 },
                    { label: "BINER 3.0", y: 125000 },
                    { label: "BINER 4.0", y: 210000 },
                    { label: "BINER 5.0", y: 210000 },
                ]
            },
            {
                type: "column", 
                name: "Pengeluaran",
                dataPoints:[
                    { label: "BINER", y: 210000 },
                    { label: "BINER 2.0", y: 100000 },
                    { label: "BINER 3.0", y: 125000 },
                    { label: "BINER 4.0", y: 300000 },
                    { label: "BINER 5.0", y: 210000 },
                ]
            }]
        });
        chart.render();

        }

        function check(){
            window.alert('TEST')
        }
    </script>