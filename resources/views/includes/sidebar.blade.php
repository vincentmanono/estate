<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><img
                            src="{{ Str::contains(auth()->user()->image, 'http') ? auth()->user()->image : '/storage/users/' . auth()->user()->image }}"
                            alt="{{ Auth::user()->name }}" class="img-circle"><span
                            class="hide-menu">{{ auth()->user()->name }}</span></a>
                   @include('includes.myprofiledropdown')
                </li>



                <li> <a class="waves-effect waves-dark" href="{{ route('home') }}"><i class="icon-speedometer"></i><span
                            class="hide-menu">Dashboard</span></a>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-settings"></i><span class="hide-menu">Tenants Requests
                        </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('tenantservice.index') }}">View Requests</a></li>

                    </ul>
                </li>
                @if (Auth::user()->type == 'manager' || Auth::user()->type == 'owner')



                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-control-shuffle "></i><span class="hide-menu">Branch Information</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('allBranches') }}">View Branches</a></li>
                            @if (auth()->user()->type == 'manager' || auth()->user()->type == 'owner')
                                <li><a href="{{ route('create.branch') }}">Add Branch</a></li>
                            @endif


                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-home"></i><span class="hide-menu">Property Details</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('property.index') }}">View Properties</a></li>
                            @if (auth()->user()->type == 'manager' || auth()->user()->type == 'owner')

                                <li><a href="{{ route('property.create') }}">Add Property</a></li>
                            @endif

                        </ul>
                    </li>
                    @if (auth()->user()->type == 'manager' || auth()->user()->type == 'owner')
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="ti-home"></i><span class="hide-menu">Apartment
                                    Request</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('application.index') }}">View Requests</a></li>

                            </ul>
                        </li>
                    @endif


                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-settings"></i><span class="hide-menu">Services Provider </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('service.index') }}">View Services</a></li>
                            <li><a href="{{ route('service.create') }}">Add Services</a></li>

                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-home"></i><span class="hide-menu">Unit Information</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('unit.index') }}">View Units</a></li>
                            <li><a href="{{ route('unit.create') }}">Add Unit</a></li>

                        </ul>
                    </li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-user"></i><span class="hide-menu">Tenant Information</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('allTenants') }}">View All Tenant</a></li>
                            <li><a href="{{ route('createUser') }}">Add Tenant</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-money"></i><span class="hide-menu">Billings Section</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false"><i class="ti-money"></i><span class="hide-menu">Rent
                                        Billing</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('rent.index') }}">View all rents</a></li>
                                    <li> <a href="{{ route('rent.create') }}" target="_blank"
                                            rel="noopener noreferrer">Add Rent</a> </li>


                                </ul>
                            </li>

                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false"><i class="ti-money"></i><span class="hide-menu">Deposit
                                        Billing</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('deposit.index') }}">View Deposits</a></li>
                                    <li><a href="{{ route('deposit.create') }}">Add Deposit</a></li>

                                </ul>
                            </li>
                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false"><i class="ti-money"></i><span class="hide-menu">Water
                                        Billing</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('water.index') }}">View Billing</a></li>
                                    <li><a href="{{ route('water.create') }}">Add Water Billing</a></li>

                                </ul>
                            </li>


                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-write"></i><span class="hide-menu">Lease Agreement</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('lease.index') }}">Lease List</a></li>
                            <li><a href="{{ route('lease.create') }}">Add Lease</a></li>

                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-user"></i><span class="hide-menu">User Management</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('allUsers') }}">View Users</a></li>
                            <li><a href="{{ route('createUser') }}">Add user</a></li>

                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-agenda"></i><span class="hide-menu">Reports Information</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="#">Total collections Report</a></li>
                            <li><a href="{{ route('occupancy.report') }}">Occupancy Report</a></li>
                            <li><a href="{{ route('tenant.report') }}">Tenant Report</a> </li>

                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false"><span class="hide-menu">Billings
                                        Report</span></a>
                                <ul aria-expanded="false" class="collapse">

                                    <li><a href="{{ route('rent.report') }}">Rent Report</a></li>

                                    <li><a href="{{ route('deposit.report') }}"> Deposit Report</a></li>


                                    <li><a href="{{ route('water.report') }}"> Water Report</a></li>

                                </ul>
                            </li>


                        </ul>
                    </li>


                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-email"></i><span class="hide-menu">Inbox</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('messages.index') }}">Mailbox</a></li>
                            <li><a href="{{ route('messages.create') }}">Compose Mail</a></li>
                        </ul>
                    </li>


                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-email"></i><span class="hide-menu">SMS Notification</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('create.sms') }}">Send SMS</a></li>
                            <li><a href="{{ route('all.send.sms') }}">View Send SMS</a></li>
                        </ul>
                    </li>

                    {{--  <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-wallet"></i><span class="hide-menu">Payment Mode</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('payment.index') }}">View Payment Modes</a></li>
                            <li><a href="{{ route('payment.create') }}">Add Payment Mode</a></li>
                        </ul>
                    </li>  --}}

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                        class="ti-wallet"></i><span class="hide-menu">Rent Tax</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{ route('property.rent.tax.index') }}">View rent tax</a></li>
                </ul>
            </li>




                @elseif (Auth::user()->type =='tenant')



                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-home"></i><span class="hide-menu">Property Details</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('property.index') }}">View Properties</a></li>
                        </ul>
                    </li>


                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-home"></i><span class="hide-menu"> Lease Details</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('lease.index') }}">View </a></li>
                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-user"></i><span class="hide-menu">Tenant Information</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('allTenants') }}">View Details</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-money"></i><span class="hide-menu">Billing Section</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('rent.index') }}"> Rent Records</a></li>
                            <li><a href="{{ route('deposit.index') }}">Deposit Records</a></li>
                            <li><a href="{{ route('water.index') }}">Water Records</a></li>
                        </ul>
                    </li>

                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-settings"></i><span class="hide-menu">Services
                            </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('tenantservice.index') }}">View Requested</a></li>
                            <li><a href="{{ route('tenantservice.create') }}">Request</a></li>

                        </ul>
                    </li>




                @endif











            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
