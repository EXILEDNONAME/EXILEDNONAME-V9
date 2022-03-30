<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">

  <div class="brand flex-column-auto" id="kt_brand">
    <a href="index.html" class="brand-logo">
      <img alt="Logo" src="/assets/backend/media/logos/logo-light.png" />
    </a>
    <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
      <i class="icon-xl far fa-arrow-alt-circle-left"></i>
    </button>
  </div>

  <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
      <ul class="menu-nav">

        <li class="menu-item {{ (request()->is('dashboard')) ? 'menu-item-active' : '' }}">
          <a class="menu-link" onclick="location.href='/dashboard';">
            <i class="menu-icon fas fa-desktop"></i>
            <span class="menu-text"> Dashboard </span>
          </a>
        </li>
        <li class="menu-item {{ (request()->is('dashboard/messages*')) ? 'menu-item-active' : '' }}">
          <a class="menu-link" onclick="location.href='/dashboard/messages';">
            <i class="menu-icon fas fa-inbox"></i>
            <span class="menu-text"> Messages </span>
          </a>
        </li>

        <li class="menu-section">
          <h5 class="menu-text"> EXTENSIONS </h5>
          <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
        </li>
        <li class="menu-item {{ (request()->is('dashboard/documentation*')) ? 'menu-item-active' : '' }}">
          <a class="menu-link" onclick="location.href='/dashboard/documentation';">
            <i class="menu-icon fas fa-book-open"></i>
            <span class="menu-text"> Documentation </span>
          </a>
        </li>
        <li class="menu-item {{ (request()->is('dashboard/file-manager*')) ? 'menu-item-active' : '' }}">
          <a class="menu-link" onclick="location.href='/dashboard/file-manager';">
            <i class="menu-icon fas fa-hdd"></i>
            <span class="menu-text"> File Manager </span>
          </a>
        </li>
        <li class="menu-item {{ (request()->is('dashboard/statistics*')) ? 'menu-item-active' : '' }}">
          <a class="menu-link" onclick="location.href='/dashboard/statistics';">
            <i class="menu-icon fas fa-bug"></i>
            <span class="menu-text"> Statistics </span>
          </a>
        </li>

        <li class="menu-section">
          <h5 class="menu-text"> Dummies </h5>
          <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
        </li>
        <li class="menu-item {{ (request()->is('dashboard/dummy/tables*')) ? 'menu-item-submenu menu-item-here menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
          <a class="menu-link menu-toggle">
            <i class="menu-icon fas fa-table"></i>
            <span class="menu-text"> Tables </span>
            <i class="menu-arrow"></i>
          </a>
          <div class="menu-submenu" style="">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
              <li class="menu-item {{ (request()->is('dashboard/dummy/tables/generals*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a class="menu-link" onclick="location.href='/dashboard/dummy/tables/generals';">
                  <i class="menu-bullet menu-bullet-dot"><span></span></i>
                  <span class="menu-text"> Generals </span>
                </a>
              </li>
              <li class="menu-item {{ (request()->is('dashboard/dummy/tables/relations*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a class="menu-link" onclick="location.href='/dashboard/dummy/tables/relations';">
                  <i class="menu-bullet menu-bullet-dot"><span></span></i>
                  <span class="menu-text"> Relations </span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="menu-section">
          <h5 class="menu-text"> Settings </h5>
          <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
        </li>
        <li class="menu-item {{ (request()->is('dashboard/profile*')) ? 'menu-item-active' : '' }}">
          <a class="menu-link" onclick="location.href='/dashboard/profile';">
            <i class="menu-icon fas fa-user-alt"></i>
            <span class="menu-text"> Profile </span>
          </a>
        </li>
        <li class="menu-item {{ (request()->is('dashboard/managements*')) ? 'menu-item-submenu menu-item-here menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
          <a href="javascript:;" class="menu-link menu-toggle">
            <i class="menu-icon fas fa-table"></i>
            <span class="menu-text"> Managements </span>
            <i class="menu-arrow"></i>
          </a>
          <div class="menu-submenu" style="">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
              <li class="menu-item {{ (request()->is('dashboard/managements/accesses*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a class="menu-link" onclick="location.href='/dashboard/managements/accesses';">
                  <i class="menu-bullet menu-bullet-dot"><span></span></i>
                  <span class="menu-text"> Accesses </span>
                </a>
              </li>
              <li class="menu-item {{ (request()->is('dashboard/managements/users*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a class="menu-link" onclick="location.href='/dashboard/managements/users';">
                  <i class="menu-bullet menu-bullet-dot"><span></span></i>
                  <span class="menu-text"> Users </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="menu-item">
          <a class="menu-link" id="logout">
            <i class="menu-icon fas fa-sign-out-alt"></i>
            <span class="menu-text"> Logout </span>
          </a>
        </li>
      </ul>
    </div>
  </div>

</div>
