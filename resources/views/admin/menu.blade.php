<div class="column is-3 ">
    <aside class="menu is-hidden-mobile">
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
            <li><a class="is-active" href="/admin">Dashboard</a></li>
            <li><a>Bug Reports</a></li>
        </ul>
        <p class="menu-label">
            Administration
        </p>
        <ul class="menu-list">
            <li><a href="{{ route('admin_users') }}">Manage Users</a></li>
            <li><a href="{{ route('admin_accesslevels') }}">Manage Access Levels</a></li>
            <li><a href="{{ route('admin_trainers') }}">Manage Trainers</a></li>
            <li><a href="{{ route('admin_raids') }}">Manage Raids</a></li>
            <li><a href="{{ route('admin_pokemon') }}">Manage Pokemon</a></li>
            <li>
                <a>Test</a>
                <ul>
                    <li><a>Add Test</a></li>
                    <li><a>Remove Test</a></li>
                </ul>
            </li>
        </ul>
        <p class="menu-label">
            Transactions
        </p>
        <ul class="menu-list">
            <li><a>Payments</a></li>
            <li><a>Transfers</a></li>
            <li><a>Balance</a></li>
            <li><a>Reports</a></li>
        </ul>
    </aside>
</div>
<div class="column is-9">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="/admin">Admin</a></li>
            <li class="is-active"><a href="#" aria-current="page">Manage Users</a></li>
        </ul>
    </nav>
