<x-Adminlayout title="List Of Users">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <h3 style="margin: 30px 0px" >List of Users</h3>
    {{-- <a style="margin: 30px 0px" class="btn btn-primary" href="{{route('user.create')}}">Add User</a> --}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user )
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->telephone}}</td>
                    <td>{{$user->email}}</td>


                    <td>
                        <a href="{{route('user.edit',$user)}}" class="btn btn-success">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form method="post" action="{{route('user.destroy',$user->id)}}" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce client?')" class="btn btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>



                    </td>
                </tr>
                @empty
                <div class="empty-message">
                    <p>No users available at the moment.</p>
                </div>
                @endforelse
        </tbody>
    </table>


</x-Adminlayout>
