<script>
	Morris.Bar({
      element: "graph",
      data: <?php echo $graph ?>,
      xkey: "date",
      ykeys: ["total"],
      labels: ["total pemeriksaan"]
    });
</script>