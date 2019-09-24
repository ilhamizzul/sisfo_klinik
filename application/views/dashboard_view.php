<div class="container-fluid">
	<!-- OVERVIEW -->
	<div class="panel panel-headline">
		<div class="panel-heading">
			<h3 class="panel-title">Sistem Informasi Klinik</h3>
			<p class="panel-subtitle">Tanggal : <?php echo date("M d, Y") ?></p>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-4">
					<div class="metric">
						<span class="icon"><i class="fa fa-download"></i></span>
						<p>
							<span class="number"><?php echo $count_all_pasien ?></span>
							<span class="title">Total Data Pasien</span>
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="metric">
						<span class="icon"><i class="fa fa-shopping-bag"></i></span>
						<p>
							<span class="number"><?php echo $count_pemeriksaan_hari ?></span>
							<span class="title">Pemeriksaan Hari Ini</span>
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="metric">
						<span class="icon"><i class="fa fa-eye"></i></span>
						<p>
							<span class="number"><?php echo $count_pemeriksaan_bulan ?></span>
							<span class="title">Pemeriksaan Bulan Ini</span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-headline">
	<div class="panel-heading">
		<h3 class="panel-title">Grafik Pemeriksaan Bulan : <?php echo date("F") ?></h3>
	</div>
	<div class="panel-body">
		<div style="max-height: 250px;" id="graph">
		</div>
	</div>
</div>