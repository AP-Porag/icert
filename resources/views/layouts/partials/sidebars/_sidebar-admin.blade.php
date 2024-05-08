<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title text-uppercase font-size-16">{{auth()->user()->user_type}}</li>

                <li>
                    <a href="{{route('home')}}" class="waves-effect">
                        <i class="fa fa-home"></i><span> Dashboard </span>
                    </a>
                </li>

                <li
                    class="{{ request()->is('admin/users*') || request()->is('admin/products*') || request()->is('admin/thirds*') || request()->is('admin/authenticators*') || request()->is('admin/promos*') || request()->is('admin/slpromos*')? 'mm-active' : '' }}">
                    <a href="javascript: void(0);"
                       class="has-arrow waves-effect {{ request()->is('admin/users*') ? 'mm-active' : '' }}">
                        <i class="fas fa-users"></i>
                        <span>Administration</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
{{--                        <li class="{{ request()->is('admin/customers*') ? 'mm-active' : '' }}">--}}
{{--                            <a href="{{ route('admin.customers.index') }}"--}}
{{--                               class="{{ request()->routeIs('admin.customers.index') ? 'active' : '' }}">--}}
{{--                                Customers--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li class="{{ request()->is('admin/products*') ? 'mm-active' : '' }}">--}}
{{--                            <a href="{{ route('admin.products.index') }}"--}}
{{--                               class="{{ request()->routeIs('admin.products.index') ? 'active' : '' }}">--}}
{{--                                Products--}}
{{--                            </a>--}}
{{--                        </li>--}}

                        <li class="{{ request()->is('admin/thirds*') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.thirds.index') }}"
                               class="{{ request()->routeIs('admin.third-party-drop-off.index') ? 'active' : '' }}">
{{--                                Name of Third Party Drop Off Center--}}
                                Third Party Drop Off Centers
                            </a>
                        </li>

                        <li class="{{ request()->is('admin/authenticators*') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.authenticators.index') }}"
                               class="{{ request()->routeIs('admin.authenticators.index') ? 'active' : '' }}">
                                Third Party Authenticators
                            </a>
                        </li>

                        <li class="{{ request()->is('admin/promos*') || request()->is('admin/slpromos*') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.promos.index') }}"
                               class="{{ request()->routeIs('admin.promos.index') ? 'active' : '' }}">
                                Promo Codes
                            </a>
                        </li>
                        @can('User')
                        <li class="{{ request()->is('admin/users*') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.users.index') }}"
                               class="{{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                                Users
                            </a>
                        </li>
                        @endcan

{{--                        <li class="{{ request()->is('admin/slpromos*') ? 'mm-active' : '' }}">--}}
{{--                            <a href="{{ route('admin.slpromos.index') }}"--}}
{{--                               class="{{ request()->routeIs('admin.slpromos.index') ? 'active' : '' }}">--}}
{{--                                Special Promo Codes--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </li>

{{--                <li--}}
{{--                    class="{{ request()->is('admin/users*') ? 'mm-active' : '' }}">--}}
{{--                    <a href="javascript: void(0);"--}}
{{--                       class="has-arrow waves-effect {{ request()->is('admin/users*') ? 'mm-active' : '' }}">--}}
{{--                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/information_updates.png')}}" alt="">--}}
{{--                        <span>Information Updates</span>--}}
{{--                    </a>--}}
{{--                    <ul class="sub-menu" aria-expanded="true">--}}
{{--                        <li class="{{ request()->is('admin/third-party-drop-off*') ? 'mm-active' : '' }}">--}}
{{--                            <a href="{{ route('admin.thirds.index') }}"--}}
{{--                               class="{{ request()->routeIs('admin.third-party-drop-off.index') ? 'active' : '' }}">--}}
{{--                                Third Party Drop Offs--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li class="{{ request()->is('admin/authenticators*') ? 'mm-active' : '' }}">--}}
{{--                            <a href="{{ route('admin.authenticators.index') }}"--}}
{{--                               class="{{ request()->routeIs('admin.authenticators.index') ? 'active' : '' }}">--}}
{{--                                Third Party Authenticators--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li class="{{ request()->is('admin/promos*') ? 'mm-active' : '' }}">--}}
{{--                            <a href="{{ route('admin.promos.index') }}"--}}
{{--                               class="{{ request()->routeIs('admin.promos.index') ? 'active' : '' }}">--}}
{{--                                Promo Codes--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li class="{{ request()->is('admin/slpromos*') ? 'mm-active' : '' }}">--}}
{{--                            <a href="{{ route('admin.slpromos.index') }}"--}}
{{--                               class="{{ request()->routeIs('admin.slpromos.index') ? 'active' : '' }}">--}}
{{--                                Special Promo Codes--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="#" class="waves-effect">--}}
{{--                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/information_updates.png')}}" alt=""><span> Information Updates </span>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li>
                    <a href="#" class="waves-effect">
                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/options.png')}}" alt=""><span> Options </span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/change_user.png')}}" alt=""><span> Change User </span>
                    </a>
                </li>

                @can('Customer')
                    <li class="{{ request()->is('admin/customers*') ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.customers.index') }}" class="waves-effect {{ request()->routeIs('admin.customers.index') ? 'active' : '' }}">
                            <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/customer.png')}}" alt=""><span> Customers </span>
                        </a>
                    </li>
                @endcan

                @can('Entry')
                <li class="{{ request()->is('admin/entries*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.entries.index') }}" class="waves-effect {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/entry.png')}}" alt=""><span> Entry </span>
                    </a>
                </li>
                @endcan

                @can('Receiving')
                <li>
                    <a href="#" class="waves-effect">
                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/receiving.png')}}" alt=""><span> Receiving </span>
                    </a>
                </li>
                @endcan

{{--                @can('Grading')--}}
{{--                    <li class="{{ request()->is('admin/roles*') ? 'mm-active' : '' }}">--}}
{{--                        <a href="{{ route('admin.roles.index') }}" class="waves-effect {{ request()->routeIs('admin.roles*') ? 'active' : '' }}">--}}
{{--                            <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/grading.png')}}" alt=""><span> Roles </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}

                @can('Grading')
                    <li class="{{ request()->is('admin/roles*') ? 'mm-active' : '' }}">
                        <a href="#" class="waves-effect">
                            <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/grading.png')}}" alt=""><span> Grading </span>
                        </a>
                    </li>
                @endcan

                @can('Label')
                <li>
                    <a href="#" class="waves-effect">
                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/labels.png')}}" alt=""><span> Labels </span>
                    </a>
                </li>
                @endcan

                @can('Completion')
                <li>
                    <a href="#" class="waves-effect">
                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/completion.png')}}" alt=""><span> Completion </span>
                    </a>
                </li>
                @endcan

                @can('Shipping')
                <li>
                    <a href="#" class="waves-effect">
                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/shipping.png')}}" alt=""><span> Shipping </span>
                    </a>
                </li>
                @endcan

                @can('Views')
                <li>
                    <a href="#" class="waves-effect">
                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/view.png')}}" alt=""><span> View </span>
                    </a>
                </li>
                @endcan

                <li class="{{ request()->is('admin/about*') ? 'mm-active' : '' }}">
                    <a href="{{route('admin.about.index')}}" class="waves-effect {{ request()->is('admin/about*') ? 'mm-active' : '' }}">
                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/about.png')}}" alt=""><span> About </span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
