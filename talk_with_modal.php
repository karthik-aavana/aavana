<?php $success = "";
if ($_POST) {
	$success = "Thank You";
	$name = $_POST['name'];
//	$subject = $_POST['subject'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
	$url = $_POST['url'];
	require_once ('class.phpmailer.php');
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
    $address = "chetna.b@aavana.in";
//	$address1 = "manjunath.k@aavana.in";
 	$address1 = "lead@aavana.in";
 	$address2 = "harsha.rajaiah@aavana.in";
 	$address3 = "jp@aavana.in";
 	$mail -> AddAddress($address, "aavana");
	/*$mail -> AddAddress($address1, "aavana");
 	$mail -> AddAddress($address2, "aavana");
 	$mail -> AddAddress($address3, "aavana");*/
	$mail -> Subject = 'Talk With Us';
	//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail -> MsgHTML($body);
	
	if (!$mail -> Send()) {
		echo "Mailer Error: " . $mail -> ErrorInfo;
	} else {
	    header("Location: ".$url); 
	}
}
?>
<style>
	.pt-4 {
		padding-top: 4px !important;
	}
	.pb-4 {
		padding-bottom: 4px !important;
	}
	.pt-8 {
		padding-top: 8px !important;
	}
	.black {
		color: #000 !important;
	}
	.fs-22 {
		font-size: 22px !important;
	}
	.red {
		color: red;
	}
	.talk-submit {
		padding: 5px 20px;
	}
	.talk-cancel {
		padding: 2px 15px;
	}
</style>
<div id="talk_with_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header pt-4 pb-4">
				<button type="button" class="close pt-8 black" data-dismiss="modal">
					<i class="fa fa-close"></i>
				</button>
				<h4 class="modal-title fs-22"><span id="talk_title">Get a call back from our executives.</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<h4 class="fs-22 black">Welcome to Aavana family</h4>
						<img src="assets/images/modal_image.jpg" class="img-responsive" alt="private limited company registration in bangalore">
					</div>
					<div class="col-md-6">
				
					    <form name="contact" method="post" action="https://aavana.in/talk_with_modal" class="contact-form">
							<!--<input type="hidden" name="talk_position" id="talk_position" value="">-->
							<!--<input type="hidden" name="talk_type" id="talk_type" value="">-->
							<div class="form-group">
								<input class="form-control" placeholder="Please enter your name." name="name" id="name" required type="text">
								<span id="err_talk_name" class="red"></span>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Please enter your phone." name="phone" id="phone" required type="text" >
								<span id="err_talk_phone" class="red"></span>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Please enter your email." name="email" id="email"  type="email" >
								<span id="err_talk_email" class="red"></span>
							</div>
							<div class="form-group">
								<textarea class="form-control" name="message" id="message" placeholder="Please feel free to say.." rows="3"></textarea>
								<input name="url" id="url" value="<?php echo 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>" type="hidden">
							</div>
							<!--<input class="form-control" id="subject" placeholder="Subject" name="subject" type="hidden">-->
							<div class="form-group" id="submit_button_talk">
								<button type="submit" name="talk_submit" id="talk_submit" class="btn btn-sm btn-primary talk-submit" onclick="submitTalkWithValidate()">
									<span id="talk_submit_text">GET A CALL</span>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer style-none">
				<button type="button" class="btn btn-default talk-cancel" data-dismiss="modal" id="talk_cancel" >
					Close
				</button>
			</div>
		</div>
	</div>
</div>
<script>
/*	$(document).ready(function() {
		$("#talk_phone").on("blur keyup", function(event) {
			var talk_phone = $('#talk_phone').val();
			console.log(talk_phone);
			if (talk_phone.length > 1) {
				if (talk_phone == null || talk_phone == "") {
					$('#err_talk_phone').html('Please enter your phone number.').fadeIn('slow').delay(3000).hide(1);
				} else {
					$("#err_talk_phone").text("");
				}
				if (!talk_phone.match(phone_num_regex)) {
					$('#err_talk_phone').html('Please enter your phone number.').fadeIn('slow').delay(3000).hide(1);
				} else {
					$("#err_talk_phone").text("");
				}
			}
		});
	});*/ 
	
	
</script>

<script type="text/javascript">
    function submitTalkWithValidate() {
        var name = $('#name').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var message = $('#message').val();
        var location = window.location.href;
        var position = $('#talk_position').val();
        var type = $('#talk_type').val();
        var string = "Please enter valid phone number.";
        var talk_phone = $('#phone').val();
        if (name.trim() == '') {
            var string = "Please enter your name.";
            $('#err_talk_name').html(string).fadeIn('slow').delay(3000).hide(1);
            $('#talk_name').focus();
            return !1
        }
        if (talk_phone == null || talk_phone == "") {
            $('#err_talk_phone').html('Please enter your phone number.').fadeIn('slow').delay(3000).hide(1);
            $('#talk_phone').focus();
            return !1
        } else {
            $("#err_talk_phone").text("")
        }
        if (!talk_phone.match(phone_num_regex)) {
            $('#err_talk_phone').html(string).fadeIn('slow').delay(3000).hide(1);
            $('#talk_phone').focus();
            return !1
        } else {
            $("#err_talk_phone").text("")
        }
    }
	$(document).ready(function() {
		$('#talk_phone').click(function() {
			var name = $('#name').val();
			var email = $('#email').val();
			var phone = $('#phone').val();
			var email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

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
		});
	}); 
</script>
