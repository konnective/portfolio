<!-- Top nav Start -->
@push('style-lib')
    <link href="{{ asset('assets/admin-new/libs/jquery-ui-1.14.0.custom/jquery-ui.min.css') }}" rel="stylesheet">
@endpush
@push('style')
    <style>
        .spinner {
            width: 60px;
            height: 60px;
            border: 6px solid #ffff;
            /* Black border */
            border-top-color: #00b5c6;
            /* Red top border */
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            margin: 100px auto;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .navbar-search {
            width: 30%
        }

        .navbar-search-field:focus-within {
            border: 1px solid var(--bs-primary)
        }

        @media (max-width: 768px) {
            .navbar-search {
                width: 70%
            }
        }

        .input-group .navbar-search-field {
            background-color: rgba(255, 255, 255, 0.05);
            color: #6e7e96;
            border: 1px solid var(--bs-gray-200);
            border-radius: 5px;
            padding-left: 40px;
            width: 100%;
            box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset;
        }

        .input-group .search-icon {
            position: absolute;
            left: 15px;
            top: 60%;
            transform: translateY(-50%);
        }

        .ui-autocomplete {
            max-height: 500px;
            overflow-y: auto;
            overflow-x: hidden;
            z-index: 1000;
        }

        .ui-menu .ui-menu-item {
            padding: 10px 0;
            border-bottom: 1px solid #EBF1F6
        }

        .ui-menu .ui-menu-item:hover {
            border: none;
            background: var(--bs-secondary-bg-subtle-dark) !important;
            color: #000000;
        }

        .ui-state-active,
        .ui-widget-content .ui-state-active,
        .ui-widget-header .ui-state-active,
        a.ui-button:active,
        .ui-button:active,
        .ui-button.ui-state-active:hover {
            border: none;
            background: none !important;
            color: #000000;
        }

        .table> :not(:first-child) {
            border-top: 1px solid lightgray;
        }
        .supprt-overlay {
            height: 100vh;
            border-radius: 1rem;
            overflow-y: auto;
            width: 0vw;
            position: fixed;
            z-index: 11;
            top: 1px;
            right: 0;
            background-color: #ecf4fa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            overflow-x: hidden;
            overflow-y: scroll;
            transition: 0.5s;

        }
        .supprt-overlay .closebtn {
            position: absolute;
            top: -23px;
            right: 10px;
            font-size: 50px;
        }
    </style>
@endpush
<header class="topbar">
    <div class="container">
        <div class="d-flex border-bottom p-2 align-items-center justify-content-between">
            <ul class="navbar-nav d-none d-lg-flex align-items-center ms-3">
                <li class="nav-item w-100 me-5">
                    <a id="headerCollapse" href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset(getImage(getFilePath('logoIcon') . '/logo.png')) }}" alt="favicon"
                            class="img-fluid" style="height:4.5em" />
                    </a>
                </li>
            </ul>
            <div class="input-group navbar-search h-50">
                <input autocomplete="off" class="form-control navbar-search-field mt-2" id="search-booking"
                    name="#0" placeholder="@lang('Search here with name, email, mobile or booking number')" type="search">
                <i class="las la-search text-dark search-icon"></i>
            </div>
            {{-- end of upper --}}
            <div class="d-flex align-items-center justify-content-between navbar navbar-expand-lg">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <li class="nav-item">
                        <button class="js-toggle-fullscreen-btn toggle-fullscreen-btn btn"
                            aria-label="Enter fullscreen mode">
                            <i class="fas fa-expand fs-5"></i>
                        </button>
                    </li>
                    @can('admin.request.booking.all')
                        <a class="btn btn-warning ms-3" href="{{ route('admin.request.booking.all') }}">
                            @lang('Reservations') <small
                                class="fw-bold px-2 rounded bg-light text-warning">{{ $bookingRequestCount }}</small>
                        </a>
                    @endcan
                    @can(['admin.notification.read', 'admin.notifications'])
                        <li class="nav-item dropdown">
                            <a class="nav-link position-relative text-primary" href="javascript:void(0)" id="drop2"
                                aria-expanded="false">
                                <i class="ti {{ $adminNotificationCount > 0 ? 'ti-bell-ringing' : 'ti-bell' }}"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                aria-labelledby="drop2">
                                <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                    <h5 class="mb-0 fs-5 fw-semibold">@lang('Notifications')</h5>
                                    {!! $adminNotificationCount > 0
                                        ? '<span class="badge text-bg-primary rounded-4 px-3 py-1 lh-sm">' . $adminNotificationCount . ' new</span>'
                                        : '' !!}
                                </div>
                                <div class="message-body" data-simplebar>
                                    @if ($adminNotificationCount > 0)
                                        @foreach ($adminNotifications as $notification)
                                            <a href="@if (can('admin.notification.read')) {{ route('admin.notification.read', $notification->id) }} @else javascript:void(0) @endif"
                                                class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                <div class="w-100">
                                                    <h6 class="mb-1 fw-semibold lh-base">
                                                        {{ __($notification->title) }}</h6>
                                                    <span class="fs-2 d-block text-body-secondary time"><i
                                                            class="far fa-clock"></i>
                                                        {{ $notification->created_at->diffForHumans() }}</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    @else
                                        <a href="javascript:void(0)" class="py-6 px-7 d-flex  dropdown-item">
                                            <div class="w-100">
                                                <h6 class="mb-1 fw-semibold lh-base">@lang('No unread notification found')</h6>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                                @can('admin.notifications')
                                    <div class="py-6 px-7 mb-1">
                                        <a class="btn btn-outline-primary w-100"
                                            href="{{ route('admin.notifications') }}">@lang('See all notification(s)')</a>
                                    </div>
                                @endcan
                            </div>
                        </li>
                    @endcan
                    <li class="nav-item dropdown support-btn">
                        Support
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    <img src="{{ getImage('assets/admin/images/profile/' . auth()->guard('admin')->user()->image) }}"
                                        class="rounded-circle" width="35" height="35" alt="modernize-img" />
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="py-3 px-7 pb-0">
                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                </div>
                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                    <img src="{{ getImage('assets/admin/images/profile/' . auth()->guard('admin')->user()->image) }}"
                                        class="rounded-circle" width="80" height="80" alt="modernize-img" />
                                    <div class="ms-3">
                                        <h5 class="mb-1 fs-3">{{ auth()->guard('admin')->user()->name }}</h5>
                                        <span
                                            class="mb-1 d-block">{{ auth()->guard('admin')->user()->username }}</span>
                                        <p class="mb-0 d-flex align-items-center gap-2">
                                            <i class="ti ti-mail fs-4"></i>
                                            {{ auth()->guard('admin')->user()->email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="message-body">
                                    <a href="{{ route('admin.profile') }}"
                                        class="py-8 px-7 mt-8 d-flex align-items-center">
                                        <span
                                            class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                            <img src="{{ asset('assets/admin-new/images/svgs/icon-account.svg') }}"
                                                alt="modernize-img" width="24" height="24" />
                                        </span>
                                        <div class="w-100 ps-3">
                                            <h6 class="mb-1 fs-3 fw-semibold lh-base">@lang('My Profile')</h6>
                                            <span class="fs-2 d-block text-body-secondary">@lang('Account Settings')</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('admin.password') }}"
                                        class="py-8 px-7 d-flex align-items-center">
                                        <span
                                            class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                            <img src="{{ asset('assets/admin-new/images/svgs/password.svg') }}"
                                                alt="modernize-img" width="24" height="24" />
                                        </span>
                                        <div class="w-100 ps-3">
                                            <h6 class="mb-1 fs-3 fw-semibold lh-base">@lang('Password')</h6>
                                            <span class="fs-2 d-block text-body-secondary">@lang('Change Your Password')</span>
                                        </div>
                                    </a>
                                    @can('admin.setting.index')
                                        <a href="{{ route('admin.setting.index') }}"
                                            class="py-8 px-7 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                <img src="{{ asset('assets/admin-new/images/svgs/setting-icon.svg') }}"
                                                    alt="modernize-img" width="24" height="24" />
                                            </span>
                                            <div class="w-100 ps-3">
                                                <h6 class="mb-1 fs-3 fw-semibold lh-base">@lang('General Setting')</h6>
                                                <span class="fs-2 d-block text-body-secondary">@lang('Change General Setting')</span>
                                            </div>
                                        </a>
                                    @endcan
                                    @can('admin.frontend.manage.pages')
                                        <a href="{{ route('admin.frontend.manage.pages') }}" class="py-8 px-7 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                <img src="{{ asset('assets/admin-new/images/svgs/setting-icon.svg') }}"
                                                    alt="modernize-img" width="24" height="24" />
                                            </span>
                                            <div class="w-100 ps-3">
                                                <h6 class="mb-1 fs-3 fw-semibold lh-base">@lang('Website Setting')</h6>
                                                <span class="fs-2 d-block text-body-secondary">@lang('Brand Website Setting')</span>
                                            </div>
                                        </a>
                                    @endcan
                                    @can('admin.setting.logo.icon')
                                        <a href="{{ route('admin.setting.logo.icon') }}"
                                            class="py-8 px-7 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                <img src="{{ asset('assets/admin-new/images/svgs/icon-screen-share.svg') }}"
                                                    alt="modernize-img" width="24" height="24" />
                                            </span>
                                            <div class="w-100 ps-3">
                                                <h6 class="mb-1 fs-3 fw-semibold lh-base">@lang('Logo & Favicon')</h6>
                                                <span class="fs-2 d-block text-body-secondary">@lang('Change Logo & Favicon')</span>
                                            </div>
                                        </a>
                                    @endcan
                                </div>
                                <div class="d-grid py-4 px-7 pt-8">
                                    <a href="{{ route('admin.logout') }}" class="btn btn-outline-primary"><i
                                            class="dropdown-menu__icon las la-sign-out-alt"></i>
                                        @lang('Logout')</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="with-vertical bg-theam1">
            <nav class="navbar navbar-expand-lg p-0 ps-3">
                <ul class="navbar-nav">
                    <li class="nav-item rounded-circle ms-n2">
                        <a href="javascript:void(0)"
                            class="nav-link rounded-circle mx-0 ms-n1 d-flex d-lg-none align-items-center justify-content-center"
                            type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                            aria-controls="offcanvasWithBothOptions">
                            <i class="ti ti-align-justified fs-7"></i>
                        </a>
                    </li>
                </ul>
                @include('admin.partials.navbar-desktop')
            </nav>
            @include('admin.partials.navbar-mobile')
        </div>
    </div>
