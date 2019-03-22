<div class="card">
	<div class="card-header card-primary">
		<h3 class="card-title">{{ $subtitle ?? '' }}列表</h3>
	</div>

    <form id="delete-form" action="#" method="post">
        @method('delete')
        @csrf
		<div class="card-body">
			<table id="itemtable" class="table table-bordered table-striped datatable">
				<thead>
					<tr>
						@foreach (array_column(config('module.' . $items->name), 'name') as $colname)
							<th scope="col">{{ $colname }}</th>
							<th scope="col">操作</th>
						@endforeach
					</tr>
				</thead>
				<tbody>
					@foreach ($items as $item)
						<tr>
							@foreach (array_column(config('module.' . $items->name), 'field') as $field)
								<td>{{ $item->{$field} }}</td>
							@endforeach
	                        <td>
	                            <a href="{{ route($items->name . '.edit', $item->id) }}" class="btn btn-info btn-flat btn-sm"
	                                title="编辑">
	                                <i class="icon fa fa-edit"></i> 编辑
	                            </a>
	                        </td>
						</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						@foreach (array_column(config('module.' . $model->name), 'field') as $colname)
							<th>{{ $colname }}</th>
						@endforeach
					</tr>
				</tfoot>
			</table>
		</div>

		<div class="card-footer">
	        <button type="submit" class="btn btn-danger" onclick="return window.confirm('请问确定要删除这些记录吗？')">
	            <i class="icon fa fa-trash"></i> 删除
	        </button>
		</div>
	</form>
</div>