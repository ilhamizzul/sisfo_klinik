<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title" id="panel-pasien">Data Pemeriksaan Pasien</h3>
            <h4><span class="label label-success">Pasien : <b><?php echo urldecode($nama_pasien) ?></b></span></h4><br>
            <a data-toggle="modal" data-target="#modalTambah" class="btn btn-default">Tambah Data Pemeriksaan</a>
        </div>
        <div class="panel-body table-responsive">
            <table class="display table table-hover dataTable js-exportable" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pemeriksaan</th>
                        <th>Hasil Pemeriksaan</th>
                        <th>Diagnosis</th>
                        <th>Terapi</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if ($data_pemeriksaan != NULL) {
                            $no = 1;
                            foreach ($data_pemeriksaan as $data) {
                                echo '
                                    <tr>
                                        <td>'.$no++.'</td>
                                        <td>'.date("d-m-Y", strtotime($data->tanggal_pemeriksaan)).'</td>
                                        <td>'.$data->hasil_pemeriksaan.'</td>
                                        <td>'.$data->diagnosis.'</td>
                                        <td>'.$data->terapi.'</td>
                                        <td>
                                            <a data-toggle="modal" style="width:100%" data-target="#modalEdit" onclick="edit_pemeriksaan('.$data->id_pemeriksaan.')" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>';
                                            if ($data->status_transaksi == 'sudah') {
                                                echo '<a data-toggle="modal" style="width:100%" data-target="#modalNota" onclick="get_nota('.$data->id_pemeriksaan.')" class="btn btn-xs btn-info"><i class="fa fa-book"></i></a>';    
                                            } else {
                                                echo '<a href="'.base_url().'transaksi" style="width:100%" class="btn btn-xs btn-success"><i class="fa fa-dollar"></i></a>';    
                                            }                                                            
                                            echo '<a data-toggle="modal" style="width:100%" data-target="#modalHapus" onclick="delete_pemeriksaan('.$data->id_pemeriksaan.')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
                    Data Pemeriksaan Pasien <b><?php echo urldecode($nama_pasien) ?></b> yang Akan Dihapus Akan Hilang Secara Permanen
                </h4>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" id="delete_data_pemeriksaan" class="btn btn-danger">YA</a>
                <a href="" class="btn btn-default" data-dismiss="modal">TIDAK</a>
            </div>
        </div>
    </div>
</div>
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
                            <h3 class="panel-title">Tambah Data Pemeriksaan</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-tambah" method="POST" action="<?php echo base_url() ?>data_pasien/tambah_data_pemeriksaan/<?php echo $this->uri->segment(3) ?>/<?php echo $this->uri->segment(4) ?>">
                                <div class="form-group">
                                    <textarea style="resize:vertical" class="form-control" placeholder="Hasil Pemeriksaan. . ." name="hasil_pemeriksaan" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <textarea style="resize:vertical" class="form-control" placeholder="Diagnosis. . ." name="diagnosis" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <textarea style="resize:vertical" class="form-control" placeholder="Terapi. . ." name="terapi" rows="4"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                <input type="button" value="TAMBAH" class="btn btn-default" id="add_data_pemeriksaan">
            </div>
        </div>
    </div>
</div>
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
                <input type="button" value="TAMBAH" class="btn btn-default" id="edit_data_pasien">
            </div>
        </div>
    </div>
</div>
<div id="modalNota" class="modal fade" role="dialog">
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
                            <h3 class="panel-title">Nota Transaksi Pasien</h3>
                            <h4><span class="label label-success"><b><?php echo urldecode($nama_pasien) ?></b></span></h4>
                        </div>
                        <div class="panel-body" id="table">
                            
                        </div>
                    </div>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                <input type="button" value="PRINT" class="btn btn-default" id="edit_data_pasien">
            </div>
        </div>
    </div>
</div>
