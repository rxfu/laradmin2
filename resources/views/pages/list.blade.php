@extends('layouts.app')

@section('content')
    @empty (config('components.' . $model . '.grid'))
        @include('partials.list', ['components' => config('components.' . $model)])
    @else
        @include('partials.grid', ['components' => config('components.' . $model)])
    @endempty
@stop

@push('styles')
<!-- Datatables -->
<link href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<!-- Datatable -->
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
$(function () {
    $('.datatable').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
        'language': {
            'url': "{{ asset('vendor/datatables/lang/Chinese.json') }}"
        },
        "columnDefs": [{
        	"orderable": false,
        	"targets": 0
        }],
        "order": []
    });
});
</script>
@endpush
