@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-dark">User List</h1>
            <table class="table table-bodered">
                <thead>
                    <tr>
                        <th>Ser No</th>
                        <th>Name</th>
                        <th>Transaction Type</th>
                        <th>Amount</th>
                        <th>Current Balance</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions  as $key => $transaction)
                        <tr>
                            <td>{{$loop->iteration ?? ''}}</td>
                            <td>{{$transaction->user->name??''}}</td>
                            <td>{{$transaction->transaction_type??''}}</td>
                            <td>{{$transaction->amount??''}}</td>
                            <td>{{$transaction->user->balance??''}}</td>
                            <td>{{$transaction->date?date('d M, Y',strtotime($transaction->date)) : ''}}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection