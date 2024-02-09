@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Transaction') }}</div>

                <div class="card-body">

                    @if(session()->has('message'))
                                        <div class="pl-5 pr-5 pt-2">
                                                <div class="alert alert-success">
                                                    {{ session()->get('message') }}
                                                </div>
                                        </div>
                                    @endif
                    <form method="POST" action="{{ route('posttransaction') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="transaction_type" class="col-md-4 col-form-label text-md-end">{{ __('Transaction type') }}</label>

                            <div class="col-md-6">
                                <select name="transaction_type"  class="form-control @error('transaction_type') is-invalid @enderror"  required>

                                    <option value="credit">Credit</option>
                                    <option value="debit">Debit</option>
                                    
                                </select>
                            </div>
                            @error('transaction_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" required>
                            </div>
                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea name="description"  class="form-control @error('description') is-invalid @enderror" required></textarea>
                            </div>
                            @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
