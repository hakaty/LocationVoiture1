<x-Adminlayout title="List Of Cars">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<h3 style="margin: 30px 0px" >List of Cars</h3>
<a style="margin: 30px 0px" class="btn btn-primary" href="{{route('create.index')}}">Add Car</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Fuel Type</th>
            <th>Gearbox</th>
            <th>Price</th>
            <th>Availability</th>
            <th>Photo</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($cars as $car )
            <tr>
                <td>{{$car->id}}</td>
                <td>{{$car->brand}}</td>
                <td>{{$car->model}}</td>
                <td>{{$car->fuel_type}}</td>
                <td>{{$car->gearbox}}</td>
                <td>{{$car->price}}</td>
                <td>{{$car->available ? 'Available' : 'Not Available'}}</td>
                <td ><img style="width: 100px" src="{{'storage/'.$car->photo}}" alt=""></td>
                <td>
                    <form method="post" action="{{route('car.destroy', $car->id)}}" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cette voiture?')" class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>

                    <a href="{{route('car.edit',$car)}}" class="btn btn-success">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
            </tr>
            @empty
            <div class="empty-message">
                <p>No cars available at the moment.</p>
            </div>
            @endforelse
        
    </tbody>
</table>

</x-Adminlayout>
