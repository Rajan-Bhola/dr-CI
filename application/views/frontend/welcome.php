<div class="container">
<div class="main">
<?php if( $feedback = $this->session->flashdata('feedback')): 
		$feedback_class = $this->session->flashdata('feedback_class');
	?>
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <div class="alert alert-dismissible <?= $feedback_class ?>">
          <?= $feedback ?>
        </div>
      </div>
    </div>
<?php endif; ?>
		<div class="jumbotron" style="text-align: center; background: none;">
			<h1>Welcome!</h1>
		<?php	if(empty($this->session->userdata('user_id')))
			{ ?>
			<div style="margin-top: 50px;">
					<a href="<?php echo base_url('frontend/login'); ?>" class="btn btn-primary">Log in</a> &nbsp;
					<a href="<?php echo base_url('frontend/register'); ?>" class="btn btn-primary">Sign up</a>
			</div>
	<?php		} ?>
			<div style="min-height: 100px"></div>
		</div>
	</div>
</div>