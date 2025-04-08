<x-layout title="Profile">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
    <x-user.profile :user="$user" />
</x-layout>