<div class="card">
	<div class="card-header card-primary">
		<h3 class="card-title">{{ $subtitle ?? '' }}列表</h3>
	</div>

	<div class="card-body">
		<table id="itemsTable" class="table table-bordered table-striped datatable">
			<thead>
				<tr>
					<th scope="col">#</th>
					@foreach (array_column($components, 'field') as $field)
						@if (!isset($components[$loop->index]['list']) || (true === $components[$loop->index]['list']))
							<th scope="col">{{ trans($model . '.' . $field) }}</th>
						@endif
					@endforeach
				</tr>
			</thead>
			<tbody>
				@foreach ($items as $item)
					<tr>
						<td>{{ $item->id }}</td>
						@foreach (array_column($components, 'field') as $field)
							@if (!isset($components[$loop->index]['list']) || (true === $components[$loop->index]['list']))
								<td>{{ $item->{$field} }}</td>
							@endif
						@endforeach
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
