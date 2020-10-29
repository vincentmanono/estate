<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><img  src="{{ (Str::contains(auth()->user()->image,'http') ? auth()->user()->image:'/storage/users/' . auth()->user()->image ) }}"  alt="{{ Auth::user()->name  }}"
                            class="img-circle"><span class="hide-menu">{{ auth()->user()->name }}</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                        <li> <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
</li>




                    </ul>
                </li>

                <li> <a class="waves-effect waves-dark" href="{{ route('home') }}"><i class="icon-speedometer"></i><span
                            class="hide-menu">Dashboard</span></a>
                </li>


                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-control-shuffle "></i><span class="hide-menu">Branch Information</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('allBranches') }}">View Branches</a></li>
                        <li><a href="{{ route('create.branch') }}">Add Branch</a></li>

                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-home"></i><span class="hide-menu">Property Details</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('property.index')}}">View Properties</a></li>
                    <li><a href="{{route('property.create')}}">Add Property</a></li>

                    </ul>
                </li>

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
                                <li> <a href="{{ route('rent.create') }}" target="_blank" rel="noopener noreferrer">Add Rent</a> </li>


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
                        <li><a href="#">Lease List</a></li>
                        <li><a href="#">Add Lease</a></li>

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
                        <li><a href="#">Occupancy Report</a></li>
                        <li><a href="{{ route('tenant.report') }}">Tenant Report</a> </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><span class="hide-menu">Billings
                                    Report</span></a>
                            <ul aria-expanded="false" class="collapse">

                                <li><a href="#">Rent Report</a></li>

                                <li><a href="#"> Deposit Report</a></li>


                                <li><a href="#"> Water Report</a></li>

                            </ul>
                        </li>


                    </ul>
                </li>


                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-email"></i><span class="hide-menu">Inbox</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Mailbox</a></li>
                        <li><a href="#">Mailbox Detail</a></li>
                        <li><a href="#">Compose Mail</a></li>
                    </ul>
                </li>


                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-email"></i><span class="hide-menu">SMS Notification</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Send SMS</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-wallet"></i><span class="hide-menu">Payment Mode</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('payment.index') }}">View Payment Modes</a></li>
                        <li><a href="{{ route('payment.create') }}">Add Payment Mode</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

