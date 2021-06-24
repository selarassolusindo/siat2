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
                <!-- <h2 style="margin-top:0px">T31_csheet List</h2> -->
            <!-- </div> -->
            <div class="col-md-4 text-left">
                <?php echo anchor(site_url('_31_csheet/create'), 'Tambah', 'class="btn btn-primary"'); ?>
				<!-- <?php echo anchor(site_url('_31_csheet/excel'), 'Excel', 'class="btn btn-primary"'); ?> -->
				<!-- <?php echo anchor(site_url('_31_csheet/word'), 'Word', 'class="btn btn-primary"'); ?> -->
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
					<th><input size="5" type="text" name="nocsheet" id="nocsheet" placeholder="Nocsheet"></th>
					<th><input size="5" type="text" name="tglcsheet" id="tglcsheet" placeholder="Tglcsheet"></th>
					<th><input size="5" type="text" name="idjo" id="idjo" placeholder="Idjo"></th>
					<th><input size="5" type="text" name="totalcsheet" id="totalcsheet" placeholder="Totalcsheet"></th>
					<th><input size="5" type="text" name="created_at" id="created_at" placeholder="Created At"></th>
					<th><input size="5" type="text" name="updated_at" id="updated_at" placeholder="Updated At"></th>
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
                    ajax: {"url": "_31_csheet/json", "type": "POST", "data": function(data) {
                        data.nocsheet = $('#nocsheet').val();
                        data.tglcsheet = $('#tglcsheet').val();
                        data.idjo = $('#idjo').val();
                        data.totalcsheet = $('#totalcsheet').val();
                        data.created_at = $('#created_at').val();
                        data.updated_at = $('#updated_at').val();
                        }
                    },
                    columns: [
                        {
                            "data": "idcsheet",
                            "orderable": false
                        },
						{"data": "nocsheet"},
						{"data": "tglcsheet"},
						{"data": "idjo"},
						{"data": "totalcsheet"},
						{"data": "created_at"},
						{"data": "updated_at"},
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
                $('#nocsheet').keyup(function() {t.draw();});
                $('#tglcsheet').keyup(function() {t.draw();});
                $('#idjo').keyup(function() {t.draw();});
                $('#totalcsheet').keyup(function() {t.draw();});
                $('#created_at').keyup(function() {t.draw();});
                $('#updated_at').keyup(function() {t.draw();});
            });
        </script>
    </body>
</html>