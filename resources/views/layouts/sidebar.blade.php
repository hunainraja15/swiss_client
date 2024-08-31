<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <img src="{{ asset('landing/img/logo.png') }}" alt="" style="max-height: 80px !important;">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    @php
    use Carbon\Carbon;

    $user = Auth::user()->status_update;

    // Assuming $user contains the 'status_update' date
    $statusUpdateDate = Carbon::parse($user);

    // Get the current date
    $now = Carbon::now();

    // Check if the status update date is more than one month ago
    $subscription = $statusUpdateDate->isBefore($now->subMonth());

@endphp
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Route::is('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        @if($subscription == false && Auth::check() && Auth::user()->status == 'active')
            @if (Auth::user()->role != 'user')
                <li class="menu-item {{ Route::is('user.index') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user-circle"></i>
                        <div data-i18n="user">Clients</div>
                    </a>
                </li>
            @endif
            <li class="menu-item {{ Route::is('folder.index') ? 'active' : '' }}">
                <a href="{{ route('folder.index') }}" class="menu-link">
                    <i class='bx bx-cloud'></i>
                    <div data-i18n="user">Cloud</div>
                </a>
            </li>
            @if (Auth::user()->role != 'user')
                <li class="menu-item {{ Route::is('account.index') ? 'active' : '' }}">
                    <a href="{{ route('account.index') }}" class="menu-link">
                        <i class='bx bxs-user-account'></i>
                        <div data-i18n="user">Account</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('setting.index') ? 'active' : '' }}">
                    <a href="{{ route('setting.index') }}" class="menu-link">
                        <i class='bx bx-cog'></i>
                        <div data-i18n="user">Settings</div>
                    </a>
                </li>
            @endif

            
        @else
            <li class="menu-item {{ Route::is('payment.index') ? 'active' : '' }}">
                <a href="{{ route('payment.index') }}" class="menu-link">

                    <i class='bx bx-money'></i>
                    <div data-i18n="payment_processing">Payment Processing</div>
                </a>
            </li>
        @endif

    </ul>
</aside>
