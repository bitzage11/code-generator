@if($errors->has('error'))
	<div style="padding: 5px;">
		<div class="callout callout-success">
	    	<p>{{$errors->first('error')}}</p>
	  	</div>
	</div>
@endif