<?php $success = "";
if ($_POST) {
	$success = "Thank You";
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
	/*$url = $_POST['url'];*/
	$subject = "Let's Craft Your Business";
	require_once ('../class.phpmailer.php');
	$mail = new PHPMailer();
	// defaults to using php "mail()"
	$body = "
   <div style='width: 500px;
   		padding: 10px;
   		color: #120202;
   		background: #85e8f5;'>
   			<p style='margin:5px'>
   						Name: $name
   			</p>
   			<p style='margin:5px'>
   						Subject: $subject
   			</p>
   			<p style='margin:5px'>
   						Email: $email
   			</p>
   			<p style='margin:5px'>
   						Phone: $phone
   			</p>
   			<p style='margin:5px'>
   						Message: $message
   			</p>
   </div>";
	//$body     = preg_replace('/[\]/','',$body);
	$mail -> SetFrom('info@aavana.in', 'Contact Form Aavana');
    $address = "info@aavana.in";
//	$address1 = "manjunath.k@aavana.in";
	$address1 = "lead@aavana.in";
	$address2 = "harsha.rajaiah@aavana.in";
	$address3 = "jp@aavana.in";
	$mail -> AddAddress($address, "aavana");
	$mail -> AddAddress($address1, "aavana");
	$mail -> AddAddress($address2, "aavana");
	$mail -> AddAddress($address3, "aavana");
	$mail -> Subject = $subject;
	//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail -> MsgHTML($body);
		/*$_SESSION['is_popup'] = true; */
	if (!$mail -> Send()) {
		$_SESSION['error'] = "Mailer Error: " . $mail -> ErrorInfo;
		$return_arr = array(
					'status' => false
				);
	} else {
		$return_arr = array(
					'status' => true
				);
	}
	/*header("Location: ". $url); */
	echo json_encode($return_arr);
exit;
}
?>
<div class="blog-right-side" id="nav_position">
	<aside id="recent-posts-2" class="widget widget_recent_entries">
		<div class="contact-section-one">
			<div class="section-one-wrapper">
				<div class="contact-wrapper contact-section title-bar">
					<h2 class="title" style="margin-bottom: 10px !important;">Let's craft your business</h2>
					<p>Share your excitement with us.</p>
					<span class="title-border"></span>
					<?php if($success){
					?>
					<div>
						<p style="color: #4cc34c;font-size: 15px;text-align: center;font-weight: 600;">
							Thank you, Your request has been submitted successfully, we shall get back to you at the earliest.
						</p>
					</div>
					<?php } ?>
					<!-- <form name="contact" method="post" action="https://intellectual-property.aavana.in/subcribe" class="contact-form"> -->
						<div class="form-group has-feedback">
							<input class="form-control icon" id="name" placeholder="Name*" name="name" id="name" type="text">
							<span class="fa fa-user form-control-feedback" style="margin-top: 8px; font-size: 20px;"></span>
							<span id="err_name" style="font-size: 14px;color: red;"></span>
						</div>
						<!-- <div class="form-group">
							<input class="form-control" id="subject" placeholder="Subject" name="subject" type="text">
						</div> -->
						<div class="form-group has-feedback">
							<input class="form-control icon" id="email" placeholder="Email*" name="email"  type="text">
							<span class="fa fa-envelope form-control-feedback" style="margin-top: 8px;"></span>
							<span id="err_email" style="font-size: 14px;color: red;"></span>
						</div>
						<div class="form-group has-feedback">
							<input class="form-control icon" id="phone" placeholder="Phone*" type="number" name="phone">
							<span  class="fa fa-phone form-control-feedback" style="margin-top: 8px; font-size: 20px;"></span>
							<span id="err_phone" style="font-size: 14px;color: red;"></span>
						</div>
						<div class="form-group">
							<textarea class="form-control" id="message" name="message" placeholder="Message" rows="3"></textarea>
							<input name="url" id="url" value="<?php echo 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>" type="hidden">
							<span id="err_message" style="font-size: 14px;color: red;"></span>
						</div>
						<div class="text-center">
							<button type="submit" class="subscribeBtn btn btn-primary" id="contactBtn">
								Get More Information
							</button>
						</div>
					<!-- </form> -->
				</div>
			</div>
		</div>
	</aside>
</div>

<script type="text/javascript">
	$(document).ready(function(){

	    $(window).on("scroll",function() {

	        if($(this).scrollTop() > 1300) 

	            $("#nav_position").removeClass("position_scroll").addClass("active");

	        else 

	            $("#nav_position").removeClass("active").addClass("position_scroll");


	    });
	});
