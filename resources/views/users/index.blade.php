@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between my-2">
            <div class="text-dark ">
                <h3>User List</h3>
            </div>
            <button class="btn btn-primary btn-sm">
                <a href="{{ route('user.create') }}" class="text-white">Add</a>
            </button>
        </div>
        <div class="row">
            <table class="table table-bodered">
                <thead>
                    <tr>
                        <th>Ser No</th>
                        <th>Name</th>
                        <th>Account Type</th>
                        <th>Email</th>
                        <th>Balance</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $loop->iteration ?? '' }}</td>
                            <td>{{ $user->name ?? '' }}</td>
                            <td>{{ $user->account_type ?? '' }}</td>
                            <td>{{ $user->email ?? '' }}</td>
                            <td>{{ $user->balance ?? '' }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}"><button
                                        class="btn btn-info btn-sm">Edit</button></a>
                                <a href="{{ route('user.delete', $user->id) }}"><button
                                        class="btn btn-danger btn-sm">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
