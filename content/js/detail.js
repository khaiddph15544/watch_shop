// js nút cộng trừ số lượng 
var quantity_detail = $("#quantity_detail");
var count_detail = 1;
quantity_detail.val(count_detail)
$("#plus_detail").click(function () {
    count_detail += 1;
    if (count_detail > 99) {
        count_detail = 99;
    }
    quantity_detail.val(count_detail)
})
$("#minus_detail").click(function () {
    count_detail -= 1;
    if (count_detail == 0) {
        count_detail = 1;
    }
    quantity_detail.val(count_detail)
})

//Phân trang

//Thực hiện bình luận

$("#execute_comment").click(function () {
    var url = window.location.search
    var product_id = url.slice(url.lastIndexOf('id_pr=') + 6)
    $.ajax({
        url: "../../site/action.php",
        type: "POST",
        data: {
            content: $(".cmt_input > input").val(),
            product_id: product_id,
            exe_cmt: "",
        },
        success: function (result) {
            var new_record = "<div class='cmt_detail'> <div class='cmt_detail_img'> <img src='anh' width='50'></div> <div class='cmt_detail_infor'><div class='cmt_detail_infor_top'><strong>khai dang</strong><span> - 10 phút trước</span></div><p>";
            $(new_record).insertBefore($(".all_cmt > .cmt_detail")[0]);
            if (result == "Thành công!") {
                location.reload()
            } else if(result == "Bạn chưa đăng nhập!") {
                window.location = "../../site/account/"
            }else{
                $("#cmt_error").text(result)
            }
        }
    })
})

var data_comment = $(".cmt_detail"); // all cmt
var count_comment = data_comment.length;
$("#count_comment").text(count_comment); // In ra số cmt

var page_cmt = [];
var current_page_cmt = 0;
var index_cmt = 1;
for (var i = 0; i < count_comment; i += 4) {
    page_cmt[current_page_cmt] = data_comment.slice(i, i + 4);
    $(".pagination_cmt > ul").append('<li id=' + current_page_cmt + ' value=' + current_page_cmt + ' onclick="click_show_page_cmt(' + current_page_cmt + ')" >' + index_cmt++ + '</li>')
    current_page_cmt++;
}
// ---------------Hiện sản phẩm theo page_cmt

if (page_cmt.length <= 1) {
    $(".pagination_cmt ul").css('display', 'none');
    $(".pagination_cmt i").css('display', 'none');
}
if (count_comment > 0) {
    page_cmt[0].css({
        "position": "relative",
        "z-index": "0",
    })
    $(".pagination_cmt > ul > #0").css({ "background-color": "#EE4D2D", "color": "white" });
}

$(".main_comment .pagination_cmt > ul >  #0").addClass('current_page_cmt');

function click_show_page_cmt(current_page_cmt) {
    for (var i = 0; i <= page_cmt.length - 1; i++) {
        page_cmt[i].css({ "position": "absolute", "z-index": "-1" })
        $(".pagination_cmt > ul >  #" + i).css({ "background-color": "white", "color": "black" });
    }
    page_cmt[current_page_cmt].css({ "position": "relative", "z-index": "0" })
    $(".pagination_cmt > ul >  #" + current_page_cmt).css({ "background-color": "#EE4D2D", "color": "white" });
}


$(".pagination_cmt > .fa-angle-left").click(function () {
    var index_page_cmt = $("#index_page_cmt").val() - 1;
    console.log(index_page_cmt)
    if (index_page_cmt <= 0) {
        index_page_cmt = 1;
    }
    $("#index_page_cmt").val(index_page_cmt)
    for (var i = 0; i <= page_cmt.length - 1; i++) {
        page_cmt[i].css({ "position": "absolute", "z-index": "-1" })
        $(".pagination_cmt > ul >  #" + i).css({ "background-color": "white", "color": "black" });
    }
    page_cmt[--index_page_cmt].css({ "position": "relative", "z-index": "0" })
    $(".pagination_cmt > ul >  #" + index_page_cmt).css({ "background-color": "#EE4D2D", "color": "white" });

})

$(".pagination_cmt > .fa-angle-right").click(function () {
    var index_page_cmt = parseInt($("#index_page_cmt").val()) + 1;
    if (index_page_cmt >= page_cmt.length) {
        index_page_cmt = page_cmt.length;
    }
    $("#index_page_cmt").val(index_page_cmt)
    for (var i = 0; i <= page_cmt.length - 1; i++) {
        page_cmt[i].css({ "position": "absolute", "z-index": "-1" })
        $(".pagination_cmt > ul >  #" + i).css({ "background-color": "white", "color": "black" });
    }
    page_cmt[--index_page_cmt].css({ "position": "relative", "z-index": "0" })
    $(".pagination_cmt > ul >  #" + index_page_cmt).css({ "background-color": "#EE4D2D", "color": "white" });
})

// show sản phẩm tương tự

var list_card = $('.list_involve > .card');


if (list_card.length >= 4) {
    $('.list_involve').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        infinite: true,
        autoplaySpeed: 2000,
        prevArrow: "<i class='fa fa-angle-left'></i>",
        nextArrow: "<i class='fa fa-angle-right'></i>",
        responsive: [
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 1100,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
}else{
    $('.list_involve').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        infinite: true,
        autoplaySpeed: 2000,
        prevArrow: "<i class='fa fa-angle-left'></i>",
        nextArrow: "<i class='fa fa-angle-right'></i>",
        responsive: [
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 1100,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
}

var list_name = $(".cart_item")

var name_pr = $("#name_pr")


//Add to cart
function add_to_cart(user_id, product_id) {
    if ($("#check_session_js").text() == "") {
        var price = $("#new_cost").text()
        var last_price = price.replace(/[^0-9]/g, '')
        var quantity = $("#quantity_detail").val();
        $.ajax({
            url: "../../site/action.php",
            type: "POST",
            data: {
                user_id: user_id,
                product_id: product_id,
                price: last_price,
                quantity: quantity,
                addtocart: "",
            },
            success: function (data) {
            }

        })
        var cart = $('.cart');

        var find_img = $("#addtocart").parent('.btn').parent('.content').parent(".main_content").find("img").eq(0)
       
        if (find_img) {
            // nhân bản ảnh
            var imgclone = find_img.clone().offset({
                top: find_img.offset().top,
            }).css({
                'opacity': '0.8',
                'position': 'absolute',
                'height': '100px',
                'width': '100px',
                'left': '350px',
                'z-index': '100'
            }).appendTo($('body')).animate({
                'top': cart.offset().top + 20,
                'left': cart.offset().left + 30,
                'width': 50,
                'height': 50
            }, 1000);
            console.log(imgclone)

            var check_exist = ""
            for (var i = 0; i < list_name.length; i++) {
                if (list_name[i].value == name_pr.text()) {
                    check_exist = "yes"
                }
                console.log(list_name[i].value);

            }
            if (check_exist == "") {
                setTimeout(function () {
                    count++;
                    $(".count_cart_product span").text(count);
                }, 1500);
            }


            imgclone.animate({
                'width': 0,
                'height': 0
            }, function () {
                $(this).detach()
            });
        }
    } else {
        window.location = "../../site/account";
    }
}

$("#buy_now").click(function () {
    var url = window.location.search
    var product_id = url.slice(url.lastIndexOf('id_pr=') + 6)

    localStorage.setItem("product_id", product_id)
    localStorage.setItem("name", $("#name_pr").text())
    localStorage.setItem("quantity", $("#quantity_detail").val())
    localStorage.setItem("price", $("#new_cost").text().replace("đ", "").trim())

    window.location.href = '../cart?payment&buynow';

})