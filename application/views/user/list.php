      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>DAFTAR ANGGOTA OPMAWA</strong></h2>
                            <p></p>
                            <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#defaultModal" id="round">Tambah Anggota</button>  
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="round" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Prodi</th>
                                            <th>Posisi</th>
                                            <th>Tahun</th>
                                            <th>Lembaga</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Prodi</th>
                                            <th>Posisi</th>
                                            <th>Tahun</th>
                                            <th>Lembaga</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                       
                                            foreach($user_data as $u){ 
                                                $idToProdi = $this->M_user->getProdi($u->user_prodi);
                                            ?>
                                            <tr>
                                                <td><?php echo $u->user_nama ?></td>
                                                <td><?php echo $u->user_NIM ?></td>
                                                <td><?php echo $idToProdi['0']['prodi_nama'] ?></td>
                                                <td><?php echo $u->user_posisi ?></td>
                                                <td><?php echo $u->user_tahun ?></td>
                                                <td><?php if ($u->user_role == 1) 
                                                            {
                                                                echo "Eksekutif";
                                                            }
                                                          elseif ($u->user_role == 2) 
                                                            {
                                                                echo "Legislatif";
                                                            }
                                                 ?></td>
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





 <!-- Default Size -->
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan
                            vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper.
                            Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus
                            nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.
                            Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>


