    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="http://farmersconnectng.com/public/uploads/logo/{{$scheme->logo}}" width="60" height="60" alt="User" />
                </div>

                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ucwords(Auth::user()->name)}}</div>
                    <div class="email">{{Auth::user()->email}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="/admin/dashboard">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    
                    @role('scheme')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Access Control</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="#">User</a>
                            </li>
                            <li>
                                <a href="#">Role</a>
                            </li>
                            <li>
                                <a href="#">Permission</a>
                            </li>
                        </ul>
                    </li>
                    @endrole
                    @role('admin|superadmin|worker|scheme')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Farmers</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/farmers/create">Register Farmers</a>
                            </li>
                            <li>
                                <a href="/crops">Add Crops/Livestock</a>
                            </li>
                            <li>
                                <a href="/schemefarmers">Scheme Farmers</a>
                            </li>
                            <li>
                                <a href="/csv">Upload Farmers</a>
                            </li>
                            <li>
                                <a href="/activity">Add Activity</a>
                            </li>
                            @level(2)
                            <li>
                                <a href="/farmers_grouping">Farmers Grouping</a>
                            </li>
                            <li>
                                <a href="/assign">Assign Farmers</a>
                            </li>
                            <li>
                                <a href="/group">Group</a>
                            </li>
                            @endlevel
                        </ul>
                    </li>
                     @endrole

                     @role('admin|superadmin|scheme')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">perm_media</i>
                            <span>Extension Worker</span>
                        </a>
                        <ul class="ml-menu">
                            @level(4)
                            <li>
                                <a href="/work">View Worker</a>
                            </li>
                            @endlevel
                            <li>
                                <a href="/assignworker">Assign Worker</a>
                            </li>
                            @role('scheme')
                            <li>
                                <a href="/schemeworker">Scheme Workers</a>
                            </li>
                            @endrole
                            @level(3)
                            <li>
                                <a href="/approvedworker">Assigned Worker</a>
                            </li>
                            @endlevel
                        </ul>
                    </li>
                    @endrole

                    @role('admin|superadmin|scheme')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Agro Dealers</span>
                        </a>
                        <ul class="ml-menu">
                            @level(4)
                            <li>
                                <a href="/viewdealer">View Dealer</a>
                            </li>
                            @endlevel

                            @level(3)
                            <li>
                                <a href="/approveddealer">Approved Dealer</a>
                            </li>
                            @endlevel

                            @role('scheme')
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Quotation</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="/quotation">Send Quotation</a>
                                    </li>
                                  
                                    <li>
                                        <a href="#">View Quotation</a>
                                    </li>

                                </ul>
                            </li>
                            
                            <li>
                                <a href="/assigndealer">Assign Dealer</a>
                            </li>
                            <li>
                                <a href="schemedealer">Scheme Dealers</a>
                            </li>
                            @endrole
                        </ul>
                    </li>
                    @endrole

                    @role('admin|superadmin')
                    <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Scheme</span>
                    </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/scheme/create">Create Scheme</a>
                            </li>
                            <li>
                                <a href="/viewscheme">View Scheme</a>
                            </li>
                            <li>
                                <a href="/activity">Add Activity</a>
                            </li>
                        </ul>
                    </li>
                    @endrole
                    @role('admin|superadmin|worker|dealer|scheme')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_copy</i>
                            <span>Payment</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="#">Invoicing</a>
                            </li>
                            <li>
                                <a href="#">Genarate Invoice</a>
                            </li>
                        </ul>
                    </li>
                    @endrole
                    @role('admin|superadmin|worker|dealer|scheme')
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Report</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="#">Genarate Report</a>
                            </li>
                        </ul>
                    </li>
                    @endrole
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Notification</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="#">Notify Farmers</a>
                            </li>
                            <li>
                                <a href="#">Notify Workers</a>
                            </li>
                            <li>
                                <a href="#">Notify Dealers</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/admin/logout">
                            <i class="material-icons">layers</i>
                            <span>Logout</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
<!--             <div class="legal">
                <div class="copyright">
                    &copy; 2016 <a href="javascript:void(0);">ERCAS - Farmers Connect</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.3
                </div>
            </div> -->
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->


        
    </section>