      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" id="round">
                        <div class="header" align="center">
                            <h2><strong>PROGRAM KERJA BEM</strong></h2>
                            <p></p>
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
                                            <th>Detail / Beri Nilai</th>
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
                                            foreach($proker_BEM as $pd){ 
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
                                                 <td><?php if ($pd->proker_nilai) 
                                                            {
                                                                echo $pd->proker_nilai;
                                                            }
                                                            // elseif ($_SESSION['user_role'] == 2) {
                                                            //     echo "<font color='red'>Nan</font>";
                                                            // }
                                                          else 
                                                            {
                                                                echo "<font color='red'>Proker belum dinilai</font>";
                                                            }
                                                 ?></td>
                                                 <td>
                                                    <?php  
                                                    if ($pd->proker_tahun != $_SESSION['user_tahun']) 
                                                    {
                                                       echo "<button class='btn btn-danger' id='round' disabled>Locked</button>";
                                                    }

                                                    else { ?>
                                                     
                                                     <a href="<?php echo base_url('Proker_C/proker_bem_detail?id_proker='.$id_proker)?>">
                                                        <button class="btn btn-info" id="round"><i class="material-icons">more_horiz</i></button>
                                                    </a>
                                                    
                                                    <?php $value = [$pd->proker_nilai, $pd->proker_ID];?> 
                                                    <button class="btn btn-info get-id" data-toggle="modal" data-target="#ModalNilai" id="round" value="<?php echo $value['0'].'-'.$value['1'] ?>" onclick="return getValue(this.value)" ><i class="material-icons">edit</i></button>
                                                    
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
        <div class="modal fade" id="ModalNilai" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="round">
                   <center>
                    <div class="modal-body">

                            <form id="form_validation" name="formNilai" class="formNilai" method="POST" style="margin: 20px" onsubmit="return submitNilai()">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        Nilai Proker
                                        <input type="text" class="form-control getValue" name="proker_nilai" id="proker_nilai" required>
                                    </div>
                                </div>
                                 <input type="hidden" name="proker_ID" id="idProker">
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


    function getValue(nilai){
        var val = nilai;
        var split = val.split("-")
        document.getElementById("proker_nilai").value = split[0];
        document.getElementById("idProker").value = split[1];
    }

     function submitNilai() {

         var data = $('.formNilai').serialize();
                  
            $.ajax({
                type: 'POST',
                data: data,
                url: "<?php echo base_url('Proker_C/nilai_proker_bem') ?>",
                success: function() {
                    Swal.fire({
                      position: 'top-end',
                      type: 'success',
                      title: 'Berhasil Menilai',
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