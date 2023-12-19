<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.php" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>

  <!-- Show Current Time -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <div class="w-100 h-100 px-2 d-flex align-items-center bg-primary text-center"
        style="font-size: 22px; border-radius: 5px" id="dateAndtimeInadmin">
        <script>
          setInterval(() => {
            var date = new Date();
            var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            var final_date = days[date.getDay()] + " " + (((date.getDate()) < 10) ? "0" + (date.getDate()) : (date.getDate())) + "/" + (((date.getMonth() + 1) < 10) ? "0" + (date.getMonth() + 1) : (date.getMonth() + 1)) + "/" + date.getFullYear() + " " + (((date.getHours()) < 10) ? "0" + (date.getHours()) : (date.getHours())) + ":" + (((date.getMinutes()) < 10) ? "0" + (date.getMinutes()) : (date.getMinutes())) + ":" + (((date.getSeconds()) < 10) ? "0" + (date.getSeconds()) : (date.getSeconds()));
            $("#dateAndtimeInadmin").html(final_date);
            // $("#dateAndtimeInadmin").addClass("py-1");
          }, 1000);
        </script>
      </div>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->