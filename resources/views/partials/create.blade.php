<div class="card">
	<div class="card-header card-success">
		<h3 class="card-title">创建{{ $subtitle ?? '' }}</h3>
	</div>

    <form role="form" id="create-form" name="create-form" method="post" action="#" aria-label="创建">
        @csrf
		<div class="card-body">
			@foreach (config('module.' . $items->name) as $item)
				@if ('text' === $item->type)
	                <div class="form-group row{{ $errors->has($item->field) ? ' is_invalid' : '' }}">
	                    <label for="{{ $item->field }}" class="col-sm-2 col-form-label">{{ $item->name }}</label>
	                    <div class="col-md-10">
	                    	<input type="text" name="{{ $item->field }}" id="{{ $item->field }}" class="form-control" placeholder="{{ $item->name }}" value="{{ old($item->field) }}">
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
	        <button type="submit" class="btn btn-success">
	            <i class="icon fa fa-plus"></i> 创建
	        </button>
		</div>
	</form>
</div>