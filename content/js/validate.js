// --------------------Quên mật khẩu------------------------
$(document).ready(function () {
	$("#forgot_form").validate({
		onfocusout: function(element) {$(element).valid()},
		highlight: function (element) {
			$('.notice').addClass("showStatus");
			$('.model_img').css('background-color', '#fd4244'),
				$('.model_img img').css('opacity', '0')
		},
		onfocusout: false,
		onkeyup: true,
		onkeydown: true,
		onclick: false,
		rules: {
			"email": {
				required: true,
				email: true,
			},
			"user_name": {
				required: true,
			},
		},
		messages: {
			"email": {
				required: "Bạn phải nhập trường email!",
				email: "Không đúng định dạng email",
			},
			"user_name": {
				required: "Bạn phải nhập tên tài khoản!",
			},
		},

		errorPlacement: function (error, element) {
			if (window.innerWidth < 992) {
				error.appendTo(".notice");
				error.insertAfter(element)
				$(".error").css({
					color: "red",
					"font-size": "14px",
					"margin-left": "15px",
					"display": "unset",
				})
			} else {
				error.appendTo(".notice")
			}
		},

		submitHandler: function () {
			$('.notice').addClass("showStatus");
			var email = $("#email").val()
			var user_name = $("#user_name").val()

			$.ajax({
				url: "../../site/action.php",
				type: "POST",
				data: {
					email: email,
					user_name: user_name,
					find_pass: "",
				},
				success: function (data) {
					$('.notice').css('display', 'flex'),
						$('.notice label').css('display', 'flex')
					if (data == "Đang chuyển hướng...") {
						$(".showStatus label:not('#resultErr')").css("display", "none")
						$('.notice.showStatus').css('background-color', '#53af42')
						$('.notice.showStatus i').css('display', 'none')
						$('.notice.showStatus .fa-check-circle').css('display', 'flex')

						var direct = setTimeout(function () {
							window.location = "../../site/account?action=reset_password&email=" + email
							clearTimeout(direct)
						}, 1500)
					}
					else {
						$('.model_img').css('background-color', '#fd4244'),
							$('.model_img img').css('opacity', '0')
						$(".showStatus label:not('#resultErr')").css("display", "none")
					}
					$('#resultErr').html(data)

				}
			})

		}
	});

	// --------------------Cập nhật mật khẩu------------------------

	$("#reset_password_form").validate({
		highlight: function (element) {
			$('.notice').addClass("showStatus");
		},
		onfocusout: false,
		onkeyup: true,
		onkeydown: true,
		onclick: false,
		rules: {
			"password": {
				required: true,
				minlength: 8,
			},
			"re_password": {
				required: true,
				equalTo: "#password",
			},
		},
		messages: {
			"password": {
				required: "Bạn phải nhập mật khẩu!",
				minlength: "Mật khẩu phải lớn hơn 8 ký tự!",
			},
			"re_password": {
				required: "Bạn chưa xác nhận mật khẩu!",
				equalTo: "Nhập lại mật khẩu không khớp!",
			},
		},


		errorPlacement: function (error, element) {
			if (window.innerWidth > 992) {
				error.appendTo(".notice");
			} else {
				error.insertAfter(element)
				$(".error").css({
					color: "red",
					"font-size": "14px",
					"margin-left": "15px",
					"display": "unset",
				})
			}
		},

		submitHandler: function () {
			$('.notice').addClass("showStatus");
			var url = window.location.search
			var url_request = url.slice(url.lastIndexOf('email=') + 6)
			var password = $("#password").val()
			var re_password = $("#re_password").val()
			$.ajax({
				url: "../../site/action.php",
				type: "POST",
				data: {
					password: password,
					re_password: re_password,
					email: url_request,
					reset_pass: "",
				},
				success: function (data) {
					$('.notice').css('display', 'flex'),
						$('.notice label').css('display', 'flex')
					if (data == "Cập nhật mật khẩu thành công!") {
						$(".showStatus label:not('#resultErr')").css("display", "none")
						$('.notice.showStatus').css('background-color', '#53af42')
						$('.notice.showStatus i').css('display', 'none')
						$('.notice.showStatus .fa-check-circle').css('display', 'flex')

						var direct = setTimeout(function () {
							window.location = "../../site/account",
								clearTimeout(direct)
						}, 3000)

					}
					else {
						$('.model_img').css('background-color', '#fd4244'),
							$('.model_img img').css('opacity', '0')
						$(".showStatus label:not('#resultErr')").css("display", "none")
					}
					$('#resultErr').html(data)
				}
			});

		}
	});

	// --------------------Đăng ký------------------------

	$("#register_form").validate({
		highlight: function (element) {
			$('.notice').addClass("showStatus");
		},
		onfocusout: false,
		onkeyup: true,
		onkeydown: true,
		onclick: false,
		rules: {
			"user_name": {
				required: true,
			},
			"password": {
				required: true,
				minlength: 8,
			},
			"re_password": {
				required: true,
				equalTo: "#password",
			},
			"email": {
				required: true,
				email: true,
			},
			"age": {
				required: true,
				digits: true,
			},
		},
		messages: {
			"user_name": {
				required: "Bạn phải nhập tên tài khoản!",
			},
			"password": {
				required: "Bạn phải nhập mật khẩu!",
				minlength: "Mật khẩu phải lớn hơn 8 ký tự!",
			},
			"re_password": {
				required: "Bạn chưa xác nhận mật khẩu!",
				equalTo: "Nhập lại mật khẩu không khớp!",
			},
			"email": {
				required: "Bạn phải nhập trường email!",
				email: "Không đúng định dạng email",
			},
			"age": {
				required: "Bạn chưa nhập tuổi!",
				digits: "Tuổi phải là một số nguyên dương",
			},
		},


		errorPlacement: function (error, element) {
			if (window.innerWidth > 992) {
				error.appendTo(".notice");
			} else {
				error.insertAfter(element)
				$(".error").css({
					color: "red",
					"font-size": "14px",
					"margin-left": "15px",
					"display": "unset",
				})
			}
		},

		submitHandler: function () {
			$('.notice').addClass("showStatus");
			var user_name = $('#user_name').val()
			var password = $("#password").val()
			var re_password = $("#re_password").val()
			var email = $("#email").val()
			var age = $("#age").val()
			$.ajax({
				url: "../../site/action.php",
				type: "POST",
				data: {
					user_name: user_name,
					password: password,
					re_password: re_password,
					email: email,
					age: age,
					register_account: "",
				},
				success: function (data) {
					$('.notice').css('display', 'flex'),
						$('.notice label').css('display', 'flex')
					if (data == "Tạo tài khoản thành công!") {
						$(".showStatus label:not('#resultErr')").css("display", "none")
						$('.notice.showStatus').css('background-color', '#53af42')
						$('.notice.showStatus i').css('display', 'none')
						$('.notice.showStatus .fa-check-circle').css('display', 'flex')

						var direct = setTimeout(function () {
							window.location = "../../site/account",
								clearTimeout(direct)
						}, 3000)

					}
					else {
						$('.model_img').css('background-color', '#fd4244'),
							$('.model_img img').css('opacity', '0')
						$(".showStatus label:not('#resultErr')").css("display", "none")
					}
					$('#resultErr').html(data)
				}
			});

		}
	});

	// --------------------Đăng nhập------------------------

	$("#login_form").validate({
		highlight: function (element) {
			$('.notice').addClass("showStatus");
		},
		onfocusout: false,
		onkeyup: true,
		onkeydown: true,
		onclick: false,
		rules: {
			"email": {
				required: true,
				email: true,
			},
			"password": {
				required: true,
			},
		},
		errorPlacement: function (error, element) {
			if (window.innerWidth > 992) {
				error.appendTo(".notice");
			} else {
				error.insertAfter(element)
				$(".error").css({
					color: "red",
					"font-size": "14px",
					"margin-left": "15px",
					"display": "unset",
				})
			}
		},

		messages: {
			"email": {
				required: "Bạn phải nhập trường email!",
				email: "Không đúng định dạng email",
			},
			"password": {
				required: "Bạn phải nhập mật khẩu!",
			},
		},

		submitHandler: function () {
			$('.notice').addClass("showStatus");
			var email = $("#email").val()
			var password = $("#password").val()
			var remember = ""
			if ($("#remember").is(':checked')) {
				var remember = "check";
			}
			$.ajax({
				url: "../../site/action.php",
				type: "POST",
				data: {
					email: email,
					password: password,
					login_account: "",
					remember: remember
				},
				success: function (data) {
					$('.notice').css('display', 'flex'),
						$('.notice label').css('display', 'flex')
					if (data == "Đăng nhập thành công!") {
						$(".showStatus label:not('#resultErr')").css("display", "none")
						$('.notice.showStatus').css('background-color', '#53af42')
						$('.notice.showStatus i').css('display', 'none')
						$('.notice.showStatus .fa-check-circle').css('display', 'flex')

						var direct = setTimeout(function () {
							var pre_page = document.referrer
							if (pre_page.includes("http://khaidangshop.online/site/account/") || pre_page.includes("https://khaidangshop.online/site/account/") || pre_page.includes("khaidangshop.online/site/account/")) {
								pre_page = "../homepage"
							}
							window.location = pre_page
							clearTimeout(direct)
						}, 1500)

					}
					else {
						$('.model_img').css('background-color', '#fd4244'),
							$('.model_img img').css('opacity', '0'),
						$(".showStatus label:not('#resultErr')").css("display", "none")
					}
					$('#resultErr').html(data)
				}
			});

		}
	});

	// --------------------Đổi mật khẩu------------------------

	$("#change_pass_form").validate({
		highlight: function (element) {
			$('.notice').addClass("showStatus");
		},
		onfocusout: false,
		onkeyup: true,
		onkeydown: true,
		onclick: false,
		rules: {
			"password": {
				required: true,
			},
			"new_password": {
				required: true,
				minlength: 8,
			},
			"re_new_password": {
				required: true,
				equalTo: "#new_password",
			},
		},
		messages: {
			"password": {
				required: "Bạn chưa nhập mật khẩu cũ!",
			},
			"new_password": {
				required: "Bạn chưa nhập mật khẩu mới!",
				minlength: "Mật khẩu phải lớn hơn 8 ký tự!",
			},
			"re_new_password": {
				required: "Bạn chưa xác nhận mật khẩu mới!",
				equalTo: "Nhập lại mật khẩu không khớp!",
			},
		},
		errorLabelContainer: '.notice',

		submitHandler: function () {
			$('.notice').addClass("showStatus");
			var password = $('#password').val()
			var new_password = $("#new_password").val()
			var re_new_password = $("#re_new_password").val()
			$.ajax({
				url: "../../site/action.php",
				type: "POST",
				data: {
					password: password,
					new_password: new_password,
					re_new_password: re_new_password,
					change_password: "",
				},
				success: function (data) {
					$('.notice').css('display', 'flex'),
						$('.notice label').css('display', 'flex')
					if (data == "Thay đổi mật khẩu thành công!") {
						$('.notice.showStatus').css('background-color', '#53af42')
						$('.notice.showStatus i').css('display', 'none')
						$('.notice.showStatus .fa-check-circle').css('display', 'flex')

						var direct = setTimeout(function () {
							window.location = "?direct=homepage",
								clearTimeout(direct)
						}, 1500)
					}
					else {
						$('.model_img').css('background-color', '#fd4244'),
							$('.model_img img').css('opacity', '0')
					}
					$('#resultErr').html(data)
				}
			});

		}
	});

	$("#infor_user").validate({

		onfocusout: false,
		onkeyup: true,
		onkeydown: true,
		onclick: false,
		rules: {
			"fullname": {
				required: true,
				minlength: 8,
			},
			"address": {
				required: true,
			},
			"phone_number": {
				required: true,
				minlength: 10,
				maxlength: 11,
				digits: true,
			},
			"payment_method": {
				required: true,
			},
		},
		messages: {
			"fullname": {
				required: "Bạn cần nhập họ và tên!",
				minlength: "Họ và tên phải lớn hơn 6 kí tự!"
			},
			"address": {
				required: "Bạn chưa nhập địa chỉ nhận hàng!",
			},
			"phone_number": {
				required: "Bạn chưa nhập số điện thoại liên hệ!",
				minlength: "Số điện thoại không đúng đọinh dạng!",
				maxlength: "Số điện thoại không đúng đọinh dạng!",
				digits: "Số điện thoại không đúng địng dạng!",
			},
			"payment_method": {
				required: "Bạn chưa chọn phương thức thanh toán!",
			},
		},

	});

	$("#warranty_form").validate({

		onfocusout: false,
		onkeyup: true,
		onkeydown: true,
		onclick: false,
		rules: {
			"fullname": {
				required: true,
				minlength: 8,
			},
			"phone_number": {
				required: true,
				minlength: 10,
				maxlength: 11,
				digits: true,
			},
			"province": {
				required: true,
			},
			"district": {
				required: true,
			},
			"product_name": {
				required: true,
			},
			"buy_date": {
				required: true,
			},
			"product_status": {
				required: true,
			}
		},
		messages: {
			"fullname": {
				required: "Bạn cần nhập họ và tên!",
				minlength: "Họ và tên phải lớn hơn 6 kí tự!"
			},
			"phone_number": {
				required: "Bạn chưa nhập số điện thoại liên hệ!",
				minlength: "Số điện thoại không đúng định dạng!",
				maxlength: "Số điện thoại không đúng định dạng!",
				digits: "Số điện thoại không đúng địng dạng!",
			},
			"province": {
				required: "Bạn chưa nhập tỉnh thành!",
			},
			"district": {
				required: "Bạn chưa nhập quận huyện!",
			},
			"product_name": {
				required: "Bạn chưa chọn sản phẩm!",
			},
			"buy_date": {
				required: "Bạn chưa điền ngày mua",
			},
			"product_status": {
				required: "Bạn chưa điền tình trạng sản phẩm!",
			}
		},

	});


	$("#main_personal_infor").validate({
		onfocusout: false,
		onkeyup: true,
		onkeydown: true,
		onclick: false,
		rules: {
			"user_name": {
				required: true,
			},
			"fullname": {
				required: true,
			},
			"phone_number": {
				required: true,
				minlength: 10,
				maxlength: 11,
				digits: true,
			},
			"address": {
				required: true,
			},
			"age": {
				digits: true,
			},
		},
		messages: {
			"user_name": {
				required: "Bạn chưa điền tên đăng nhập",
			},
			"fullname": {
				required: "Bạn chưa điền họ và tên",
			},
			"phone_number": {
				required: "Bạn chưa nhập số điện thoại liên hệ!",
				minlength: "Số điện thoại không đúng định dạng!",
				maxlength: "Số điện thoại không đúng định dạng!",
				digits: "Số điện thoại không đúng địng dạng!",
			},
			"address": {
				required: "Bạn chưa điền địa chỉ",
			},
			"age": {
				digits: "Lỗi định dạng"
			},
		},

	});

	$(".img_pi input:button").click(function () {
		$("#fileid").click();
	})

	$('#fileid').change(function (e) {
		var fileName = e.target.files[0].name;
		$("#show_img_name").text(fileName + ' đã được chọn.');
		console.log(this.files[0]);

	});
});

