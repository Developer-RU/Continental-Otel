<html>
	<head>
		<title>Developer-RU</title>
		<script type="text/javascript" src="/jquery.js"></script>
		<script src="ajax.js"></script>
		<style type="text/css">
			div#rotator {position:relative;}
			div#rotator ul li {float:left; position:absolute; list-style: none;}
			div#rotator ul li.show {z-index:500;}
		</style>
	</head>

	<body>
		
		<div id="rotator">
			<ul>
				<li id="one" class="show"><img src="http://cdn2.wallpapersok.com/uploads/picture/825/179/179825/picture-179825.jpg?width=665" width="1800px" height="900px" /></li>
				<li id="two" class=""><img src="http://commsbusiness.co.uk/wp-content/uploads/2017/04/CPaaS-embedded-590x363.jpg" width="1800px" height="900px" /></li>
			</ul>
		</div>
		<script language="javascript">	
			var img = '0';
			var appendimg = '0';
			
			// начать повторы с интервалом 0.5 сек
			var timerId = setInterval(function() {
			  $.ajax({
					url: "/ajax.php",
					method: "GET",
					data: {'title':$("#title").val(), 'text_area':$("#text_area").val() },
					complete: function() {},
					statusCode: {
						200: function(message) {
							appendimg = message;
							rotate();
						},
						403: function(jqXHR) {
							var error = JSON.parse(jqXHR.responseText);
							//$("body").prepend(error.message);
						}
					}
				});
			}, 200);
			
			function rotate() 
			{	
				if(appendimg != img) 
				{			
					img = appendimg ;
					
					//alert(appendimg)
					
					if(appendimg == '1')
					{										 
						// Подключаем эффект растворения/затухания для показа картинок, css-класс show имеет больший z-index
						$('#one').css({opacity: 0.0})
						.addClass('show')
						.animate({opacity: 1.0}, 1000);
					 
						// Прячем текущую картинку
						$('#two').animate({opacity: 0.0}, 1000)
						.removeClass('show');
					}
					else
					{
						// Подключаем эффект растворения/затухания для показа картинок, css-класс show имеет больший z-index
						$('#two').css({opacity: 0.0})
						.addClass('show')
						.animate({opacity: 1.0}, 1000);
					 
						// Прячем текущую картинку
						$('#one').animate({opacity: 0.0}, 1000)
						.removeClass('show');
					}
				}
			};
		</script>

	</body>

</html>