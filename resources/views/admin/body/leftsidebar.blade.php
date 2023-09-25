@php
    $id = Auth::user()->id;
    $adminData = App\Models\User::find($id);
    $status = $adminData->status;
@endphp
<div class="left-side-menu">
    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ !empty($adminData->image) ? asset('uploads/admin/img/' . $adminData->image) : asset('uploads/admin/img/no_image.jpg') }}"
                alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">{{ $adminData->username }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">
                @if ($status == 'active')
                    Admin Head
                @else
                    <span class="text-danger">Admin is Inactive</span>
                @endif
            </p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ url('admin/dashboard') }}">
                        <i class="ri-dashboard-line"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                @if ($status == 'active')
                    @if (Auth::user()->can('home.menu'))
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="ri-home-2-line"></i>
                                <span> Home </span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->can('about.menu'))
                        <li>
                            <a href="{{ route('about') }}">
                                <i class="ri-information-line"></i>
                                <span>About</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->can('skills.menu'))
                        <li>
                            <a href="{{ route('all.skills') }}">
                                <i class="ri-equalizer-line"></i>
                                <span>Skills</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->can('service.menu'))
                        <li>
                            <a href="{{ route('all.services') }}">
                                <i class="ri-tools-fill"></i>
                                <span>Services</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->can('testimonial.menu'))
                        <li>
                            <a href="{{ route('all.testimonials') }}">
                                <i class="ri-chat-quote-line"></i>
                                <span>Testimonials</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->can('contact.menu'))
                        <li>
                            <a href="{{ route('add.contact') }}">
                                <i class="ri-contacts-book-2-line"></i>
                                <span>contacts</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->can('message.menu'))
                        <li>
                            <a href="{{ route('all.messages') }}">
                                <i class="ri-message-2-line"></i>
                                <span>Messages</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->can('settings.menu'))
                        <li>
                            <a href="#sidebarContacts" data-bs-toggle="collapse">
                                <i class="ri-settings-2-line"></i>
                                <span> Settings </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarContacts">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('admins') }}">Admins</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('all.permissions') }}">permissions</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('all.roles') }}">Roles</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('add.role.permission') }}">Add Roles Permission</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('all.role.permission') }}">All Roles Permissions</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif

                @endif

            </ul>
        </div>
        </li>
        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
