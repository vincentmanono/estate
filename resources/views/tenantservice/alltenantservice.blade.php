@foreach ($requests as $request)
<tr>

    <td>{{ $request->unit->property->name }}</td>
    <td>{{ $request->unit->name }}</td>
    <td>{{ $request->user->name }}</td>
    <td>
        @if ($request->status == 1)
            <span class="badge badge-pill badge-info">
                Approved
            </span>
        @elseif($request->status==0)
            <span class="badge badge-pill badge-danger">
                Declined
            </span>
        @else
        <span class="badge badge-pill badge-warning">
            Pending
        </span>
        @endif
    </td>
    <td class="row" >
        <a class="btn btn-sm btn-info" href="{{ route('tenantservice.show',$request->id) }}">More</a>
    </td>

</tr>
@endforeach

