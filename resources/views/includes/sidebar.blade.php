<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><img src="/assets/images/users/1.jpg" alt="user-img"
                            class="img-circle"><span class="hide-menu">{{ auth()->user()->name }}</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>

                <li> <a class="waves-effect waves-dark" href="{{ route('home') }}"><i class="icon-speedometer"></i><span
                            class="hide-menu">Dashboard</span></a>
                </li>


                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-layout-grid2"></i><span class="hide-menu">Branch Information</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-calendar.html">View Branches</a></li>
                        <li><a href="app-chat.html">Add Branch</a></li>

                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-layout-grid2"></i><span class="hide-menu">Property Information</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-calendar.html">View Properties</a></li>
                        <li><a href="app-chat.html">Add Property</a></li>

                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-layout-grid2"></i><span class="hide-menu">Services Provider </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-calendar.html">View Services</a></li>
                        <li><a href="app-chat.html">Add Services</a></li>

                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-layout-grid2"></i><span class="hide-menu">Unit Information</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-calendar.html">View Units</a></li>
                        <li><a href="app-chat.html">Add Unit</a></li>

                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-layout-grid2"></i><span class="hide-menu">Tenant Information</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-calendar.html">View All Tenant</a></li>
                        <li><a href="app-chat.html">Add Tenant</a></li>

                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-layout-grid2"></i><span class="hide-menu">Billings Section</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Rent
                                    Billing</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="app-calendar.html">View all rents</a></li>
                                <li> <a href="http://" target="_blank" rel="noopener noreferrer">Add Rent</a> </li>


                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Deposit
                                    Billing</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="app-calendar.html">View Deposits</a></li>
                                <li><a href="app-chat.html">Add Deposit</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Water
                                    Billing</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="app-calendar.html">View Billing</a></li>
                                <li><a href="app-chat.html">Add Water Billing</a></li>

                            </ul>
                        </li>


                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-layout-grid2"></i><span class="hide-menu">Lease Agreement</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-calendar.html">Lease List</a></li>
                        <li><a href="app-chat.html">Add Lease</a></li>

                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-layout-grid2"></i><span class="hide-menu">User Management</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('allUsers') }}">View Users</a></li>
                        <li><a href="{{ route('createUser') }}">Add user</a></li>

                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-layout-grid2"></i><span class="hide-menu">Reports Information</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-calendar.html">Total collections Report</a></li>
                        <li><a href="app-chat.html">Occupancy Report</a></li>
                        <li><a href="app-chat.html">Tenant Report</a> </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Billings
                                    Report</span></a>
                            <ul aria-expanded="false" class="collapse">

                                <li><a href="app-chat.html">Rent Report</a></li>

                                <li><a href="app-chat.html"> Deposit Report</a></li>


                                <li><a href="app-chat.html"> Water Report</a></li>

                            </ul>
                        </li>


                    </ul>
                </li>


                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-email"></i><span class="hide-menu">Inbox</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-email.html">Mailbox</a></li>
                        <li><a href="app-email-detail.html">Mailbox Detail</a></li>
                        <li><a href="app-compose.html">Compose Mail</a></li>
                    </ul>
                </li>


                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-email"></i><span class="hide-menu">SMS Notification</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-email.html">Send SMS</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                            class="ti-email"></i><span class="hide-menu">Payment Mode</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-email.html">Payment Datails</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
