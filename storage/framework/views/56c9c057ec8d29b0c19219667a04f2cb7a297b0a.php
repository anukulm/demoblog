<?php if(session('success')): ?>
    <div class="row">
		<div class="col-lg-12 ">
			<div class="alert alert-success p-10">
				<button class="close close-sm" type="button" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
				<?php echo session('success'); ?>

			</div>
		</div>
	</div> 

<?php elseif(session('message')): ?>
	<div class="row">
		<div class="col-lg-12 ">
			<div class="alert alert-success p-10">
				<button class="close close-sm" type="button" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
				<?php echo session('message'); ?>

			</div>
		</div>
	</div> 

<?php elseif(session('errormessage')): ?>
	<div class="row">
		<div class="col-lg-12 ">
			<div class="alert alert-danger p-10">
				
				<?php echo session('errormessage'); ?>

			</div>
		</div>
	</div>
<?php endif; ?><?php /**PATH /opt/lampp/htdocs/demoblog/demo/resources/views/admin/alert_message.blade.php ENDPATH**/ ?>