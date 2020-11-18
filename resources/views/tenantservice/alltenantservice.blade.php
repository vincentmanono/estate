@foreach ($requests as $request)
<tr>

    <td>{{ $request->unit->property->name }}</td>
    <td>{{ $request->unit->name }}</td>
    <td>{{ $request->user->name }}</td>
    <td>
        @if ($request->status == 1)
            <span class="badge badge-pill badge-info">
                Approved
            </span></a>
        @else
            <span class="badge badge-pill badge-danger">
                Pending
            </span></a>
        @endif
    </td>
    <td class="row" >
        <a class="btn btn-sm btn-info" href="{{ route('tenantservice.show',$request->id) }}">More</a>
    </td>

</tr>
@endforeach

