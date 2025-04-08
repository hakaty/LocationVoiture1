<x-layout title="Login">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="container-login">

        <form method="POST" action="{{route('login')}}" class="login-form">
            @csrf
            <h3>login</h3>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="{{old('email')}}">
                @error('email')
                    <span class="error-login">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="d-grid">
                <button class="login-btn">Login</button>

                
                <p>Not a member?<a href="{{route('user.create')}}">Signup</a></p>
            </div>
        </form>
    </div>


</x-layout>

