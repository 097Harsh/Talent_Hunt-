<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{asset('admin/assets/img/AdminLTELogo.png')}}"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">TalentHunt </span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{route('dashboard')}}" class="nav-link active">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>
                        Dashboard
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ManagerUsers')}}" class="nav-link">
                    <i class="nav-icon bi bi-people-fill"></i>
                    <p>Manage Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ManageCourse')}}" class="nav-link">
                    <i class="nav-icon bi bi-mortarboard"></i>
                    <p>Manage Courses</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ManageSkills')}}" class="nav-link">
                    <i class="nav-icon bi bi-lightbulb"></i>
                    <p>Manage Skills</p>
                    </a>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->