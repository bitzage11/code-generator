@if(session('success'))
	<div style="padding: 5px;">
		<div class="callout callout-success">
	    	<p>{{session('success')}}</p>
	  	</div>
	</div>
@endif
@if(session('error'))
	<div style="padding: 5px;">
		<div class="alert alert-danger alert-dismissible">
	    	<p>{{session('error')}}</p>
	  	</div>
	</div>
@endif