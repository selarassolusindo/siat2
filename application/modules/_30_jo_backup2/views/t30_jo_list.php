<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title> -->
        <!-- <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/> -->
        <!-- <style>
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
        </style> -->
    <!-- </head>
    <body> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">T30_jo List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('_30_jo/create'), 'Create', 'class="btn btn-primary"'); ?>
                <?php echo anchor(site_url('_30_jo/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                <?php echo anchor(site_url('_30_jo/word'), 'Word', 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>NoJO</th>
                    <th>TglJO</th>
                    <th>Idcustomer</th>
                    <th>Idshipper</th>
                    <th>TglMB</th>
                    <th>Idlokasi</th>
                    <!-- <th>Created At</th> -->
                    <!-- <th>Updated At</th> -->
                    <th width="200px">Action</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>&nbsp</td>
                    <td>44</td>
                    <td>44</td>
                    <td>44</td>
                    <td>44</td>
                    <td>44</td>
                    <td>44</td>
                    <td>44</td>
                </tr>
                <tr>
                    <td>&nbsp</td>
                    <td>33</td>
                    <td>33</td>
                    <td>33</td>
                    <td>33</td>
                    <td>33</td>
                    <td>33</td>
                    <td>33</td>
                </tr>
                <tr>
                    <td>&nbsp</td>
                    <td>55</td>
                    <td>55</td>
                    <td>55</td>
                    <td>55</td>
                    <td>55</td>
                    <td>55</td>
                    <td>55</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>&nbsp;</th>
                    <th>No. JO</th>
                    <th>No. JO</th>
                    <th>No. JO</th>
                    <th>No. JO</th>
                    <th>No. JO</th>
                    <th>No. JO</th>
                </tr>
            </tfoot>
        </table>
        <!-- <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script> -->
        <!-- <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script> -->
        <!-- <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script> -->
        <script type="text/javascript">
            $(document).ready(function() {
                // $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                // {
                //     return {
                //         "iStart": oSettings._iDisplayStart,
                //         "iEnd": oSettings.fnDisplayEnd(),
                //         "iLength": oSettings._iDisplayLength,
                //         "iTotal": oSettings.fnRecordsTotal(),
                //         "iFilteredTotal": oSettings.fnRecordsDisplay(),
                //         "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                //         "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                //     };
                // };

                // Setup - add a text input to each footer cell
                $('#mytable tfoot th').each( function () {
                    var title = $(this).text();
                    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
                } );

                //

                // DataTable
                var table = $('#mytable').DataTable({
                    initComplete: function () {
                        // Apply the search
                        this.api().columns().every( function () {
                            var that = this;

                            $( 'input', this.footer() ).on( 'keyup change clear', function () {
                                if ( that.search() !== this.value ) {
                                    that
                                        .search( this.value )
                                        .draw();
                                }
                            } );
                        } );
                    }
                });

            });
        </script>
    <!-- </body>
</html> -->
