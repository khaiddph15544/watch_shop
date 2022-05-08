function delete_user(id) {

    if (confirm("Bạn có muốn xóa không?")) {
        $.ajax({
            url: "../action.php",
            type: "post",
            data: {
                action: "delete",
                id_user: id
            },
            success: function (result) {
                $("#row_" + id).hide();
            }
        })
    }

}

function delete_cmt(id) {
    if (confirm("Bạn có muốn xóa không?")) {
        $.ajax({
            url: "../action.php",
            type: "post",
            data: {
                id_cmt: id,
                del_cmt: "",
            },
            success: function (result) {
                $("#row_" + id).hide();
            }
        })
    }

}