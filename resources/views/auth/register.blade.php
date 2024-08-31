@include('layouts.header')

<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register Card -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="index.html" class="app-brand-link gap-2">
                            <img src="{{asset('landing/img/image-removebg-preview.png')}}" style="height: 80px" alt="">
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Adventure starts here 🚀</h4>
                    <p class="mb-4">Make your app management easy and fun!</p>

                    <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                        @csrf
                    
                        <div class="mb-3">
                            <label for="fname" class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname"
                                placeholder="Enter your first name" value="{{ old('fname') }}" autofocus />
                            @error('fname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="lname" class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname"
                                placeholder="Enter your last name" value="{{ old('lname') }}" autofocus />
                            @error('lname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Company Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name"
                                placeholder="Enter your company name" value="{{ old('company_name') }}" autofocus />
                            @error('company_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                placeholder="Enter your email" value="{{ old('email') }}" />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number"
                                placeholder="Enter your phone number" value="{{ old('phone_number') }}" />
                            @error('phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="postal_address" class="form-label">Postal Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('postal_address') is-invalid @enderror" id="postal_address" name="postal_address"
                                placeholder="Enter your postal address" value="{{ old('postal_address') }}" />
                            @error('postal_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" value="{{ old('password') }}" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                placeholder="Confirm your password" />
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" id="terms-conditions" name="terms" />
                                <label class="form-check-label" for="terms-conditions">
                                    I agree to
                                    <a href="javascript:void(0);">privacy policy & terms</a>
                                </label>
                                @error('terms')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                        <button class="btn btn-primary d-grid w-100">Sign up</button>
                    </form>
                    

                    <p class="text-center">
                        <span>Already have an account?</span>
                        <a href="{{route('login')}}">
                            <span>Sign in instead</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- Register Card -->
        </div>
    </div>
</div>

@include('layouts.footer')
