<!DOCTYPE html>
<html>
<link rel="stylesheet" href="./css/index.css"/>
	<head>
</head>
	</html>
<?php
$connect = mysqli_connect("localhost", "root", "", "nsc_data");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM 30_nse_stocks_info 
	WHERE Name LIKE '%".$search."%'";
}
else
{
	$query = "
	SELECT * FROM 30_nse_stocks_info";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Name</th>
							<th>Market Cap</th>
							<th>Division Yield</th>
							<th>Debet Equality</th>
							<th>Current Price</th>
							<th>ROCE</th>
							<th>EPS</th>
							<th>Stock</th>
							<th>Reserves</th>
							<th>Debet</th>
							
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["Name"].'</td>
				<td>'.$row["Market_Cap"].'</td>
				<td>'.$row["Dividend_Yield"].'</td>
				<td>'.$row["Debet_Equity"].'</td>
				<td>'.$row["Current_Market_Price"].'</td>
				<td>'.$row["ROCE"].'</td>
				<td>'.$row["EPS"].'</td>
				<td>'.$row["Stock"].'</td>
				<td>'.$row["Reserves"].'</td>
				<td>'.$row["Debt"].'</td>
				
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>
