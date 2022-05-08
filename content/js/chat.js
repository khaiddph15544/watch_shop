$(".btn_chat").click(function () {
    if ($("#content_message").val() == "") {
        return false;
    } else {
        var content_message = $("#content_message").val()
        var sender_id = $("#session_id").val()
        var recipient_id = $("#room_id_user").text()

        $.ajax({
            url: "../../site/action.php",
            type: "POST",
            data: {
                content: content_message,
                sender_id: sender_id,
                recipient_id: recipient_id,
                exe_message: ""
            },
            success: function (data) {
                $("#content_message").val("");
            }
        })
    }
})

setInterval(function () {
    $('.message_content').load('../../site/get_message.php');
}, 1000);


function chat_room(user_id) {
    $.ajax({
        url: "../../site/action.php",
        type: "POST",
        data: {
            user_id: user_id,
            chat_room: "",
        },
        success: function (data) {
            $(".chat_beside .list:last").prepend($("#beside_" + user_id))
            $(".chat_beside").css("display", "block")
            $(".list_user").css("display", "none")
            $(".room_chat").css("display", "block")
            $(".room_detail").html(data)
            $("#room_id_user").text(user_id)
            var list_beside = $(".chat_beside .list .box_user")
            if (list_beside.length >= 1) {
                for (var i = 0; i < list_beside.length; i++) {
                    list_beside.eq(i).css("margin-left", "29px")
                }
                list_beside.eq(0).css("margin-left", "10px")
                $(".chat_beside .fa-caret-right").css("display", "block")
            }
            else {
                $(".chat_beside .fa-caret-right").css("display", "none")
            }
            var icon_delete = $(".chat_beside .list .box_user .fa-times-circle")
            icon_delete.click(function () {
                $(this).closest(".box_user").remove()
            })
        }
    })
}



$(".chat_beside .back").click(function () {
    $(".list_user").css("display", "block")
    $(".room_chat").css("display", "none")
})

setInterval(function () {
    $.ajax({
        url: "../../site/action.php",
        type: "POST",
        data: {
            user_id: $("#room_id_user").text(),
            chat_room: "",
        },
        success: function (data) {
            $(".room_detail").html(data)
        }
    })
}, 1000);


setInterval(function () {
    $.ajax({
        url: "../../site/action.php",
        type: "POST",
        data: {
            show_list_user: "",
        },
        success: function (data) {
            $(".list_user").html(data)
        }
    })
}, 1000);




var list_beside = $(".chat_beside .list .box_user");

if (list_beside.length > 5) {
    $(".chat_beside .list").height(400);
}

$(".header_chat label .fa-times").click(function () {
    $(".chat_beside").css("opacity", "0")
    $(".box_chat").css("opacity", "0")
    $(".chat_beside").css("z-index", "-10")
    $(".box_chat").css("z-index", "-10")
})

$(".icon_chat img").click(function () {
    $(".chat_beside").css("opacity", "1")
    $(".box_chat").css("opacity", "1")
    $(".box_chat").css("visibility", "visible")
    $(".chat_beside").css("z-index", "100")
    $(".box_chat").css("z-index", "1000")
})

