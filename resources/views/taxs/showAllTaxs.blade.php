<tr class="text text-capitalize" >
    <td>{{ $tax->property->branch->name }}</td>
    <td> <a  class="text text-info" href="{{ route('property.show',$tax->property->id) }}">{{ $tax->property->name }}</a> </td>
    <td>KSH {{ number_format(($tax->amount * 10),2,'.',',')  }}</td>
    <td>KSH {{ number_format( $tax->amount ,2,'.',',')}}</td>
    <td>{{ $tax->created_at->format('d/M/Y') }}</td>

    <td>
        @if (Auth::user()->isOwner())
         <form  onclick="return confirm('Are you sure you need to delete this tax record ?')" action="{{ route('property.rent.tax.delete',$tax) }}" method="post">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
        </form>
    @else
        <button type="button"  class="btn btn-danger disabled"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
    @endif

    </td>

</tr>

