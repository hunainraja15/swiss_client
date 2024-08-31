@include('layouts.header')

<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Login Card -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="{{route('login')}}" class="app-brand-link gap-2">
                           <img src="{{asset('landing/img/image-removebg-preview.png')}}" style="height: 80px" alt="">
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Welcome Back! 👋</h4>
                    <p class="mb-4">Please sign in to your account.</p>

                    <form id="formAuthentication" class="mb-3" action="{{ route('send.email') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                placeholder="Enter your email" value="{{ old('email') }}" autofocus />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary d-grid w-100">Sign In</button>
                    </form>

                    <p class="text-center">
                        <span>Don't have an account?</span>
                        <a href="{{ route('register') }}">
                            <span>Sign up</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- Login Card -->
        </div>
    </div>
</div>

@include('layouts.footer')
