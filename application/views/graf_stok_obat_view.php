<div class="col-md-12">
    <!-- TABLE HOVER -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">
                Data Obat : <?php echo urldecode($this->uri->segment(4)) ?>
            </h3>
        </div>
    </div>
    <div class="panel col-md-12">
        <div class="panel-heading">
            <h3 class="panel-title">Grafik Overview Obat Tahun : <?php echo $this->uri->segment(5) ?></h3>
        </div>
        <div class="panel-body">
            <div id="stock_graph" style="height: 250px;"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title">Tabel Overview</h4>
            </div>
            <div class="panel-body">
                <table class="display table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th class="col-md-2">Bulan</th>
                            <th class="col-md-2">Stok Masuk</th>
                            <th class="col-md-2">Stok Keluar</th>
                            <th class="col-md-2">Sisa Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($data_stock as $data) {
                                echo '
                                    <tr>
                                        <td>'.$data->bulan.'</td>
                                        <td>'.$data->stok_masuk.'</td>
                                        <td>'.$data->stok_keluar.'</td>
                                        <td>'.$data->sisa_stok.'</td>
                                    </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel" >
            <div class="panel-heading">
                <h4 class="panel-title">Sisa Stok</h4>
            </div>        
            <div class="panel-body">
                <div style="height: 200px" id="stock_sisa_graph"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel" >
            <div class="panel-heading">
                <h4 class="panel-title">Stok Masuk</h4>
            </div>
            <div class="panel-body">
                <div style="height: 200px" id="stock_masuk_graph"></div>
            </div>
        </div>
        <div class="panel" >
            <div class="panel-heading">
                <h4 class="panel-title">Stok Keluar</h4>
            </div>
            <div class="panel-body">
                <div style="height: 200px" id="stock_keluar_graph"></div>
            </div>
        </div>
    </div>
        
</div>