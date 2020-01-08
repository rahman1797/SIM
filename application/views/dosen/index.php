      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>KEGIATAN PROGRAM KERJA OLEH EKSEKUTIF FMIPA</strong></h2>
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="refProker" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                    <thead>
                                        <tr>
                                            <th>Nama Proker</th>
                                            <th>Tahun Kepengurusan</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Proker</th>
                                            <th>Tahun Kepengurusan</th>
                                            <th>Detail</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                            foreach($data_proker_opmawa as $pd){
                                            if ($pd->proker_lembaga == 1) {
                                              
                                            $date = date_create($pd->proker_tanggal);
                                            $id_proker = $pd->proker_ID
                                            ?>
                                            <tr>
                                                <td><?php echo $pd->proker_nama ?></td>
                                               
                                                 <td><?php echo $pd->proker_tahun." - ".(($pd->proker_tahun) + 1); ?></td>
                                                 <td>
                                                     <a href="<?php echo base_url('Dosen_C/proker_opmawa_detail?id_proker='.$id_proker)?>">
                                                        <button class="btn btn-info" id="round"><i class="material-icons">more_horiz</i></button>
                                                    </a>
                                                 
                                                       <?php } }
                                             ?>
                                                 
                                                 </td>
                                            </tr>
                                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>KEGIATAN PROGRAM KERJA OLEH LEGISLATIF FMIPA</strong></h2>
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="refProker" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                    <thead>
                                        <tr>
                                            <th>Nama Proker</th>
                                            <th>Tahun Kepengurusan</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Proker</th>
                                            <th>Tahun Kepengurusan</th>
                                            <th>Detail</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                            foreach($data_proker_opmawa as $pd){ 
                                            if ($pd->proker_lembaga == 2) {
                                            $date = date_create($pd->proker_tanggal);
                                            $id_proker = $pd->proker_ID
                                            ?>
                                            <tr>
                                                <td><?php echo $pd->proker_nama ?></td>
                                               
                                                 <td><?php echo $pd->proker_tahun." - ".(($pd->proker_tahun) + 1); ?></td>
                                                 <td>
                                                     <a href="<?php echo base_url('Dosen_C/proker_opmawa_detail?id_proker='.$id_proker)?>">
                                                        <button class="btn btn-info" id="round"><i class="material-icons">more_horiz</i></button>
                                                    </a>
                                                 
                                                       <?php } }
                                             ?>
                                                 
                                                 </td>
                                            </tr>
                                            
                                    </tbody>
                                </table>
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
                                            <th>Lembaga</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama / Link</th>
                                            <th>Diupload Oleh</th>
                                            <th>Tanggal upload</th>
                                            <th>Lembaga</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php                     
                                            foreach($proker_berkas_lpj as $bd){ 
                                                $idUser = $bd->id_user;
                                                $idProker = $bd->id_proker;
                                                $idToUser = $this->M_user->getUserNama($idUser); ?>
                                            <tr>
                                                <td><?php echo $bd->berkas_nama; ?></td>
                                                <td><?php echo $idToUser['0']['user_nama']; ?></td>           
                                                <td><?php echo $bd->berkas_tanggal; ?></td>  
                                                <td><?php if ($bd->berkas_lembaga == 1) {
                                                    echo "Eksekutif";
                                                } else {
                                                    echo "Legislatif";
                                                } ?></td>           
                                                <td>
                                                    <?php if($bd->berkas_jenis != 'link') { ?>
                                                      <a href="<?php echo base_url('Berkas_C/download?name='.$bd->berkas_nama.'&id_proker='.$idProker) ?>"><button button class="btn btn-info" id="round"><i class="material-icons">cloud_download</i></button></a>
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
            <!-- #END# Basic Examples -->
        </div>
    </section>


<script type="text/javascript">


</script>