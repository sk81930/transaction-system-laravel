@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex head-top">
                        <div class="head1">{{ __('Transaction') }}</div>
                        <div class="head2"><a href="{{url('/addtransaction')}}"><button class="btn btn-primary">{{ __('+ Add Transaction') }}</button></a></div>
                   </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Date</th>
                          <th scope="col">Description</th>
                          <th scope="col">Credit</th>
                          <th scope="col">Debit</th>
                          <th scope="col">Running balance</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($transaction as $trans)
                            <tr>
                              <th scope="row">{{$trans->date}}</th>
                              <td>{{$trans->description}}</td>
                              <td>{{$trans->credit}}</td>
                              <td>{{$trans->debit}}</td>
                              <td>{{$trans->balance}}</td>
                            </tr>
                        @endforeach
                        
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
