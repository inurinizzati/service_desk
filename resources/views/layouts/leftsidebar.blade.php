<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y mx-3 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
            data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">
                  <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                       <div class="menu-item pt-5">
                            <div class="menu-content">
                                <span class="menu-heading fw-bold text-uppercase fs-7">Menu</span>
                            </div>
                            <!-- Dashboard Admin Section -->
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('#') ? ' active' : '' }}"
                                    href="#">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-element-11 fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title fw-semibold">Dashboard</span>
                                </a>
                            </div>

                            <!-- Dashboard Technian Section -->
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('#') ? ' active' : '' }}"
                                    href="#">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-element-11 fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title fw-semibold">Dashboard</span>
                                </a>
                            </div>

                            <!-- Dashboard Student Section -->
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('#') ? ' active' : '' }}"
                                    href="#">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-element-11 fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title fw-semibold">Dashboard</span>
                                </a>
                            </div>

                            <!-- Ticket List Student Section -->
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('ticket.list') ? ' active' : '' }}"
                                    href="{{ route('ticket.list') }}">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-directbox-default fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title fw-semibold">Ticket list</span>
                                </a>
                            </div>

                            <!-- Ticket List Admin Section -->
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('admin.ticket.list') ? ' active' : '' }}"
                                    href="{{ route('admin.ticket.list') }}">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-office-bag fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title fw-semibold">Ticket list</span>
                                </a>
                            </div>
                            <!-- Ticket List Technian Section -->
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('technician.ticket.list') ? ' active' : '' }}"
                                    href="{{ route('technician.ticket.list') }}">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-office-bag fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title fw-semibold">Ticket list</span>
                                </a>
                            </div>

                            <!-- Feedback Student Section -->
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('feedback.index') ? ' active' : '' }}"
                                    href="{{ route('feedback.index') }}">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-star fs-2"> </i>
                                    </span>
                                    <span class="menu-title fw-semibold">Feedback</span>
                                </a>
                            </div>

                            <!-- Feedback Admin Section -->
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('feedback.index_admin') ? ' active' : '' }}"
                                    href="{{ route('feedback.index_admin') }}">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-star fs-2"> </i>
                                    </span>
                                    <span class="menu-title fw-semibold">Feedback</span>
                                </a>
                            </div>

                            <!-- Feedback Technian Section -->
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('feedback.index_technian') ? ' active' : '' }}"
                                    href="{{ route('feedback.index_technian') }}">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-star fs-2"> </i>
                                    </span>
                                    <span class="menu-title fw-semibold">Feedback</span>
                                </a>
                            </div>

                            <!-- User Account Section -->
                            <div class="menu-item pt-5">
                                <div class="menu-content">
                                    <span class="menu-heading fw-bold text-uppercase fs-7">User Account </span>
                                </div>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('#') ? ' active' : '' }}"
                                    href="#">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-profile-circle fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title fw-semibold">Profile</span>
                                </a>
                            </div>
                        </div>
                  </div>
            </div>
        </div>
    </div>
    <div class="aside-footer flex-column-auto py-5" id="kt_aside_footer">
        <a href="{{ route('logout') }}" class="btn btn-flex btn-custom btn-danger w-100"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
            <span class="btn-label">Log Out</span>
            <i class="ki-duotone ki-exit-left ms-2 fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="post">
            @csrf
        </form>
    </div>
</div>
