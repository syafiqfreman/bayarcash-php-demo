<?php
require_once('config.php');

/**
 * Input required by API
 * */
$fpx_portal_key = $config['bayarcash_FPX_portal_key'];
$return_url = $config['return_url'];
$order_no = 'ORDER1';
$order_amount = '1.00';
$buyer_name = 'John Doe';
$buyer_email = 'johndoe@example.com';
$buyer_tel = '0168788787';
$payment_gateway = 1;
$api_url = $config['bayarcash_api_url'];
$order_description = 'Pencil';
$payment_form_id = md5($order_no . time()); # Safety features: Generate and assign a dynamic form ID in order to prevent any automation on the client-side.
?>

<html>
<head>
	<title>Bayarcash Checkout Example</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div id="container" class="container col-6 mt-4 mb-4">
	<div class="card">
		<div class="card-header">
			Transaction Details
		</div>
		<div class="card-body">
			<form id="<?php echo $payment_form_id ?>" method="POST" action="<?php echo $api_url ?>" class="mb-0 pb-0">

				<div class="card-text">
					<div class="row">
						<div class="col">

							<!-- ID Number -->
							<div class="form-group mb-2">
								<label class="mb-1" for="order_no">
									<b>ID Number</b>
								</label>
								<div>
									<input type="text" name="order_no" id="order_no" class="form-control" value="<?php echo $order_no ?>" required>
								</div>
							</div>

							<!-- Amount -->
							<div class="form-group mb-2">
								<label class="mb-1" for="order_amount">
									<b>Amount</b>
								</label>
								<div>
									<input type="text" name="order_amount" id="order_amount" class="form-control" value="<?php echo $order_amount ?>" required>
								</div>
							</div>

							<!-- Description -->
							<div class="form-group mb-2">
								<label class="mb-1" for="order_description">
									<b>Description</b>
								</label>
								<div>
									<input type="text" name="order_description" id="order_description" class="form-control" value="<?php echo $order_description ?>" required>
								</div>
							</div>

							<!-- Name -->
							<div class="form-group mb-2">
								<label class="mb-1" for="buyer_name">
									<b>Name</b>
								</label>
								<div>
									<input type="text" name="buyer_name" id="buyer_name" class="form-control" value="<?php echo $buyer_name ?>" required>
								</div>
							</div>

							<!-- Email -->
							<div class="form-group mb-2">
								<label class="mb-1" for="buyer_email">
									<b>Email</b>
								</label>
								<div>
									<input type="text" name="buyer_email" id="buyer_email" class="form-control" value="<?php echo $buyer_email ?>" required>
								</div>
							</div>

							<!-- Telephone -->
							<div class="form-group mb-2">
								<label class="mb-1" for="buyer_tel">
									<b>Telephone</b>
								</label>
								<div>
									<input type="text" name="buyer_tel" id="buyer_tel" class="form-control" value="<?php echo $buyer_tel ?>" required>
								</div>
							</div>
						</div>
					</div>
				</div>

				<input type="hidden" name="payment_gateway" readonly="true" value="<?php echo $payment_gateway ?>"/>
				<input type="hidden" name="return_url" readonly="true" value="<?php echo $return_url ?>"/>
				<input type="hidden" name="api_url" readonly="true" value="<?php echo $api_url ?>"/>
				<input type="hidden" name="portal_key" readonly="true" value="<?php echo $fpx_portal_key ?>"/>

				<!-- Submit -->
				<button class="btn btn-primary mt-2" type="submit">
					Proceed to Payment
				</button>
			</form>
		</div>
	</div>
</div>

<!-- Footer -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
