<ul aria-expanded="false" class="collapse">
    <li><a href="{{ route('show.user.profile',auth()->user()->slug) }}"><i class="ti-user"></i> My Profile</a></li>
    <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
    <li> <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>




</ul>
