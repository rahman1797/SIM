      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            
            <div class="card" id="round">
                <div class="row body">
                    <div class="col-lg-3">
                            <?php foreach ($profil as $p) { 
                                 $idToProdi = $this->M_user->getProdi($p->id_prodi);
                                 $idToPosisi = $this->M_user->getPosisi($p->id_posisi);
                                 $idToKabinet = $this->M_user->getKabinet($p->id_opmawa);
                                 $idToDepartemen = $this->M_user->getDepartemen($p->id_departemen);
                                 $tahun = $p->user_tahun;
                            ?>
                        
                              <div class="card profile-card">
                                <div class="profile-header">&nbsp;</div>
                                <div class="profile-body">
                                    <div class="image-area">
                                        <img style="width: 70%" src="<?php echo base_url('assets/images/user.png')?>" />
                                    </div>
                                    <div class="content-area" style="padding: 5px">
                                        <h3><?= $p->user_nama; ?></h3>
                                        <p><?php 
                                            if ($p->user_role == 1) {
                                               echo "Lembaga Eksekutif";
                                            }
                                            else {
                                               echo "Lembaga Legislatif";
                                            } ?> 
                                        </p>
                                        <p><?= "Kabinet ". $idToKabinet['0']['opmawa_kabinet']; ?></p>
                                    </div>
                                </div>
                                <!-- <div class="profile-footer">
                                    <ul>
                                        <li>
                                            <span>Followers</span>
                                            <span>1.234</span>
                                        </li>
                                        <li>
                                            <span>Following</span>
                                            <span>1.201</span>
                                        </li>
                                        <li>
                                            <span>Friends</span>
                                            <span>14.252</span>
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-lg waves-effect btn-block">FOLLOW</button>
                                </div> -->
                            </div>
                       
                    </div>
                    <div class="col-lg-9">
                              <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Tentang Saya   </a></li>
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Kelola Profil</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Ganti Password</a></li>
                                </ul>
                                                     

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        
                                            <table class="table">

                                            <tr>
                                                <th>Nomor Induk Mahasiswa </th>
                                                <td>:</td>
                                                <td><?php echo $p->user_NIM; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Program Studi </th>
                                                <td>:</td>
                                                <td><?php echo $idToProdi['0']['prodi_nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tahun kepengururan </th>
                                                <td>:</td>
                                                <td><?php echo $tahun . " - " . ($tahun+1); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Departemen / Komisi </th>
                                                <td>:</td>
                                                <td><?php echo $idToDepartemen['0']['departemen_nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Posisi </th>
                                                <td>:</td>
                                                <td><?php echo $idToPosisi['0']['posisi_nama']; ?></td>
                                            </tr>
                                            <!-- <tr>
                                                <th>Nama Kabinet </th>
                                                <td>:</td>
                                                <td><?php echo $idToKabinet['0']['opmawa_kabinet']; ?></td>
                                            </tr> -->
                                            <!-- <tr>
                                                <th>Lembaga </th>
                                                <td>:</td>
                                                <td><?php 
                                                    if ($p->user_role == 1) {
                                                        echo "Eksekutif";
                                                    }
                                                    else {
                                                        echo "Legislatif";
                                                    } ?>                
                                                </td>
                                            </tr> -->
                                            
                                        </table>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                        <form class="form-horizontal" onsubmit="#">
                                            <div class="form-group">
                                                <label for="nama" class="col-lg-2 control-label">Nama</label>
                                                <div class="col-lg-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="nama" name="user_nama" value="<?=  $p->user_nama; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NIM" class="col-lg-2 control-label">NIM</label>
                                                <div class="col-lg-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="NIM" name="user_NIM" value="<?= $p->user_NIM ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="prodi" class="col-lg-2 control-label">Prodi</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control show-tick" id="prodi" name="user_prodi" data-live-search="true">
                                                        <option value="<?php echo $p->id_prodi ?>"><?= $idToProdi['0']['prodi_nama']; ?></option>
                                                        <?php 
                                                            foreach ($prodi_data as $pd) {
                                                                echo "<option value='$pd->prodi_ID'>".$pd->prodi_nama ."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="departemen" class="col-lg-2 control-label">Departemen</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control show-tick" id="departemen" name="user_departemen" data-live-search="true">
                                                        <option value="<?php echo $p->id_departemen ?>"><?= $idToDepartemen['0']['departemen_nama']; ?></option>
                                                        <?php 
                                                            foreach ($departemen_data as $dd) {
                                                                echo "<option value='$dd->departemen_ID'>".$dd->departemen_nama ."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="departemen" class="col-lg-2 control-label">Posisi</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control show-tick" id="departemen" name="user_departemen" data-live-search="true">
                                                        <option value="<?php echo $p->id_posisi ?>"><?= $idToPosisi['0']['posisi_nama']; ?></option>
                                                        <?php 
                                                            foreach ($posisi_data as $pd) {
                                                                echo "<option value='$pd->posisi_ID'>".$pd->posisi_nama ."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" id="round" class="btn btn-success">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <?php } ?>

                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">Password Lama</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="OldPassword" name="OldPassword" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">Password Baru</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="NewPassword" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">Password Baru (Konfirmasi)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" id="round" class="btn btn-success">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                          <!--   </div> -->



























                    </div>





                        
























                </div>
            </div>

            <!-- #END# Basic Examples -->
        </div>
    </section>