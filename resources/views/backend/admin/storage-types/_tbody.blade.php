@if(count($items) > 0)
    @foreach($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{!! $item->status !!}</td>
            <td>{!! $item->action !!}</td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="3" style="text-align: center;">No data available in the table</td>
    </tr>
@endif