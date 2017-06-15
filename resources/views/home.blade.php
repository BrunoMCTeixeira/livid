@extends('layouts.front')

@section('content')
	
	@component('components.canvas')
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda exercitationem eveniet enim sint doloremque cumque quisquam molestiae nam iusto, blanditiis placeat dolores saepe tenetur repudiandae possimus sequi. Ab esse, recusandae.</p>
	@endcomponent
	
	@component('components.canvas')
		<form class="general">
		  <div class="form-group">
		  	<div class="input-group">
				<input type="text" class="form-control help" id="formGroupExampleInput" placeholder="Example input">
		  		<div class="input-group-addon">
		  			<i class="fa fa-fw fa-dollar"></i>
		  		</div>
		  		<div class="input-group-addon">
		  			
		  			<i class="fa fa-fw fa-question-circle"></i>
		  		</div>
		  	</div>
		  </div>
		  <div class="form-group">
			<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
		  </div>
		</form>
	@endcomponent
	
	
@endsection
