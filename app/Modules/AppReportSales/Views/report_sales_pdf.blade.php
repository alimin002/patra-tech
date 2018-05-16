<?php use app\Providers\Common; ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Purchase Order</title>

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
        <td><h1>Report Sales</h1></td>
    </tr>

  </table>
  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Invoice Number</th>
        <th>Sales Date</th>
        <th>Customer Name</th>
        <th>Total Invoice</th>
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
				<td>{{$values["invoice_number"]}}</td>
        <td>{{$values["invoice_date"]}}</td>
        <td align="right">{{$values["customer_name"]}}</td>
        <td align="right">{{$values["total_invoice"]}}</td>
      </tr>
			<?php $grand_total=$grand_total+$values["total_invoice"]; ?>
			@endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Grand Total Rp</td>
            <td align="right">Rp{{$grand_total}}</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>