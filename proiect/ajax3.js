<script type="text/javascript">

$(document).ready(function(e){
	
	$('#addtocart').click(function(e){
			
			e.preventDefault();
			
			$.ajax({
				method: "post",
				
				url: "addGame.php",
				data: $('#form1').serialize(),
				dataType: "text",
				success: function("addGame.php"){
					alert("merge oarecum");
					//$('#label1').text("readData.php");
				}
			})
	})
	
});

</script>