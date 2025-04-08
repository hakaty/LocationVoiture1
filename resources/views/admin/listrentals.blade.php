<x-Adminlayout title="List Of Cars">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <h3 style="margin: 30px 0px" >List of Rentals</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Car_id</th>
                <th>Car_brand</th>
                <th>Image</th>
                <th>Total</th>
                <th>Client_id</th>
                <th>Rental_date</th>
                <th>Return_date</th>
                <th>Status</th>
                <th>Actions</th>
                

            </tr>
        </thead>
        <tbody>
            @forelse ($rentals as $rental )
                <tr>
                    <td>{{$rental->id}}</td>
                    <td>{{$rental->car_id}}</td>
                    <td>{{$rental->car_brand}}</td>
                    <td ><img style="width: 100px" src="{{'storage/'.$rental->car_photo}}" alt=""></td>
                    <td>{{$rental->price}}</td>
                    <td>{{$rental->user_id}}</td>
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
                        {{-- <a  href="{{route('rental.confirm' , $car)}}"class="btn btn-success" onclick="return confirm('Voulez-vous confirmer cette réservation?')" class="btn btn-danger">
                            Confirmer
                        </a> --}}
                        @if($rental->status == 'pending')
                            <form method="POST" action="{{route('rental.confirm',$rental)}}" style="display: inline-block">
                                @csrf
                                @method('PUT')
                                <button  type="submit" class="btn btn-success" onclick="return confirm('Voulez-vous confirmer cette réservation?')" class="btn btn-danger">
                                    Confirmer
                                </button>
                            </form>
                            
                        
                            <form method="POST" action="{{route('rental.cancel',$rental)}}" style="display: inline-block">
                                @csrf
                                @method('PUT')
                                <button  type="submit" onclick="return confirm('Voulez-vous annuler cette réservation?')" class="btn btn-danger">
                                    Annuler
                                </button>
                            </form>
                        @elseif($rental->status == 'canceled')
                        
                        <form method="POST" action="{{route('rental.destroy',$rental->id)}}" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button  type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment annuler cette réservation?')" class="btn btn-danger">
                                Supprimer
                            </button>
                        </form>
                        @endif
                    </td>
                    


                </tr>
            @empty
            <div class="empty-message">
                <p>No rentals available at the moment.</p>
            </div>
            @endforelse
        </tbody>
    </table>

    
</x-Adminlayout>
