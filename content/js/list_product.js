var all_product = $(".product");
var list_product = $(".product");
var page;
var count_page;
var index;
var count_li;
function show_page() {
    $(".pagination_product >ul > li").remove("li");
    $("#index_page").val(1)
    list_product = $(".product");
    page = [];
    count_page = 0;
    index = 1;
    count_li = 1;
    for (var i = 0; i < list_product.length; i += 12) {
        page[count_page] = list_product.slice(i, i + 12);
        $(".pagination_product >ul").append('<li id=' + count_page + ' onclick="click_show_page(' + count_page + ')" >' + index++ + '</li>')
        count_page += 1;
    }
    page[0].css({ "position": "relative", "visibility": "visible" })
    $(".pagination_product >ul > #0").css({ "background-color": "#EE4D2D", "color": "white" });

    if (page.length < 2) {
        $(".pagination_product").css("display", "none")
    } else {
        $(".pagination_product").css("display", "flex")
    }
}


show_page();

function click_show_page(index_page) {
    var input_val = index_page + 1;
    $("#index_page").val(input_val);
    for (var i = 0; i <= page.length - 1; i++) {
        page[i].css({ "position": "absolute", "visibility": "hidden" })
        $(".pagination_product >ul > #" + i).css({ "background-color": "white", "color": "black" });
    }
    page[index_page].css({ "position": "relative", "visibility": "visible" })
    $(".pagination_product >ul > #" + index_page).css({ "background-color": "#EE4D2D", "color": "white" });
}

$(".list_sreach").html('');

$(".pagination_product > .fa-angle-left").click(function () {
    var index_page = $("#index_page").val() - 1;
    if (index_page <= 0) {
        index_page = 1;
    }
    $("#index_page").val(index_page)
    for (var i = 0; i <= page.length - 1; i++) {
        page[i].css({ "position": "absolute", "visibility": "hidden" })
        $(".pagination_product >ul > #" + i).css({ "background-color": "white", "color": "black" });
    }
    // console.log(index_page);
    page[--index_page].css({ "position": "relative", "visibility": "visible" })
    $(".pagination_product >ul > #" + index_page).css({ "background-color": "#EE4D2D", "color": "white" });

})

$(".pagination_product > .fa-angle-right").click(function () {
    var index_page = parseInt($("#index_page").val()) + 1;
    if (index_page >= page.length) {
        index_page = page.length;
    }
    $("#index_page").val(index_page)
    for (var i = 0; i <= page.length - 1; i++) {
        page[i].css({ "position": "absolute", "visibility": "hidden" })
        $(".pagination_product >ul > #" + i).css({ "background-color": "white", "color": "black" });
    }
    // console.log(index_page);
    page[--index_page].css({ "position": "relative", "visibility": "visible" })
    $(".pagination_product >ul > #" + index_page).css({ "background-color": "#EE4D2D", "color": "white" });
})


// Lọc
var count_tr_product = $(".main_right .right .product").length
$("#count_products").text('(' + count_tr_product + ')')
var filter_gender = [];
var list_brand = []
var filter_price = {
    "min": '',
    "max": ''
};
// lọc theo khoảng giá
$(".filter_by_price > #min").keyup(function () {
    filter_price = {
        "min": $(".filter_by_price > #min").val(),
        "max": $(".filter_by_price > #max").val(),
    }
})
$(".filter_by_price > #max").keyup(function () {
    filter_price = {
        "min": $(".filter_by_price > #min").val(),
        "max": $(".filter_by_price > #max").val(),
    }
})

$("#bt_filter_price").click(function () {
    $.ajax({
        url: "../action.php",
        type: "post",
        data: {
            list_brand: list_brand,
            number_gender: filter_gender,
            filter_price: filter_price
        },
        success: function (result) {
            $(".main_right > .right").html(result)
            show_page();

            var count_tr_product = $(".main_right .right .product").length

            $("#count_products").text('(' + count_tr_product + ')')
        }
    })
})


