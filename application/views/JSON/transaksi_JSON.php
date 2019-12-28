<script>
	/* Global */
	let total = 0;
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
			let search = $(this).val();

			if (search != '') {
				load_data(search);
			} else {
				load_data();
			}
		})
	});

	function add_item(id_obat) {
		// Enable submit button when first item is added
		if ($("#item_buy_list").children().length === 0) {
			$("#transaksi_submit").removeAttr("disabled");
		}

		$.ajax({
			url: "<?php echo base_url() ?>transaksi/check_data",
			method: "POST",

			data: {id_obat:id_obat},
			success:function(result) {
				let data = JSON.parse(result);
				$('#item_buy_list').append(
					'<tr>' + 
						'<td class="col-md-6">' + data.nama_obat + '</td>'+
						'<td>'+
							'<input type="text">'+
						'</td>'+
						'<td class="col-md-2 input_n_obat">'+
							'<input id="'+data.id_obat+'_n" type="number" min="1" value="1" max="'+data.sisa_stok+'">'+
						'</td>'+
						'<td class="col-md-4"> Rp. ' + numberWithCommas(data.harga_jual) + 
							'<input type="hidden" id="harga_'+data.id_obat+'_n" value="'+data.harga_jual+'">'+
						'</td>'+
					'</tr>'
				);
				$('#'+data.id_obat+'').attr("disabled", true);
				$('#'+data.id_obat+'').attr("onclick", false);
				const harga = parseInt(data.harga_jual);
				total += harga ;
				$("#totalHarga").text(numberWithCommas(total));  

				$('input[type=number]').on('mousewheel',function(e){ $(this).blur(); });
			}
		})
	}

	// Sum the total of price in item list
	$(document).on('change keyup', 'input[type=number]', function() {
		const id = $(this).attr('id');
		const harga = $('#harga_'+id+'').val();
		const prev_n = this.defaultValue;
		const n = $('#'+id+'').val();
		if (prev_n < n) {
			total += harga * (n - prev_n);
		} else if (prev_n > n) {
			total -= harga * (prev_n - n);
		}
		$('#'+id+'').attr('value', n);
		$("#totalHarga").text(numberWithCommas(total));
	})

	// Add commas to number
	function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
	}
</script>