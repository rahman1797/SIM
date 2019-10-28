      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>PROGRAM KERJA</strong></h2>
                            <p></p>
                            <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalProker" id="round"><i class="material-icons">library_add</i> Program Kerja</button>  
                        </div>
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table id="refProker" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                    <thead>
                                        <tr>
                                            <th>Nama Proker</th>
                                            <th>Tanggal</th>
                                            <th>Lembaga</th>
                                            <th>Tahun Kepengurusan</th>
                                            <th>Nilai</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Proker</th>
                                            <th>Tanggal</th>
                                            <th>Lembaga</th>
                                            <th>Tahun Kepengurusan</th>
                                            <th>Nilai</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                            foreach($proker_data as $pd){ 
                                            $date = date_create($pd->proker_tanggal);
                                            $id_proker = $pd->proker_ID
                                            ?>
                                            <tr>
                                                <td><?php echo $pd->proker_nama ?></td>
                                                <td><?php echo date_format($date,"d M Y"); ?></td>
                                                <td><?php if ($pd->proker_lembaga == 1) 
                                                            {
                                                                echo "Eksekutif";
                                                            }
                                                          elseif ($pd->proker_lembaga == 2) 
                                                            {
                                                                echo "Legislatif";
                                                            }
                                                 ?></td>
                                                 <td><?php echo $pd->proker_tahun." - ".(($pd->proker_tahun) + 1); ?></td>
                                                 <td><?php if ($pd->proker_nilai && ($_SESSION['user_role'] == 1)) 
                                                            {
                                                                echo $pd->proker_nilai;
                                                            }
                                                            elseif ($_SESSION['user_role'] == 2) {
                                                                echo "<font color='red'>Nan</font>";
                                                            }
                                                          else 
                                                            {
                                                                echo "<font color='red'>Proker belum dinilai</font>";
                                                            }
                                                 ?></td>
                                                 <td>
                                                     <a href="<?php echo base_url('Proker_C/prokerDetail?id_proker='.$id_proker)?>">
                                                        <button class="btn btn-info" id="round"><i class="material-icons">more_horiz</i></button>
                                                    </a>
                                                  <?php 
                                                        if ($pd->proker_tahun != $_SESSION['user_tahun']) 
                                                        {
                                                            echo "<button class='btn btn-danger' id='round' disabled>Locked</button>";
                                                        }

                                                        else 
                                                        {  ?>
                                                           <a href='<?php echo site_url();?>/Proker_C/delProker/<?php print($pd->proker_ID);?>'><button class='btn btn-danger' id='round' onclick='return delConfirm()'><i class="material-icons">delete_forever</i></button></a>
                                                       <?php }
                                            } ?>
                                                 
                                                 </td>
                                            </tr>
                                            
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



<!-- Modal Tambah Anggota -->
            <div class="modal fade" id="ModalProker" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" id="round">
                       <center>
                        <div class="modal-body">
                              <!-- Form Angggota -->
                          <div class="alert alert-warning" id="round">
                              <strong>Informasi!</strong> Tahun periode kepengurusan dan lembaga akan menyesuaikan dengan ketua/ sekretaris yang meng-input.
                            </div>
                                <form id="form_validation" name="formProker" class="formProker" method="POST" style="margin: 20px" onsubmit="return submitProker()">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="proker_nama" id="Proker_nama" required>
                                            <label class="form-label">Nama Proker</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                         <div class="form-group">
                                        <div class="form-line" id="inputDate">
                                            <input type="date" class="form-control" name="proker_tanggal" placeholder="Please choose a date...">
                                        </div>
                                    </div>
                                    </div>
                                     <input type="hidden" name="proker_tahun" value="<?php echo $_SESSION['user_tahun'] ?>">
                                     <input type="hidden" name="proker_lembaga" value="<?php echo $_SESSION['user_role'] ?>">
                                    <button class="btn btn-primary waves-effect btn-lg" type="submit" id="round">Simpan</button>
                                </form>

                            <!-- #END# Form Anggota -->
                        </div>
                        </center>
                    </div>
                </div>
            </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">
     $(function () {
                $('#inputDate').datetimepicker({
                    format: 'LT'
                });
            });

     function submitProker() {

         var data = $('.formProker').serialize();
                  
            $.ajax({
                type: 'POST',
                data: data,
                url: "<?php echo base_url('Proker_C/addProker') ?>",
                success: function() {
                    Swal.fire({
                      position: 'top-end',
                      type: 'success',
                      title: 'Berhasil Menambah Proker',
                      showConfirmButton: false,
                      timer: 1500
                    }).then(function(){
                        $('#refProker').load(document.URL +  ' #refProker');
                    })     
                }
            });
            
            return false;
        }

         function delConfirm()
            {
                job = confirm("Are you sure to delete permanently?");
                
                if(job != true)
                {
                    return false;
                }
            }
</script>