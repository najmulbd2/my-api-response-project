@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<div id="sidebar" class="app-sidebar">
    <!-- BEGIN scrollbar -->
    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
        <!-- BEGIN menu -->
        <div class="menu">
            <div class="menu-header">Navigation</div>
            <div class="menu-item {{ ($route == 'dashboard')? 'active':'' }}">
                <a href="{{ route('dashboard') }}" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </div>

            <div class="menu-header">Main Menu</div>

            <div class="menu-item has-sub {{ ($route == 'view.contact')? 'active':'' }} {{ ($route == 'add.contact')? 'active':'' }}{{ ($route == 'edit.contact')? 'active':'' }}">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-pen"></i></span>
                    <span class="menu-text">Contact</span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ ($route == 'view.contact')? 'active':'' }}">
                        <a href="{{ route('view.contact') }}" class="menu-link">
                            <span class="menu-text">@if ($route == 'view.contact' | $route == 'edit.contact')<i class='bx bx-loader bx-spin text-theme'></i>@endif List Contact</span>
                        </a>
                    </div>
                    <div class="menu-item {{ ($route == 'add.contact')? 'active':'' }}">
                        <a href="{{ route('add.contact') }}" class="menu-link">
                            <span class="menu-text">@if ($route == 'add.contact')<i class='bx bx-loader bx-spin text-theme'></i>@endif Add Contact</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="menu-item has-sub {{ ($route == 'view.product')? 'active':'' }} {{ ($route == 'add.product')? 'active':'' }}{{ ($route == 'edit.product')? 'active':'' }}">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="fa-brands fa-apple"></i></span>
                    <span class="menu-text">Product</span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ ($route == 'view.product')? 'active':'' }}">
                        <a href="{{ route('view.product') }}" class="menu-link">
                            <span class="menu-text">@if ($route == 'view.product')<i class='bx bx-loader bx-spin text-theme'></i>@endif List Product</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="menu-item has-sub {{ ($route == 'view.food')? 'active':'' }} {{ ($route == 'add.food')? 'active':'' }}{{ ($route == 'edit.food')? 'active':'' }}">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="fa-brands fa-apple"></i></span>
                    <span class="menu-text">Food</span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ ($route == 'view.food')? 'active':'' }}">
                        <a href="{{ route('view.food') }}" class="menu-link">
                            <span class="menu-text">@if ($route == 'view.food')<i class='bx bx-loader bx-spin text-theme'></i>@endif List Food</span>
                        </a>
                    </div>
                    <div class="menu-item {{ ($route == 'add.food')? 'active':'' }}">
                        <a href="{{ route('add.food') }}" class="menu-link">
                            <span class="menu-text">@if ($route == 'add.food')<i class='bx bx-loader bx-spin text-theme'></i>@endif Add Food</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="menu-item has-sub {{ ($route == 'view.info')? 'active':'' }} {{ ($route == 'add.info')? 'active':'' }}{{ ($route == 'edit.info')? 'active':'' }}">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-pen"></i></span>
                    <span class="menu-text">My info</span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ ($route == 'view.info')? 'active':'' }}">
                        <a href="{{ route('view.info') }}" class="menu-link">
                            <span class="menu-text">@if ($route == 'view.info' | $route == 'edit.info')<i class='bx bx-loader bx-spin text-theme'></i>@endif List Info</span>
                        </a>
                    </div>
                    <div class="menu-item {{ ($route == 'add.info')? 'active':'' }}">
                        <a href="{{ route('add.info') }}" class="menu-link">
                            <span class="menu-text">@if ($route == 'add.info')<i class='bx bx-loader bx-spin text-theme'></i>@endif Add Info</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="menu-item has-sub {{ ($route == 'view.user')? 'active':'' }} {{ ($route == 'add.user')? 'active':'' }}">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="far fa-user"></i></span>
                    <span class="menu-text">User</span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ ($route == 'view.user')? 'active':'' }}">
                        <a href="{{ route('view.user') }}" class="menu-link">
                            <span class="menu-text">@if ($route == 'view.user')<i class='bx bx-loader bx-spin text-theme'></i>@endif List User</span>
                        </a>
                    </div>
                    <div class="menu-item {{ ($route == 'add.user')? 'active':'' }}">
                        <a href="{{ route('add.user') }}" class="menu-link">
                            <span class="menu-text">@if ($route == 'add.user')<i class='bx bx-loader bx-spin text-theme'></i>@endif Add User</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="menu-divider"></div>

            <div class="menu-header">Users</div>
            <div class="menu-item">
                <a href="profile.html" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-people"></i></span>
                    <span class="menu-text">Profile</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="calendar.html" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-calendar4"></i></span>
                    <span class="menu-text">Calendar</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="settings.html" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-gear"></i></span>
                    <span class="menu-text">Settings</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="helper.html" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-gem"></i></span>
                    <span class="menu-text">Helper</span>
                </a>
            </div>
        </div>
        <!-- END menu -->
        <div class="p-3 px-4 mt-auto">
            <a href="../../documentation/index.html" class="btn d-block btn-outline-theme">
                <i class="fa fa-code-branch me-2 ms-n2 opacity-5"></i> Documentation
            </a>
        </div>
    </div>
    <!-- END scrollbar -->
</div>
