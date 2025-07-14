@if(count($items) > 0)
    @foreach($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->category }}</td>
            <td>{{ $item->subject }}</td>
            <td>{{ $item->message }}</td>
            <td>{!! $item->action !!}</td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="7" style="text-align: center;">No data available in the table</td>
    </tr>
@endif