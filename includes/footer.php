<div class="footer center">
	<h4>© 2021 Web App from SADRI PERVANA 
		<a href="https://github.com/sadripervana" target="_blank"> 
			<i class="fab fa-github"></i>
		</a>
		<a href="https://www.linkedin.com/in/sadri-pervana-b76a3421a/" target="_blank"> 
			<i class="fab fa-linkedin"></i>
		</a>
		<a href="https://wa.me/+355685101074" target="_blank"> 
			<i class="fab fa-whatsapp"></i>
		</a> 
	</h4>
</div>

<script type="text/javascript">
	
</script>
<script
src="http://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script
src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
crossorigin="anonymous"></script>

<script type="text/javascript">

	$(document).ready(function () {
		$('table tbody').sortable({
			update: function (event, ui) {
				$(this).children().each(function (index) {
					if ($(this).attr('data-position') != (index+1)) {
						$(this).attr('data-position', (index+1)).addClass('updated');
					}
				});

				saveNewPositions();
			}
		});
	});

	function saveNewPositions() {
		var positions = [];
		$('.updated').each(function () {
			positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
			$(this).removeClass('updated');
		});

		$.ajax({
			url: 'index.php',
			method: 'POST',
			dataType: 'text',
			data: {
				update: 1,
				positions: positions
			}, success: function (response) {
				console.log(response);
			}
		});
	}
</script>

</body>
</html>