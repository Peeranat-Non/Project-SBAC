<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo mb-3">
    <a href="index.html" class="navbar-brand d-flex align-items-center">
      <h1 class="m-0">
        <img class="img-fluid me-3" src="./assets/img/logo.png" alt="" />
      </h1>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item">
      <a href="department.php" class="menu-link <?php if($menu=="department"){echo "active";} ?> ">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Analytics">จัดการแผนก</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="member.php" class="menu-link <?php if($menu=="member"){echo "active";} ?> ">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Analytics">จัดการสมาชิก</div>
      </a>
    </li>

    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Account Settings">จัดการหน้าเว็บ</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="carousel.php" class="menu-link <?php if($menu=="carousel"){echo "active";} ?> ">
            <div data-i18n="Account">ภาพสไลด์</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="news.php" class="menu-link <?php if($menu=="news"){echo "active";} ?> ">
            <div data-i18n="Notifications">ข่าวสารจากระบบ</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="activity.php" class="menu-link <?php if($menu=="activity"){echo "active";} ?> ">
            <div data-i18n="Notifications">กิจกรรมจากระบบ</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Account Settings">จัดการบทความ</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="blog_type.php" class="menu-link <?php if($menu=="blog_type"){echo "active";} ?> ">
            <div data-i18n="Account">ประเภทบทความ</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="blog.php" class="menu-link <?php if($menu=="blog"){echo "active";} ?> ">
            <div data-i18n="Notifications">บทความ</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Authentications">จัดการเอกสาร</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="type.php" class="menu-link <?php if($menu=="type"){echo "active";} ?> ">
            <div data-i18n="Basic">ประเภทเอกสาร</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="doc.php" class="menu-link <?php if($menu=="doc"){echo "active";} ?> ">
            <div data-i18n="Basic">เอกสาร</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item">
      <a href="form.php" class="menu-link <?php if($menu=="form"){echo "active";} ?> ">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Analytics">จัดการแบบฟอร์ม</div>
      </a>
    </li>
  </ul>
</aside>