<x-Adminlayout title="Create">

    <h3>Create A New Car</h3>
    <hr>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <strong>Errors</strong>
            <ul>
                @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <form action="{{route('car.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="brand">Brand:</label>
            <input type="text" name="brand" id="brand" class="form-control" value="{{old('brand')}}">
        </div>
        <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" class="form-control" value="{{old('model')}}">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" class="form-control" value="{{old('price')}}">
        </div>

        <div class="form-group">
            <label>Photo:</label>
            <input type="file" name="photo" class="form-control" id="customFile">
        </div>

        <div class="form-group">
            <label class="d-block">Disponibilité:</label>
        <div class="form-check">
            <input type="radio" name="available"  class="form-check-input" value="1" checked>
            <label for="disponible" class="form-check-label">Disponible</label>
        </div>
        <div class="form-check">
            <input type="radio" name="available" class="form-check-input" value="0">
            <label for="nonDisponible" class="form-check-label">Non Disponible</label>
        </div>
        </div>

        <div class="form-group">
            <label class="d-block">Fuel-Type:</label>
        <div class="form-check">
            <input type="radio" name="fuel_type"  class="form-check-input" value="Gas" checked>
            <label for="gas" class="form-check-label">Gas</label>
        </div>
        <div class="form-check">
            <input type="radio" name="fuel_type" class="form-check-input" value="Essence">
            <label for="essence" class="form-check-label">Essence</label>
        </div>
        </div>

        <div class="form-group">
            <label class="d-block">Gearbox:</label>
        <div class="form-check">
            <input type="radio" name="gearbox"  class="form-check-input" value="Manual" checked>
            <label for="manual" class="form-check-label">Manual</label>
        </div>
        <div class="form-check">
            <input type="radio" name="gearbox" class="form-check-input" value="Automatique">
            <label for="automatique" class="form-check-label">Automatique</label>
        </div>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>


    </form>



</x-Adminlayout>
