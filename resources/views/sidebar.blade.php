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
            <a href="{!! url('/script') !!}">Scripts</a>
        </li>
        @if (Auth::user()->gm_level == 4)
            <li>
                <a href="#">All Users/Scripts</a>
            </li>
        @endif
    </ul>
</div>