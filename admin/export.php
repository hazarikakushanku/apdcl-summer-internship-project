<!DOCTYPE html>

<html>

<head>

<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >

</head>

<body>

<?php

require('include/config.php');

$sql = " select * from tblcomplaints";

$res = mysqli_query($con, $sql);

$html='<table class="table tavle-striped table-hover table-bordered border-primary text-center"  >

<tr>

<th style="width:100px">complaint number</th>

<th style="width:100px">userid</th>

<th style="width:100px">category</th>

<th style="width:100px">complaintType</th>

<th style="width:100px">Region</th>

<th style="width:100px">ComplaintDetails</th>

<th style="width:100px">status</th>

</tr>';
while($data=mysqli_fetch_assoc($res))
{
      $html.='<tr style="height:100px">
      <td>'.$data['complaintnumber'].'</td>
      <td>'.$data['userId'].'</td>
      <td>'.$data['category'].'</td>
      <td>'.$data['complaintType'].'</td>
      <td>'.$data['Region'].'</td>
      <td>'.$data['status'].'</td>
      </tr>'
}
      $html.='</table>';
      header('Content-Type:application/xls');
      header('Content-Disposition:attatchment;filemane=report.xls');
      echo $html;

?>

</table>

</body>

</html>