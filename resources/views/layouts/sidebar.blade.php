<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
       
        <div class="sidebar-brand-text mx-3">
            Banking System
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{url('/dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - User -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fas fa-user"></i>
            <span>User</span></a>
    </li>
 
    <!-- Nav Item - User -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('deposit.index')}}">
            <i class="fas fa-dollar-sign"></i>
            <span>Deposit</span></a>
    </li>
    <!-- Nav Item - User -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('withdrawal.index')}}">
            <i class="fas fa-dollar-sign"></i>
            <span>Withdrawal</span></a>
    </li>

    <!-- Nav Item - User -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('transactions.index')}}">
            <i class="fas fa-dollar-sign"></i>
            <span>Transacation</span></a>
    </li>



</ul>