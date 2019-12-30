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

	function int(value) {
    	return parseInt(value);
	}

	function checkValue(sender) {
	    let min = sender.min;
	    let max = sender.max;
	    let value = int(sender.value);
	    if (value>max) {
	        sender.value = min;
	    } else if (value<min) {
	        sender.value = max;
	    }
	}

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
						'<td style="display:none;">'+ data.id_obat +'</td>'+
						'<td class="col-md-6">' + data.nama_obat + '</td>'+
						'<td>'+
							'<input type="text">'+
						'</td>'+
						'<td class="col-md-2 input_n_obat">'+
							'<input id="'+data.id_obat+'_n" type="number" min="1" value="1" max="'+data.sisa_stok+'" oninput="checkValue(this);">'+
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

	$('#transaksi_submit').click(function() {
			
			var table_data = [];

			$('#item_buy_list tr').each(function(row, tr) {
				
				if ($(tr).find('td:eq(0)').text() == '') {

				} else {
					var price = $(tr).find("td:eq(4)").text().replace(/[^0-9]/gi, '');
					var sub = {
						'id_obat' : $(tr).find('td:eq(0)').text(),
						'rincian_obat' : $(tr).find("td:eq(2) input[type='text']").val(),
						'jumlah' :  $(tr).find("td:eq(3) input[type='number']").val(),
						'harga' : parseInt(price, 10) * $(tr).find("td:eq(3) input[type='number']").val()
					};

					table_data.push(sub);
					
				}

			});
			var total_price = $('#totalHarga').text().replace(/[^0-9]/gi, '');
			console.log(table_data);
			console.log(total_price);
			// function xxxx() {
				$.ajax({
					data: {'harga_total' : total_price, 'datatable' : table_data},
					url: '<?php echo base_url(); ?>transaksi/save_transaksi/<?php echo $this->uri->segment(3) ?>',
					type: 'POST',
					success : function(result) {
						window.history.go(-1);
						alert('Insert berhasil');
					// 	<?php
					// 		// $this->session->set_flashdata('failed', 'GAGAL');
					// 		// redirect('transaksi/detail_transaksi/'.$id_pemeriksaan);
					// 	?>
					
					}
				});
				
			// };
		});
</script>