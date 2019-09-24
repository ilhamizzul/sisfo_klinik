<script>
	Morris.Bar({
		element: "stock_graph",
		data: <?php echo $graph_stock ?>,
		xkey: "bulan",
		xLabels: "bulan",
		ykeys: ["stok_masuk", "stok_keluar", "sisa_stok"],
		labels: ["stok masuk", "stok keluar", "sisa_stok"],
		resize: 'true',
		barColors : ["#29B6F6", "#ef5350", "#78909C"],
		hideHover: "auto"
	})
	// STOK MASUK
	Morris.Bar({
		element: "stock_masuk_graph",
		data: <?php echo $graph_stock ?>,
		xkey: "bulan",
		xLabels: "bulan",
		ykeys: ["stok_masuk"],
		labels: ["stok masuk"],
		resize: 'true',
		barColors : ["#29B6F6"],
		hideHover: "auto"

	})
	// STOK KELUAR
	Morris.Bar({
		element: "stock_keluar_graph",
		data: <?php echo $graph_stock ?>,
		xkey: "bulan",
		xLabels: "bulan",
		ykeys: ["stok_keluar"],
		labels: ["stok keluar"],
		resize: 'true',
		barColors : ["#ef5350"],
		hideHover: "auto"
	})
	// SISA STOK
	Morris.Bar({
		element: "stock_sisa_graph",
		data: <?php echo $graph_stock ?>,
		xkey: "bulan",
		xLabels: "bulan",
		ykeys: ["sisa_stok"],
		labels: ["sisa stok"],
		resize: 'true',
		barColors : ["#78909C"],
		hideHover: "auto"
	})
</script>