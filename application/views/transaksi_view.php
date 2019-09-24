<div class="col-md-12">
    <!-- TABLE HOVER -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Tambah Transaksi</h3>
        </div>
    </div>
    <div class="panel col-md-5">
        <div class="input-group" style="width: 100%; margin: 10px 0px;">
            <input type="text" name="search_item" id="search_item" value="" class="form-control" placeholder="Cari Item...">
            <span class="input-group-btn"><button type="button" style="width: 100%" class="btn btn-primary">Go</button></span>
        </div>
        <div id="result"></div>
    </div>
    <div class="panel col-md-offset-1 col-md-6">
        <div class="panel-body table-responsive">
            <table class="display table table-hover">
                <thead>
                    <tr>
                        <th>Nama Item</th>
                        <th>Jumlah Item</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody id="item_buy_list">
                </tbody>
                <tbody>
                    <tr>
                        <th colspan="2">Total Harga</th>
                        <th id="totalHarga">Rp. </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
