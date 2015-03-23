
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
	<script>
		$(function(){
			$("#start_date").datepicker({ dateFormat: 'yy-mm-dd' });
			$("#due_date").datepicker({ dateFormat: 'yy-mm-dd' });
		});

		$("td a.delete_action").on('click', function(e){
			e.preventDefault();
			$("#confirmDelete").find('.btn-ok').attr('href', $(this).attr('href'));
			$("#confirmDelete").modal('show');
		});
	</script>
  </body>
</html>