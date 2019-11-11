  <?php $idToProker = $this->M_proker->getProkerNama($_GET['id_proker']); ?>
    <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <?php if ($idToProker['0']['proker_tahun'] == $_SESSION['user_tahun']) { ?>
                    <div class="card" id="round">
                             
                        <form action="<?php echo site_url('Berkas_C/uploadBerkas?id_proker='.$_GET['id_proker']);?>" method="post" enctype="multipart/form-data" name="userfile">

                          <div class="form-group">
                            <label for="userfile">Upload berkas berupa file</label>
                            <input type="file" class="form-control-file" name="userfile" id="userfile">
                            <input type="hidden" name="id_proker" value="<?php $_GET['id_proker'] ?>">      
                          </div>
             
                          <button type="submit" class="btn btn-primary"><i class="material-icons">cloud_upload</i></button>
                        </form>

                    </div>
                    <?php } ?>
                 </div> 

                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>BERKAS (FILE) PROGRAM KERJA</strong></h2>
                        </div>       
                        <div class="body">
                            <div class="table-responsive">
                                <table id="refAng" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Oleh</th>
                                            <th>Program kerja</th>
                                            <th>Tanggal</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Oleh</th>
                                            <th>Program kerja</th>
                                            <th>Tanggal</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php                     
                                            foreach($berkas_data as $bd){ 
                                                $idUser = $bd->id_user;
                                                $idProker = $bd->id_proker;
                                                $idToUser = $this->M_user->getUserNama($idUser);
                                            
                                                if ($idProker == $_GET['id_proker']) {           
                                                
                                            ?>

                                            <tr>
                                                <td><?php echo $bd->berkas_nama; ?></td>
                                                <td><?php echo $idToUser['0']['user_nama']; ?></td>
                                                <td><?php if ($idToProker['0']['proker_nama']) 
                                                            {
                                                                echo $idToProker['0']['proker_nama'];
                                                            }
                                                            else 
                                                            {
                                                                echo "Umum";
                                                            }
                                                 ?>    
                                                </td>            
                                                <td><?php echo $bd->berkas_tanggal; ?></td>           
                                                <td>

                                                    <a href="<?php echo base_url('Berkas_C/download?name='.$bd->berkas_nama) ?>"><button button class="btn btn-info" id="round"><i class="material-icons">cloud_download</i></button></a>
                                                     
                                                    <?php if ($idToProker['0']['proker_tahun'] == $_SESSION['user_tahun']) { ?>
                                                         <a href="<?php echo site_url();?>/Berkas_C/delBerkas/<?php print($bd->berkas_ID);?>"><button class="btn btn-danger" id="round" onclick="return delConfirm()"><i class="material-icons">delete_forever</i></button></a>
                                                 <?php } 
                                                    else {
                                                        echo "Locked";
                                                    }
                                                 ?>                        
                                                </td>
                                            </tr>
                                    
                                        <?php } 

                                          } ?>
                                        
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

<script type="text/javascript">

         function delConfirm()
            {
                job = confirm("Are you sure to delete permanently?");
                
                if(job != true)
                {
                    return false;
                }
            }

</script>

