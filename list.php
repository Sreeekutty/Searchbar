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
	WHERE Name LIKE '".$search."%'";
}
else
{
	$query = "
	SELECT * FROM 30_nse_stocks_info";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	
	while($row = mysqli_fetch_array($result))
	{
       
		$output .= '
		
				<a href="#"  data-id='.$row["Name"].' onclick="return listData()"  >'.$row["Name"].'</a>
				
			
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>
    <script>
$(document).ready(function(){
    $("#test a").on("click", function(){
        var query = $(this).attr("data-id");

        $.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
			
				$('#result').html(data);
			}
		});
    });
});
</script>
