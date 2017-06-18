

<div class="row justify-content-center">
	@component('components.canvas')
		@slot('width', 'col-6')
		<div class="row">
			<div class="col">
				<a href="/auth/facebook" class="btn btn-primary btn-lg btn-block">
					<i class="fa fa-fw fa-lg fa-facebook"></i>
					<span>Entrar com Facebook</span>
				</a>

				<a href="/auth/google" class="btn btn-secondary btn-lg btn-block">
					<i class="fa fa-fw fa-lg fa-google-plus"></i>
					<span>Entrar com Google+</span>
				</a>
			</div>
		</div>

		<hr class="my-3">

		<div class="row">
			<div class="col">
				
				<form action="" data-toggle="validator" role="form">
					@component('components.forms.input')
						@slot('addon', 'fa-envelope')
						@slot('inputName', 'email')
						@slot('inputType', 'email')
					@endcomponent
					
					@component('components.forms.input')
						@slot('addon', 'fa-lock')
						@slot('inputName', 'password')
						@slot('inputType', 'password')
					@endcomponent
					
					<button type="button" class="btn btn-primary btn-lg btn-block btn-info">Entrar</button>
				</form>
				
			</div>
		</div>
	@endcomponent
</div>
