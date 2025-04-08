@guest
<a class="btnNC login-btn"  href="{{route('login.show')}}">Login</a>
@endguest

@auth
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle btname" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      {{-- Connected --}}
        {{ auth()->user()->firstname}}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      <li><a class="dropdown-item" href="{{route('user.profile')}}">My Profile</a></li>

      <li><a class="dropdown-item" href="{{route('user.rentals')}}">My Reservations</a></li>
      
      <li><a class="dropdown-item log-out" href="{{route('login.logout')}}">  Log Out</a></li>
    </ul>
  </div>
@endauth






