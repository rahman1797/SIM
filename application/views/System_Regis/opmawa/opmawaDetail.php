      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h1><strong>
                                <?php 
                                    foreach ($detail_opmawa as $do) {
                                        echo $do->opmawa_kabinet;
                                        $idToNama = $this->M_user->getUserNama($do->id_user);
                                ?>
                            </h1></strong>  
                        </div>
                        
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php 
                                    
                                        echo "<strong>Nama Ketua : </strong>" . $idToNama['0']['user_nama'];
                                    
                                    ?>
                                </div>
                                <div class="col-lg-3">
                                    <?php 
                                                
                                        echo "<strong>Penilaian Proker : </strong>"  ;
                                      
                                    ?>
                                </div>
                                
                                <div class="col-lg-3">
                                    <?php 
                                        echo "<strong>Penilaian Opmawa : </strong>" ."78";
                                    }
                                    ?>
                                </div>
                            </div>



                      
                            <div class="table-responsive">
                                <table id="refAng" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                    <thead>
                                        <tr>
                                            <th>Nama Departemen/Biro</th>
                                            <th>Jumlah Anggota</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Departemen/Biro</th>
                                            <th>Jumlah Anggota</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                       
                                            foreach($detail_departemenOpmawa as $ddo){ 
                                                
                                            ?>
                                            <tr>
                                                <td><?php echo $ddo->departemen_nama ?></td>
                                                <td><?php echo "2" ?></td>
                                                <td>
       
                                                    <a href="<?php echo site_url();?>/Main_C/delDepartemen/<?php print($ddo->departemen_ID);?>"><button class="btn btn-danger" id="round" onclick="return delConfirm()">Delete</button></a>                                                
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





<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">

</script>