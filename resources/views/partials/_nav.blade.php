<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
        <span> <!-- User image size is adjusted inside CSS, it should stay as it --> 

            <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
                <img src="/theme/img/avatars/sunny.png" alt="me" class="online" /> 
                <span>
                    john.doe 
                </span>
                <i class="fa fa-angle-down"></i>
            </a> 

        </span>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive-->
    <nav>
                <!-- 
                NOTE: Notice the gaps after each icon usage <i></i>..
                Please note that these links work a bit different than
                traditional href="" links. See documentation for details.
            -->

            <ul>
                <li class="active">
                    <a href="/admin/dashboard" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i>Dashboard</a>  
                </li>
                <li class="top-menu-invisible">
                    <a href="#"><i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> <span class="menu-item-parent">Farmers</span></a>
                    <ul>
                        <li class="">
                            <a href="/farmers/create"><i class="fa fa-lg fa-fw fa-gear"></i> <span class="menu-item-parent">Register Farmers</span></a>
                        </li>
                        <li class="">
                            <a href="/crops"><i class="fa fa-lg fa-fw fa-picture-o"></i> <span class="menu-item-parent">Add Crops/Livestock</span></a>
                        </li>
                        <li>
                            <a href="/schemefarmers"><i class="fa fa-cube"></i>Scheme Farmers</a>
                        </li>
                        <li>
                            <a href="/csv"><i class="fa fa-cube"></i>Upload Farmers</a>
                        </li>
                        <li>
                            <a href="/activity"><i class="fa fa-cube"></i>Add Activity</a>
                        </li>
                        <li>
                            <a href="/farmers_grouping"><i class="fa fa-cube"></i>Farmers Grouping</a>
                        </li>
                        <li>
                            <a href="/assign"><i class="fa fa-cube"></i>Assign Farmers</a>
                        </li>
                        <li>
                            <a href="/group"><i class="fa fa-cube"></i>Group</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Extension Worker</span></a>
                    <ul>
                        <li>
                            <a href="flot.html">Assign Worker</a>
                        </li>
                        <li>
                            <a href="morris.html">Scheme Workers</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">Agro Dealers</span></a>
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">Quotation</span></a>
                            <ul>
                                <li>
                                    <a href="table.html">Send Quotation</a>
                                </li>
                                <li>
                                    <a href="table.html">View Quotation</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="table.html">Assign Dealer</a>
                        </li>
                        <li>
                            <a href="jqgrid.html">Scheme Dealer</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Report</span></a>
                    <ul>
                        <li>
                            <a href="form-elements.html">Invoicing</a>
                        </li>
                        <li>
                            <a href="form-templates.html">Generate Report</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>


        <span class="minifyme" data-action="minifyMenu"> 
            <i class="fa fa-arrow-circle-left hit"></i> 
        </span>

    </aside>