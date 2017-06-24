<div class="form-group has-feedback">
	@if(isset($label))
		<label for="{{ $inputName }}">{{ $label }}</label>
	@endif
	<div class="input-group">
		<select class="form-control form-control-lg" id="{{ $inputName}}" placeholder="{{ $inputPlaceholder or $inputName}}" required>
		  {{ $slot }}
		</select>
	</div>
	
	<div class="help-block with-errors form-control-feedback">
		@if($errors->has($inputName))
			<ul class="list-unstyled">
				<li>{{ $errors->first($fieldName) }}</li>
			</ul>
		@endif
	</div>
</div>