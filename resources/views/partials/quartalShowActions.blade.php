@foreach($quartalEvidence->quartals as $item)
        <tr>
            <th>{{ $item->id }}</th>
            <th>{{ $item->quartal }}</th>
            <th>{{ $item->date }}</th>
            <th>{{ $item->status }}</th>
        </tr>
@endforeach
