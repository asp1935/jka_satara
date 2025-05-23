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
      <a class="nav-link collapsed" data-bs-target="#branch-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-diagram-3"></i><span>Manage Branches</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="branch-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('branch.index') }}">
            <i class="bi bi-circle"></i><span>Branches</span>
          </a>
        </li>
        <li>
          <a href="{{ route('sub_branch.index') }}">
            <i class="bi bi-circle"></i><span>Sub Branches</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#trainer-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-people"></i><span>Manage Trainers</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="trainer-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('admin.trainer.list') }}">
            <i class="bi bi-circle"></i><span>Trainer List</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.trainer.add') }}">
            <i class="bi bi-circle"></i><span>Add Trainer</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#website-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Manage Website</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="website-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('admin.add_slider') }}">
            <i class="bi bi-circle"></i><span>Manage Slider</span>
          </a>
        </li>

        <li>
          <a href="{{ route('admin.gallery.create') }}">
            <i class="bi bi-circle"></i><span>Manage Gallery </span>
          </a>
        </li>

        <li>
          <a href="{{ route('admin.news') }}">
            <i class="bi bi-circle"></i><span>Manage News</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.event') }}">
            <i class="bi bi-circle"></i><span>Manage Event </span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.syllabus') }}">
            <i class="bi bi-circle"></i><span>Manage Syllabus </span>
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