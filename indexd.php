<!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Export DataTables Data using PHP and MySQL</title>
    <link href="styled.css" rel="stylesheet" type="text/css" />

    <script src="vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet"  href="vendor/DataTables/jquery.datatables.min.css">	
    <script type="text/javascript" charset="utf-8" src="vendor/DataTables/jquery.dataTables.min.js"></script> 

    <link rel="stylesheet"  href="vendor/DataTables/buttons.datatables.min.css">    
    <script src="vendor/DataTables/dataTables.buttons.min.js" charset="utf-8" type="text/javascript"></script> 
    <script src="vendor/DataTables/jszip.min.js" type="text/javascript"></script> 
    <script src="vendor/DataTables/pdfmake.min.js" type="text/javascript"></script> 
    <script src="vendor/DataTables/vfs_fonts.js" type="text/javascript"></script> 
    <script src="vendor/DataTables/buttons.html5.min.js" type="text/javascript"></script> 
	<script type="text/javascript" language="javascript" class="init" charset="utf-8"></script> 


    <script type="text/javascript" language="javascript">
        $(document).ready(function () {
            var table = $('#employeeTable').DataTable({
                "paging": false,
                "processing": true,
                "serverSide": true,
                'serverMethod': 'post',
                "ajax": "server.php",
				"contentType" : 'application/x-www-form-urlencoded; charset=UTF-8',
                dom: 'Bfrtip',
                buttons: [
                    {extend: 'copy', attr: {id: 'allan'}}, 'csv', 'excel', 'pdf'
                ]
            });

        });
    </script>
</head>
<body>
    <div class="container">
        <h2>Export DataTables Data using PHP and MySQL</h2>
        <table name="employeeTable" id="employeeTable" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Д.д</th>
                    <th>Age</th>
                    <th>Salary</th>
                    <th>Salary</th>
                </tr>
            </thead>
        </table>

    </div>
</body>
</html>