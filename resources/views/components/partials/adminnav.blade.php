<nav class="navbar navbar-expand-lg navbar-dark navbar-custom" style="background-color: var(--accent);">
    <div class="container-fluid">
        <a class="navbar-brand navbar-brand-custom" href="{{ route('dashboard.admin') }}" style="font-weight: bold; color: var(--gray);">Admin Dashboard</a>
        <button class="navbar-toggler navbar-toggler-icon-custom" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-color: var(--gray);"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav navbar-nav-custom ms-auto">
                <li class="nav-item nav-item-custom">
                    <a class="nav-link nav-link-custom active" href="{{ route('listCars') }}" style="color: var(--gray);">List Cars</a>
                </li>
                <li class="nav-item nav-item-custom">
                    <a class="nav-link nav-link-custom" href="{{ route('listUsers') }}" style="color: var(--gray);">List Users</a>
                </li>
                <li class="nav-item nav-item-custom">
                    <a class="nav-link nav-link-custom" href="{{ route('listRental') }}" style="color: var(--gray);">List Rental</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
