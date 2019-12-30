                <div class="col-md-12">
                    <!-- TABLE HOVER -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Pasien</h3><br>
                            <a data-toggle="modal" data-target="#modalTambah" class="btn btn-default">Tambah Pasien</a>
                        </div>

                        <!--TOLONG NANTI TAMBAHKAN PRINT-->

                        <div class="panel-body table-responsive">
                            <table class="display table table-hover dataTable js-exportable" id="dataTable">
                                <thead>
                                    <tr>
                                        <th class="no col-md-1">No</th>
                                        <th class="col-md-2">Nama Pasien</th>
                                        <th class="col-md-2">Alamat Pasien</th>
                                        <th class="col-md-2">Nomor Telepon</th>
                                        <th class="col-md-2">Tempat, Tanggal Lahir</th>
                                        <th class="col-md-2">Nama Kepala Keluarga</th>
                                        <th class="opsi col-md-1">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if ($data_pasien != NULL) {
                                            $no = 1;
                                            foreach ($data_pasien as $data) {
                                                echo '
                                                    <tr>
                                                        <td>'.$no++.'</td>
                                                        <td><a href="'.base_url().'Data_pasien/data_pemeriksaan_pasien/'.$data->id_pasien.'/'.$data->nama_pasien.'">'.$data->nama_pasien.'</a></td>
                                                        <td>'.$data->alamat.'</td>
                                                        <td>'.$data->nomor_telepon.'</td>
                                                        <td>'.$data->tempat_lahir.', '.date("d-m-Y", strtotime($data->tanggal_lahir)).'</td>
                                                        <td>'.$data->nama_kepala_keluarga.'</td>
                                                        <td>
                                                            <div class="col-md-6">
                                                                <a data-toggle="modal" data-target="#modalEdit" onclick="edit_pasien('.$data->id_pasien.')" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <a data-toggle="modal" data-target="#modalHapus" onclick="delete_pasien('.$data->id_pasien.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                ';
                                            }
                                        } 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>

<!-- modal HAPUS -->
<div id="modalHapus" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content panel">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <div class="modal-body panel-body">
                <center>
                <h4>
                    Apakah Anda Yakin? <br>
                    Semua Data Pasien yang Berada dalam Sistem Informasi Ini Juga Akan Hilang
                </h4>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" id="delete_data_pasien" class="btn btn-danger">YA</a>
                <a href="" class="btn btn-default" data-dismiss="modal">TIDAK</a>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah -->
<div id="modalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content panel">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <div class="modal-body panel-body">
                <center>
                    <div class="panel panel-modal">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tambah Pasien</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-tambah" method="POST" action="<?php echo base_url() ?>data_pasien/tambah_pasien/">
                                <div class="form-group">
                                    <input type="text" class="form-control" required name="nama_pasien" placeholder="Nama Pasien. . .">
                                </div>
                                <div class="form-group">
                                    <textarea style="resize:vertical" class="form-control" placeholder="Alamat Pasien. . ." name="alamat" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" required name="nomor_telepon" placeholder="Nomor Telepon. . .">
                                </div>
                                <div class="form-group col-md-6" style="padding-left: 0px">
                                    <input type="text" class="form-control" required name="tempat_lahir" placeholder="Tempat Lahir. . .">
                                </div>
                                <div class="form-group col-md-6" style="padding-right: 0px">
                                    <input type="date" class="form-control" required name="tanggal_lahir" placeholder="Tanggal Lahir. . .">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" required name="nama_kepala_keluarga" placeholder="Nama Kepala Keluarga. . .">
                                </div>
                            </form>
                        </div>
                    </div>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                <input type="button" value="TAMBAH" class="btn btn-default" id="add_data_pasien">
            </div>
        </div>
    </div>
</div>

<!-- modal edit -->
<div id="modalEdit" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content panel">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
            </div>
            <div class="modal-body panel-body">
                <center>
                    <div class="panel panel-modal">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Data Pasien</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-edit" method="POST" action="<?php echo base_url() ?>data_pasien/edit_pasien/">
                                <div class="form-group">
                                    <input type="text" class="form-control" required id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien. . ." value="">
                                </div>
                                <div class="form-group">
                                    <textarea style="resize:vertical" class="form-control" placeholder="Alamat Pasien. . ." id="alamat" name="alamat" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" required id="nomor_telepon" name="nomor_telepon" placeholder="Nomor Telepon. . .">
                                </div>
                                <div class="form-group col-md-6" style="padding-left: 0px">
                                    <input type="text" class="form-control" required id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir. . ." value="">
                                </div>
                                <div class="form-group col-md-6" style="padding-right: 0px">
                                    <input type="date" class="form-control" required id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir. . ." value="">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" required id="nama_kepala_keluarga" name="nama_kepala_keluarga" placeholder="Nama Kepala Keluarga. . ." value="">
                                </div>
                            </form>
                        </div>
                    </div>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                <input type="button" value="UBAH" class="btn btn-default" id="edit_data_pasien">
            </div>
        </div>
    </div>
</div>
