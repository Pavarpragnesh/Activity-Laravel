<!-- <h2>Admin Dashboard</h2>
<p>Welcome, {{ Auth::guard('admin')->user()->name }}</p> -->
<!-- <a href="{{ route('notifications.index') }}">Notifications</a> -->
<form action="{{ route('admin.logout') }}" method="POST">
    @csrf
    <!-- <button type="submit">Logout</button> -->
</form>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!--icon stylsheet link-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/adminhome.css')}}" />
  </head>
  <body>
    <div class="wrapper">
      <div class="sidebar">
        <!-- profile image -->
        <div class="profile">
        <img src="{{ asset('storage/' . Auth::guard('admin')->user()->profile) }}" hight="50px" width="50px" alt="pavar" />
        <h3>Welcome,{{ Auth::guard('admin')->user()->name }}!</h3>
        </div>
        <!-- menu item -->
        <ul>
          <li>
            <a href="{{ route('admin.home') }}" class="active">
              <span class="icon"><i class="fas fa-home"></i></span>
              <span class="item">Home</span>
            </a>
          </li>
          <li>
            <a href="{{ route('activities.index') }}">
              <span class="icon"><i class="fas fa-desktop"></i></span>
              <span class="item">My Dashboard</span>
            </a>
          </li>
          <li>
            <a href="{{ route('users.index') }}">
              <span class="icon"><i class="fas fa-user-friends"></i></span>
              <span class="item">People</span>
            </a>
          </li>
          
          <li>
            <a href="{{ route('notifications.create') }}">
              <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
              <span class="item">Notification</span></a>
            </a>
          </li>
          <li>
            <a href="#">
              <span class="icon"><i class="fas fa-database"></i></span>
              <span class="item">Development</span>
            </a>
          </li>
          <li>
            <a href="#">
              <span class="icon"><i class="fas fa-chart-line"></i></span>
              <span class="item">Reports</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.view') }}">
              <span class="icon"><i class="fas fa-user-shield"></i></span>
              <span class="item">Admin</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <span class="icon"><i class="fa fa-sign-out"></i></span>
              <span class="item">Logout</span>
            </a>
          </li>
          <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
        </ul>
      </div>
      <!-- top menu bar -->
      <div class="section">
        <div class="top_navbar">
          <div class="hamburger">
            <a href="#">
              <i class="fas fa-bars"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Now active menu button using javascript -->
    <script>
      var hamburger = document.querySelector(".hamburger");
      hamburger.addEventListener("click", function () {
        document.querySelector("body").classList.toggle("active");
      });
    </script>
  </body>
</html>