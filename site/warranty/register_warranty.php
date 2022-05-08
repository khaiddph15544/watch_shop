<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../content/css/warranty.css">
</head>

<body>

    <form action="" method="POST" id="warranty_form">
        <div class="register_warranty">
            <img src="./img/warranty_logo.png" alt="">
            <h1>ĐĂNG KÝ BẢO HÀNH SẢN PHẨM</h1>
            <hr>

            <div class="main_rw">
                <div>
                    <h2>Thông tin khách hàng</h2>
                    <p>Tên khách hàng</p> <input type="text" id="fullname" name="fullname" placeholder="Nhập tên khách hàng..."> <br>
                    <p>Điện thoại liên hệ</p> <input type="text" name="phone_number" placeholder="Nhập số diện thoại..."> <br>
                    <p>Tỉnh thành</p> <input type="text" name="province" placeholder="Nhập tỉnh / thành phố..."> <br>
                    <p>Quận huyện</p> <input type="text" name="district" placeholder="Nhập quận / huyện..."> <br>
                </div>
                <div>
                    <h2>Thông tin sản phẩm</h2>
                    <p>Tên sản phẩm</p>
                    <select name="product_name">
                        <option value="">Vui lòng chọn sản phẩm...</option>
                        <?php foreach ($list_product as $rows) { ?>
                            <option value="<?php echo $rows['product_id'] ?>"><?php echo $rows['product_name'] ?></option>
                        <?php } ?>
                    </select> <br>
                    <p>Ngày mua</p> <input type="date" name="buy_date" placeholder="Nhập ngày mua..."> <br>
                    <p>Tình trạng sản phẩm</p> <textarea name="product_status" maxlength="200" placeholder="Nhập tình trạng sản phẩm hiện tại... (Không quá 200 ký tự)"></textarea> <br>
                    <button name="btn_warranty">GỬI THÔNG TIN BẢO HÀNH</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>