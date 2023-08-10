@extends('layouts.master')
@section('content')

    <div class="container offset-md-2">
        <h2 class="text-dark">Transactions</h2>
        <form action="{{route('transaction.store')}}" class="row " method="POST">
            @csrf
            <div class="form-group col-md-7">
                <label for="">User</label>
                <select name="user_id" id="" class="form-control" required>
                    <option value="">Select One</option>
                    @foreach ($users as $key => $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-7">
                <label for="">Transaction Type</label>
                <select name="transaction_type" id="" class="form-control" required>
                    <option value="">Select One</option>
                    @foreach ($transaction_types as $key => $transaction_type)
                        <option value="{{$key}}">{{$transaction_type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-7">
                <label for="">Balance</label>
                <input type="number" class="form-control" name="balance" id="" required>
            </div>
          
           
            <div class="form-group col-md-7">
              <button type="submit" class="btn btn-primary ">Submit</button>
            </div>

        </form>
    </div>

@endsection