@foreach ($waters as $water)

    <tr>
        <td>{{ $water->unit->name }}</td>
        <td> {{ $water->unit->property->name }}</td>
        <td>{{ $water->amount }}</td>
        <td>{{ $water->no_months }}</td>
        <td>{{ $water->read_date }}</td>
        <td>{{ $water->new_reading }}</td>

        <td class="row">
            @can('update', $water)
                <a href="{{ route('water.edit', $water->id) }}" style="margin-right: 2%;" class=" btn btn btn-info">Edit</a>

            @endcan
            @can('delete', $water)
                <form action="{{ route('water.destroy', $water->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this record?');"
                        class="btn btn-danger">Delete</button>
                </form>
            @endcan



        </td>
    </tr>
@endforeach
