
      <section class="content">
        <div class="container-fluid">
        
            <!-- Basic Examples -->
            
            <div class="card" id="round">
                <div class="row body">
                    <div class="col-lg-3">
                        <center>
                            <img class="rounded" style="width: 90%" src="<?php echo base_url('assets/images/user.png')?>" >
                            <button class="btn btn-info" id="round" style="width: 90%;margin-top: 10px">Kelola Profil</button>
                        </center>
                    </div>
                    <div class="col-lg-9">

                        <table class="table">
                            <?php foreach ($profil as $p) { 

                                 $idToProdi = $this->M_user->getProdi($p->id_prodi);
                                 $idToPosisi = $this->M_user->getPosisi($p->id_posisi);
                                 $idToKabinet = $this->M_user->getKabinet($p->id_opmawa);
                                 $idToDepartemen = $this->M_user->getDepartemen($p->id_departemen);
                                 $tahun = $p->user_tahun;

                                ?>
                            <tr>
                                <th width="30%">Nama</th>
                                <td>:</td>
                                <td><?php echo $p->user_nama; ?></td>
                            </tr>
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
                            <tr>
                                <th>Nama Kabinet </th>
                                <td>:</td>
                                <td><?php echo $idToKabinet['0']['opmawa_kabinet'];; ?></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>

            <!-- #END# Basic Examples -->
        </div>
    </section>
