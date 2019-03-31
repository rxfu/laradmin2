<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">编辑{{ $subtitle ?? '' }}</h3>
	</div>

    <form role="form" id="edit-form" name="edit-form" method="post" action="#" aria-label="编辑{{ $subtitle ?? '' }}"{{ $subtitle ?? '' }}>
    	@method('put')
        @csrf
		<div class="card-body">
			@foreach ($components as $component)
				@if (!empty($component['edit']))
					@if ('text' === $component['type'])
		                <div class="form-group row">
		                    <label for="{{ $component['field'] }}" class="col-sm-3 col-form-label">{{ __($model . '.' . $component['field']) }}</label>
		                    <div class="col-md-9">
		                    	<input type="text" name="{{ $component['field'] }}" id="{{ $component['field'] }}" class="form-control{{ $errors->has($component['field']) ? ' is_invalid' : '' }}" placeholder="{{ __($model . '.' . $component['field']) }}" value="{{ old($component['field']) }}"{{ !empty($component['required']) ? ' required' : '' }}>
		                    	@if (!empty($component['required']))
		                    		<span class="text-danger">（*必填项）</span>
		                    	@endif
		                        @if ($errors->has($component['field']))
			                        <div class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first($component['field']) }}</strong>
			                        </div>
		                        @endif
		                    </div>
		                </div>
		            @elseif ('password' === $component['type'])
		                <div class="form-group row">
		                    <label for="{{ $component['field'] }}" class="col-sm-3 col-form-label">{{ __($model . '.' . $component['field']) }}</label>
		                    <div class="col-md-9">
		                    	<input type="password" name="{{ $component['field'] }}" id="{{ $component['field'] }}" class="form-control{{ $errors->has($component['field']) ? ' is_invalid' : '' }}" placeholder="{{ __($model . '.' . $component['field']) }}"{{ !empty($component['required']) ? ' required' : '' }}>
		                    	@if (!empty($component['required']))
		                    		<span class="text-danger">（*必填项）</span>
		                    	@endif
		                        @if ($errors->has($component['field']))
			                        <div class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first($component['field']) }}</strong>
			                        </div>
		                        @endif
		                    </div>
		                </div>
		            @elseif ('radio' === $component['type'])
		                <div class="form-group row">
		                    <label for="{{ $component['field'] }}" class="col-sm-3 col-form-label">{{ __($model . '.' . $component['field']) }}</label>
		                    <div class="col-md-9">
		                    	<div class="form-check form-check-inline">
		                    		<input type="radio" name="{{ $component['field'] }}" id="{{ $component['field'] }}1" class="form-check-input{{ $errors->has($component['field']) ? ' is_invalid' : '' }}" value="1" checked{{ !empty($component['required']) ? ' required' : '' }}>
		                    		<label class="form-check-label" for="{{ $component['field'] }}1">是</label>
		                    	</div>
		                    	<div class="form-check form-check-inline">
		                    		<input type="radio" name="{{ $component['field'] }}" id="{{ $component['field'] }}2" class="form-check-input{{ $errors->has($component['field']) ? ' is_invalid' : '' }}" value="0"{{ !empty($component['required']) ? ' required' : '' }}>
		                    		<label class="form-check-label" for="{{ $component['field'] }}2">否</label>
		                    	</div>
		                    	@if (!empty($component['required']))
		                    		<span class="text-danger">（*必填项）</span>
		                    	@endif
		                        @if ($errors->has($component['field']))
			                        <div class="invalid-feedback" role="alert">
			                            <strong>{{ $errors->first($component['field']) }}</strong>
			                        </div>
		                        @endif
		                    </div>
		                </div>
	                @endif
	            @endif
			@endforeach
		</div>

		<div class="card-footer">
	        <button type="submit" class="btn btn-info">
	            <i class="icon fa fa-save"></i> 修改
	        </button>
		</div>
	</form>
</div>