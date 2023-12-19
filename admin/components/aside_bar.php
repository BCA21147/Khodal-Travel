<?php
$urlArray = explode("/", $_SERVER['REQUEST_URI']);
$page_name = end($urlArray);
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link bg-primary">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="pb-3 mb-3 d-flex">
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header">DASHBOARD</li>
        <!-- DashBoard -->
        <li class="nav-item <?php if ($page_name == "index.php" || $page_name == "") { ?>menu-open<?php } ?>">
          <a href="#" class="nav-link <?php if ($page_name == "index.php" || $page_name == "") { ?>active<?php } ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php"
                class="nav-link d-flex align-items-center <?php if ($page_name == "index.php" || $page_name == "") { ?>active<?php } ?>">
                <span class="px-2 mx-1"></span>
                <i class="far fa-circle nav-icon"></i>
                <div class="px-2">
                  <p>Dashboard - 1</p>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <!-- Ticket Booking -->
        <li
          class="nav-item <?php if ($page_name == "book_ticket.php" || $page_name == "ticket_list.php" || $page_name == "cancel_list.php") { ?>menu-open<?php } ?>">
          <a href="#"
            class="nav-link <?php if ($page_name == "book_ticket.php" || $page_name == "ticket_list.php" || $page_name == "cancel_list.php") { ?>active<?php } ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Ticket Booking
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="book_ticket.php"
                class="nav-link d-flex align-items-center <?php if ($page_name == "book_ticket.php") { ?>active<?php } ?>">
                <span class="px-2 mx-1"></span>
                <i class="far fa-circle nav-icon"></i>
                <div class="px-2">
                  <p>Book Ticket</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="ticket_list.php"
                class="nav-link d-flex align-items-center <?php if ($page_name == "ticket_list.php") { ?>active<?php } ?>">
                <span class="px-2 mx-1"></span>
                <i class="far fa-circle nav-icon"></i>
                <div class="px-2">
                  <p>Ticket List</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="cancel_list.php"
                class="nav-link d-flex align-items-center <?php if ($page_name == "cancel_list.php") { ?>active<?php } ?>">
                <span class="px-2 mx-1"></span>
                <i class="far fa-circle nav-icon"></i>
                <div class="px-2">
                  <p>Cancel List</p>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <!-- Passenger -->
        <li class="nav-item <?php if ($page_name == "passenger_list.php") { ?>menu-open<?php } ?>">
          <a href="#" class="nav-link <?php if ($page_name == "passenger_list.php") { ?>active<?php } ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Passenger
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="passenger_list.php"
                class="nav-link d-flex align-items-center <?php if ($page_name == "passenger_list.php") { ?>active<?php } ?>">
                <span class="px-2 mx-1"></span>
                <i class="far fa-circle nav-icon"></i>
                <div class="px-2">
                  <p>Passenger List</p>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <!-- Employee -->
        <li
          class="nav-item <?php if ($page_name == "employee_type_list.php" || $page_name == "employee_list.php") { ?>menu-open<?php } ?>">
          <a href="#"
            class="nav-link <?php if ($page_name == "employee_type_list.php" || $page_name == "employee_list.php") { ?>active<?php } ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Employee
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="employee_type_list.php"
                class="nav-link d-flex align-items-center <?php if ($page_name == "employee_type_list.php") { ?>active<?php } ?>">
                <span class="px-2 mx-1"></span>
                <i class="far fa-circle nav-icon"></i>
                <div class="px-2">
                  <p>Employee Type List</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="employee_list.php"
                class="nav-link d-flex align-items-center <?php if ($page_name == "employee_list.php") { ?>active<?php } ?>">
                <span class="px-2 mx-1"></span>
                <i class="far fa-circle nav-icon"></i>
                <div class="px-2">
                  <p>Employee List</p>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <!-- Report -->
        <li class="nav-item <?php if ($page_name == "ticket_sold.php") { ?>menu-open<?php } ?>">
          <a href="#" class="nav-link <?php if ($page_name == "ticket_sold.php") { ?>active<?php } ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Report
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="ticket_sold.php"
                class="nav-link d-flex align-items-center <?php if ($page_name == "ticket_sold.php") { ?>active<?php } ?>">
                <span class="px-2 mx-1"></span>
                <i class="far fa-circle nav-icon"></i>
                <div class="px-2">
                  <p>Ticket Sold</p>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <!-- Inquiry -->
        <li class="nav-item <?php if ($page_name == "inquiry_list.php") { ?>menu-open<?php } ?>">
          <a href="#" class="nav-link <?php if ($page_name == "inquiry_list.php") { ?>active<?php } ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Inquiry
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="inquiry_list.php"
                class="nav-link d-flex align-items-center <?php if ($page_name == "inquiry_list.php") { ?>active<?php } ?>">
                <span class="px-2 mx-1"></span>
                <i class="far fa-circle nav-icon"></i>
                <div class="px-2">
                  <p>Inquiry List</p>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <!-- Software Settings -->
        <li
          class="nav-item <?php if ($page_name == "fleet_list.php" || $page_name == "vehical_list.php" || $page_name == "country_list.php" || $page_name == "location_list.php" || $page_name == "stand_list.php" || $page_name == "schedule_list.php" || $page_name == "schedule_filter_list.php" || $page_name == "tax_list.php" || $page_name == "payment_method_list.php" || $page_name == "facility_list.php" || $page_name == "add_trip.php" || $page_name == "trip_list.php" || $page_name == "coupon_list.php") { ?>menu-open<?php } ?>">
          <a href="#"
            class="nav-link <?php if ($page_name == "fleet_list.php" || $page_name == "vehical_list.php" || $page_name == "country_list.php" || $page_name == "location_list.php" || $page_name == "stand_list.php" || $page_name == "schedule_list.php" || $page_name == "schedule_filter_list.php" || $page_name == "tax_list.php" || $page_name == "payment_method_list.php" || $page_name == "facility_list.php" || $page_name == "add_trip.php" || $page_name == "trip_list.php" || $page_name == "coupon_list.php") { ?>active<?php } ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Software Settings
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <!-- Fleet -->
            <li
              class="nav-item <?php if ($page_name == "fleet_list.php" || $page_name == "vehical_list.php") { ?>menu-open<?php } ?>">
              <a href="#"
                class="nav-link <?php if ($page_name == "fleet_list.php" || $page_name == "vehical_list.php") { ?>active<?php } ?>">
                <span class="px-2 mx-1"></span>
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Fleet
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="fleet_list.php"
                    class="nav-link d-flex align-items-center <?php if ($page_name == "fleet_list.php") { ?>small-menu-bold-font<?php } ?>">
                    <span class="px-4 mx-1"></span>
                    <i class="far fa-circle nav-icon"></i>
                    <div class="px-2">
                      <p class="no-wrap">Fleet List</p>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="vehical_list.php"
                    class="nav-link d-flex align-items-center <?php if ($page_name == "vehical_list.php") { ?>small-menu-bold-font<?php } ?>">
                    <span class="px-4 mx-1"></span>
                    <i class="far fa-circle nav-icon"></i>
                    <div class="px-2">
                      <p class="no-wrap">Vehical List</p>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Location -->
            <li
              class="nav-item <?php if ($page_name == "country_list.php" || $page_name == "location_list.php" || $page_name == "stand_list.php") { ?>menu-open<?php } ?>">
              <a href="#"
                class="nav-link <?php if ($page_name == "country_list.php" || $page_name == "location_list.php" || $page_name == "stand_list.php") { ?>active<?php } ?>">
                <span class="px-2 mx-1"></span>
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Location
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="country_list.php"
                    class="nav-link d-flex align-items-center <?php if ($page_name == "country_list.php") { ?>small-menu-bold-font<?php } ?>">
                    <span class="px-4 mx-1"></span>
                    <i class="far fa-circle nav-icon"></i>
                    <div class="px-2">
                      <p class="no-wrap">Country List</p>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="location_list.php"
                    class="nav-link d-flex align-items-center <?php if ($page_name == "location_list.php") { ?>small-menu-bold-font<?php } ?>">
                    <span class="px-4 mx-1"></span>
                    <i class="far fa-circle nav-icon"></i>
                    <div class="px-2">
                      <p class="no-wrap">Location List</p>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="stand_list.php"
                    class="nav-link d-flex align-items-center <?php if ($page_name == "stand_list.php") { ?>small-menu-bold-font<?php } ?>">
                    <span class="px-4 mx-1"></span>
                    <i class="far fa-circle nav-icon"></i>
                    <div class="px-2">
                      <p class="no-wrap">Stand List</p>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Schedule -->
            <li
              class="nav-item <?php if ($page_name == "schedule_list.php" || $page_name == "schedule_filter_list.php") { ?>menu-open<?php } ?>">
              <a href="#"
                class="nav-link <?php if ($page_name == "schedule_list.php" || $page_name == "schedule_filter_list.php") { ?>active<?php } ?>">
                <span class="px-2 mx-1"></span>
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Schedule
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="schedule_list.php"
                    class="nav-link d-flex align-items-center <?php if ($page_name == "schedule_list.php") { ?>small-menu-bold-font<?php } ?>">
                    <span class="px-4 mx-1"></span>
                    <i class="far fa-circle nav-icon"></i>
                    <div class="px-2">
                      <p class="no-wrap">Schedule List</p>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="schedule_filter_list.php"
                    class="nav-link d-flex align-items-center <?php if ($page_name == "schedule_filter_list.php") { ?>small-menu-bold-font<?php } ?>">
                    <span class="px-4 mx-1"></span>
                    <i class="far fa-circle nav-icon"></i>
                    <div class="px-2">
                      <p class="no-wrap">Schedule Filter List</p>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Tax -->
            <li class="nav-item <?php if ($page_name == "tax_list.php") { ?>menu-open<?php } ?>">
              <a href="#" class="nav-link <?php if ($page_name == "tax_list.php") { ?>active<?php } ?>">
                <span class="px-2 mx-1"></span>
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Tax
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="tax_list.php"
                    class="nav-link d-flex align-items-center <?php if ($page_name == "tax_list.php") { ?>small-menu-bold-font<?php } ?>">
                    <span class="px-4 mx-1"></span>
                    <i class="far fa-circle nav-icon"></i>
                    <div class="px-2">
                      <p class="no-wrap">Tax List</p>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Payment Method -->
            <li class="nav-item <?php if ($page_name == "payment_method_list.php") { ?>menu-open<?php } ?>">
              <a href="#" class="nav-link <?php if ($page_name == "payment_method_list.php") { ?>active<?php } ?>">
                <span class="px-2 mx-1"></span>
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Payment Method
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="payment_method_list.php"
                    class="nav-link d-flex align-items-center <?php if ($page_name == "payment_method_list.php") { ?>small-menu-bold-font<?php } ?>">
                    <span class="px-4 mx-1"></span>
                    <i class="far fa-circle nav-icon"></i>
                    <div class="px-2">
                      <p class="no-wrap">Payment Method List</p>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Trip -->
            <li
              class="nav-item <?php if ($page_name == "facility_list.php" || $page_name == "add_trip.php" || $page_name == "trip_list.php") { ?>menu-open<?php } ?>">
              <a href="#"
                class="nav-link <?php if ($page_name == "facility_list.php" || $page_name == "add_trip.php" || $page_name == "trip_list.php") { ?>active<?php } ?>">
                <span class="px-2 mx-1"></span>
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Trip
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="facility_list.php"
                    class="nav-link d-flex align-items-center <?php if ($page_name == "facility_list.php") { ?>small-menu-bold-font<?php } ?>">
                    <span class="px-4 mx-1"></span>
                    <i class="far fa-circle nav-icon"></i>
                    <div class="px-2">
                      <p class="no-wrap">Facility List</p>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="add_trip.php"
                    class="nav-link d-flex align-items-center <?php if ($page_name == "add_trip.php") { ?>small-menu-bold-font<?php } ?>">
                    <span class="px-4 mx-1"></span>
                    <i class="far fa-circle nav-icon"></i>
                    <div class="px-2">
                      <p class="no-wrap">Add Trip</p>
                    </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="trip_list.php"
                    class="nav-link d-flex align-items-center <?php if ($page_name == "trip_list.php") { ?>small-menu-bold-font<?php } ?>">
                    <span class="px-4 mx-1"></span>
                    <i class="far fa-circle nav-icon"></i>
                    <div class="px-2">
                      <p class="no-wrap">Trip List</p>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Coupon -->
            <li class="nav-item <?php if ($page_name == "coupon_list.php") { ?>menu-open<?php } ?>">
              <a href="#" class="nav-link <?php if ($page_name == "coupon_list.php") { ?>active<?php } ?>">
                <span class="px-2 mx-1"></span>
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Coupon
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="coupon_list.php"
                    class="nav-link d-flex align-items-center <?php if ($page_name == "coupon_list.php") { ?>small-menu-bold-font<?php } ?>">
                    <span class="px-4 mx-1"></span>
                    <i class="far fa-circle nav-icon"></i>
                    <div class="px-2">
                      <p class="no-wrap">Coupon List</p>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>