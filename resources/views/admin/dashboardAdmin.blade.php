<x-Adminlayout title="Dashboard">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <h3 class="dashboard-title-custom">Admin Dashboard</h3>

    <!-- Dashboard Cards -->
    <div class="dashboard-cards-custom">
        
        <!-- Total Users -->
        <div class="card-custom card-1">
            <a href="{{ route('listUsers') }}" class="card-link-custom">
                <div class="card-icon "><i class="fas fa-users"></i></div>
                <div class="card-content">
                    <h4>Total Users</h4>
                    <p class="card-number-custom ">{{$totalUsers}}</p>
                </div>
            </a>
        </div>

        <!-- Total Cars -->
        <div class="card-custom card-2">
            <a href="{{ route('listCars') }}" class="card-link-custom">
                <div class="card-icon "><i class="fas fa-car"></i></div>
                <div class="card-content">
                    <h4>Total Cars</h4>
                    <p class="card-number-custom ">{{$totalCars}}</p>
                </div>
            </a>
        </div>

        <!-- Total Rentals -->
        <div class="card-custom card-3">
            <a href="{{ route('listRental') }}" class="card-link-custom">
                <div class="card-icon "><i class="fas fa-receipt"></i></div>
                <div class="card-content">
                    <h4>Total Rentals</h4>
                    <p class="card-number-custom ">{{$totalRentals}}</p>
                </div>
            </a>
        </div>

    </div>
</x-Adminlayout>
