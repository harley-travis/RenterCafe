<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                @if(auth()->user()->isAdmin == 1)

                  <li> 
                    <a class="waves-effect waves-dark" href="" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                  </li>
                  <li> 
                    <a class="waves-effect waves-dark" href="{{ route('property.overview') }}" aria-expanded="false"><i class="fa fa-user-circle-o"></i><span class="hide-menu">Properties</span></a>
                  </li>
                  <li> 
                    <a class="waves-effect waves-dark" href="{{ route('tenants.overview') }}" aria-expanded="false"><i class="fa fa-user-circle-o"></i><span class="hide-menu">Tenants</span></a>
                  </li>
                  <li> 
                    <a class="waves-effect waves-dark" href="{{ route('maintenance.overview') }}" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">Maintenance</span></a>
                  </li>
                  <!-- <li> 
                    <a class="waves-effect waves-dark" href="" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">Repairs</span></a>
                  </li> -->
                  <li> 
                    <a class="waves-effect waves-dark" href="" aria-expanded="false"><i class="fa fa-globe"></i><span class="hide-menu">Reports</span></a>
                  </li>

                  <li> 
                    <a class="waves-effect waves-dark" href="{{ route('settings.overview') }}" aria-expanded="false"><i class="fa fa-globe"></i><span class="hide-menu">Settings</span></a>
                  </li>

                @else

                  <li> 
                    <a class="waves-effect waves-dark" href="" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                  </li>
                  <li> 
                    <a class="waves-effect waves-dark" href="{{ route('pay.overview') }}" aria-expanded="false"><i class="fa fa-user-circle-o"></i><span class="hide-menu">Pay Bill</span></a>
                  </li>
                  <li> 
                    <a class="waves-effect waves-dark" href="{{ route('pay.history') }}" aria-expanded="false"><i class="fa fa-user-circle-o"></i><span class="hide-menu">Payment History</span></a>
                  </li>
                  <li> 
                    <a class="waves-effect waves-dark" href="{{ route('maintenance.create') }}" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">Maintenance</span></a>
                  </li>

                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->