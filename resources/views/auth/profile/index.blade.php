@extends('layouts.app')
@section('content')
@php
    $user = Auth::user();
@endphp

    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpzkqmu8RTm0bAg4s0ShPQzvDuTlRzQB1kaQ&s"
                                class="m-5" width="110px" alt="">
                            <div class="mt-3">
                                <h4>{{ $user->fname }} {{ $user->lname }}</h4>
                                <p class="text-secondary mb-1">{{ $user->phone_number }}</p>
                                <p class="text-muted font-size-sm">{{ $user->company_name }}</p>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item">
                                <a href="#" class="text-decoration-none">{{ $user->email }}</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div id="orderDetails" class="order_card">
                        <!-- Order Details Content -->
                    </div>
                    <div id="profileDetails" class="card d-none">
                        <div class="card-body">
                            <h5 class="card-title">Profile Information</h5>
                            <!-- Profile Information Content -->
                        </div>
                    </div>
                    <div id="addressBook" class="card mt-3">
                        <div class="card-body">
                            <h2>Enable Two-Factor Authentication</h2>

                            @if(Route::is('user.profile'))
                            <form action="{{ route('send.email') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="2fa_email">Email Address</label>
                                    <input type="text" name="email" id="2fa_email"  value="{{$user->email}}" class="form-control" required>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mt-3">Send Code</button>
                            </form>
                            @endif
                            @if(Route::is('send.email'))
                            <form action="{{ route('verify.two.factor') }}"  method="POST">
                                @csrf
                                <div class="form-group ">
                                    <label for="2fa_code">Enter the 6-digit code from your app</label>
                                    <input type="text" name="fa_code" id="2fa_code" class="form-control" required>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mt-3">Verify</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
