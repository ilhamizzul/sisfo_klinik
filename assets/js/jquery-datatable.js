$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        // "language": {
        //     "emptyTable":     "Tidak Ada Data pada Tabel ini"
        // },
        buttons: [
            {
                extend: 'pdfHtml5',
                text:'Export PDF',
                exportOptions: {
                    columns: ':visible:not(.opsi):not(.no)'
                },
                customize: function (doc) {
                    doc.pageMargins = [10,10,10,10];
                    doc.defaultStyle.fontSize = 8;
                    doc.styles.tableHeader.fontSize = 9;
                    doc.styles.title.fontSize = 12;
                    // Remove spaces around page title
                    doc.content[0].text = doc.content[0].text.trim();
                    // Create a footer
                    doc['footer']=(function(page, pages) {
                        return {
                            columns: [
                                'Sistem Informasi Klinik',
                                {
                                    // This is the right column
                                    alignment: 'right',
                                    text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                                }
                            ],
                            margin: [10, 0]
                        }
                    });
                    // Styling the table: create style object
                    var objLayout = {};
                    // Horizontal line thickness
                    objLayout['hLineWidth'] = function(i) { return .5; };
                    // Vertikal line thickness
                    objLayout['vLineWidth'] = function(i) { return .5; };
                    // Horizontal line color
                    objLayout['hLineColor'] = function(i) { return '#aaa'; };
                    // Vertical line color
                    objLayout['vLineColor'] = function(i) { return '#aaa'; };
                    // Left padding of the cell
                    objLayout['paddingLeft'] = function(i) { return 4; };
                    // Right padding of the cell
                    objLayout['paddingRight'] = function(i) { return 20; };
                    // Inject the object in the document
                    doc.content[1].layout = objLayout;
                }
            }
        ]
    });

    $('.js-scroll').DataTable({
            "scrollY": "225px",
            "scrollCollapse": true,
            "paging": false
    });
});