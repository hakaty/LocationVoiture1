<x-layout title="Update">
    <h3>Edit the Car</h3>
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

    
    <form action="{{ route('car.update',$car) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="brand">Brand:</label>
            <input type="text" name="brand" id="brand" class="form-control" value="{{ old('brand', $car->brand) }}">
        </div>
        <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" class="form-control" value="{{ old('model', $car->model) }}">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $car->price) }}">
        </div>

        <div class="form-group">
            <label>Photo:</label>
            <input type="file" name="photo" class="form-control" id="customFile" value="">
            @if($car->photo)
            <img src="{{ asset('storage/'. $car->photo) }}" alt="Car photo" width="100" class="img-thumbnail">
            @endif
        </div>

        <div class="form-group">
            <label class="d-block">Disponibilité:</label>
        <div class="form-check">
            <input type="radio" name="available"  class="form-check-input" value="1" {{ old('available', $car->available) == 1 ? 'checked' : '' }}>
            <label for="disponible" class="form-check-label">Disponible</label>
        </div>
        <div class="form-check">
            <input type="radio" name="available" class="form-check-input" value="0" {{ old('available', $car->available) == 0 ? 'checked' : '' }}>
            <label for="nonDisponible" class="form-check-label">Non Disponible</label>
        </div>
        </div>

        <div class="form-group">
            <label class="d-block">Fuel-Type:</label>
        <div class="form-check">
            <input type="radio" name="fuel_type"  class="form-check-input" value="Gas" {{ old('fuel_type', $car->fuel_type) == 'Gas' ? 'checked' : '' }}>
            <label for="gas" class="form-check-label">Gas</label>
        </div>
        <div class="form-check">
            <input type="radio" name="fuel_type" class="form-check-input" value="Essence"  {{ old('fuel_type', $car->fuel_type) == 'Essence' ? 'checked' : '' }}>
            <label for="essence" class="form-check-label">Essence</label>
        </div>
        </div>

        <div class="form-group">
            <label class="d-block">Gearbox:</label>
        <div class="form-check">
            <input type="radio" name="gearbox"  class="form-check-input" value="Manual" {{ old('gearbox', $car->gearbox) == 'Manual' ? 'checked' : '' }}>
            <label for="manual" class="form-check-label">Manual</label>
        </div>
        <div class="form-check">
            <input type="radio" name="gearbox" class="form-check-input" value="Automatique" {{ old('gearbox', $car->gearbox) == 'Automatique' ? 'checked' : '' }}>
            <label for="automatique" class="form-check-label">Automatique</label>
        </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>


    </form>



</x-layout>
