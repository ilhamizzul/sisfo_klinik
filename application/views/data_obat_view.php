                <div class="col-md-12">
                    <!-- TABLE HOVER -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Obat</h3><br>
                            <a data-toggle="modal" data-target="#modalTambah" class="btn btn-default">Tambah Obat</a>
                        </div>

                        <!--TOLONG NANTI TAMBAHKAN PRINT-->

                        <div class="panel-body table-responsive">
                            <table class="display table table-hover dataTable js-exportable" id="dataTable">
                                <thead>
                                    <tr>
                                        <th class="col-md-1">Kode Obat</th>
                                        <th class="col-md-4">Nama Obat</th>
                                        <th class="col-md-2">Stok Obat</th>
                                        <th class="col-md-2">Harga Jual</th>
                                        <th class="col-md-2">Harga Beli</th>
                                        <th class="col-md-1 opsi">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($data_obat as $data) {
                                            echo '
                                                <tr>
                                                    <td>'.$data->id_obat.'</td>
                                                    <td><a href="'.base_url().'data_obat/detail_obat/'.$data->id_obat.'/'.$data->nama_obat.'">'.$data->nama_obat.'</a></td>
                                                    <td>'.$data->sisa_stok.'</td>
                                                    <td>'.$data->harga_jual.'</td>
                                                    <td>'.$data->harga_beli.'</td>
                                                    <td>
                                                        <a data-toggle="modal" style="width:100%" data-target="#modalEdit" onclick="edit_data_obat(\''.$data->id_obat.'\')" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                                        <a data-toggle="modal" style="width:100%" data-target="#modalTambahStok" onclick="add_stock(\''.$data->id_obat.'\')" class="btn btn-xs btn-info"><i class="fa fa-plus"></i></a>
                                                        <a data-toggle="modal" style="width:100%" data-target="#modalHapus" onclick="delete_data_obat(\''.$data->id_obat.'\')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            ';
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
                    Semua Data Transaksi yang Berkaitan dengan Data Obat dalam Sistem Informasi Ini Juga Akan Hilang
                </h4>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" id="delete_data_obat" class="btn btn-danger">YA</a>
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
                            <h3 class="panel-title">Tambah Obat</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-tambah" method="POST" action="<?php echo base_url() ?>data_obat/tambah_obat/">
                                <div class="form-group">
                                    <input type="text" class="form-control" required name="kode_obat" placeholder="Kode Obat. . .">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" required name="nama_obat" placeholder="Nama Obat. . .">
                                </div>
                                <div class="form-group col-md-6" style="padding-left: 0px">
                                    <input type="text" class="form-control" required name="harga_jual" placeholder="Harga Jual. . .">
                                </div>
                                <div class="form-group col-md-6" style="padding-right: 0px">
                                    <input type="text" class="form-control" required name="harga_beli" placeholder="Harga Beli. . .">
                                </div>
                            </form>
                        </div>
                    </div>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                <input type="button" value="TAMBAH" class="btn btn-default" id="add_data_obat">
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
                            <h3 class="panel-title">Edit Data Obat</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-edit" method="POST" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control" required id="nama_obat" name="nama_obat" placeholder="Nama Obat. . .">
                                </div>
                                <div class="form-group col-md-6" style="padding-left: 0px">
                                    <input type="text" class="form-control" required id="harga_jual" name="harga_jual" placeholder="Harga Jual. . .">
                                </div>
                                <div class="form-group col-md-6" style="padding-right: 0px">
                                    <input type="text" class="form-control" required id="harga_beli" name="harga_beli" placeholder="Harga Beli. . .">
                                </div>
                            </form>
                        </div>
                    </div>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                <input type="button" value="UBAH" class="btn btn-default" id="edit_data_obat">
            </div>
        </div>
    </div>
</div>

<div id="modalTambahStok" class="modal fade" role="dialog">
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
                            <h3 class="panel-title">Tambah Stok</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-tambah-stock" method="POST" action="">
                                <div class="form-group">
                                    <input type="number" class="form-control" required id="" name="stok_masuk" placeholder="Input Stok. . ." value="">
                                    <h4>Jumlah Stok Saat Ini : <b id="jumlah_stok"></b></h4>
                                </div>
                            </form>
                        </div>
                    </div>
                </center>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                <input type="button" value="TAMBAH" class="btn btn-default" id="add_stock">
            </div>
        </div>
    </div>
</div>
