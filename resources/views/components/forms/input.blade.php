<div class="form-group has-feedback">
	@if(isset($label))
		<label for="{{ $inputName }}">{{ $label }}</label>
	@endif
	<div class="input-group">
		<input type="{{ $inputType or 'text' }}" class="form-control form-control-lg" id="{{ $inputName}}" name="{{ $inputName }}" placeholder="{{ $inputPlaceholder or $inputName}}" value="{{ $inputValue or old($inputName) }}"  {{ isset($inputState) ? 'disabled' : null }} required>
		
		@if(isset($addon))
			<div class="input-group-addon">
				<i class="fa fw-fw fa-lg {{ $addon }}"></i>
			</div>
		@endif
	</div>
	
	<div class="help-block with-errors form-control-feedback">
		@if($errors->has($inputName))
			<ul class="list-unstyled">
				<li>{{ $errors->first($fieldName) }}</li>
			</ul>
		@endif
	</div>
	
</div>