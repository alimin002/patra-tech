<?php use app\Providers\Common; ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Report Purchase</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }

    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="{{url('assets/img/logo-ex-4.png')}}" alt="" width="150"/></td>
        <td align="right">
            <h3>Shinra Electric power company</h3>
            <pre>
                Company representative name
                Company address
                Tax ID
                phone
                fax
            </pre>
        </td>
    </tr>

  </table>
	Periode
  <table width="100%">
    <tr>
        <td><strong>Date From:</strong>{{$data["data_header"]["date_start"]}}</td>
        <td><strong>Date To:</strong>{{$data["data_header"]["date_end"]}}</td>
    </tr>

  </table>
	<table width="100%">
    <tr>
        <td><h1>Report Purchase</h1></td>
    </td>

  </table>
  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Purchase Number</th>
        <th>Purchase Date</th>
        <th>Suplier Name</th>
        <th>Total Purchase</th>
      </tr>
    </thead>
    <tbody>
			<?php 
			$number=0; 
			$grand_total=0;
			$total_invoice=0;
			?>
			@foreach($data["data_detail"] as $key=>$values)
			<?php $number ++; ?>
      <tr class="">			  
        <th scope="row">{{$number}}</th>
				<td>{{$values["purchase_number"]}}</td>
        <td>{{$values["purchase_date"]}}</td>
        <td align="right">{{$values["suplier_name"]}}</td>
        <td align="right">{{Common::number_with_commas($values["total_purchase"])}}</td>
      </tr>
			<?php $grand_total=$grand_total+$values["total_purchase"]; ?>
			@endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Grand Total Rp</td>
            <td align="right">Rp&nbsp;{{Common::number_with_commas($grand_total)}}</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>