@include('layouts.header')
<style>
    /* Specific styling for the card-mockup */
.card-mockup {
    background-color: #ff0000 !important; /* Red background */
    color: #fff !important; /* Black text */
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Light shadow */
    padding: 20px;
}

.card-mockup .bi-credit-card {
    color: #000; /* Black color for the icon */
}

.card-mockup strong {
    color: #fff !important; /* Black text */
}

</style>
<div class="container mt-5">
    <!-- Tabs Navigation -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active {{ Auth::user() ? 'disabled' : '' }}" id="form-tab" data-bs-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="true">Form</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ !Auth::user() ? 'disabled' : '' }}" id="info-tab" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Info</a>
        </li>
    </ul>

    <!-- Tabs Content -->
    <div class="tab-content mt-3" id="myTabContent">
        <!-- Form Tab -->
        <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="">
                        <img src="{{ asset('landing/img/image-removebg-preview.png') }}" alt="" style="max-height: 60px !important;">
                    </div>
                    <div><a class="btn btn-primary main-btn text-white">Login</a></div>
                </div>
                <div class="card-body">
                    <form id="formAuthenticationStore" class="mb-3" action="{{ route('user.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="fname" class="form-label">First Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('fname') is-invalid @enderror"
                                id="fname" name="fname" placeholder="Enter your first name"
                                value="{{ old('fname') }}" autofocus />
                            @error('fname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="lname" class="form-label">Last Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('lname') is-invalid @enderror"
                                id="lname" name="lname" placeholder="Enter your last name"
                                value="{{ old('lname') }}" />
                            @error('lname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="company_name" class="form-label">Company Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                id="company_name" name="company_name" placeholder="Enter your company name"
                                value="{{ old('company_name') }}" />
                            @error('company_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" placeholder="Enter your email"
                                value="{{ old('email') }}" />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                id="phone_number" name="phone_number" placeholder="Enter your phone number"
                                value="{{ old('phone_number') }}" />
                            @error('phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="postal_address" class="form-label">Postal Address <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('postal_address') is-invalid @enderror"
                                id="postal_address" name="postal_address" placeholder="Enter your postal address"
                                value="{{ old('postal_address') }}" />
                            @error('postal_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password <span
                                    class="text-danger">*</span></label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" value="{{ old('password') }}" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password_confirmation">Confirm Password <span
                                    class="text-danger">*</span></label>
                            <input type="password" id="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" placeholder="Confirm your password" />
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox"
                                    id="terms-conditions" name="terms" />
                                <label class="form-check-label" for="terms-conditions">
                                    I agree to <a href="javascript:void(0);">privacy policy & terms</a>
                                </label>
                                @error('terms')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-primary d-grid w-100">Sign up</button>
                    </form>
                    <form id="formAuthenticationLogin" class="mb-3 d-none" action="{{ route('user.login') }}" method="POST">
                        @csrf
                        <!-- Form fields for Login -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" autofocus />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Add other form fields here -->
                        <button class="btn btn-primary d-grid w-100">Sign In</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Info Tab -->
        <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- CARD FORM -->
                        <div class="col-lg-8 col-md-12">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-currency-bitcoin fs-3 text-primary me-2"></i>
                                    <span class="fs-4">
                                        <img src="{{ asset('landing/img/image-removebg-preview.png') }}" alt="" style="max-height: 60px !important;">
                                    </span>
                                </div>
                            </div>

                            <div class="row g-4">
                                <!-- Card Plan -->
                                <div class="col-md-4">
                                    <label class="card p-4 d-flex flex-column align-items-start border border-primary rounded shadow-sm">
                                        <input name="plan" class="form-check-input mt-0 mb-2 tab-check" value="tab-card" type="radio" checked>
                                        <div class="d-flex flex-column flex-fill">
                                            <span class="fs-4 fw-bold text-success"><img src="{{ asset('landing/img/Card Logo.png') }}" alt="" style="max-height: 60px !important;"></span>
                                        </div>
                                    </label>
                                </div>
                                <!-- Stripe Plan -->
                                <div class="col-md-4">
                                    <label class="card p-4 d-flex flex-column align-items-start border border-primary rounded shadow-sm">
                                        <input name="plan" class="form-check-input mt-0 mb-2 tab-check" value="tab-stripe" type="radio">
                                        <div class="d-flex flex-column flex-fill">
                                            <span class="fs-4 fw-bold text-primary"><img src="{{ asset('landing/img/stripe.png') }}" alt="" style="max-height: 60px !important;"></span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <form class="card-card">
                                <!-- Card Payment Form Fields -->
                                <div class="mb-3">
                                    <label class="form-label">Card Number</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Card Number" maxlength="19" required />
                                        <span class="input-group-text"><i class='bx bx-credit-card'></i></span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <input class="form-control me-2" type="text" placeholder="MM" maxlength="2" />
                                    <input class="form-control" type="text" placeholder="YYYY" maxlength="4" />
                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Card CVV" maxlength="3" />
                                    <span class="input-group-text"><i class='bx bx-credit-card-front'></i></span>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Pay Now</button>
                            </form>

                            <form id="payment-form" action="{{ route('stripe.post') }}" method="post" class="card-stripe d-none">
                                @csrf
                                <input type="hidden" name="stripeToken" value="{{ 'tok_visa' }}">
                                <div class="mb-3">
                                    <label class="form-label">Name on Card</label>
                                    <input name="name" id="nameOfCard" class="form-control" type="text" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Card Number</label>
                                    <div id="card-element" class="form-control"></div>
                                    <div id="card-errors" role="alert"></div>
                                </div>
                                <button class="btn btn-primary w-100" type="submit">Pay Now</button>
                            </form>

                           
                        </div>

                        <!-- SIDEBAR -->
                        <div class="col-lg-4 col-md-12 py-5">
                            <div class="bg-light p-3 rounded">
                                <div class="card-mockup p-4 bg-primary text-white rounded shadow-sm mb-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-credit-card fs-3 me-2"></i>
                                        <div>
                                            <strong class="d-block" id="name_mock">Name not add</strong>
                                            
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-unstyled">
                                    <li class="d-flex justify-content-between mb-2">
                                        <span>Storage</span>
                                        <strong>100gb</strong>
                                    </li>
                                    <li class="d-flex justify-content-between mb-2">
                                        <span> premium subscription</span>
                                        <strong><i class='bx bxs-calendar-check text-danger'></i></strong>
                                    </li>
                                    <li class="d-flex justify-content-between mb-2">
                                        <span>subscription fee</span>
                                        <strong>0.00</strong>
                                    </li>
                                    <li class="d-flex justify-content-between mb-2">
                                        <span>CHF/month</span>
                                        <strong>80.00 USD</strong>
                                    </li>
                                </ul>
                                <hr class="my-3">
                                <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded">
                                    <div>
                                        <div class="text-secondary">You have to Pay</div>
                                        <div>
                                            <strong>80</strong>
                                            <small>.00 <span class="text-secondary">USD</span></small>
                                        </div>
                                    </div>
                                    <i class="bi bi-currency-bitcoin fs-3 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Toggle between Login and Register forms
        $('.main-btn').click(function() {
            const isLogin = $(this).text() === 'Login';
            $(this).text(isLogin ? 'Register' : 'Login');
            $('#formAuthenticationLogin, #formAuthenticationStore').toggleClass('d-none');
        });

        // Toggle between Card and Stripe forms
        $('.tab-check').change(function() {
            const selectedTab = $(this).val();
            $('.card-card, .card-stripe').toggleClass('d-block d-none');
            $(`.card-${selectedTab}`).removeClass('d-none').addClass('d-block');
        });

        // Show appropriate form on load if errors exist
        if ($('#formAuthenticationLogin .is-invalid').length > 0) {
            $('#formAuthenticationLogin').removeClass('d-none');
            $('#formAuthenticationStore').addClass('d-none');
            $('.main-btn').text('Register');
        }

        @if (Auth::user())
        // Show Info tab if user is authenticated
        new bootstrap.Tab($('#info-tab')[0]).show();
        @endif
    });
</script>

<!-- Stripe -->
<script src="https://js.stripe.com/v3/"></script>
<script>
    $(document).ready(function() {
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');
        const elements = stripe.elements();

        const card = elements.create('card').mount('#card-element');
        elements.create('cardCvc').mount('#card-cvc');
        elements.create('cardExpiry').mount('#card-expiry-month').mount('#card-expiry-year');

        $('#payment-form').submit(function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    $('#card-errors').text(result.error.message);
                } else {
                    $('<input>', {
                        type: 'hidden',
                        name: 'stripeToken',
                        value: result.token.id
                    }).appendTo('#payment-form');
                    $('#payment-form').submit();
                }
            });
        });
    });
   
        $('#nameOfCard').on('input', function() {
            $('#name_mock').text($(this).val());
        });

</script>
@include('layouts.footer')
