<x-layout title="Create Account">

    <h3>Create Your Account</h3>

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
    <x-user.createAccount/>


</x-layout>
