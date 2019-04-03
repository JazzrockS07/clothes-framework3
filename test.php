<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf8">
	<title>Untitled document</title>
	<link href="/css/style.css" rel="stylesheet" type="text/css">
	<link href="/css/normalize.css" rel="stylesheet">
	<script type="text/javascript" src="/skins/default/js/scripts_v1.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>


		function myAjax() {

			$.ajax({
				url:'/test_ajax.php',
				type:"POST",
				cache:false,
				timeout:5000,
				data:{login:'jazzrock',password:'jazzrock12'},
				success:function(msg) {
					var response = JSON.parse (msg);
					alert (response.name+' '+response.F);
				},
				error: function(x,t,m) {
					if (t === 'timeout') {
						alert('timeout');
					} else {
						alert ('Message hasn\'t been sent. Error:server doesn\'t answer </span></div>');
					}
				}
			});
		}

		window.onload=function() {
			document.getElementById('xxx').onclick=myAjax;
		}
	</script>

</head>

<body>
<div id="xxx">Тестируем AJAX</div>

</body>
</html>
