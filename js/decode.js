
	function performSearch()
	{
	
		// get the phone number from the page
		var phonenumber = document.getElementById('phonenumber').value;
		var postData = {};
		postData.number = phonenumber;
	
		// get json from api call
		$.getJSON("./decodeapi.php",
			postData,
			function(data) {
			
				// decode json data
				var name = data.name;
				var phonenumber = data.phonenumber;
				var barcodenumber = data.barcodenumber;
			
				// display name
				var html = "<h3>" + name + "<br></h3>";
				$("#name").html(html);
			
				// set the text to the barcodenumber
				$('#barcode').html = barcodenumber;
			
				// generate the barcode based on the input number
				generatebarcode();

				$('#barcode').show();
			
			}
		);
	
	}