<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <style>
            .dataTables_wrapper {
                min-height: 500px
            }

            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body> -->
        <div class="row" style="margin-bottom: 10px">
            <!-- <div class="col-md-4"> -->
                <!-- <h2 style="margin-top:0px">T30_jo List</h2> -->
            <!-- </div> -->
            <div class="col-md-4 text-left">
                <?php echo anchor(site_url('_30_jo/create'), 'Tambah', 'class="btn btn-primary"'); ?>
				<!-- <?php echo anchor(site_url('_30_jo/excel'), 'Excel', 'class="btn btn-primary"'); ?> -->
				<!-- <?php echo anchor(site_url('_30_jo/word'), 'Word', 'class="btn btn-primary"'); ?> -->
			</div>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
					<th><input size="5" type="text" name="NoJO" id="NoJO" placeholder="No. JO"></th>
					<th><input size="5" type="text" name="TglJO" id="TglJO" placeholder="Tgl. JO"></th>
					<th><input size="5" type="text" name="idcustomer" id="idcustomer" placeholder="Customer"></th>
					<th><input size="5" type="text" name="idshipper" id="idshipper" placeholder="Shipper"></th>
					<th><input size="5" type="text" name="TglMB" id="TglMB" placeholder="Tgl. Muat"></th>
					<th><input size="5" type="text" name="idlokasi" id="idlokasi" placeholder="Lokasi"></th>
					<th>Action</th>
                </tr>
            </thead>
        </table>
        <!-- <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script> -->
        <!-- <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script> -->
        <!-- <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script> -->
        <script type="text/javascript">
            $(document).ready(function() {

                // Setup - add a text input to each footer cell
                // $('#mytable tfoot th').each( function () {
                    // var title = $(this).text();
                    // if (title != ' ') {
                        // $(this).html( '<input size="5" type="text" name="'+title+'" id="'+title+'" placeholder="'+title+'" />' );
                    // }
                // } );

                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").DataTable({
                    searching: false,
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "_30_jo/json", "type": "POST", "data": function(data) {
                        data.NoJO = $('#NoJO').val();
                        data.TglJO = $('#TglJO').val();
                        data.idcustomer = $('#idcustomer').val();
                        data.idshipper = $('#idshipper').val();
                        data.TglMB = $('#TglMB').val();
                        data.idlokasi = $('#idlokasi').val();
                        }
                    },
                    columns: [
                        {
                            "data": "idjo",
                            "orderable": false
                        },
						{"data": "NoJO"},
						{"data": "TglJO"},
						{"data": "customerNama"},
						{"data": "shipperNama"},
						{"data": "TglMB"},
						{"data": "lokasiNama"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[1, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
                $('#NoJO').keyup(function() {t.draw();});
                $('#TglJO').keyup(function() {t.draw();});
                $('#idcustomer').keyup(function() {t.draw();});
                $('#idshipper').keyup(function() {t.draw();});
                $('#TglMB').keyup(function() {t.draw();});
                $('#idlokasi').keyup(function() {t.draw();});
            });
        </script>
    </body>
</html>