</header>
<!--  Top nav End -->

<!--  sidebar for support -->
<div id="supportModal" class="supprt-overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar()">&times;</a>    
</div>
 
<!--  -->
@push('script')
    <script>
        $('.support-btn').on('click', function() {
            document.getElementById("supportModal").style.width = "25vw";
        });
        function closeSidebar() {
            document.getElementById("supportModal").style.width = "0vw";
        }
    </script>
@endpush

@push('script-lib')
    <script src="{{ asset('assets/admin-new/libs/block-ui/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets/admin-new/libs/jquery-ui-1.14.0.custom/jquery-ui.min.js') }}"></script>
    <script>
        "use strict";
        const blockUi = () => {
            $.blockUI({
                message: '<i class="fa fa-spinner fa-spin text-white fs-5"></i>',
                overlayCSS: {
                    backgroundColor: "#000000",
                    opacity: 0.5,
                    cursor: "wait",
                },
                css: {
                    border: 0,
                    padding: 0,
                    color: "#333333",
                    backgroundColor: "transparent",
                },
                baseZ: 1100
            });
        }

        const unBlockUi = () => {
            setTimeout(() => {
                $.unblockUI();
            }, 100);
        }

        (function($) {
            $("#search-booking").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('admin.search-booking') }}",
                        type: 'get',
                        dataType: "json",
                        data: {
                            search: request.term
                        },
                        success: function(data) {
                            const bookings = data.bookings.map(function(booking) {
                                booking.value =
                                    `<h5 class="mb-1">${booking.firstname} ${booking.lastname}</h5><span class="d-block">${booking.booking_number} <small class="ms-2 fw-bold px-3 rounded text-white bg-${booking.color}">${booking.type}</small></span><span><i class="ti ti-mail-opened me-2 "></i> ${booking.email}</span><span class=""><i class="ti ti-phone me-2"></i> ${booking.mobile}</span><br><span class><i class="ti ti-calendar me-2"></i> ${booking.check_in} - ${booking.check_out}</span>`;
                                return booking;
                            });
                            response(bookings);
                        }
                    });
                },
                select: function(event, ui) {
                    event.preventDefault();
                    window.location.href = ui.item.details_route;
                }
            }).data("ui-autocomplete")._renderItem = function(ul, item) {
                return $("<li>").append(item.value).appendTo(ul);
            };
        })(jQuery);
    </script>
@endpush
