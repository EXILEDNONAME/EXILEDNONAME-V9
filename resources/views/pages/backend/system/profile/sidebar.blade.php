<div class="flex-row-auto offcanvas-mobile w-300px w-xxl-300px" id="kt_profile_aside">
  <div class="card card-custom card-stretch">
    <div class="card-body pt-4">
      <hr>
      <div class="d-flex align-items-center">
        <div class="symbol symbol-60 symbol-circle symbol-xl-50 mr-5 align-self-start align-self-xxl-center">
          @if (strlen(Auth::User()->profile_avatar) == 1)
          <div class="symbol-label" style="background-image:url('/assets/backend/media/users/blank.png')"></div>
          @else
          <div class="symbol-label" style="background-image:url('/profile_avatar/user/{{ Auth::User()->id}}/{{ Auth::User()->profile_avatar}}')"></div>
          @endif
          <i class="symbol-badge symbol-badge-bottom bg-success"></i>
        </div>
        <div>
          <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary"> {{ Auth::User()->name }} </a>
          <span class="text-danger"> Administrator </span>
        </div>
      </div>

      <hr>

      <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
        <div class="navi-item mb-1">
          <a href="/dashboard/profile/timeline" class="navi-link py-4 {{ (request()->is('dashboard/profile/timeline')) ? 'active' : '' }}">
            <span class="navi-text font-size-lg text-center"> Timeline </span>
          </a>
        </div>
        <div class="navi-item mb-1">
          <a href="/dashboard/profile/account-information" class="navi-link py-4 {{ (request()->is('dashboard/profile/account-information')) ? 'active' : '' }}">
            <span class="navi-text font-size-lg text-center"> Account Information </span>
          </a>
        </div>
        <div class="navi-item">
          <a href="/dashboard/profile/change-password" class="navi-link py-4 {{ (request()->is('dashboard/profile/change-password')) ? 'active' : '' }}">
            <span class="navi-text font-size-lg text-center"> Change Password </span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