// theo Giới tính
$(".gender > input").click(function () {
    if ($(this).hasClass('checked')) {
        $(this).removeClass('checked')
        var index = $(this).val();
        for (var i = 0; i <= filter_gender.length; i++) {
            if (filter_gender[i] === index) {
                filter_gender.splice(i, 1)
            }
        }
        $.ajax({
            url: "../action.php",
            type: "post",
            data: {
                list_brand: list_brand,
                number_gender: filter_gender,
                filter_price: filter_price
            },
            success: function (result) {
                $(".main_right > .right").html(result)
                show_page();

                var count_tr_product = $(".main_right .right .product").length

                $("#count_products").text('(' + count_tr_product + ')')
            }
        })
    }
    else {
        var index = $(this).val();
        $(this).addClass('checked')
        filter_gender.push(index)
        $.ajax({
            url: "../action.php",
            type: "post",
            data: {
                list_brand: list_brand,
                number_gender: filter_gender,
                filter_price: filter_price
            },
            success: function (result) {
                if (list_brand.length == 0 && filter_gender.length == 0 || list_brand.length == 0 && filter_gender.length == 2) {
                    $(".main_right > .right").html(all_product)
                    show_page();
                }
                else {
                    $(".main_right > .right").html(result)
                    show_page();
                }

                var count_tr_product = $(".main_right .right .product").length

                $("#count_products").text('(' + count_tr_product + ')')
            }
        })
    }
})

//theo thương hiệu
var brand_id = $("#filter_at_home").text()
if (!isNaN(Number(brand_id))) {
    $("#brand_" + brand_id).attr("checked", "checked");
    $("#brand_" + brand_id).addClass('checked')
    list_brand.push(brand_id)
    $.ajax({
        url: "../action.php",
        type: "post",
        data: {
            list_brand: list_brand,
            number_gender: filter_gender,
            filter_price: filter_price
        },
        success: function (result) {
            $(".main_right > .right").html(result)
            show_page();

            var count_tr_product = $(".main_right .right .product").length

            $("#count_products").text('(' + count_tr_product + ')')
        }
    })
}
$(document).ready(function () {
    $(".brand > input").click(function () {

        if ($(this).hasClass('checked')) {
            $(this).removeClass('checked')
            var index = $(this).val();
            for (var i = 0; i <= list_brand.length; i++) {
                if (list_brand[i] === index) {
                    list_brand.splice(i, 1)
                }
            }
            $.ajax({
                url: "../action.php",
                type: "post",
                data: {
                    list_brand: list_brand,
                    number_gender: filter_gender,
                    filter_price: filter_price
                },
                success: function (result) {
                    if (list_brand.length == 0 && filter_gender.length == 0) {
                        $(".main_right > .right").html(all_product)
                        show_page();
                    }
                    else {
                        $(".main_right > .right").html(result)
                        show_page();
                    }
                    var count_tr_product = $(".main_right .right .product").length

                    $("#count_products").text('(' + count_tr_product + ')')

                }
            })
        }
        else {
            var index = $(this).val();
            $(this).addClass('checked')
            console.log($(this).text())
            list_brand.push(index)
            $.ajax({
                url: "../action.php",
                type: "post",
                data: {
                    list_brand: list_brand,
                    number_gender: filter_gender,
                    filter_price: filter_price
                },
                success: function (result) {
                    $(".main_right > .right").html(result)
                    show_page();

                    var count_tr_product = $(".main_right .right .product").length

                    $("#count_products").text('(' + count_tr_product + ')')
                }
            })
        }
    })
});


var url = window.location.search
var filter = url.slice(url.lastIndexOf('filter=') + 7)

if (filter == "men") {
    $("#nam").click();
} else if (filter == 'women') {
    $("#nu").click()
}

$(".filter_toggle").click(function(){
    $(".filter").slideToggle();
})

$(".view_toggle").click(function(){
    $(".best_viewer").slideToggle();
})