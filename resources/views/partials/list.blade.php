<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">{{ $subtitle ?? '' }}列表</h3>
	</div>

    <form id="delete-form" action="#" method="post">
        @method('delete')
        @csrf
		<div class="card-body">
			<table id="itemsTable" class="table table-bordered table-striped datatable">
				<thead>
					<tr>
						<th scope="col" class="all">
                            <div class="form-check">
                                <input type="checkbox" id="allItems" name="allItems" value="all">
                            </div>
                        </th>
						@foreach ($components as $component)
							@if (!empty($component['list']))
								<th scope="col" class="{{ isset($component['responsive']) ? $component['responsive'] : 'desktop' }}">{{ __($model . '.' . $component['field']) }}</th>
							@endif
						@endforeach
						<th scope="col" class="all">操作</th>
						<th scope="col" class="all"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($items as $item)
						<tr>
							<td>
                                <div class="form-check">
                                    <input type="checkbox" name="items[]" value="{{ $item->id }}">
                                </div>
                            </td>
							@foreach ($components as $component)
								@if (!empty($component['list']))
									<td>
										@if (!empty($component['presenter']))
											{{ $item->present()->{Illuminate\Support\Str::camel($component['field'])} }}
										@else
											{{ $item->{$component['field']} }}
										@endif
									</td>
								@endif
							@endforeach
	                        <td>
	                            <a href="{{ route($model . '.index', ['edit', $item->id]) }}" class="btn btn-info btn-flat btn-sm" title="编辑">
	                                <i class="icon fa fa-edit"></i> 编辑
	                            </a>
	                        </td>
	                        <td></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="card-footer">
			<div class="row">
				<div class="col">
			        <button type="submit" class="btn btn-danger" onclick="return window.confirm('请问确定要删除这些{{ $subtitle }}吗？')">
			            <i class="icon fa fa-trash"></i> 删除所选
			        </button>
			    </div>
			    <div class="col text-right">
			    	<a href="{{ route($model . '.index', 'create') }}" class="btn btn-success">
			    		<i class="icon fa fa-plus"></i> 创建{{ $subtitle ?: '' }}
			    	</a>
			    </div>
			</div>
		</div>
	</form>
</div>

@push('scripts')
<script>
$(function() {
    $('#allItems').change(function () {
        $(':checkbox[name="items[]"]').prop('checked', $(this).is(':checked') ? true : false);
    });
})
</script>
@endpush