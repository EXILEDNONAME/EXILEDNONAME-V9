<div class="dropdown">

  <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
    <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
      <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
      <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"> {{ Auth::User()->name }} </span>
      <div class="symbol symbol-35 symbol-circle">
        @if (Auth::User()->profile_avatar == 1 || Auth::User()->profile_avatar == null)
        <div class="symbol-label" style="background-image:url('/assets/backend/media/users/blank.png')"></div>
        @else
        <div class="symbol-label" style="background-image:url('/profile_avatar/user/{{ Auth::User()->id}}/{{ Auth::User()->profile_avatar}}')"></div>
        @endif
        <i class="symbol-badge symbol-badge-bottom bg-success"></i>
      </div>
    </div>
  </div>

  <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
    <ul class="navi navi-hover py-4">
      <li class="navi-item"><a href="/dashboard/profile" class="navi-link"><span class="navi-text"> Profile </span></a></li>
      <li class="navi-item"><a id="logout_user" href="{{ URL::Current() }}#" class="navi-link"><span class="navi-text"> Logout </span></a></li>
    </ul>
  </div>

</div>
