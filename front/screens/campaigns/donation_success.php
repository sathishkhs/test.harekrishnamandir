<style>
    .centralized-title {
    font-size: 30px;
    margin-bottom: 20px;
    color: #5ab941;
}
.centralized-content {
    font-family: 'Lato', sans-serif;
    color: #343a40;
    font-size: 18px;
    font-weight: 300;
    margin-bottom: 30px;
    line-height: 1.5em;
}
.text-danger {
    color: #dc3545 !important;
}
.social-meida-icons-footer.copy-footer {
    margin-right: 0;
}
.copy-footer {
    width: unset;
    margin-right: 80px;
}
.social-meida-icons-footer {
    width: 100%;
    display: flex;
    justify-content: center;
}
.ym-social {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}
.social-meida-icons-footer .ym-social li a {
    background: transparent;
}
.social-meida-icons-footer .ym-social li a {
    width: 35px;
    height: 35px;
    font-size: 16px;
    display: flex;
}
.social-meida-icons-footer .ym-social li a {
    color: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
}
.ym-social li a {
    background-color: #3b5a9a;
    color: #ffffff;
}
.ym-social li a {
    background-color: #686f7c;
    width: 23px;
    height: 23px;
    text-align: center;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    margin-left: 8px;
    color: #ffffff !important;
    font-size: 13px;
    transition: 0.4s ease all;
    -webkit-transition: 0.4s ease all;
    -moz-transition: 0.4s ease all;
}

</style>

<div class="conainer mx-auto my-5 section-padding">
			<div class="row mx-auto">
				<div class="col-sm-10 col-md-10 mx-auto">
					<div class="inner-absolute-banner text-dark">
						<div class="centralized-title text-center">
						Thank you <?php echo $this->session->flashdata('name'); ?>
						</div>
						<div class="centralized-content ">
                        <p class="text-center ">We have received your kind contribution of <?php echo $this->session->flashdata('amount'); ?>. Your contribution will help to perform the sevas at 
HARE KRISHNA MADIR, AHMEDABAD.</p>
						</div>
							<div class="centralized-title text-center">
						
						</div>
						<div class="text-danger text-center">
						    Note: Please check your e-mail for the donation receipt and tax exemption certificate.
						</div>
					</div>
					 <div class="association-social-center text-center">
            <div class="social-meida-icons-footer copy-footer">
                <ul class="ym-social">
                 <li><a href=""><i class="fab fa-facebook-f text-dark" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fab fa-instagram text-dark" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fab fa-twitter text-dark"></i></a></li>
        <li><a href="javascript:void(0)"><i class="fab fa-linkedin-in text-dark" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fab fa-youtube text-dark"></i></a></li>
                </ul>
            </div>
             <a style="text-align:center;color:#fff;" href="privacy-policy/">Privacy and Donation refund policy, Terms and Conditions</a>
        </div>
				</div>
			</div>
		
			<div class="row">
				<div class="col-sm-10 mx-auto">
					<h2 class="centralized-title">Your transaction details are as below:</h2>
					<table>
						<tbody>
							<tr>
								<th >Name</th>
								<td colspan="4"><?php echo $name; ?></td>
							</tr>
							<tr>
								<th >Transaction Id</th>
								<td colspan="4"><?php echo $this->session->flashdata('order_id'); ?></td>
							</tr>
							<tr>
								<th >Reciept No.</th>
								<td colspan="4"><?php echo $this->session->flashdata('receipt'); ?></td>
							</tr>
							<tr>
								<th >Razorpay Payment No.</th>
								<td colspan="4"><?php echo $this->session->flashdata('razorpay_payment_id'); ?></td>
							</tr>
							<tr>
								<th >Amount</th>
								<td colspan="4">&#8377; <?php echo $amount; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
	
		</div>
		
<script>
// Send transaction data with a pageview if available
// when the page loads. Otherwise, use an event when the transaction
// data becomes available.
dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
dataLayer.push({
  'ecommerce': {
    'purchase': {
      'actionField': {
        'id': '<?php echo $this->session->flashdata("order_id") ? $this->session->flashdata("order_id") : $order_id; ?>',                         // Transaction ID. Required for purchases and refunds.
        'revenue': '<?php echo $this->session->flashdata("amount") ? $this->session->flashdata("amount") : $amount; ?>',                     // Total transaction value (incl. tax and shipping)
 
      },
      'products': [{                            // List of productFieldObjects.
        'name': '<?php echo $this->session->flashdata("name") ? $this->session->flashdata("name") : $name ; ?>',     // Name or ID is required.
        'id': '<?php echo $this->session->flashdata("order_id") ? $this->session->flashdata("order_id") : $order_id; ?>',
        'price': '<?php echo $this->session->flashdata("amount") ? $this->session->flashdata("amount") : $amount; ?>',
        'brand': 'xxx',
        'category': 'xxx',
        'variant': 'xxx',
        'quantity': 1
       }]
    }
  }
});
</script>


