<!DOCTYPE html>
<html lang="en">
<head>
	<title>Notes</title>
	<script src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="/assets/css/style.css">
	<script>
		$(document).ready(function(){
			$.get('/Notes/index_html', function(res){
				$("#notes_div").html(res);
			});
			$('form').on('submit', function(e){
				$.post($(this).attr('action'), $(this).serialize(), function(res){
					$("#notes_div").html(res);
				});
				return false;
			});
		});
			$(document).on('blur', '.update_box', function(){
				$(this).submit();
			});
			$(document).on("submit", ".delete, .update", function(){
				$.post($(this).attr('action'), $(this).serialize(), function(res){
					$("#notes_div").html(res);
				});
				return false;
			})
			$(document).on("click", ".description", function(){
				var p = $(this).text();
				var textarea = $("<textarea class='form-control update_box' name='content'>" + p + "</textarea>")
				$(this).replaceWith(textarea);
				$(textarea).focus();
			})
	</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form id="new_note" action="/Notes/new" method="post">
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" id="title" name="title" class="form-control">
					</div>
					<div class="form-group">
						<textarea class="form-control" name="content" rows="4" placeholder="Enter description here..."></textarea>
					</div>
					<button type="submit" class="btn btn-default">Add Note</button>
				</form>
			</div>
		</div><!-- end of row -->
		<div class="row" id="notes_div">
			<!-- insert from AJAX here -->
		</div>
	</div><!-- end of container -->
</body>
</html>