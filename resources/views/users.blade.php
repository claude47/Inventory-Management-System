@extends('layouts.app')

@section('content')

<div class="py-12 text-lg">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-x1 sm:rounded-lg px-3">
        <div class="container mx-auto py-6">
            <h1 class="text-x1 font-bold mb-6 px-1"> List of Users</h1>
            <table class="table table-hover">
            <thead>
                <tr class="bg-gray-800 text-black text-sm leading-normal">
                <th class="py-3 px-6 text-left">Name</th>
                <th class="py-3 px-6 text-left">Email</th>
                <th class="py-3 px-6 text-left">Last Seen</th>
                <th class="py-3 px-6 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray font-light">
            
            
            @foreach ($users as $user)
                    <tr class="border-b border-gray-200 hove:bg-gray-100">
                        <td class="py-3 px-6"> {{ $user->name }}</td>
                        <td class="py-3 px-6"> {{ $user->email }}</td>
                        <td class="py-3 px-6">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }} </td>
                        <span class="bg-{{ $user->last_seen >= now()->subMinutes(2) ? 'green' : 'red' }}--500 text-white py-1 px-3 rounded-full text-lg">
                        <td class="py-3 px-6 text-center"> {{ $user->last_seen >= now()->subMinutes(2) ? 'Online' : 'Offline' }} </td>
                        </span>
                        

                    </tr>

                @endforeach




            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>



@endsection