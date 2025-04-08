@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="car-details-wrapper">
    <div class="car-details-container">
        <div class="details-box d-flex justify-content-center align-items-center">
            <div class="car-image">
                <img src="{{ asset('storage/' .$car->photo)}}" alt="car">
            </div>

            <div class="car-info">
                <h3 class="car-title">{{$car->brand}}</h3>
                <p><strong>Model:</strong> {{$car->model}}</p>
                <p><strong>Fuel Type:</strong> {{$car->fuel_type}}</p>
                <p><strong>Gearbox:</strong> {{$car->gearbox}}</p>
                <p><strong>Price Per Day:</strong> <span id="pricePerDay">{{$car->price}}</span> DH</p>
                <p class="availability-status">{{$car->available ? 'Available' : 'Not Available'}}</p>

                @if($car->available)
                    <form action="{{route('rental.store')}}" method="POST" enctype="multipart/form-data" class="rental-form">
                        @csrf
                        <div class="form-group">
                            <label for="startDate">Start Date:</label>
                            <input type="date" id="startDate" name="rental_date" class="form-control" required min="">
                        </div>
                        <div class="form-group">
                            <label for="endDate">End Date:</label>
                            <input type="date" id="endDate" name="return_date" class="form-control" required min="">
                        </div>

                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                        <input type="hidden" name="car_brand" value="{{ $car->brand }}">
                        <input type="hidden" name="price" id="totalPrice">

                        <hr>
                        <p>Total is: <span name="totalPrice" id="showTotalPrice">0</span> DH</p>

                        @if(Auth::check())
                            <button type="submit" class="btn-details">Book Now</button>
                        @else
                            <a class="btn-details" href="{{route('login.show',$car)}}">Login to Book</a>
                        @endif
                    </form>
                @else
                    <p class="text-danger">This car is not available for booking.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const startDateInput = document.getElementById('startDate');
        const endDateInput = document.getElementById('endDate');
        const totalPriceElement = document.getElementById('showTotalPrice');
        const hiddenTotalPrice = document.getElementById('totalPrice');
        const pricePerDay = parseFloat(document.getElementById('pricePerDay').textContent);

        function calculateTotalPrice() {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);

            if (!startDateInput.value || !endDateInput.value || endDate <= startDate) {
                totalPriceElement.textContent = '0';
                return;
            }

            const days = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
            const totalPrice = days * pricePerDay;

            totalPriceElement.textContent = totalPrice.toFixed(2);
            hiddenTotalPrice.value = totalPrice.toFixed(2);
        }

        startDateInput.addEventListener('change', calculateTotalPrice);
        endDateInput.addEventListener('change', calculateTotalPrice);
    });

    // Set today's date as the minimum date
    const today = new Date().toISOString().split("T")[0];
    document.getElementById("startDate").setAttribute("min", today);
    document.getElementById("endDate").setAttribute("min", today);
</script>
