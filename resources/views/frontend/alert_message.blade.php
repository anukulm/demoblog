@if(session('success'))
    <div class="row">
		<div class="col-lg-12 ">
			<div class="alert alert-success p-10">
				<button class="close close-sm" type="button" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
				{!! session('success') !!}
			</div>
		</div>
	</div> 

@elseif (session('message'))
	<div class="row">
		<div class="col-lg-12 ">
			<div class="alert alert-success p-10">
				<button class="close close-sm" type="button" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
				{!! session('message') !!}
			</div>
		</div>
	</div> 
@elseif (session('errormessage'))
	<div class="row">
		<div class="col-lg-12 ">
			<div class="alert alert-danger p-10">
				<button class="close close-sm" type="button" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
				{!! session('errormessage') !!}
			</div>
		</div>
	</div>
@endif