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
                <?php echo anchor(site_url('_30_jo/create'), 'Create', 'class="btn btn-primary"'); ?>
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
					<!-- <th>NoJO</th> -->
					<!-- <th>TglJO</th> -->
					<!-- <th>Idcustomer</th> -->
					<!-- <th>Idshipper</th> -->
					<!-- <th>TglMB</th> -->
					<!-- <th>Idlokasi</th> -->
                    <th><input size="5" type="text" name="NoJO" id="NoJO" placeholder="NoJO"></th>
					<th><input size="5" type="text" name="TglJO" id="TglJO" placeholder="TglJO"></th>
					<th><input size="5" type="text" name="Idcustomer" id="Idcustomer" placeholder="Idcustomer"></th>
					<th><input size="5" type="text" name="Idshipper" id="Idshipper" placeholder="Idshipper"></th>
					<th><input size="5" type="text" name="TglMB" id="TglMB" placeholder="TglMB"></th>
					<th><input size="5" type="text" name="Idlokasi" id="Idlokasi" placeholder="Idlokasi"></th>
					<!-- <th>Created At</th> -->
					<!-- <th>Updated At</th> -->
					<th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th> </th>
					<!-- <th><input size="5" type="text" name="NoJO" id="NoJO" placeholder="NoJO"></th> -->
					<!-- <th><input size="5" type="text" name="TglJO" id="TglJO" placeholder="TglJO"></th> -->
					<!-- <th><input size="5" type="text" name="Idcustomer" id="Idcustomer" placeholder="Idcustomer"></th> -->
					<!-- <th><input size="5" type="text" name="Idshipper" id="Idshipper" placeholder="Idshipper"></th> -->
					<!-- <th><input size="5" type="text" name="TglMB" id="TglMB" placeholder="TglMB"></th> -->
					<!-- <th><input size="5" type="text" name="Idlokasi" id="Idlokasi" placeholder="Idlokasi"></th> -->
					<!-- <th><input size="5" type="text" name="Created At" id="Created At" placeholder="Created At"></th> -->
					<!-- <th><input size="5" type="text" name="Updated At" id="Updated At" placeholder="Updated At"></th> -->
                    <th> </th>
                </tr>
            </tfoot>
        </table>
        <!-- <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script> -->
        <!-- <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script> -->
        <!-- <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script> -->
        <script type="text/javascript">
            $(document).ready(function() {

                // Setup - add a text input to each footer cell
                // $('#mytable tfoot th').each( function () {
                //     var title = $(this).text();
                //     if (title != ' ') {
                //         $(this).html( '<input size="5" type="text" name="'+title+'" id="'+title+'" placeholder="'+title+'" />' );
                //     }
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
                        data.Idcustomer = $('#Idcustomer').val();
                        data.Idshipper = $('#Idshipper').val();
                        data.TglMB = $('#TglMB').val();
                        data.Idlokasi = $('#Idlokasi').val();
                        // data.Created At = $('#Created At').val();
                        // data.Updated At = $('#Updated At').val();
                        }
                    },
                    columns: [
                        {
                            "data": "idjo",
                            "orderable": false
                        },{"data": "NoJO"},{"data": "TglJO"},{"data": "idcustomer"},{"data": "idshipper"},{"data": "TglMB"},{"data": "idlokasi"},
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
                $('#Idcustomer').keyup(function() {t.draw();});
                $('#Idshipper').keyup(function() {t.draw();});
                $('#TglMB').keyup(function() {t.draw();});
                $('#Idlokasi').keyup(function() {t.draw();});
                // $('#Created At').keyup(function() {t.draw();});
                // $('#Updated At').keyup(function() {t.draw();});
            });
        </script>
    </body>
</html>
