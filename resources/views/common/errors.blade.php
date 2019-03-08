@if (count($errors) > 0)

	<div class="alert alert-danger">
	    <button class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span></button>
	    <h3 class="text-danger">
	    	@lang('messages.error')
	    </h3>
	    <ul>
	    	@foreach ($errors->all() as $error)
    			<li>{{ $error }}</li>
    		@endforeach
	    </ul>
	</div>

@endif
