<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8" />

  <title>EVENT MANAGEMENT - BOOKING SUCCESS</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>

<div>

  <div style="font-size: 26px;font-weight: 700;letter-spacing: -0.02em;line-height: 32px;color: #41637e;font-family: sans-serif;text-align: center" align="center" id="emb-email-header"><img style="border: 0;-ms-interpolation-mode: bicubic;display: block;Margin-left: auto;Margin-right: auto;max-width: 152px" src="https://blog.ipleaders.in/wp-content/uploads/2019/03/download-1-1.jpg" alt="" width="152" height="108"></div>

<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px">Hey ,</p>

<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px"> 
	Your event booking has been done successfully!!! Enjoy event with <b>Event Management</b>. 
</p>

<hr>

<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 18px;line-height: 25px;Margin-bottom: 25px; font-weight:bold;"> 
	Your event booking details as follows: 
</p>

<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px"> 
	<b>Event Name:-</b> <?php echo $booking_event_data->pro_name; ?>
</p>
<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px"> 
	<b>Event Details:-</b> <?php echo $booking_event_data->pro_description; ?>
</p>
<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px"> 
	<b>Event From Date:-</b> <?php echo $booking_event_data->pro_from_date; ?>
</p>
<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px"> 
	<b>Event To Date:-</b> <?php echo $booking_event_data->pro_to_date; ?>
</p>
<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px"> 
	<b>Price:-</b> &#8377; <?php echo $booking_event_data->pro_price; ?>
</p>

<hr>

<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 18px;line-height: 25px;Margin-bottom: 25px; font-weight:bold;"> 
	Your payment details as follows: 
</p>

<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px"> 
	<b>Payment Status:-</b> Done
</p>

<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px"> 
	<b>Payment type:-</b> UPI payment
</p>

<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px"> 
	<b>UPI ID:-</b> <?php echo $booking_data['book_upi_id'];?>
</p>

<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px"> 
	<b>Payment to Vendor:-</b> <?php
			$vendor_data = $this->Seller_model->get_data("tbl_vendor","vendor_id",$booking_event_data->pro_vendor_id);
            echo $vendor_data->vendor_name;
			?>	
</p>

</div>

</body>

</html>