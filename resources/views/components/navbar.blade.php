<!-- ===== Navbar ===== -->
<nav class="navbar">
<div class="nav-left">
<a href="{{ route('customer.dashboard') }}" class="logo-text">🌿 YAH NURSERY</a>
</div>
<ul class="nav-links">
<li><a href="{{ route('customer.dashboard') }}" class="{{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">Dashboard</a></li>
<li><a href="{{ route('customer.profile') }}" class="{{ request()->routeIs('customer.profile') ? 'active' : '' }}">My Profile</a></li>
<li><a href="{{ route('customer.profile.edit') }}" class="{{ request()->routeIs('customer.profile.edit') ? 'active' : '' }}">Edit Profile</a></li>
<li>
<a href="{{ route('cart.view') }}" 
class="{{ request()->routeIs('cart.view') ? 'active' : '' }}">
Cart
</a>
</li>    <li><a href="{{ route('customer.logout') }}">Logout</a></li>
</ul>
</nav>