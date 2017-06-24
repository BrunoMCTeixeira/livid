@extends('layouts.front')

@section('content')

	<div class="row justify-content-center">
		@component('components.canvas')
			@slot('width', 'col-6')
			<div class="row">
				<div class="col">

					<form action="/signup" data-toggle="validator" role="form" method="post">
						{{ csrf_field() }}
						
						<div class="row">
							<div class="col">
								@component('components.forms.input')
									@slot('addon', 'fa-user')
									@slot('inputName', 'name')
									@slot('inputType', 'text')
									@slot('inputValue', session()->get('user_signup.name'))
									@slot('inputPlaceholder', 'Primeiro nome')
								@endcomponent

								@component('components.forms.input')
									@slot('addon', 'fa-user')
									@slot('inputName', 'lastname')
									@slot('inputType', 'text')
									@slot('inputValue', session()->get('user_signup.lastname'))
									@slot('inputPlaceholder', 'Último nome')
								@endcomponent

								@component('components.forms.input')
									@slot('addon', 'fa-envelope')
									@slot('inputName', 'email')
									@slot('inputType', 'email')
									@slot('inputValue', session()->get('user_signup.email'))
								@endcomponent
							</div>
						</div>

						<hr class="my-3">
					
						<div class="row">
							<div class="col">
								<h5>Aniversário</h5>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae mollitia quas recusandae facere a suscipit, iusto eveniet quia, aperia</p>
							</div>
						</div>

						<div class="row">
							<div class="col">
								@component('components.forms.select')
									@slot('inputName', 'password')
								
									@php($day = 31)
									@php($start = 1)
									
									@while($day >= $start)
										<option value="{{ $day }}">{{ $day }}</option>
										@php($day--)
									@endwhile
								@endcomponent
							</div>
							
							<div class="col">
								@component('components.forms.select')
									@slot('inputName', 'password')
								
									<option value="1">Janeiro</option>
									<option value="2">Fevereiro</option>
									<option value="3">Março</option>
									<option value="4">Abril</option>
									<option value="5">Maio</option>
									<option value="6">Junho</option>
									<option value="7">Julho</option>
									<option value="8">Agosto</option>
									<option value="9">Setembro</option>
									<option value="10">Outubro</option>
									<option value="11">Novembro</option>
									<option value="12">Dezembro</option>
								@endcomponent
							</div>
							
							<div class="col">
								@component('components.forms.select')
									@slot('inputName', 'password')
								
									@php($year = 1950)
									@php($yearMax = date('Y') - 18)
									
									@while($yearMax >= $year)
										<option value="{{ $yearMax }}">{{ $yearMax }}</option>
										@php($yearMax--)
									@endwhile
								@endcomponent
							</div>
							
							
						</div>
						

						<button type="submit" class="btn btn-primary btn-lg btn-block btn-info">Entrar</button>
					</form>

				</div>
			</div>
		@endcomponent
	</div>

@endsection