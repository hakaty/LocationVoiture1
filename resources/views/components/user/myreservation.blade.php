<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<h3 style="margin: 30px 0px" >My Current Rentals</h3>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-striped">
    <thead>
        <tr>

            <th>Car Brand</th>
            <th>Car Photo</th>
            <th>Total</th>
            <th>Rental Date</th>
            <th>Return Date</th>
            <th>Status</th>
            {{-- @if($rental->status == 'pending') --}}
            <th>Action</th>
            {{-- @endif --}}


        </tr>
    </thead>
    <tbody>
        @forelse ($rentals as $rental )
            <tr>

                <td>{{$rental->car_brand}}</td>
                <td ><img style="width: 100px" src="{{'storage/'.$rental->car_photo}}" alt=""></td>
                <td>{{$rental->price}}</td>
                <td>{{$rental->rental_date}}</td>
                <td>{{$rental->return_date}}</td>
                <td>
                    @switch($rental->status)
                        @case('pending')
                            <span class="badge bg-warning" style="margin-bottom: 10px">Pending</span>
                            @break
                
                        @case('confirmed')
                            <span class="badge bg-success" style="margin-bottom: 10px">Confirmed</span>
                            @break
                
                        @case('canceled')
                            <span class="badge bg-danger" style="margin-bottom: 10px">Canceled</span>
                            @break
                    @endswitch
                </td>
                <td>
                    @if($rental->status == 'pending')
                    <form method="POST" action="{{ route('rental.cancel', $rental) }}" style="display: inline-block">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous annuler cette réservation?')">
                            Annuler
                        </button>
                    </form>
                    @else
                    <button type="button" class="btn btn-secondary" style ="pointer-events: none;">
                        Annuler
                    </button>
                    @endif
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="6" class="h3 text-danger">You don't have any reservation</td>
            </tr>
        @endforelse
    </tbody>
</table>
