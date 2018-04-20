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

  <table width="100%">
    <tr>
        <td><strong>Warehouse Supervisor:</strong>{{$data['data_header']['warehouse_supervisor']}}</td>
				<td><strong>Date:</strong>{{$data['data_header']['stock_opname_date']}}</td>
    </tr>
  </table>
	<table width="100%">
    <tr>
        <td><h1>Stock Opname</h1></td>
    </tr>

  </table>
  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Raw Material Name</th>
        <th>Stock</th>
        <th>Available Stock</th>
        <th>Information</th>
      </tr>
    </thead>
    <tbody>
			<?php 
			$number=0; 
			$sub_total=0;
			$total=0;
			?>
			@foreach($data["data_detail"] as $key=>$values)
			<?php 
			$number ++; 
			//$sub_total=$values["qty"]* $values["unit_price"]; 
			//$total= $total+$sub_total;
			?>
      <tr>
        <th scope="row">{{$number}}</th>
        <td>{{$values["raw_material_name"]}}</td>
        <td align="right">{{$values["stock"]}}</td>
        <td align="right">{{$values["stock_opname"]}}</td>
        <td align="right">{{$values["information"]}}</td>
      </tr>
			@endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">{{--Total $--}}</td>
            <td align="right">{{--${{$total}}--}}</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>