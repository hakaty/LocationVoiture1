<footer>
    <h1 class="rental">Rental<span class="accent">Car</span></h1>
    @if(auth()->check() && auth()->user()->type === 1)
    <a class="btnNC" href="{{ route('dashboard.admin') }}">Admin</a>
    @endif
    
</footer>