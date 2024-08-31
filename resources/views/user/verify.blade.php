@include('layouts.header')

<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Verify Email Card -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="{{ route('login') }}" class="app-brand-link gap-2">
                            <img src="{{asset('landing/img/image-removebg-preview.png')}}" style="height: 80px" alt="">
                        </a>
                    </div>

                    <!-- /Logo -->
                    <h4 class="mb-2">Verify Your Email Code</h4>
                    <p class="mb-4">Please enter the code sent to your email.</p>

                    <form id="formVerification" class="mb-3" action="{{ route('verify.step.factor1') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="id" value="{{$id['id']}}">
                        <input type="hidden" name="email" value="{{$id['email']}}">
                        <input type="hidden" name="password" value="{{$id['password']}}">
                        <div class="mb-3">
                            <label for="fa_code" class="form-label">Verification Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('fa_code') is-invalid @enderror" id="fa_code" name="fa_code"
                                placeholder="Enter the verification code" required value="{{ old('fa_code') }}" autofocus />
                            @error('fa_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary d-grid w-100">Verify Code</button>
                    </form>

                    <p class="text-center">
                        {{-- <a href="{{ route('resend.email.code') }}"> --}}
                            <span>Resend code</span>
                        {{-- </a> --}}
                    </p>
                </div>
            </div>
            <!-- Verify Email Card -->
        </div>
    </div>
</div>

@include('layouts.footer')
