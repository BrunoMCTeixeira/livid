@extends('layouts.front')

@section('content')
	@component('components.canvas')
		@slot('width', 'col-9')
		
			<h1 class="mb-5">Pedidos de amizade</h1>
			<meta name="csrf-token" content="{{ csrf_token() }}">
			
			@foreach($friendships as $friendship)
				<div class="media">
					<img class="d-flex mr-3" src="http://via.placeholder.com/100x100" alt="Generic placeholder image" style="width: 100px">
					<div class="media-body">
					
						<div class="row d-flex">
							<div class="col">
								<h5 class="mt-0">{{ $friendship->sender->present()->fullName }}</h5>
								<p class="small">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>
							</div>
							
							<div class="col-5 text-right align-middle align-self-center">
							
								<form action="{{ route('friends.reject', ['user' => $friendship->sender->id] )}}" method="post" class="destroy_friend_request pull-right ml-3">
									<button type="submit" class="btn btn-secondary btn-sm">
										<i class="fa fa-times" aria-hidden="true"></i>
										Eliminar pedido
									</button>
								</form>
								
								<form action="{{ route('friends.accept') }}" method="post" class="accept_friend_request pull-right">
									<input type="hidden" name="user" value="{{ $friendship->sender->id }}">
									<button type="submit" class="btn btn-primary btn-sm">
										<i class="fa fa-check" aria-hidden="true"></i>
										Confirmar
									</button>
								</form>
								
							</div>
						</div>
						
					</div>
				</div>
				
				@if($friendship != $friendships->last())
					<hr class="my-4">
				@endif
			@endforeach
		
	@endcomponent
@endsection


@section('scripts')
	<script src="/js/destroy-friendship-request.js"></script>
	<script src="/js/accept-friendship-request.js"></script>
@endsection