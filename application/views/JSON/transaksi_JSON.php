<script>
	$(document).ready(function(){
		load_data();

		function load_data(query) {
			$.ajax({
				url : "<?php echo base_url() ?>transaksi/get_data",
				method: "POST",
				data: {query:query},
				success:function(data){
					$('#result').html(data);
				}	
			})
		}

		$('#search_item').keyup(function() {
			var search = $(this).val();

			if (search != '') {
				load_data(search);
			} else {
				load_data();
			}
		})

		
	});

	function add_item(id_obat) {
		$.ajax({
			url: "<?php echo base_url() ?>transaksi/check_data",
			method: "POST",

			data: {id_obat:id_obat},
			success:function(result) {
				console.log(result);
				var data = JSON.parse(result);
				$('#item_buy_list').append(
					'<tr>' + 
						'<td class="col-md-6">' + data.nama_obat + '</td>'+
						'<td class="col-md-2">'+
							// '<input id="'+data.id_obat+'Val" type="number" onkeyup="sum_value('+ $("#" + data.id_obat + "Val").val() +')" value="1" max="'+data.sisa_stok+'">'+
							// '<input id="'+data.id_obat+'Val" type="number" onkeypress="sum_value()" value="1" max="'+data.sisa_stok+'">'+
							'<input id="'+data.id_obat+'Val" type="number" onkeyup="sum_value(\'#'+data.id_obat+'Val\','+data+' )" min="1" value="1" max="'+data.sisa_stok+'">'+
						'</td>'+
						'<td class="col-md-4" id="price'+data.id_obat+'">' + data.harga_jual + '</td>'+
					'</tr>'
				);
				$('#'+data.id_obat+'').attr("disabled", true);

			}
		})
	}

	function sum_value(id, data) {
		// console.log(count + 1);
		
		var count = $(id).val();
		var sum = count * data.harga_jual;
		$('#price'+data.id_obat).text(sum);
		

	}
</script>