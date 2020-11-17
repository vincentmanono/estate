@foreach ($services as $service)
    <tr>
        <td>{{ $service->unit->property->name }}</td>
        <td>{{ $service->unit->name }}</td>

        <td> {{ Str::of($service->message)->limit(30) }} </td>
        <td>

            @if ($service->status)
                <span class="badge badge-pill badge-success">Approved</span>
            @else
                <span class="badge badge-pill badge-danger">Pendding</span>

            @endif

        </td>
        <td>


            </a>
            <!-- Button trigger modal -->
            <button type="button" class="btn waves-effect waves-light btn-primary" data-toggle="modal"
                data-target="{{ '#service-' . $service->id }}">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </button>

            <!-- Modal -->


            <div id="{{ 'service-' . $service->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> <span> Service request</span> </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group">
                                <li class="list-group-item active">Service requested</li>
                                <li class="list-group-item ">Tenant Name : <span
                                        class="text text-capitalize">{{ $service->user->name }} </span> </li>
                                <li class="list-group-item ">Tenant Email : <span class="text text-capitalize"> <a
                                            href="{{ 'mailto:' . $service->user->email }}">{{ $service->user->email }}</a>
                                    </span> </li>

                                <li class="list-group-item"> {{ $service->message }} </li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn waves-effect waves-light btn-secondary"
                                data-dismiss="modal">Close</button>
                            @if (Auth::user()->isOwner() || Auth::user()->isManager())
                                <form action="{{ route('changetenantservicestatus', $service->id) }}" method="post">
                                    @csrf

                                    @if ($service->status)
                                        <input type="hidden" name="status" value="0">
                                    @else
                                        <input type="hidden" name="status" value="1">

                                    @endif

                                    @if ($service->status)
                                        <button type="submit"
                                            class="btn waves-effect waves-light  btn-danger">Decline</button>
                                    @else
                                        <button type="submit"
                                            class="btn waves-effect waves-light  btn-primary">Approve</button>

                                    @endif



                                </form>
                            @endif

                        </div>
                    </div>
                </div>
            </div>




            <a name="" id="" class="btn waves-effect waves-light btn-warning"
                href="{{ route('tenantservice.edit', $service->id) }}" role="button">
                <i class="fa fa-pencil-square" aria-hidden="true"></i>
            </a>
            <a name="" id="" class="btn waves-effect waves-light btn-danger" onclick="" href="#" role="button">

                <form id="deleteService" action="{{ route('tenantservice.destroy', $service->id) }}" method="post">
                    @csrf
                    @method("DELETE")

                    <button type="submit" class="btn btn-sm   waves-effect waves-light btn-danger"><i
                            class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
            </a>
        </td>
    </tr>
@endforeach
