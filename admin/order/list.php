<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../content/css/order.css">
</head>

<body>

    <div class="status_order">
        <h3 class="ed" id="confirmed">Đã hoàn tất (<?php echo count($order_confirmed) ?>)</h3>
        <h3 class="delivering" id="delivering">Đang giao hàng (<?php echo count($delivering) ?>)</h3>
        <h3 class="ing" id="wait_confirm">Chờ xác nhận (<?php echo count($order_wait_confirm) ?>)</h3>
        <h3 class="cancel" id="canceled">Đã hủy (<?php echo count($canceled) ?>)</h3>
    </div>
    <form action="" method="POST" id="order_form">
        <div class="confirmed">
            <?php if (count($order_confirmed) > 0) { ?>
                <table>
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày tạo đơn</th>
                            <th>Khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order_confirmed as $rows) { ?>
                            <tr>
                                <td><?php echo $rows['order_id'] ?></td>
                                <td><?php echo $rows['create_at'] ?></td>
                                <td><strong>(<?php echo $rows['user_id'] ?>)</strong> <?php echo $rows['fullname'] ?></td>
                                <td><?php echo $rows['address'] ?></td>
                                <td><?php echo $rows['phone_number'] ?></td>
                                <td>
                                    <a href="?controller=order_detail&order_id=<?php echo $rows['order_id'] ?>">Xem chi tiết</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <h2>Không có dữ liệu</h2>
            <?php } ?>
        </div>

        <div class="delivery">
            <?php if (count($delivering) > 0) { ?>
                <table>
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày tạo đơn</th>
                            <th>Khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($delivering as $rows) { ?>
                            <tr>
                                <td><?php echo $rows['order_id'] ?></td>
                                <td><?php echo $rows['create_at'] ?></td>
                                <td><strong>(<?php echo $rows['user_id'] ?>)</strong> <?php echo $rows['fullname'] ?></td>
                                <td><?php echo $rows['address'] ?></td>
                                <td><?php echo $rows['phone_number'] ?></td>
                                <td>
                                    <a href="?controller=order_detail&order_id=<?php echo $rows['order_id'] ?>">Xem chi tiết</a> |
                                    <a href="?cancel_order&order_id=<?php echo $rows['order_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">Hủy đơn</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <h2>Không có dữ liệu</h2>
            <?php } ?>
        </div>

        <div class="wait_confirm">
            <?php if (count($order_wait_confirm) > 0) { ?>
                <table>
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày tạo đơn</th>
                            <th>Khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order_wait_confirm as $rows) { ?>
                            <tr>
                                <td><?php echo $rows['order_id'] ?></td>
                                <td><?php echo $rows['create_at'] ?></td>
                                <td><strong>(<?php echo $rows['user_id'] ?>)</strong> <?php echo $rows['fullname'] ?></td>
                                <td><?php echo $rows['address'] ?></td>
                                <td><?php echo $rows['phone_number'] ?></td>
                                <td>
                                    <a href="?controller=order_detail&order_id=<?php echo $rows['order_id'] ?>">Xem chi tiết</a> |
                                    <a href="?cancel_order&order_id=<?php echo $rows['order_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">Hủy đơn</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a id="confirm_all" href="?confirm_all" onclick="return confirm('Xác nhận tất cả đơn hàng đã được giao hợp lệ?')">Xác nhận tất cả</a>
            <?php } else { ?>
                <h2>Không có dữ liệu</h2>
            <?php } ?>
        </div>


        <div class="canceled">
            <?php if (count($canceled) > 0) { ?>
                <table>
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày tạo đơn</th>
                            <th>Khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Ngày hủy đơn</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($canceled as $rows) { ?>
                            <tr>
                                <td><?php echo $rows['order_id'] ?></td>
                                <td><?php echo $rows['create_at'] ?></td>
                                <td><strong>(<?php echo $rows['user_id'] ?>)</strong> <?php echo $rows['fullname'] ?></td>
                                <td><?php echo $rows['address'] ?></td>
                                <td><?php echo $rows['phone_number'] ?></td>
                                <td><?php echo $rows['update_at'] ?></td>
                                <td>
                                    <a href="?controller=order_detail&order_id=<?php echo $rows['order_id'] ?>">Xem chi tiết</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <h2>Không có dữ liệu</h2>
            <?php } ?>
        </div>

    </form>
</body>

</html>