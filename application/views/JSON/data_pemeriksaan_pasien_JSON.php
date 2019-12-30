<script>
	$(function() {
		$('#add_data_pemeriksaan').click(function() {
			$('.form-tambah').submit();
		});

		$('#edit_data_pemeriksaan').click(function() {
			$('.form-edit').submit();
		});

		document.title = "Sisfo Klinik | Data Pemeriksaan <?php echo urldecode($this->uri->segment(4)) ?>"
	})

	function delete_pemeriksaan($id_pemeriksaan) {
		$.getJSON('<?php echo base_url() ?>data_pasien/get_data_pemeriksaan_pasien_by_id/'+ $id_pemeriksaan, function(data) {
			$('#delete_data_pemeriksaan').attr('href', '<?php echo base_url() ?>data_pasien/hapus_data_pemeriksaan/' + data.id_pemeriksaan + '/' + data.id_pasien + '/ <?php echo urldecode($this->uri->segment(4)) ?>')
		})
	}

	function edit_pemeriksaan(id_pemeriksaan) {
		$.getJSON('<?php echo base_url() ?>data_pasien/get_data_pemeriksaan_pasien_by_id/'+ id_pemeriksaan, function(data) {
			$('#hasil_pemeriksaan').val(data.hasil_pemeriksaan);
			$('#diagnosis').val(data.diagnosis);
			$('#terapi').val(data.terapi);
			$('.form-edit').attr('action', '<?php echo base_url() ?>data_pasien/edit_data_pemeriksaan/' + data.id_pemeriksaan + '/' + data.id_pasien + '/ <?php echo urldecode($this->uri->segment(4)) ?>');
		})
	}

	function get_nota(query) {
		$.ajax({
			url : "<?php echo base_url() ?>data_pasien/get_nota",
			method : "POST",
			data: {query:query},
			success:function(data){
				$('#table').html(data);
			}
		})
	}
</script>