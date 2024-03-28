  <!-- Topbar Start -->
  <div class="container-fluid bg-dark text-white-50 py-2 px-0 d-none d-lg-block">
    <div class="row gx-0 align-items-center">
      <div class="col-lg-7 px-5 text-start">
        <div class="h-100 d-inline-flex align-items-center me-4">
          <small class="fa fa-phone-alt me-2"></small>
          <small>02-9726111-8</small>
        </div>
        <div class="h-100 d-inline-flex align-items-center me-4">
          <small class="far fa-envelope-open me-2"></small>
          <small>admin@sbac.ac.th</small>
        </div>
      </div>
      <div class="col-lg-5 px-5 text-end">
        <div class="h-100 d-inline-flex align-items-center">
          <a class="text-white-50 ms-4" href="https://www.facebook.com/sbacsaphanmai"><i class="bi bi-facebook"></i></a>
          <a class="text-white-50 ms-4" href="https://instagram.com/sbacsaphanmai?igshid=YmMyMTA2M2Y="><i class="bi bi-instagram"></i></a>
          <a class="text-white-50 ms-4" href=""><i class="bi bi-line"></i></a>
          <a class="text-white-50 ms-4" href="https://www.tiktok.com/@hi.deksbac"><i class="bi bi-tiktok"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Topbar End -->

  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
    <a href="index.html" class="navbar-brand d-flex align-items-center">
      <h1 class="m-0">
        <img class="img-fluid me-3" src="img/logo.png" alt="" />
      </h1>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
        <a href="./index.php" class="nav-item nav-link <?php if($menu=="index"){echo "active";} ?> ">หน้าหลัก</a>
        <a href="./search.php" class="nav-item nav-link <?php if($menu=="search"){echo "active";} ?> ">สืบค้นโครงงานและงานวิจัย</a>
        <a href="./blog.php" class="nav-item nav-link <?php if($menu=="blog"){echo "active";} ?> ">บทความ</a>
        <a href="./profile.php" class="nav-item nav-link <?php if($menu=="profile"){echo "active";} ?> ">ประวัติผู้ใช้งาน</a>
        <a href="./management.php" class="nav-item nav-link <?php if($menu=="management"){echo "active";} ?> ">บริหารจัดการโครงการ</a>
        <a href="./form.php" class="nav-item nav-link <?php if($menu=="form"){echo "active";} ?> ">ดาวน์โหลดแบบฟอร์ม</a>
      </div>
    </div>
    </div>
    <a type="button" a href="./logout.php" class="btn btn-danger">ออกจากระบบ</a>
  </nav>
  <!-- Navbar End -->