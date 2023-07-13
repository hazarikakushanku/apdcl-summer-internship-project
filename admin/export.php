<?php

$connect = mysqli_connect("localhost", "root", "", "cms");
$output = '';





$query=mysqli_query($con,"select tblcomplaints.*,users.userconsumernumber as consumernumber from tblcomplaints join users on users.id=tblcomplaints.userId ");
$result = mysqli_query($connect, $query);
if (mysqli_num_rows ($result) > 0)

{
$output .='
<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" >
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
';
while($row=mysqli_fetch_array($query))
{ 
    $output .=
    
    
    
    
    $output .= '</table>';

header ( "Content-Type: application/xls");

header ("Content-Disposition: attachment; filename=download.xls");

echo $output;

                            
                        }
                        ?>