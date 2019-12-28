<script>
	$(function() {
		$('#add_data_obat').click(function() {
			$('.form-tambah').submit();
		});

		$('#add_stock').click(function() {
			$('.form-tambah-stock').submit();
		});

		$('#edit_data_obat').click(function() {
			$('.form-edit').submit();
		})

		document.title = "Sisfo Klinik | Data Obat"

	})

	function add_stock(id_obat) {
		$.getJSON('<?php echo base_url() ?>data_obat/get_data_obat_by_id/' + id_obat, function(data){
			$('#jumlah_stok').text(data.sisa_stok);
			$('.form-tambah-stock').attr('action', '<?php echo base_url() ?>data_obat/tambah_stock/' + data.sisa_stok + '/' + data.id_obat)
		})
	}

	function edit_data_obat(id_obat) {
		$.getJSON('<?php echo base_url() ?>data_obat/get_data_obat_by_id/' + id_obat, function (data) {
			$('#nama_obat').val(data.nama_obat);
			$('#harga_jual').val(data.harga_jual);
			$('#harga_beli').val(data.harga_beli);
			$('.form-edit').attr('action', '<?php echo base_url() ?>data_obat/edit_obat/' + data.id_obat);
		})
	}

	function delete_data_obat(id_obat) {
		$.getJSON('<?php echo base_url() ?>data_obat/get_data_obat_by_id/' + id_obat, function (data) {
			$('#delete_data_obat').attr('href', '<?php echo base_url() ?>data_obat/delete_obat/' + data.id_obat);
		})
	}
</script>