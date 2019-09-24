<div class="col-md-10">
    <!-- TABLE HOVER -->
    <div class="panel">
        <div class="panel-heading">
            <h2 class="panel-title">Dokumen Pemeriksaan</h2><br>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url() ?>data_pemeriksaan">Home</a></li>
                <?php
                    if ($this->uri->total_segments() <= 3) {
                        echo '
                            <li><a href="'.base_url().'data_pemeriksaan/date/'.$this->uri->segment(3).'">'.$this->uri->segment(3).'</a></li>
                        ';
                    } 
                        if ($this->uri->total_segments() >= 4) {
                            echo '
                                <li><a href="'.base_url().'data_pemeriksaan/date/'.$this->uri->segment(3).'">'.$this->uri->segment(3).'</a></li>
                                <li><a href="'.base_url().'data_pemeriksaan/date/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'">'.$this->uri->segment(4).'</a></li>
                            ';
                        }
                    
                 ?>
            </ul>
        </div>
        <div class="panel-body table-responsive">
            <?php 
                if ($this->uri->total_segments() > 2) {
                    echo '
                        <table class="display table table-hover dataTable js-exportable" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Tanggal Pemeriksaan</th>
                                    <th>Hasil Pemeriksaan</th>
                                    <th>Diagnosis</th>
                                    <th>Terapi</th>
                                    <!-- <th>Opsi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                ';
                                    $no = 1;
                                    if ($this->uri->total_segments() <= 3) {
                                        foreach ($data_pemeriksaan_tahun as $data) {
                                            echo '
                                                <tr>
                                                    <td>'.$no++.'</td>
                                                    <td>'.$data->nama_pasien.'</td>
                                                    <td>'.date("d-m-Y", strtotime($data->tanggal_pemeriksaan)).'</td>
                                                    <td>'.$data->hasil_pemeriksaan.'</td>
                                                    <td>'.$data->diagnosis.'</td>
                                                    <td>'.$data->terapi.'</td>
                                                    
                                                </tr>
                                            ';
                                        }
                                    } elseif($this->uri->total_segments() <= 4) {
                                        foreach ($data_pemeriksaan_bulan as $data) {
                                            echo '
                                                <tr>
                                                    <td>'.$no++.'</td>
                                                    <td>'.$data->nama_pasien.'</td>
                                                    <td>'.date("d-m-Y", strtotime($data->tanggal_pemeriksaan)).'</td>
                                                    <td>'.$data->hasil_pemeriksaan.'</td>
                                                    <td>'.$data->diagnosis.'</td>
                                                    <td>'.$data->terapi.'</td>
                                                    
                                                </tr>
                                            ';
                                        }
                                    }
                                echo '
                            </tbody>
                        </table>        
                    ';
                } else {
                    echo '
                        <div style="background-color: #F5F5F5; height: 400px; width: 100%">
                            <span class="lnr lnr-inbox" style="position:absolute;left:43%;top: 25%;font-size: 140px;"></span>
                            <h3 style="position:absolute;left:40%;top: 40%;">Document Archive</h3>
                        </div>      
                    ';
                }
                
            ?>
        </div>
    </div>
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">
                Grafik Pemeriksaan  
                <?php 
                    if ($this->uri->total_segments() < 3) {
                        echo "Tiap Tahun";
                    } else if ($this->uri->total_segments() < 4) {
                        echo 'Tiap Bulan '.$this->uri->segment(3);
                    } else if ($this->uri->total_segments() < 5) {
                        echo 'Bulan '.$this->uri->segment(4).' '.$this->uri->segment(3);
                    }
                    
                ?>
            </h3>
        </div>
        <div class="panel-body">
            <div id="graph" style="max-height: 300px;">
            </div>
        </div>
    </div>
</div>

<div class="col-md-2">
    <!-- TABLE HOVER -->
    <div class="panel">
        <div class="panel-heading">
            <h2 class="panel-title">Dokumen Pemeriksaan</h2><br>
        </div>
        <div class="panel-body">
            <?php 
                if ($this->uri->total_segments() < 3) {
                    foreach ($pemeriksaan_tahun as $data) {
                        echo '
                            <a href="'.base_url().'data_pemeriksaan/date/'.$data->tahun.'">
                                <div class="col-md-12">
                                    <div class="metric">
                                        <p>
                                            <span class="number" style="font-size: 20px;text-align: center">'.$data->tahun.'</span>
                                        </p>
                                    </div>
                                </div>  
                            </a>
                        ';
                    }
                } else if($this->uri->total_segments() < 4) {
                    foreach ($pemeriksaan_bulan as $data) {
                        echo '
                            <a href="'.base_url().'data_pemeriksaan/date/'.$this->uri->segment(3).'/'.$data->bulan.'">
                                <div class="col-md-12">
                                    <div class="metric" style="padding: 10px; margin-bottom: 15px;">
                                        <p>
                                            <span class="number" style="font-size: 20px;text-align: center">'.$data->bulan.'</span>
                                        </p>
                                    </div>
                                </div>  
                            </a>
                        ';
                    }
                } else if($this->uri->total_segments() < 5) {
                    foreach ($pemeriksaan_hari as $data) {
                        echo '
                            <a href="'.base_url().'data_pemeriksaan/data/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$data->hari.'">
                                <div class="col-md-6">
                                    <div class="metric" style="padding: 10px; margin-bottom: 15px;">
                                        <p>
                                            <span class="number" style="font-size: 15px;text-align: center">'.$data->hari.'</span>
                                        </p>
                                    </div>
                                </div>  
                            </a>
                        ';
                    }
                }
                
            ?> 
                            
        </div>
    </div>
</div>
