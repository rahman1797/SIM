<section class="content">
    <div class="container-fluid">
    
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" id="round"> 
                    <form action="<?php echo site_url('Berkas_C/uploadBerkas') ?>" method="post" enctype="multipart/form-data" name="userfile">
                      <div class="form-group">
                        <label for="userfile">Upload berkas berupa file</label>
                        <input type="file" class="form-control-file" name="userfile" id="userfile">
                      </div>
                      <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
             </div> 

             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" id="round">
                    <div class="header" align="center">
                        <h2><strong>DAFTAR BERKAS FILE</strong></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="refAng" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                <thead>
                                    <tr>
                                        <th>Nama File</th>
                                        <th>Di upload oleh</th>
                                        <th>Program kerja</th>
                                        <th>Tanggal di upload</th>
                                        <th>Kelola</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nama File</th>
                                        <th>Di upload oleh</th>
                                        <th>Program kerja</th>
                                        <th>Tanggal di upload</th>
                                        <th>Kelola</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                        foreach($berkas_data as $bd){ 
                                            $idUser = $bd->id_user;
                                            $idProker = $bd->id_proker;
                                            $idToUser = $this->M_user->getUserNama($idUser);
                                            $idToProker = $this->M_proker->getProkerNama($idProker);
                                    ?>
                                    <tr>
                                        <td><?php echo $bd->berkas_nama; ?></td>
                                        <td><?php echo $idToUser['0']['user_nama']; ?></td>
                                        <td><?php 
                                            if ($idToProker['0']['proker_nama']) 
                                            {
                                                echo $idToProker['0']['proker_nama'];
                                            }
                                            else 
                                            {
                                                echo "<font color='red'>Umum</font>";
                                            }
                                         ?>    
                                        </td>
                                        <td><?php echo $bd->berkas_tanggal; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('Berkas_C/download?name='.$bd->berkas_nama) ?>"><button button class="btn btn-info" id="round">Unduh</button></a>
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
