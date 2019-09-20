<div class="col-md-12">
    <!-- TABLE HOVER -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Obat : <?php echo urldecode($nama_obat) ?></h3>
        </div>

        <!--TOLONG NANTI TAMBAHKAN PRINT-->

        <div class="panel-body">
            <h3>Pendataan Bulan Ini</h3>
            <div class="col-md-4">
                <div class="metric">
                    <span class="icon"><i class="fa fa-download"></i></span>
                    <p>
                        <span class="number"><?php echo $stok_bulan->stok_masuk; ?></span>
                        <span class="title">Stok Masuk</span>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric">
                    <span class="icon"><i class="fa fa-upload"></i></span>
                    <p>
                        <span class="number"><?php echo $stok_bulan->stok_keluar; ?></span>
                        <span class="title">Stok Keluar</span>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric">
                    <span class="icon"><i class="fa fa-cube"></i></span>
                    <p>
                        <span class="number"><?php echo $stok_bulan->sisa_stok; ?></span>
                        <span class="title">Sisa Stok</span>
                    </p>
                </div>
            </div>

            <h3>Pendataan per Tahun</h3>
            <?php 
                foreach ($stock_by_year as $data) {
                    echo '
                        <div class="col-md-2 panel">
                            <center><a href="'.base_url().'data_obat/graf_stok_obat/'.$data->id_obat.'/'.urldecode($nama_obat).'/'.$data->tahun.'"><h3>'.$data->tahun.'</h3></a><center>
                        </div>
                    ';
                }
            ?>
        </div>
    </div>
</div>