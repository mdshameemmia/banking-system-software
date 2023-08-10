@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between my-2">
            <div class="text-dark ">
                <h3>Withdrawal</h3>
            </div>
            <button class="btn btn-primary btn-sm">
                <a href="{{ route('withdrawal.create') }}" class="text-white">Withdraw</a>
            </button>
        </div>
        <div class="row">
            <table class="table table-bodered">
                <thead>
                    <tr>
                        <th>Ser No</th>
                        <th>Name</th>
                        <th>Transaction Type</th>
                        <th>Amount</th>
                        <th>Fee</th>
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
                            <td>{{$transaction->fee ??''}}</td>
                            <td>{{$transaction->date?date('d M, Y',strtotime($transaction->date)) : ''}}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection