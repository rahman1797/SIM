      <style type="text/css">
          #round {
            border-radius: 15px;
          }
      </style>


      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>DAFTAR ANGGOTA OPMAWA</strong></h2>
                            <p></p>
                            <a href="#" class="btn btn-lg btn-info waves-effect" id="round">Tambah Anggota</a>
                                
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



