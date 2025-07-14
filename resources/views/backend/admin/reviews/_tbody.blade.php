@if(count($items) > 0)
    @foreach($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->designation }}</td>
            <td>{{ $item->content }}</td>
            <td>{{ ucfirst($item->language) }}</td>
            <td>{!! $item->status !!}</td>
            <td>{!! $item->action !!}</td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="6" style="text-align: center;">No data available in the table</td>
    </tr>
@endif