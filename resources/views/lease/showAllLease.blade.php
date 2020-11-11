@foreach ($leases as $lease)


    <tr>
        <td>{{ $lease->unit->property->name }}</td>
        <td>{{ $lease->unit->name }}</td>
        <td>{{ $lease->user->name }}</td>
        <td>

            @if ($lease->status == 1)
                <span class="badge badge-pill badge-info">
                    Active </span></a>
            @else
                <span class="badge badge-pill badge-danger">
                    Inactive </span></a>

            @endif

        </td>
        <td>
            <a href="{{ route('lease.show', $lease->id) }}" style="margin-left: 4%;margin-right:4%;"
                class=" btn btn btn-info">Read</a>

        </td>
        <td class="row">
            @can('update', $lease)
                <a href="{{ route('lease.edit', $lease->id) }}" style="margin-left: 4%;margin-right:4%;"
                    class=" btn btn btn-success">Edit</a>
            @endcan
            @can('delete', $lease)
                <form action="{{ route('lease.destroy', $lease->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this record?');"
                        class="btn btn-danger">Delete</button>
                </form>
            @endcan



        </td>
    </tr>



@endforeach
