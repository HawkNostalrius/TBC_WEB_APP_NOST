<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                <strong>Dashboard</strong>
            </a>
            </li>
        <li>
            <a href="{!! url('/profil') !!}">Profil</a>
        </li>
        <li>
            <a href="{!! url('/script') !!}">
            @if (Auth::user()->hasRole('admin'))
                All Users/Scripts
            @else
                My Scripts
            @endif
            </a>
        </li>
    </ul>
</div>