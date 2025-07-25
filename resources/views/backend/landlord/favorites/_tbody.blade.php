@if(count($items) > 0)
    @foreach($items as $item)
        <tr>
            <td>{!! $item->warehouse !!}</td>
            <td>{!! $item->action !!}</td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="2" style="text-align: center;">No data available in the table</td>
    </tr>
@endif