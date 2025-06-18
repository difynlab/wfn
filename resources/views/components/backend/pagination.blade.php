@props(['pagination'])

<form class="custom-pagination">
    <span>Show</span>
        <select>
            <option value="10" {{ $pagination == 10 ? "selected" : "" }}>10</option>
            <option value="25" {{ $pagination == 25 ? "selected" : "" }}>25</option>
            <option value="50" {{ $pagination == 50 ? "selected" : "" }}>50</option>
            <option value="100" {{ $pagination == 100 ? "selected" : "" }}>100</option>
        </select>
    <span>entries</span>
</form>