</script>
<style>
	input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}
	.btn-primary {
		padding: 6px 20px;
	}
	@media only screen and (max-width: 1440px) {
	.position_scroll {
		/*width: 350px;*/
		position: relative;
  }
}
	@media only screen and (max-width: 1440px) {
  	.active {
	  position: fixed;
	  width: 350px;
	  top: 90px;
	  /*bottom: 50px;*/
  }
}
	@media only screen and (max-width: 1024px) {
	  .active {
		  position: fixed;
		  width: 300px;
		  top: 90px;
		  /*bottom: 50px;*/
	  }
	}
	@media only screen and (max-width: 768px) {
	  .active {
		  position: fixed;
		  width: 230px;
		  top: 90px;
		  /*bottom: 50px;*/
	  }
	}
	@media only screen and (max-width: 425px) {
	   .position_scroll {
	   display: none;
	   /* width: 290px;*/
	  }
	}
	@media only screen and (max-width: 425px;) {
		.active {
	    display: none;
	    position: relative;
	    margin-bottom: 115px;
	  }
	}
	@media only screen and (max-width: 375px) {
	   .active {
	    
	    position: relative;
	    margin-bottom: 115px;
	    width: 340px;
	  }
	}

	@media only screen and (max-width: 375px;) { 
	  .position_scroll {
	   display: none;
	  }
	}
</style>
<script type="text/javascript">
	$(document).ready(function() {
		$('#contactBtn').click(function() {
			var name = $('#name').val();
			var email = $('#email').val();
			var phone = $('#phone').val();
			var email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			var message = $('#message').val();

			if (name == '' || name == null) {
				$('#err_name').text('Please enter your name');
				return false;
			} else {
				$('#err_name').text('');
			}

			if (email == '' || email == null) {
				$('#err_email').text('Please enter your email id');
				return false;
			} else {
				$('#err_email').text('');
			}
			if (email != "" || email != null) {
				if (!email.match(email_regex)) {
					$('#err_email').text("Please Enter Valid Email");
					return false;
				} else {
					$("#err_email").text("");
				}
			}
			if (phone == '' || phone == null) {
				$('#err_phone').text('Please enter your phone number');
				return false;
			} else {
				$('#err_phone').text('');
			}
			/*if (message == '' || message == null){
				$('#err_message').text('Please enter your message');
				return false;
			} else{
				$('#err_message').text('');
			}*/
			/*console.log(name)*/
			$.ajax({
				type:'POST',
				url: 'https://aavana.in/subcribe',
				dataType:'JSON',
				data: {
					'name' : name , 'email' : email , 'phone' : phone , 'message': message
				},


				success : function(data) {
					console.log(data);
					if(data.status){
						$('#thanks_model').css('display' ,'block');
						 	$('#name').val(null);
						 	$('#name').val(null);
							$('#email').val(null);
							$('#phone').val(null);
							$('#message').val(null);
					}
					$('#name').val(),
					$('#email').val(),
					$('#phone').val(),
					$('#message').val()
				}

			});
		});

  	$("#name").blur(function(){

  		var name = $('#name').val();
   		if (name == '' || name == null) {
			$('#err_name').text('Please enter your name');
		} else {
			$('#err_name').text(' ');
			return false;
		}
  	});

 	$("#email").blur(function(){

 		var email = $('#email').val();
   		if (email == '' || email == null) {
			$('#err_email').text('Please enter your email');
				return false;
			} else {
				$('#err_email').text(' ');
				return false;
			}
  	});

 	$("#phone").blur(function(){
 		var phone = $('#phone').val();
   		if (phone == '' || phone == null) {
			$('#err_phone').text('Please enter your phone');
				return false;
			} else {
				$('#err_phone').text(' ');
				return false;
			}
  	});

  	// $("#message").blur(function(){

  	// 	var message = $('#message').val();
   // 		if (message == '' || message == null) {
			// $('#err_message').text('Please enter your message');
			// 	return false;
			// } else {
			// 	$('#err_message').text(' ');
			// 	return false;
			// }
  	// });

  $("#email").keyup(function(){
     var email = $("#email").val();
     var filter =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
     if (!filter.test(email)) {
       //alert('Please provide a valid email address');
       $("#err_email").text(email+" is not a valid email");
       email.focus;
       return false;
    } else {
        $("#err_email").text("");
    }
 });
}); 
</script>


<div id="thanks_model" class="body_modal">

 <!-- Modal content -->
 <div class="modal-content">
   <span class="body_close">&times;</span>
     <div class="width_body">
       <h1 style="font-size: 25px!important;   line-height: 50px;">Thank you for getting in touch!</h1>
       <p><i class="fa fa-check" aria-hidden="true"></i></p>
       <p> We appreciate that you took the time to write to us. We will get back to you as soon as possible. Have a great day ahead!</p>
       
     </div>
 </div>

</div>

<script type="text/javascript">
// Get the modal

$('span.body_close').click(function(){
	$('#thanks_model').css('display', 'none');
})
</script>
