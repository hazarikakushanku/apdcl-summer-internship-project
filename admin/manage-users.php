
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );







?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" type="x-icon" href="logo.png">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Report</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+500+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>



</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

	<div class="module">
	
							<div class="module-head">
								<h3>Report</h3>
							<a href="export.php"><button class="excel">export to excel</button></a>
								<!-- <form name="export.php" method="post">
									<input  name="export_excel" class="excel" value="export to excel" />
                                </form> -->
								
							</div>
							
							<div class="module-body table">

                              
							
								<table  cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" >
									<thead>
										<tr>
											<th>Complaint No</th>
											<th>Consumer number</th>
											<th>Division</th>
											<th>Status</th>
											
											<th>Action</th>
											
										
										</tr>
									</thead>
								
<tbody>
<?php

 $query=mysqli_query($con,"select tblcomplaints.*,users.userconsumernumber as consumernumber from tblcomplaints join users on users.id=tblcomplaints.userId ");
while($row=mysqli_fetch_array($query))
{
?>										
										<tr>
											<td><?php echo htmlentities($row['complaintNumber']);?></td>
											<td><?php echo htmlentities($row['consumernumber']);?></td>
											<td><?php echo htmlentities($row['Region']);?></td>
										
											<td align="center"><?php 
                                    $status=$row['status'];
                                    if($status=="" or $status=="NULL")
                                    { ?>
                                      <button type="button" class="btn btn-danger">Not Process Yet</button>
                                   <?php }
                if($status=="in process"){ ?>
                <button type="button" class="btn btn-warning">In Process</button> 
                <?php }
             if($status=="closed") {
                  ?>
                   <button type="button" class="btn btn-success">Closed</button>
                      <?php } ?>
                                   <td align="center">
                                   <a href="complaint-details.php?cid=<?php echo htmlentities($row['complaintNumber']);?>">
                       <button type="button" class="btn btn-primary">View Details</button></a>
                                   </td>
                                </tr>
                              <?php } ?>  
										</tbody>
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->
<script>
	document.getElementById('downloadexcel').addEventListener('click', function() {
		var table2excel = new Table2Excel();
         table2excel.export(document.querySelectorAll("#example-table"));

	});
	</script>



<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
	<script>

</body>
<?php } ?>