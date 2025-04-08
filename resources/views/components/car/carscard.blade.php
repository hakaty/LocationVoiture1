<div class="card-container">
    @if ($cars->isEmpty())
        <div class="empty-message">
            <p>No cars available at the moment.</p>
        </div>
    @else
        @foreach ($cars as $car)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/'.$car->photo) }}" class="card-img-top" alt="carImage">
                <div class="card-info">
                    <h3>{{ $car->brand }}</h3>
                    <span class="badge bg-primary" style="margin-bottom: 10px">
                        {{ $car->available ? 'Available' : 'Not Available' }}
                    </span>
                </div>
                <p class="price">{{ $car->price }} <span>Mad/Day</span></p>
                <a href="/details/{{ $car->brand }}" class="btn-details">View Details</a>
            </div>
        @endforeach
    @endif
</div>


