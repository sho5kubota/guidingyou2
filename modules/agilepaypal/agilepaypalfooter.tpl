<script type="text/javascript">
    var force_summary = {$force_summary};
	var hide_add2cart4membership = {$hide_add2cart4membership};
	$(document).ready(function() {
		if(force_summary == 1)
		{
			if ($("p#cart-buttons a.exclusive") != "undefined") {
				var oldhref = $("p#cart-buttons a.exclusive").attr("href");
				if(oldhref != null)$("p#cart-buttons a.exclusive").attr("href", oldhref.replace("step=1","step=0"));
			}
		}
		/** _agile_ hide delivery address _agile_ **/
		$(".order_delivery").hide(); 
		/** _agile_ hide add to cart buttons _agile_ **/
		if(hide_add2cart4membership)
		{
			$(".button.ajax_add_to_cart_button").hide(); 
		}

	});  
</script>
