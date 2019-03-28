@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8">
        @empty (config('components.' . $model . '.grid'))
            @include('partials.list', ['components' => config('components.' . $model)])
        @else
            @include('partials.grid', ['components' => config('components.' . $model)])
        @endempty
    </div>
    
    <div class="col-sm-4">
        @include('partials.create', ['components' => config('components.' . $model)])
    </div>
</div>
@stop

@push('styles')
<!-- Datatables -->
<link href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/datatables/responsive/css/responsive.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<!-- Datatable -->
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/responsive/js/dataTables.bootstrap4.min.js') }}"></script>
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
        'responsive': {
            'details': {
                'type': "column",
                'target': -1
            }
        },
        'columnDefs': [{
        	'orderable': false,
        	'targets': 0
        }, {
            'className': 'control',
            'orderable': false,
            'targets': -1
        }],
        "order": []
    });
});
</script>
@endpush
