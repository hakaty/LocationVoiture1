<h3 style="color:#5d50fa; font-size:40px;margin-bottom:80px;" >My profile</h3>
<div class="row">
    <div class="col-sm-4">
        <div id="card-profile" class="card">
            <div class="card-profile">
                <img style="width: 200px;" src="{{asset('images/profileimage.jpg')}}" alt="">
                <h5 class="card-title">{{$user->firstname}} {{$user->lastname}}</h5>
                <p class="card-text">{{$user->email}}</p>
                <button style="margin-bottom:10px; width: 100%"  class="profile-btn" id="edit-profile-btn">Edit Profile</button>
                <button style="width: 100%"  class="profile-btn" id="edit-password-btn">Edit Password</button>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="card">
            <div class="card-edit-profile">
                {{-- {{ route('user.update', $user) }} --}}
                <form action="{{ route('profile.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')


                    <div id="profile-form">
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" value="{{old('firstname', $user->firstname)}}">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name:</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" value="{{old('lastname', $user->lastname)}}">
                        </div>
                        <div class="form-group">
                            <label for="telephone">Telephone:</label>
                            <input type="text" name="telephone" id="telephone" class="form-control" value="{{old('telephone', $user->telephone)}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{old('email', $user->email)}}">
                        </div>
                    </div>


                    <div id="password-form" style="display: none;">
                        <div class="form-group">
                            <label for="password">New Password:</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                    </div>

                    <button style="margin-top: 10px" type="submit"  class="profile-btn">Update Profile </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    document.getElementById('edit-profile-btn').addEventListener('click', function() {
        document.getElementById('profile-form').style.display = 'block';
        document.getElementById('password-form').style.display = 'none';
    });

    document.getElementById('edit-password-btn').addEventListener('click', function() {
        document.getElementById('profile-form').style.display = 'none';
        document.getElementById('password-form').style.display = 'block';
    });
</script>
