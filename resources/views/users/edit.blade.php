@extends('layouts.master')
@section('content')

    <div class="container offset-md-2">
        <h2 class="text-dark">Create a New User</h2>
        <form action="{{route('user.update',$user->id)}}" class="row " method="POST">
            @csrf
            <div class="form-group col-md-7">
                <label for="">Name</label>
                <input type="text" value="{{$user->name??''}}" class="form-control" required name="name" id="">
            </div>
            <div class="form-group col-md-7">
                <label for="">Account Type</label>
                <select name="account_type" id="" class="form-control" required>
                    <option value="">Select One</option>
                    @foreach ($account_types as $key => $account_type)
                        <option @if ($user->account_type == $key)
                            selected
                        @endif value="{{$key}}">{{$account_type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-7">
                <label for="">Balance</label>
                <input type="number" value="{{$user->balance??''}}"  class="form-control" name="balance" id="" required>
            </div>
            <div class="form-group col-md-7">
                <label for="">Email</label>
                <input type="email" class="form-control" value="{{$user->email??''}}"  name="email" id="" required>
            </div>
            <div class="form-group col-md-7">
                <label for="">Password</label>
                <input type="password" class="form-control" value="{{$user->password??''}}"  name="password" id="" required>
            </div>
            <div class="form-group col-md-7">
              <button type="submit" class="btn btn-primary ">Submit</button>
            </div>

        </form>
    </div>

@endsection