@extends('user.layouts.app')

@section('content')

@include('user.home.slider')
@include('user.home.product')
@include('user.home.game')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as user!') }}


                    <h1 class="mt-4">Welcom to  Gamers Zone </h1>
                    <p> To use Gamers Zone, Please download our Android Apps</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
