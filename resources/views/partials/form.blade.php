<div class="card
	@if ('create' === $action)
		card-success
	@elseif ('edit' === $action)
		card-info
	@endif
">
	<div class="card-header">
		<h3 class="card-title">
			@if ('create' === $action)
				创建{{ $modname ?? '' }}
			@elseif ('edit' === $action)
				编辑{{ $modname ?? '' }}{{ $id }}
			@endif
		</h3>
	</div>

    <form role="form" id="{{ $action }}-form" name="{{ $action }}-form" method="post" action="
		@if ('create' === $action)
			{{ route($model . '.store') }}
		@elseif ('edit' === $action)
			{{ route($model . '.update', $id) }}
		@endif">
        @csrf
		<div class="card-body">
			@foreach ($components as $component)
				@if (!empty($component[$action]))
	                <div class="form-group row">
	                    <label for="{{ $component['field'] }}" class="col-sm-3 col-form-label">{{ __($model . '.' . $component['field']) }}</label>
	                    <div class="col-md-9">
							@if ('text' === $component['type'])
		                    	<input type="text" name="{{ $component['field'] }}" id="{{ $component['field'] }}" class="form-control{{ $errors->has($component['field']) ? ' is_invalid' : '' }}" placeholder="{{ __($model . '.' . $component['field']) }}" value="{{ old($component['field']) }}"{{ !empty($component['required']) ? ' required' : '' }}>
				            @elseif ('password' === $component['type'])
		                    	<input type="password" name="{{ $component['field'] }}" id="{{ $component['field'] }}" class="form-control{{ $errors->has($component['field']) ? ' is_invalid' : '' }}" placeholder="{{ __($model . '.' . $component['field']) }}"{{ !empty($component['required']) ? ' required' : '' }}>
				            @elseif ('textarea' === $component['type'])
				            	<textarea name="{{ $component['field'] }}" id="{{ $component['field'] }}" rows="5" class="form-control{{ $errors->has($component['field']) ? ' is_invalid' : '' }}"{{ !empty($component['required']) ? ' required' : '' }}>{{ old($component['field']) }}</textarea>
				            @elseif ('radio' === $component['type'])
				            	@foreach (explode('|', $component['values']) as $item)
				            		@php
				            			$value = explode(':', $item)
				            		@endphp
			                    	<div class="form-check form-check-inline">
			                    		<input type="radio" name="{{ $component['field'] }}" id="{{ $component['field']. $loop->index }}" class="form-check-input{{ $errors->has($component['field']) ? ' is_invalid' : '' }}" value="{{ $value[0] }}"{{ !empty($component['required']) ? ' required' : '' }}{{ isset($component['default']) && ($value[0] == $component['default']) ? ' checked' : '' }}>
			                    		<label class="form-check-label" for="{{ $component['field'] . $loop->index }}">{{ $value[1] }}</label>
			                    	</div>
				            	@endforeach
				            @elseif ('checkbox' === $component['type'])
				            	@foreach (explode('|', $component['values']) as $item)
				            		@php
				            			$value = explode(':', $item)
				            		@endphp
			                    	<div class="form-check form-check-inline">
			                    		<input type="checkbox" name="{{ $component['field'] }}" id="{{ $component['field']. $loop->index }}" class="form-check-input{{ $errors->has($component['field']) ? ' is_invalid' : '' }}" value="{{ $value[0] }}"{{ !empty($component['required']) ? ' required' : '' }}{{ isset($component['default']) && ($value[0] == $component['default']) ? ' checked' : '' }}>
			                    		<label class="form-check-label" for="{{ $component['field'] . $loop->index }}">{{ $value[1] }}</label>
			                    	</div>
				            	@endforeach
			                @endif
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
			@endforeach
		</div>

		<div class="card-footer">
	        <button type="submit" class="btn btn-success">
	            <i class="icon fa fa-save"></i> 创建
	        </button>
		</div>
	</form>
</div>