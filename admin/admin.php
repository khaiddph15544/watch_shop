<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang Chủ Quản Trị</title>
  <link rel="shortcut icon" href="../img/logo/logoo.png">
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <header>
    <div class="wrapper">
      <div class="menu">
        <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
        <label for="openSidebarMenu" class="sidebarIconToggle">
          <div class="spinner diagonal part-1"></div>
          <div class="spinner horizontal"></div>
          <div class="spinner diagonal part-2"></div>
        </label>
        <div id="sidebarMenu">
          <ul class="sidebarMenuInner">
            <li><a href="">Trang Trủ<span>Homestay Hanoi</span></a></li>

            <li class='sub-menu'><a href='../dia_diem/adshow_dd.php'>Quản lý địa điểm</a>
            </li>

            <li class='sub-menu'><a href='../homestay/adshow_dp.php'>Quản lý homestay</a>
            </li>

            <li class='sub-menu'><a href='../tin_tuc/adshow_tt.php'>Quản lý tin tức</a>
            </li>

            <li class='sub-menu'><a href='../loai_phong/adshow_lp.php'>Quản lý loại phòng</a>
            </li>

            <li class='sub-menu'><a href='../binh_luan/adshow_bl.php'>Quản lý bình luận</a>
            </li>

            <li class='sub-menu'><a href='../khach_hang/show_kh.php'>Quản Lý Khách Hàng</a>
            </li>

            <li class='sub-menu'><a href='../homestay/show_datphong.php'>Quản Lý Đặt Phòng</a>
            </li>

            <li class='sub-menu'><a href='../dau_cuoi/show_hoitro.php'>Quản Lý Hỗi Trợ</a>
            </li>
            <!-- <li class='sub-menu'><a href='#statistic'>Tổng Hợp Thống Kê<div class='fa fa-caret-down right'></div></a>
              <ul>
                <li><a href='#statistic'>Thống Kê Hàng Hóa</a></li>
                <li><a href='#statistic'>Biểu Đồ Thống Kê</a></li>
              </ul>
            </li> -->
          </ul>

        </div>
      </div>
      <div class="logo"><a href=""><img src="../img/logo/logoo.png" title="Trang Chủ Homestay Hanoi" width="50px"></a></div>
      <div class="text-title">
        <h5>Trang Trủ </h5>
        <h5>Quản Trị</h5>
      </div>
    </div>
    <div class="hello">
      <h3>Xin Chào</h3>
      <!-- <h3>" <?php echo $_SESSION['user']; ?> "</h3> -->
      <h3><a href="../khach_hang/formdx.php" class="logout">Đăng Xuất <i class="fas fa-sign-out-alt"></i></a></h3>
    </div>
  </header>
  <div class="container">
    <!-- Code chức năng  -->
  </div>

</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src="../js/admin.js"></script>

</html>