<div class="card">
	<div class="card-header card-primary">
		<h3 class="card-title">{{ $subtitle ?? '' }}列表</h3>
	</div>

    <form id="delete-form" action="#" method="post">
        @method('delete')
        @csrf
		<div class="card-body">
			<table id="itemsTable" class="table table-bordered table-striped datatable">
				<thead>
					<tr>
						<th scope="col">
                            <div class="form-check">
                                <input type="checkbox" id="allItems" name="allItems" value="all">
                            </div>
                        </th>
						<th scope="col">#</th>
						@foreach (array_column($components, 'field') as $field)
							@if (!isset($components[$loop->index]['list']) || (true === $components[$loop->index]['list']))
								<th scope="col">{{ trans($model . '.' . $field) }}</th>
							@endif
						@endforeach
						<th scope="col">操作</th>
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
							<td>{{ $item->id }}</td>
							@foreach (array_column($components, 'field') as $field)
								@if (!isset($components[$loop->index]['list']) || (true === $components[$loop->index]['list']))
									<td>{{ $item->{$field} }}</td>
								@endif
							@endforeach
	                        <td>
	                            <a href="{{ route($model . '.edit', $item->id) }}" class="btn btn-info btn-flat btn-sm" title="编辑">
	                                <i class="icon fa fa-edit"></i> 编辑
	                            </a>
	                        </td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="card-footer">
	        <button type="submit" class="btn btn-danger" onclick="return window.confirm('请问确定要删除这些{{ $subtitle }}吗？')">
	            <i class="icon fa fa-trash"></i> 删除所选
	        </button>
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