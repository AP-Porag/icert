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
                    class="{{ request()->is('admin/users*') ? 'mm-active' : '' }}">
                    <a href="javascript: void(0);"
                       class="has-arrow waves-effect {{ request()->is('admin/users*') ? 'mm-active' : '' }}">
                        <i class="fas fa-users"></i>
                        <span>Administration</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li class="{{ request()->is('admin/users*') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.users.index') }}"
                               class="{{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                                Users
                            </a>
                        </li>

                        {{--                            <li class="{{ request()->is('admin/mentors*') ? 'mm-active' : '' }}">--}}
                        {{--                                <a href="{{ route('admin.mentors.index') }}"--}}
                        {{--                                   class="{{ (request()->routeIs('admin.mentors.index') || request()->routeIs('admin.mentors.create') || request()->routeIs('admin.mentors.edit')) ? 'active' : '' }}">--}}
                        {{--                                    Mentor--}}
                        {{--                                </a>--}}
                        {{--                            </li>--}}
                    </ul>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/information_updates.png')}}" alt=""><span> Information Updates </span>
                    </a>
                </li>

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

                <li>
                    <a href="#" class="waves-effect">
                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/entry.png')}}" alt=""><span> Entry </span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/receiving.png')}}" alt=""><span> Receiving </span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/grading.png')}}" alt=""><span> Grading </span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/labels.png')}}" alt=""><span> Labels </span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/completion.png')}}" alt=""><span> Completion </span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/shipping.png')}}" alt=""><span> Shipping </span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <img class="custom_menu_icon" src="{{asset('storage/settings/menu_icons/view.png')}}" alt=""><span> View </span>
                    </a>
                </li>

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
