<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">
  <li class="nav-item mb-2" data-toggle="tooltip" title="Whatsapp" data-placement="left">
    <a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-success" href="https://wa.me/{{ env('CONTACT_PHONE') }}/" target="_blank">
      <i class="fab fa-whatsapp"></i>
    </a>
  </li>
  <li class="nav-item mb-2" data-toggle="tooltip" title="Documentation" data-placement="left">
    <a class="btn btn-sm btn-icon btn-bg-light btn-icon-warning btn-hover-warning" href="/dashboard/documentation" target="_blank">
      <i class="fas fa-book-open"></i>
    </a>
  </li>
  <li class="nav-item" data-toggle="tooltip" title="Application Version {{ env('APP_VERSION') }}" data-placement="left">
    <a class="btn btn-sm btn-icon btn-bg-light btn-icon-danger btn-hover-danger">
      <i class="fas fa-info-circle"></i>
    </a>
  </li>
</ul>
