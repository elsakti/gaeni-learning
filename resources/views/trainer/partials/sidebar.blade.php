

<div class="col-xl-3 col-lg-3 col-md-12">
    <div class="dashboard__inner sticky-top">
        <div class="dashboard__nav__title">
            <h6>Welcome, {{ Auth::user()->name }} </h6>
        </div>
        <div class="dashboard__nav">
            <ul>
                <li>
                    <a href="{{ route('trainer_dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        Dashboard</a>
                </li>
                <li>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        My Profile - Coming Soon</a>
                </li>
            </ul>
        </div>
        <div class="dashboard__nav__title mt-40">
            <h6>Course Data</h6>
        </div>
        <div class="dashboard__nav">
            <ul>
                @foreach (Auth::user()->courses as $course)
                <li>
                    <a href="{{ route('trainer_detail_courses', $course->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        {{ $course->name }} - {{ $course->users ? $course->users->count() : '0' }} Students</a>
                </li>
                @endforeach
            </ul>
        </div>
        
        <div class="dashboard__nav__title mt-40">
            <h6>Menu</h6>
        </div>
        <div class="dashboard__nav">
            <ul>
                <li>
                    <a href="{{ route('home') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        Home</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-volume-1">
                            <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                            <path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                        </svg>
                        Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
