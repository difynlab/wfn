@if(count($items) > 0)
    @foreach($items as $item)
        <tr>
            <td>{!! $item->tenant !!}</td>
            <td>{!! $item->warehouse !!}</td>
            <td>{{ $item->reason }}</td>
            <td>{!! $item->status !!}</td>
            <td>{!! $item->action !!}</td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="5" style="text-align: center;">No data available in the table</td>
    </tr>
@endif