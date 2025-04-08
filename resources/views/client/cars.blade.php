<x-layout title="Cars">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <h1 class="title-cars">Our Cars</h1>
    <hr>

    <x-car.carscard :cars="$cars"/>



</x-layout>
