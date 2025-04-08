
<nav>
    <a href="{{route('home.index')}}" class="logo">
        <h1 class="rental">Rental<span class="accent">Car</span></h1>
    </a>

    <ul class="nav_links">
        <li><a href="{{route('home.index')}}">Home</a></li>
        <li><a href="{{route('car.index')}}">Cars</a></li>
    </ul>

    <x-user.connected />


</nav>
