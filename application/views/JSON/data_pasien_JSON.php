<script type="text/javascript">
	$(function() {

		$('#add_data_pasien').click(function() {
			$('.form-tambah').submit();
		});

		$('#edit_data_pasien').click(function() {
			$('.form-edit').submit();
		})

		document.title = "Sisfo Klinik | Data Pasien"
	})

	function delete_pasien(id_pasien) {
		$.getJSON('<?php echo base_url() ?>data_pasien/get_data_pasien_by_id/' + id_pasien, function(data) {
			$('#delete_data_pasien').attr('href', '<?php echo base_url() ?>data_pasien/hapus_pasien/' + data.id_pasien);
		})
	}

	function edit_pasien(id_pasien) {
		$.getJSON('<?php echo base_url() ?>data_pasien/get_data_pasien_by_id/' + id_pasien, function(data) {
			$('#nama_pasien').val(data.nama_pasien);
			$('#alamat').text(data.alamat);
			$('#nomor_telepon').text(data.nomor_telepon);
			$('#tempat_lahir').val(data.tempat_lahir);
			$('#tanggal_lahir').val(data.tanggal_lahir);
			$('#nama_kepala_keluarga').val(data.nama_kepala_keluarga);
			$('.form-edit').attr('action', '<?php echo base_url() ?>data_pasien/edit_pasien/' + data.id_pasien)
		})
	}
</script>