@php
    $headers = array_keys(get_object_vars($items[0]))
@endphp
<table border="1">
    <caption> {{ $title }} </caption>
    <tr>
        @foreach ($headers as $header)
            <th> {{ $header }} </th>
        @endforeach
    </tr>
        @foreach ($items as $row)
            <tr>
                @foreach ($headers as $header)
                    <td> {{ $row->{$header} ?? null }} </td>
                @endforeach
            </tr>
        @endforeach
</table>
