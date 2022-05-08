function gototop() {
    var t = setInterval(function () {
        document.documentElement.scrollTop -= 40;
        if (document.documentElement.scrollTop <= 0) {
            clearInterval(t);
        }
    }, 1);
}

$(window).scroll(function () {
    if (scrollY >= 50) {
        $(".gototop").addClass("btn_gototop");
    }
    else {
        $(".gototop").removeClass("btn_gototop");
    }
});
$(document).ready(function () {
    $("#select_all").click(function () {
        $("table :checkbox").prop("checked", true);
    });

    $('#unselect_all').click(function () {
        $("table :checkbox").prop("checked", false);
    });

    $("#remove_all").click(function () {
        if ($(":checked").length === 0) {
            alert("Vui lòng chọn ít nhất một mục!");
            return false;
        }
        else {
            $result = confirm('Bạn có muốn xóa không?');
            if ($result == false) {
                return false;
            }
        }
    });
});


var path_name = window.location.pathname;
var infor = path_name.slice(6);
var new_infor = infor.split('/').join('');

$("#" + new_infor).addClass("active");




$("#confirmed").addClass("show_order_active");

$("#order_form div").css({
    display: "none"
})
$("#order_form .confirmed").css({
    display: "block"
})
// $("#confirm_order_one").css("display", "none")
$(".status_order h3").click(function () {
    $(".status_order h3").removeClass("show_order_active");
    $(this).addClass("show_order_active");

    if ($(".ed").hasClass("show_order_active")) {
        $("#order_form div").css({
            display: "none"
        })
        $("#order_form .confirmed").css({
            display: "block"
        })
        $("#confirm_order_one").css("display", "none")
    } else if ($(".delivering").hasClass("show_order_active")) {
        $("#order_form div").css({
            display: "none"
        })
        $("#order_form .delivery").css({
            display: "block"
        })
    } else if ($(".ing").hasClass("show_order_active")) {
        $("#order_form div").css({
            display: "none"
        })
        $("#order_form .wait_confirm").css({
            display: "block"
        })
        $("#confirm_order_one").css("display", "block")
    } else {
        $("#order_form div").css({
            display: "none"
        })
        $("#order_form .canceled").css({
            display: "block"
        })
    }
})
console.log( $('#'+d) ); // single quotes only
