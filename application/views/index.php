<!DOCTYPE HTML>

<html>
<head>
	<title>Note Manager Application</title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$.get('/notes/index_html',function(res){
				$('#notes').html(res);
				// attach_handlers();
			});

			// $('#add_form').submit(function(){
			// 	$.post('/notes/add', $(this).serialize(), function(res){
			// 		$('#notes').html(res);
			// 		attach_handlers();
			// 	});
			// 	return false;
			// });

			$(document).on('submit', 'form', function(){
				$.post(
					$(this).attr('action'),
					$(this).serialize(),
					function(response){
						$('#notes').html(response);
					})
				return false;
			})

			$(document).on('change', '.update_form', function(){
				$(this).submit();
				// if(key.which==13) {$.post(
				// 	$(this).attr('action'),
				// 	$(this).serialize(),
				// 	function(response){
				// 		console.log(response);
				// 		$('#notes').html(response);
				// 	})}
			})

			// function attach_handlers() {

			// 	$('.delete_form').submit(function(){
			// 		$.post('/notes/delete', $(this).serialize(), function(res){
			// 			$('#notes').html(res);
			// 			attach_handlers();
			// 		});
			// 		return false;
			// 	});

			// 	$(document).on('keydown','.update_form', function(){
			// 		console.log('here');
			// 		$.post('notes/update', $(this).serialize(), function(res){
			// 			$('#notes').html(res);
			// 			attach_handlers();
			// 		});
			// 	});
			// }

		});
	</script>
	<style type="text/css">
		h2 {
			text-align: center;
		}
		#note {
			width: 20em;
			border-top: 0.1em solid silver;
			padding: 1em 0em 1em 1em;
			margin: 0em auto;
		}
		h3 {
			display: inline-block;
		}
		#delete_form {
			display: inline-block;
			margin-left: 5em;
			float: right;
		}
		#delete {
			width: 5em;
			border: none;
			color: blue;
			background-color: white;
			display: inline-block;
			margin-top: 1em;
		}
		textarea {
			width: 25em;
			height: 10em;
			overflow: scroll;
		}
		form {
			text-align: center;
		}
	</style>
</head>
<body>
	<h2>Notes</h2>
	<div id='notes'>
	</div>
	<form action='/notes/add' method='post' id='add_form'>
		<input type='text' name='title' placeholder='Insert note title here...'>
		<input type='submit' value = 'Add Note'>
	</form>
</body>
</html>