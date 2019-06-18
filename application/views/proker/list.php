      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>DAFTAR PROGRAM KERJA</strong></h2>
                            <p></p>
                            <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalAnggota" id="round">Tambah Program Kerja</button>  
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="refAng" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Lembaga</th>
                                            <th>Tahun</th>
                                            <th>Nilai</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Lembaga</th>
                                            <th>Tahun</th>
                                            <th>Nilai</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                       
                                            foreach($proker_data as $pd){ 
                                            $date = date_create($pd->proker_tanggal);
                                            ?>
                                            <tr>
                                                <td><?php echo $pd->proker_nama ?></td>
                                                <td><?php echo date_format($date,"d-M-Y"); ?></td>
                                                <td><?php if ($pd->proker_lembaga == 1) 
                                                            {
                                                                echo "Eksekutif";
                                                            }
                                                          elseif ($pd->proker_lembaga == 2) 
                                                            {
                                                                echo "Legislatif";
                                                            }
                                                 ?></td>
                                                 <td><?php echo $pd->proker_tahun ?></td>
                                                 <td><?php echo $pd->proker_nilai ?></td>
                                                 <td>
                                                     <button class="btn btn-info">Panitia</button>
                                                     <button class="btn btn-info">To Do List</button>
                                                     <button class="btn btn-info">Edit</button>
                                                     <button class="btn btn-info">Field Report</button>
                                                     <button class="btn btn-info">Dokumen</button>
                                                     <button class="btn btn-danger">Hapus</button>
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