<x-layout title="Edit Account">

    <h3>Edit Your Account</h3>

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
    <form action="{{ route('update.user.admin',$user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" id="firstname" class="form-control" value="{{old('firstname',$user->firstname)}}">
        </div>

        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" id="lastname" class="form-control" value="{{old('lastname',$user->lastname)}}" >
        </div>

        <div class="form-group">
            <label for="telephone">Telephone:</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="{{old('telephone',$user->telephone)}}" >
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{old('email',$user->email)}}" >
        </div>



        <button style="margin-top: 10px" type="submit" class="btn btn-primary">Update User</button>
    </form>



</x-layout>
