<section class="content">
    <div class="container-fluid">
    
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" id="round">
                    <div class="header" align="center">
                        <h1><strong>
                            <?php foreach ($detail_opmawa as $do) {
                                    echo $do->opmawa_kabinet;
                                    $idToNama = $this->M_user->getUserNama($do->id_user);
                                    $idToProdi = $this->M_user->getProdi($do->opmawa_level); ?>
                        </h1></strong>  
                        <?php if ($do->opmawa_level == 0) { 
                            echo "<strong>Tingkat : </strong>Fakultas";
                         } else {
                            echo "<strong>Tingkat : </strong> Prodi - " . $idToProdi['0']['prodi_nama'];
                         } echo "<br><strong>Ketua : </strong>" . $idToNama['0']['user_nama']; ?>
                    </div>
                    
                    <div class="body">
                        <div class="header" align="center">
                            <div class="alert alert-warning" id="round">
                              <strong>Informasi!</strong> Data ini merupakan daftar departemen / biro yang terdaftar di dalam kabinet.
                            </div>
                            <?php if ($_SESSION['user_opmawa'] == $_GET['id_opmawa']) { ?>
                            <button class="btn btn-lg btn-info waves-effect" data-toggle="modal" data-target="#ModalDepartemen" id="round"><i class="material-icons">library_add</i> Tambah</button>  
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <?php if($do->id_user == 0) { ?>
                                    <button class="btn btn-sm btn-info waves-effect" data-toggle="modal" data-target="#ModalKetua" id="round"><i class="material-icons">library_add</i> Tambahkan Ketua</button>  
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="table-responsive">
                            <table id="refDep" class="table table-bordered table-striped table-hover js-basic-example dataTable round_edge">
                                <thead>
                                    <tr>
                                        <th>Nama Departemen / Biro</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nama Departemen / Biro</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach($detail_departemenOpmawa as $ddo) { ?>
                                        <tr>
                                            <td><?php echo $ddo->departemen_nama ?></td>
                                            <td><?php if ($_SESSION['user_opmawa'] == $_GET['id_opmawa']) { ?> 
                                                <a href="<?php echo site_url();?>/Main_C/delDepartemen/<?php print($ddo->departemen_ID);?>"><button class="btn btn-danger" id="round" onclick="return delConfirm()"><i class="material-icons">delete_forever</i></button></a>
                                                <?php } else {
                                                    echo "Locked";
                                                } ?>
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

<!-- Modal Departemen -->
<div class="modal fade" id="ModalDepartemen" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="round">
           <center>
            <div class="modal-body">
                <!-- Form departemen -->
                <form id="form_validation" class="formDepart" method="POST" style="margin: 20px" onsubmit="return submitDepart()">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Nama Departemen/Biro</label>
                            <input type="text" class="form-control" name="nama_departemen" id="nama_departemen" required>
                        </div>
                    </div>
                    <input type="hidden" name="id_opmawa" value="<?php echo $_GET['id_opmawa'] ?>">
                    <button class="btn btn-primary waves-effect btn-lg" type="submit" id="round">Simpan</button>
                </form>
                <!-- #END# Form Departemen -->
            </div>
            </center>
        </div>
    </div>
</div>

<!-- Modal Ketua -->
<div class="modal fade" id="ModalKetua" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="round">
           <center>
            <div class="modal-body">
                <!-- Form departemen -->
                <!-- <form id="form_validation" class="formKetua" method="POST" style="margin: 20px" onsubmit="return submitKetua()"> -->
                <form id="form_validation" class="formKetua" method="POST" style="margin: 20px" action="<?php echo base_url('Main_C/addKetuaOpmawa') ?>">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select class="form-control show-tick" name="user_nama" data-live-search="true" required>
                                <option value="">-- Nama Ketua --</option>
                                <?php foreach ($user_data as $ud) {
                                        echo "<option value='$ud->user_ID'>".$ud->user_nama."</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select class="form-control show-tick" name="user_departemen" data-live-search="true">
                                <option value="">-- Departemen --</option>
                                <?php 
                                    foreach ($detail_departemenOpmawa as $dd) {
                                        echo "<option value='$dd->departemen_ID'>".$dd->departemen_nama ."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="id_opmawa" value="<?php echo $do->opmawa_ID ?>">
                    <button class="btn btn-primary waves-effect btn-lg" type="submit" id="round">Simpan</button>
                </form>
                <!-- #END# Form Departemen -->
            </div>
            </center>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


<script type="text/javascript">

function delConfirm()
{
    job = confirm("Are you sure to delete permanently?");
    
    if(job != true)
    {
        return false;
    }
}

function submitDepart() {

    var data = $('.formDepart').serialize();
    
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url('Main_C/addDepartemen') ?>",
        data: data,
        success: function() {
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'Berhasil menambah departemen',
              showConfirmButton: false,
              timer: 1500
            }).then(function(){
                var ref = $('#refDep');
                $('#refDep').load(document.URL +  ' #refDep', function() {
                ref.children('#refDep').unwrap();});
            })        
        }
    });
    return false;
        
}

function submitKetua() {

    var data = $('.formKetua').serialize();

    alert(data);
    
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url('Main_C/addKetuaOpmawa') ?>",
        data: data,
        success: function() {
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'Berhasil menambah departemen',
              showConfirmButton: false,
              timer: 1500
            }).then(function(){
                var ref = $('#refKetua');
                $('#refKetua').load(document.URL +  ' #refKetua', function() {
                ref.children('#refKetua').unwrap();});
            })        
        }
    });
    return false;
        
}            
</script>