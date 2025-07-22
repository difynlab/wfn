@if(count($items) > 0)
    @foreach($items as $item)
        <tr>
            <td>{{ $item->name_en }}</td>
            <td>{{ $item->address_en }}</td>
            <td>{{ $item->total_area }}</td>
            <td>{{ $item->total_pallets }}</td>
            <td>{!! $item->status !!}</td>
            <td>{!! $item->action !!}</td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="6" style="text-align: center;">No data available in the table</td>
    </tr>
@endif