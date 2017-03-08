<!DOCTYPE html>
<html>
<head>
	<title>PLBTW World Bank Countries Data</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>


</head>
<body>

<div data-role="page" data-theme="a">

	<div data-role="header">
		<h1>PLBTW World Bank Countries Data</h1>
	</div><!-- /header -->

	<div role="main" class="ui-content">

					<h2><?php echo 'Country Name: ' . $countries['name'] . ' (' . $countries['id'] . ')' ;?></h2>
					<p><?php echo 'Kode Mata Uang: ' . $countries['currency']; ?></p>
					<p><?php echo 'Dalam 1 Yen          : ' . $countries['currencySymbol'] .' '. $rate_data['JPY'] .' ( '. $countries['currencyName'] . ' ) '; ?></p>
					<p><?php echo 'Dalam 1 Euro         : ' . $countries['currencySymbol'] .' '. $rate_data['EUR'] .' ( '. $countries['currencyName']. ' ) '; ?></p>
					<p><?php echo 'Dalam 1 Dolar Amerika: ' . $countries['currencySymbol'] .' '. $rate_data['USD'] . ' ( '.$countries['currencyName']. ' ) '; ?> </p>
					<!--<button id="#">See Details</button>-->

	</div><!-- /content -->

	<div data-role="footer">
		<h4>&copy; PLBTW 2016 by YSP</h4>
		<h4>&copy; Editted by Audine Amelly/140707624</h4>
	</div><!-- /footer -->
</div><!-- /page -->


</body>
</html>
