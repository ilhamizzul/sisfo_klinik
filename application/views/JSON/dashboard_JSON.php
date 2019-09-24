<script>
	$(function() {

		document.title = "Sisfo Klinik | Dashboard"
	})

	
    Morris.Bar({
      element: "graph",
      data: <?php echo $recap_data ?>,
      xkey: "tanggal",
      ykeys: ["total"],
      labels: ["total pemeriksaan"]
    });
</script>