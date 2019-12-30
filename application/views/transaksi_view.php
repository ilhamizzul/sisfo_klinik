<div class="col-md-12">
    <!-- TABLE HOVER -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Tambah Transaksi</h3>
        </div>
    </div>
    <div class="panel col-md-4">
        <div class="input-group" style="width: 100%; margin: 10px 0px;">
            <input type="text" name="search_item" id="search_item" value="" class="form-control" placeholder="Cari Item...">
            <span class="input-group-btn">
                <button type="button" style="width: 100%" class="btn btn-primary">Go</button>
            </span>
        </div>
        <div id="result"></div>
    </div>
    <div class="panel col-md-offset-1 col-md-7">
        <div class="panel-body table-responsive">
            <table class="display table table-hover">
                <thead>
                    <tr>
                        <th>Nama Obat</th>
                        <th>Rincian Obat</th>
                        <th>Jumlah Obat</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody id="item_buy_list">
                </tbody>
                <tbody>
                    <tr>
                        <th colspan="3">Total Harga</th>
                        <th colspan="">Rp. <span id="totalHarga">0</span></th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">
                            <button type="button" class="btn btn-md btn-info" id="transaksi_submit" disabled>Submit</button>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
