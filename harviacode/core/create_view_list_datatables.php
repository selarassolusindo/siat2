<?php

$string = "<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel=\"stylesheet\" href=\"<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>\"/>
        <link rel=\"stylesheet\" href=\"<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>\"/>
        <link rel=\"stylesheet\" href=\"<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>\"/>
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
        <div class=\"row\" style=\"margin-bottom: 10px\">
            <!-- <div class=\"col-md-4\"> -->
                <!-- <h2 style=\"margin-top:0px\">".ucfirst($table_name)." List</h2> -->
            <!-- </div> -->
            <div class=\"col-md-4 text-left\">
                <?php echo anchor(site_url('".$c_url."/create'), 'Create', 'class=\"btn btn-primary\"'); ?>";
if ($export_excel == '1') {
    $string .= "\n\t\t\t\t<!-- <?php echo anchor(site_url('".$c_url."/excel'), 'Excel', 'class=\"btn btn-primary\"'); ?> -->";
}
if ($export_word == '1') {
    $string .= "\n\t\t\t\t<!-- <?php echo anchor(site_url('".$c_url."/word'), 'Word', 'class=\"btn btn-primary\"'); ?> -->";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t\t\t<!-- <?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn-primary\"'); ?> -->";
}
$string .= "\n\t\t\t</div>
        </div>
        <div class=\"col-md-4 text-center\">
            <div style=\"margin-top: 4px\"  id=\"message\">
                <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <table class=\"table table-bordered table-striped\" id=\"mytable\">
            <thead>
                <tr>
                    <th width=\"80px\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t\t\t\t<th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th> </th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t\t<th><input size=\"5\" type=\"text\" name=\"".label($row['column_name'])."\" id=\"".label($row['column_name'])."\" placeholder=\"".label($row['column_name'])."\"></th>";
}
$string .= "
                    <th> </th>
                </tr>
            </tfoot>";
$column_non_pk = array();
foreach ($non_pk as $row) {
    $column_non_pk[] .= "{\"data\": \"".$row['column_name']."\"}";
}
$col_non_pk = implode(',', $column_non_pk);

$string .= "
        </table>
        <!-- <script src=\"<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>\"></script> -->
        <!-- <script src=\"<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>\"></script> -->
        <!-- <script src=\"<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>\"></script> -->
        <script type=\"text/javascript\">
            $(document).ready(function() {

                // Setup - add a text input to each footer cell
                $('#mytable tfoot th').each( function () {
                    var title = $(this).text();
                    if (title != ' ') {
                        $(this).html( '<input size=\"5\" type=\"text\" name=\"'+title+'\" id=\"'+title+'\" placeholder=\"'+title+'\" />' );
                    }
                } );

                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        \"iStart\": oSettings._iDisplayStart,
                        \"iEnd\": oSettings.fnDisplayEnd(),
                        \"iLength\": oSettings._iDisplayLength,
                        \"iTotal\": oSettings.fnRecordsTotal(),
                        \"iFilteredTotal\": oSettings.fnRecordsDisplay(),
                        \"iPage\": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        \"iTotalPages\": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $(\"#mytable\").DataTable({
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
                        sProcessing: \"loading...\"
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {\"url\": \"".$c_url."/json\", \"type\": \"POST\", \"data\": function(data) {";
foreach ($non_pk as $row) {
    $string .= "
                        data." . label($row['column_name']) . " = $('#".label($row['column_name'])."').val();";
}
$string .= "
                        }
                    },
                    columns: [
                        {
                            \"data\": \"$pk\",
                            \"orderable\": false
                        },".$col_non_pk.",
                        {
                            \"data\" : \"action\",
                            \"orderable\": false,
                            \"className\" : \"text-center\"
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
                });";

foreach ($non_pk as $row) {
    $string .= "
                $('#".label($row['column_name'])."').keyup(function() {t.draw();});";
}

$string .= "
            });
        </script>
    </body>
</html>";


$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>
