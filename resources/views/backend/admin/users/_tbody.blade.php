@if(count($items) > 0)
    @foreach($items as $item)
        <tr>
            <td>{{ $item->first_name }} {{ $item->last_name }}</td>
            <td>{{ $item->city ?? '-' }}</td>
            <td>{{ $item->country ?? '-' }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ ucfirst($item->role) }}</td>
            <td>{!! $item->status !!}</td>
            <td>{!! $item->action !!}</td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="7" class="text-center">No data available in the table</td>
    </tr>
@endif
