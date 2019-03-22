<div class="card">
	<div class="card-header card-info">
		<h3 class="card-title">编辑{{ $subtitle ?? '' }}</h3>
	</div>

    <form role="form" id="edit-form" name="edit-form" method="post" action="#" aria-label="编辑">
    	@method('put')
        @csrf
		<div class="card-body">
			@foreach (config('module.' . $items->name) as $item)
				@if ('text' === $item->type)
	                <div class="form-group row{{ $errors->has($item->field) ? ' is_invalid' : '' }}">
	                    <label for="{{ $item->field }}" class="col-sm-2 col-form-label">{{ $item->name }}</label>
	                    <div class="col-md-10">
	                    	<input type="text" name="{{ $item->field }}" id="{{ $item->field }}" class="form-control" placeholder="{{ $item->name }}" value="{{ $model->{$item->field} }}">
	                        @if ($errors->has($item->field))
		                        <div class="invalid-feedback" role="alert">
		                            <strong>{{ $errors->first($item->field) }}</strong>
		                        </div>
	                        @endif
	                    </div>
	                </div>
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