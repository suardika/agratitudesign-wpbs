<?php
/*
Template Name: Page Contact
*/
$error = '';
$success = '';
if( isset($_POST['action']) && $_POST['action']=='contact-form' )
{
	$name = $_POST['contact-name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	if( $name == "" || $email == "" || $subject == "" || $message == "" ) {
		$error = 'Fields are required.';
	} else if( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
		$error = 'Invalid email address.';
	} else {
		/* get admin email from database */
		$to = get_option('admin_email');
		$headers = 'From: "'. $name .'" <' . $email . '>';
		$mail = wp_mail( $to, $subject, $message, $headers);
		if( $mail ) {
			$success = 'Message successfully sent.';
		}
	}
}
get_header(); ?>
<section id="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; endif; ?>
				<hr>
				<div class="message-box">
					<div class="error-box"><?php if( $error != "" ) { echo '<p>'.$error.'</p>'; } ?></div>
					<div class="success-box"><?php if( $success != "" ) { echo '<p>'.$success.'</p>'; } ?></div>
				</div>
				<form action="<?php the_permalink(); ?>" method="post" id="form-contact" class="my-3">
					<div class="form-group">
						<input type="text" name="name" class="font-alt form-control required" id="name" placeholder="Your Name" value="<?php echo (isset( $_POST['contact-name'] ) ? $_POST['contact-name'] : '') ?>">
					</div>
					<!-- //.form-group -->
					<div class="form-group">
						<input type="email" name="email" class="font-alt form-control required email" id="email" placeholder="Your Email" value="<?php echo (isset( $_POST['email'] ) ? $_POST['email'] : '') ?>">
					</div>
					<div class="form-group">
						<input type="text" name="subject" class="font-alt form-control required" id="subject" placeholder="Subject" value="<?php echo (isset( $_POST['subject'] ) ? $_POST['subject'] : '') ?>">
					</div>
					<!-- //.form-group -->
					<div class="form-group">
						<textarea name="message" class="font-alt form-control required" id="message" rows="6" placeholder="Message" ><?php echo (isset( $_POST['message'] ) ? $_POST['message'] : '') ?></textarea>
					</div>
					<!-- //.form-group -->
					<span class="d-block text-danger letter-spacing-1 text-small text-uppercase">*Please complete all fields correctly</span>
					<button type="submit" class="btn btn-primary mt-4 text-uppercase" value="Send" id="btn-form-contact">Send Message</button>
					<input type="hidden" name="action" value="contact-form">
				</form>
			</div>
			<?php get_sidebar( ); ?>
		</div>
	</div>
</section>
<?php
get_footer();
?>