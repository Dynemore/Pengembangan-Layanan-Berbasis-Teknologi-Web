<!DOCTYPE html>
<html>
<head>
	<title>PLBTW World Bank Countries Data</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>

	<style>
	/* The Modal (background) */
	.modal {
	    display: none; /* Hidden by default */
	    position: fixed; /* Stay in place */
	    z-index: 1; /* Sit on top */
	    left: 0;
	    top: 0;
	    width: 100%; /* Full width */
	    height: 100%; /* Full height */
	    overflow: auto; /* Enable scroll if needed */
	    background-color: rgb(0,0,0); /* Fallback color */
	    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	    -webkit-animation-name: fadeIn; /* Fade in the background */
	    -webkit-animation-duration: 0.4s;
	    animation-name: fadeIn;
	    animation-duration: 0.4s
	}

	/* Modal Content */
	.modal-content {
	    position: fixed;
	    bottom: 0;
	    background-color: #fefefe;
	    width: 100%;
	    -webkit-animation-name: slideIn;
	    -webkit-animation-duration: 0.4s;
	    animation-name: slideIn;
	    animation-duration: 0.4s
	}

	/* The Close Button */
	.close {
	    color: white;
	    float: right;
	    font-size: 28px;
	    font-weight: bold;
	}

	.close:hover,
	.close:focus {
	    color: #000;
	    text-decoration: none;
	    cursor: pointer;
	}

	.modal-header {
	    padding: 2px 16px;
	    background-color: #5cb85c;
	    color: white;
	}

	.modal-body {padding: 2px 16px;}

	.modal-footer {
	    padding: 2px 16px;
	    background-color: #5cb85c;
	    color: white;
	}
	/*For Button*/
	.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
	}

	.button1 {
	    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
	}

	.button2:hover {
	    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
	}

	/* Add Animation */
	@-webkit-keyframes slideIn {
	    from {bottom: -300px; opacity: 0}
	    to {bottom: 0; opacity: 1}
	}

	@keyframes slideIn {
	    from {bottom: -300px; opacity: 0}
	    to {bottom: 0; opacity: 1}
	}

	@-webkit-keyframes fadeIn {
	    from {opacity: 0}
	    to {opacity: 1}
	}

	@keyframes fadeIn {
	    from {opacity: 0}
	    to {opacity: 1}
	}
	</style>

</head>
<body>

<div data-role="page" data-theme="a">

	<div data-role="header">
		<h1>PLBTW World Bank Countries Data</h1>
		<h1>Tugas 3 oleh Audine Amelly - 140707624</h1>
	</div><!-- /header -->

	<div role="main" class="ui-content">
		<ul data-role="listview" data-filter="true" data-inset="true">
		<?php
   			foreach($countries as $things=> $value)
			{

		?>
				<li>
					<h2><?php echo 'Country Name: ' . $value['name'] . ' (' . $value['id'] . ')';?></h2>
					<p><?php echo 'Region: ' . $value['region']; ?></p>
					<p><?php echo 'Capital City: ' . $value['capital_city']; ?></p>
					<p><?php echo 'Longitude: ' . $value['longitude'] . ' Latitude: ' . $value['latitude']; ?></p>
					<button id="<?php echo 'myBtn' .  $value['id'] ;?>">See Details</button>
				</li>


				<div id="<?php echo 'myModal' .  $value['id'] ;?>" class="modal">
				  <!-- Modal content -->
				  <div class="modal-content">
				    <div class="modal-header">
				      <span class="close">&times;</span>
				      <h2><?php echo 'Country Name: ' . $value['name'] . ' (' . $value['id'] . ')';?></h2>
				    </div>
				    <div class="modal-body">
									<h2>Income Level: </h2>
									<p><?php echo 'Id : ' . $value['incomeLevel_id']; ?><br/>
									<?php echo 'Value : ' . $value['incomeLevel_value']; ?></p>

									<h2>Lending Type:</h2>
									<p><?php echo 'I : ' . $value['lendingType_id']; ?><br/>
									<?php echo 'Value : ' . $value['lendingType_value']; ?></p>

									<a href="detail/<?php echo $value['id']; ?>" class="button button2" style="color:white">See Currency </a>
				    </div>
				  </div>
			</div>

		<?php

			}

		?>

		</ul>
	</div><!-- /content -->

	<div data-role="footer">
		<h4>&copy; PLBTW 2016 by YSP</h4>
		<h4>&copy; Editted by Audine Amelly/140707624</h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script>
// Get the modal
<?php
		foreach($countries as $things=> $value)
	{

?>
	var modal<?php echo $value['id'] ;?> = document.getElementById('myModal<?php echo $value['id'] ;?>');

	// Get the button that opens the modal
	var btn<?php echo $value['id'] ;?>  = document.getElementById("myBtn<?php echo $value['id'] ;?>");


	// When the user clicks the button, open the modal
	btn<?php echo $value['id'] ;?>.onclick = function() {
	    modal<?php echo $value['id'] ;?>.style.display = "block";
	}

<?php

	}

?>
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close");

// When the user clicks on <span> (x), close the modal
var i;
for (i = 0; i < span.length; i++) {
    span[i].onclick = function() {
			<?php
					foreach($countries as $things=> $value)
				{

			?>
		    modal<?php echo $value['id'] ;?>.style.display = "none";

				<?php

					}

				?>
		}
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	<?php
			foreach($countries as $things=> $value)
		{

	?>
    if (event.target == modal<?php echo $value['id'] ;?>) {
        modal<?php echo $value['id'] ;?>.style.display = "none";
    }
		<?php

			}

		?>
}
</script>

</body>
</html>
