@if(count($items) > 0)
    @foreach($items as $item)
        <tr>
            <td>{!! $item->thumbnail !!}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->articleCategory->name }}</td>
            <td>{!! $item->status !!}</td>
            <td>{!! $item->action !!}</td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="5" style="text-align: center;">No data available in the table</td>
    </tr>
@endif