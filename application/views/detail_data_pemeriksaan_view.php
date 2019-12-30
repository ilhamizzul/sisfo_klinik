                <div class="col-md-12">
                    <!-- TABLE HOVER -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title" id="panel-pasien">Data Pemeriksaan Pasien</h3>
                            <ul class="breadcrumb">
                                <li><a href="<?php echo base_url() ?>data_pemeriksaan">Home</a></li>
                                <?php
                                    echo '
                                        <li><a href="'.base_url().'data_pemeriksaan/date/'.$this->uri->segment(3).'">'.$this->uri->segment(3).'</a></li>
                                        <li><a href="'.base_url().'data_pemeriksaan/date/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'">'.$this->uri->segment(4).'</a></li>
                                        <li>'.$this->uri->segment(5).'</li>
                                    ';
                                    
                                 ?>
                            </ul>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="display table table-hover dataTable js-exportable" id="dataTable">
                                <thead>
                                    <tr>
                                        <th class="no">No</th>
                                        <th>Nama Pasien</th>
                                        <th>Tanggal Pemeriksaan</th>
                                        <th>Hasil Pemeriksaan</th>
                                        <th>Diagnosis</th>
                                        <th>Terapi</th>
                                        <!-- <th>Opsi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if ($data_pemeriksaan != NULL) {
                                            $no = 1;
                                            foreach ($data_pemeriksaan as $data) {
                                                echo '
                                                    <tr>
                                                        <td class="no">'.$no++.'</td>
                                                        <td>'.$data->nama_pasien.'</td>
                                                        <td>'.date("d-m-Y", strtotime($data->tanggal_pemeriksaan)).'</td>
                                                        <td>'.$data->hasil_pemeriksaan.'</td>
                                                        <td>'.$data->diagnosis.'</td>
                                                        <td>'.$data->terapi.'</td>
                                                        
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

            <!-- // <td>
                                                        //     <a data-toggle="modal" data-target="#modalEdit" onclick="edit_pemeriksaan('.$data->id_pemeriksaan.')" class="btn btn-warning">Edit</a>
                                                        //     <a data-toggle="modal" data-target="#modalHapus" onclick="delete_pemeriksaan('.$data->id_pemeriksaan.')" class="btn btn-danger">Hapus</a>
                                                        // </td> -->


