<script>
	$(function() {
		$('#add_data_pemeriksaan').click(function() {
			$('.form-tambah').submit();
		});

		document.title = "Sisfo Klinik | Data Pemeriksaan"
	})

	function delete_pemeriksaan($id_pemeriksaan) {
		$.getJSON('<?php echo base_url() ?>data_pasien/get_data_pemeriksaan_pasien_by_id/'+ $id_pemeriksaan, function(data) {
			$('#delete_data_pemeriksaan').attr('href', '<?php echo base_url() ?>data_pasien/hapus_data_pemeriksaan/' + data.id_pemeriksaan + '/' + data.id_pasien + '/ <?php echo urldecode($this->uri->segment(4)) ?>')
		})
	}

	function get_nota(query) {
		// $.getJSON('<?php echo base_url() ?>data_pasien/get_nota/'+ $id_pemeriksaan, function(data) {
		// 	$('#table').text(data);
		// })

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