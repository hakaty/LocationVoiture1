<div class="container-create">  
    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" id="firstname" class="form-control" value="{{old('firstname')}}">
        </div>


        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" id="lastname" class="form-control" value="{{old('lastname')}}" >
        </div>


        <div class="form-group">
            <label for="telephone">Telephone:</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="{{old('telephone')}}" >
        </div>


        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" >
        </div>


        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" value="{{old('password')}}">
        </div>

        <div class="form-group">
            <label for="password">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" {{old('password_confirmation')}}>
        </div>


        <button style="margin-top: 10px" type="submit" class="btn btn-primary">Create Account</button>
    </form>

</div>  