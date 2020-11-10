<tr>
    <td>{{ $rent->unit->name }}</td>
    <td>{{ $rent->unit->property->name }}</td>
    <td>{{ $rent->amount }}</td>
    <td>{{ $rent->paid_date }}</td>
    <td>{{ $rent->expiry_date }}</td>
    <td>{{ $rent->user->name }}</td>
    <td class="row">

        @can('update', $rent)
            <a href="{{ route('rent.edit', $rent->id) }}" style="margin-left: 4%;margin-right:4%; margin-bottom:4%; "
                class=" btn btn-info">Edit</a>


        @endcan
        @can('delete', $rent)
            <form action="{{ route('rent.destroy', $rent->id) }}" enctype="multipart/form-data" method="post">

                @csrf
                @method('DELETE')

                <button type="submit" class=" btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>

            </form>
        @endcan





    </td>
</tr>
