<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      Rent A Bike
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
    <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('dashboard')}}">
          <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
        </a>
      </li>
      
      <li class="nav-item{{ $activePage == 'usermanagement' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('usermanagement')}}">
          <i class="fa fa-male"></i>
            <p>Users</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'bikes' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('bikes')}}">
        <i class="material-icons">directions_bike</i>
            <p>Bikes</p>
        </a>
      </li>


      <li class="nav-item{{ $activePage == 'rentals' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('payments')}}">
        <i class="material-icons">money</i>
            <p>Rental Fees</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'payments' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('rentals')}}">
        <i class="material-icons">booking</i>
            <p>Payments</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'return' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('return')}}">
        <i class="material-icons"> assignment_return </i>
            <p>Returned Bikes</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'extend' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('extend')}}">
        <i class="material-icons">extension</i>
            <p>Extended Bikes</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('maps')}}">
        <i class="material-icons">map</i>
            <p>Maps</p>
        </a>
      </li>
     
<!--
      
      
-->
    </ul>
  </div>
</div>
