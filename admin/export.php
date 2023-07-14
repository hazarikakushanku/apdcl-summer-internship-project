<?php

$connect = new PDO("mysql:host=localhost;dbname=cms", "root", "");

$query = "select tblcomplaints.*,users.userconsumernumber as consumernumber from tblcomplaints join users on users.id=tblcomplaints.userId ";

$result = $connect->query($query);

?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
</head>
<body>
    <div class="container">
    	<div class="card">
    		<div class="card-header">
    			<div class="row">
    				<div class="col col-md-6"></div>
    				<div class="col col-md-6 text-right">
    					<button type="button" id="export_button" class="btn btn-success btn-sm">Export</button>
    				</div>
    			</div>
    		</div>
    		<div class="card-body">
    			<table id="employee_data" class="table table-striped table-bordered">
                    <tr>
                        <th>userid</th>
                        <th>complaintnumber</th>
                        <th>Consumer number</th>
                        <th>Region</th>
                        <th>Noc</th>
                        <th>complaintType</th>
                        <th>complaintDetails</th>
                        <th>status</th>
                    </tr>
                    <?php
                    foreach($result as $row)
                    {
                        echo '
                        <tr>
                            <td>'.$row["userId"].'</td>
                            <td>'.$row["complaintNumber"].'</td>
                            <td>'.$row["consumernumber"].'</td>
                            <td>'.$row["Region"].'</td>
                            <td>'.$row["noc"].'</td>
                            <td>'.$row["complaintType"].'</td>
                            <td>'.$row["complaintDetails"].'</td>
                            <td>'.$row["status"].'</td>
                        </tr>
                        ';
                    }
                    ?>
                </table>
    		</div>
    	</div>
    </div>
</body>
</html>
<script>
      function html_table_to_excel(type)
    {
        var data = document.getElementById('employee_data');

        var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

        XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

        XLSX.writeFile(file, 'file.' + type);
    }

    const export_button = document.getElementById('export_button');

    export_button.addEventListener('click', () =>  {
        html_table_to_excel('xlsx');
    });

    </script>