// $("#comment_form").validate({
//     onfocusout: false,
//     onkeyup: true,
//     onkeydown: true,
//     onclick: false,
//     rules: {
//         "cmt_content": {
//             required: true,
//             minLength: 6,
//         },
//     },
//     messages: {
//         "cmt_content": {
//             required: "Bạn chưa nhập nội dung bình luận!",
//             minlength: "Nội dung bình luận không được nhỏ hơn 6 kí tự!",
//         },
//     },

//     submitHandler: function () {
//         var url = window.location.search
//         var product_id = url.slice(url.lastIndexOf('id_pr=') + 6)
//         $.ajax({
//             url: "../../site/action.php",
//             type: "POST",
//             data: {
//                 content: $(".cmt_input > input").val(),
//                 product_id: product_id,
//                 exe_cmt: "",
//             },
//             success: function (result) {
//                 // var new_record = "<div class='cmt_detail'> <div class='cmt_detail_img'> <img src='anh' width='50'></div> <div class='cmt_detail_infor'><div class='cmt_detail_infor_top'><strong>khai dang</strong><span> - 10 phút trước</span></div><p>";
//                 // $(new_record).insertBefore($(".all_cmt > .cmt_detail")[0]);
//                 // if (result == "Thành công!") {
//                 //     location.reload()
//                 // } else {
//                 //     window.location = "../../site/account/"
//                 // }
//                 alert(result);
//             }
//         })

//     }
// });

