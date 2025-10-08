@if(count($items) > 0)
    @foreach($items as $item)
        
    @endforeach
@else
    <tr>
        <td colspan="6" style="text-align: center;">No data available in the table</td>
    </tr>
@endif


