@if(count($items) > 0)
    @foreach($items as $item)
        <tr>
            <td>{!! $item->warehouse !!}</td>
            <td>{{ $item->no_of_pallets }}</td>
            <td>{{ $item->total_rent }}</td>
            <td>{{ $item->tenancy_date }}</td>
            <td>{{ $item->renewal_date }}</td>
            <td>{!! $item->status !!}</td>
            <td>{!! $item->action !!}</td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="7" style="text-align: center;">No data available in the table</td>
    </tr>
@endif