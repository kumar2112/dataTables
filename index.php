<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DataTable</title>
       
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js" ></script>
        
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.17/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js" ></script>
        <script type="text/javascript" src="https://cdn.datatables.net/select/1.2.6/js/dataTables.select.min.js" ></script>
        <script type="text/javascript" src="http://bamko.projects/dataTablePractice/dbteditor/js/dataTables.editor.min.js" ></script>
        
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.17/css/jquery.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.6/css/select.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="http://bamko.projects/dataTablePractice/dbteditor/css/editor.dataTables.min.css"/>
        
        
        <script>
            
                var editor; // use a global for the submit and return data rendering in the examples
 
                $(document).ready(function() {
                    editor = new $.fn.dataTable.Editor( {
                        ajax: "inc/jsonlog.php",
                        table: "#example",
                        fields: [   {
                                      label: "Table Name:",
                                      name: "table_name"
                                    }, 
                                    {
                                      label: "Field Display Name:",
                                      name: "field_display_name"
                                    }, 
                                    {
                                       label: "Log Section:",
                                       name: "log_section"
                                    }, 
                                    {
                                      label: "Log Sub Section:",
                                      name: "log_sub_section"
                                    },
                                    {
                                       label: "Is logged view:",
                                       name: "is_log_viewed"
                                    }
                                ]
                        });
 
                    // Activate an inline edit on click of a table cell
                    $('#example').on( 'click', 'tbody td:not(:first-child)', function (e) {
                        editor.inline( this );
                    } );
 
                    $('#example').DataTable( {
                        processing: true,
                        serverSide: true,
                        ajax: "inc/jsonlog.php",
                        searching:true,
                        //paging: false,
                        order: [[ 1, 'asc' ]],
                        columns: [
                                { data: "table_name" },
                                { data: "field_display_name" },
                                { data: "log_section" },
                                { data: "log_sub_section" },
                                { data: "is_log_viewed" },
                        ],
                        select: {
                            style:    'os',
                            selector: 'td:first-child'
                        },
                        buttons: [
                            { extend: "create", editor: editor },
                            { extend: "edit",   editor: editor },
                            { extend: "remove", editor: editor }
                        ]
                    } );
                } );

            
        </script>
    </head>
    <body>
        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                
                <th>Table Name</th>
                <th>Field Display Name</th>
                <th>Log Section</th>
                <th>Log Sub Section</th>
                <th>Is logged view</th>
            </tr>
        </thead>
    </table>
    </body>
</html>
