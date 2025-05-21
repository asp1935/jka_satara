<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="{{ route('admin.dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#Category-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Branches</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="Category-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="#">
            <i class="bi bi-circle"></i><span>Add Branch</span>
          </a>
        </li>


      </ul>
    </li><!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#website-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Manage Website</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="website-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('admin.add_slider') }}">
            <i class="bi bi-circle"></i><span>Add Slider</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.news') }}">
            <i class="bi bi-circle"></i><span>Add News</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.event') }}">
            <i class="bi bi-circle"></i><span>Add Event </span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.syllabus') }}">
            <i class="bi bi-circle"></i><span>Add Syllabus </span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.contact') }}">
            <i class="bi bi-circle"></i><span>Contact us </span>
          </a>
        </li>



      </ul>
    </li><!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#student-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Manage Students</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="student-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('admin.student.list') }}">
            <i class="bi bi-circle"></i><span>Student List</span>
          </a>
        </li>


      </ul>
    </li><!-- End Components Nav -->

















  </ul>

</aside>
<!-- End Sidebar-->