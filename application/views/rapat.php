
      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header">
                            <h2><strong>Tambah Jadwal</strong></h2>
                            <p></p>
                            <div class="row">
                                <form method="POST">
                                    <div class="col-lg-4">
                                        <input class="form-control" type="date" name="rapat_tanggal">
                                    </div>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="rapat_deskripsi" placeholder="Keterangan">
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="submit"></button>  
                                    </div>
                                </form>
                                
                            </div>
                            
                            
                            
                        </div>
                        
                        
                    </div>


                    <div class="body">
                        <?php foreach ($jadwal_rapat as $jadwal) { ?>
                            <div class="card" id="round">
                                <div class="body row">
                                    <div class="col-lg-3">
                                        <?php echo date('d F Y', strtotime($jadwal->rapat_tanggal));?>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="bg-pink" style="padding: 5px; width: auto" id="round">
                                            <?php $date = strtotime($jadwal->rapat_tanggal);
                                              $diff = $date - time();
                                              $days = floor($diff/(60*60*24));  
                                              $hours = round(($diff-$days*60*60*24)/(60*60));

                                              echo "$days hari $hours jam lagi";
                                             ?>
                                        </div>
                                        
                                        <p>
                                        <?php echo $jadwal->rapat_deskripsi; ?>
                                    </div>
                                </div>
                            </div>
                       <?php } ?>
                                

                        </div>
                </div>
            </div> 

            <!-- #END# Basic Examples -->
        </div>
    </section>





<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> -->

<script type="text/javascript">

  

</script>