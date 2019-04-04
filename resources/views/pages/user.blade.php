@component('pages.index')
    <td>
        <a href="{{ route($model . '.reset', $item->id) }}" class="btn btn-info btn-flat btn-sm" title="重置密码">
            <i class="icon fa fa-edit"></i> 重置密码
        </a>
    </td>
@endcomponent