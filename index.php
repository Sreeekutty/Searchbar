<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>NSE_Search</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="./css/index.css"/>
	</head>
	<body>
		<div class="container">
			<br />
			
			<h2 >Stock</h2><br />
			<div class="form-group">
				
			<div class="paragraph_divison">
        <h1>The easiest way to buy <br>and sell stocks.</h1>
        <p>Stock analysis and screening tool for<br>investors in India</p>
		</div>
					<input type="text" name="search_text" id="search_text" placeholder="Search" class="form-control" />
				     <div id="test"  style="display:none;">
				     </div>

			</div>
			<br />
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
		<br />
		
		<br />
		<br />
		<br />
	</body>
</html>


<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"list.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
			
				$('#test').html(data);
			}
		});
	}


	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			 $('#test').show();
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>




