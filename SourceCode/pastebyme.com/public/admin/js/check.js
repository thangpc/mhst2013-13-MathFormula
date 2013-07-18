var message = new Array();
message['update_success'] = 'Cập nhật dữ liệu thành công!';
message['delete_success'] = 'Xoá dữ liệu thành công!';
message['error_connection'] = 'Lỗi kết nối. Vui lòng thử lại sau!';

$( document ).ready(function() {

	$('.btn_check_sim').click(function() {
		var number = parseInt($('#number').val());
		if (isNaN(number)) {
			alert('Yêu cầu nhập dạng số');
			document.check_sim.reset();
			document.check_sim.number.focus();
			return false;
		}
		
		$.ajax({
			url: ADMIN_URL + '/check-sim',
			type: 'post',
			dataType: 'json',
			cache: false,
			data: $('#check_sim').serialize(),

			success: function(msg) {
				if (msg.status == 'OK') {
					$('#info').show();
					$('#name').text('Cách đọc: ' + msg.data.name);
					var net;
					if (msg.data.type_sim == 1) net = 'Mobifone';
					if (msg.data.type_sim == 2) net = 'Vinaphone';
					if (msg.data.type_sim == 3) net = 'Viettel';
					if (msg.data.type_sim == 4) net = 'Vietnamobile';
					if (msg.data.type_sim == 5) net = 'Sfone';
					if (msg.data.type_sim == 6) net = 'Beeline';
					if (msg.data.type_sim == 7) net = 'Cố định';
					$('#network').text('Mạng: ' + net);
					$('#real_price').text('Giá đại lý: ' + msg.data.real_price + ' VNĐ');
					$('#price').text('Giá bán: ' + msg.data.price + ' VNĐ');
					$('#acc_value').text('Tài khoản: ' + msg.data.acc_value + ' VNĐ');
					$('#agent_id').text('Thuộc đại lý: ' + msg.data.agent);
				} else if (msg.status == 'none') {
					alert('Số này không tồn tại trong hệ thống. Hãy nhập lại.');
					$('#info').hide();
					document.check_sim.reset();
					document.check_sim.number.focus();
				} else {
					alert(message['error_connection']);
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
			}
		})

		return false;
	})

	$('.btn_delete_number').click(function() {
		var number = parseInt($('.number').val());
		if (isNaN(number)) {
			alert('Yêu cầu nhập dạng số');
			document.delete_number.reset();
			document.delete_number.number.focus();
			return false;
		}
		
		$.ajax({
			url: ADMIN_URL + '/delete-number',
			type: 'post',
			dataType: 'json',
			cache: false,
			data: $('#delete_number').serialize(),

			success: function(msg) {
				if (msg.status == 'OK') {
					alert(message['delete_success']);
					window.location.href = ADMIN_URL + '/xoa-sim-trung';
				} else if (msg.status == 'none') {
					alert('Số này không tồn tại trong hệ thống. Hãy nhập lại.');
					document.delete_number.reset();
					document.delete_number.number.focus();
				} else {
					alert(message['error_connection']);
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
			}
		})

		return false;
	})

	$('.btn_add_news').click(function() {
		CKEDITOR.instances.WYSIWYG.updateElement();
		var title = $('#title').val();
		var content = $('#WYSIWYG').val();
		if (title == '' || content == '') {
			alert('Hãy điền đầy đủ thông tin');
			return false;
		}

		$.ajax({
			url: ADMIN_URL + '/create-news',
			type: 'post',
			dataType: 'json',
			cache: false,
			data: $('#add_news').serialize(),

			success: function(msg) {
				if (msg.status == 'OK') {
            		alert(message['update_success']);
            		window.location.href = ADMIN_URL + '/them-tin-tuc';
            	} else {
            		alert(message['error_connection']);
            	}
			},
			error: function (xhr, ajaxOptions, thrownError) {

			}
		})
		return false;
	})

	$('.btn_delete_news').click(function() {
		
		var id = $(this).attr("id");
		$.ajax({
			url: ADMIN_URL + '/delete-news',
			type: 'post',
			dataType: 'json',
			cache: false,
			data: 'id='+id,

			success: function(msg) {
				if (msg.status == 'OK') {
            		alert(message['delete_success']);
            		$('#row'+id).fadeOut(1000);
            	} else {
            		alert(message['error_connection']);
            	}
			},
			error: function (xhr, ajaxOptions, thrownError) {
			}
		})
	})

	$('.btn_change_pass').click(function() {

		var old_pass = $('#old_pass').val();
		var new_pass = $('#new_pass').val();
		var re_pass = $('#re_pass').val();

		if (old_pass == '' || new_pass == '' || re_pass == '') {
			alert('Hãy nhập đầy đủ thông tin.');
			return false;
		}

		$.ajax({
			url: ADMIN_URL + '/update-pass',
			type: 'post',
			dataType: 'json',
			cache: false,
			data: $('#change_pass').serialize(),

			success: function(msg) {
				alert(msg.status);
            	if (msg.status == 'OK') {
            		alert(message['update_success']);
            		window.location.href = ADMIN_URL;
            	} 
            },
            error: function (xhr, ajaxOptions, thrownError){
		    	//alert(xhr.statusText);
		    	//alert(thrownError);
		    }  

		});
		return false;
	})

	$('.btn_edit_agent').click(function() {
		$.ajax({
			url: ADMIN_URL + '/update-agent',
			type: 'post',
			dataType: 'json',
			cache: false,
			data: $('#edit_agent').serialize(),

			success: function(msg) {
            	if (msg.status == 'OK') {
            		alert(message['update_success']);
            		window.location.href = ADMIN_URL + '/danh-sach-dai-ly';
            	} else {
            		alert(message['error_connection']);
            	}
            },
            error: function (xhr, ajaxOptions, thrownError){
		    	//alert(xhr.statusText);
		    	//alert(thrownError);
		    }  

		});
		return false;
	})

	$('.btn_add_agent').click(function() {

		var name = $('#name').val();
		if (name == '') {
			alert('Chưa nhập tên đại lý!');
			return false;
		}
		$.ajax({
			url: ADMIN_URL + '/create-agent',
			type: 'post',
			dataType: 'json',
			cache: false,
			data: $('#add_agent').serialize(),

			success: function(msg) {
				if (msg.status == 'OK') {
            		alert(message['update_success']);
            		window.location.href = ADMIN_URL + '/them-dai-ly';
            	} else {
            		alert(message['error_connection']);
            	}
			},
			error: function (xhr, ajaxOptions, thrownError) {

			}
		})
		return false;
	})

	$('.btn_delete_agent').click(function() {
		
		var id = $(this).attr("id");
		$.ajax({
			url: ADMIN_URL + '/delete-agent',
			type: 'post',
			dataType: 'json',
			cache: false,
			data: 'id='+id,

			success: function(msg) {
				if (msg.status == 'OK') {
            		alert(message['delete_success']);
            		$('#row'+id).fadeOut(1000);
            	} else {
            		alert(message['error_connection']);
            	}
			},
			error: function (xhr, ajaxOptions, thrownError) {

			}
		})
	})

	$('.btn_submit_supporter').click(function() {
		
        $.ajax({
            url: ADMIN_URL + '/update-supporter',
            type: 'POST',
            dataType: 'json',
            cache: false,
            data: $('#supporter').serialize(),
            success: function(data1) {
            	var obj = jQuery.parseJSON(data1);
            	alert(obj['STATUS']);
            },
            error: function (xhr, ajaxOptions, thrownError){
		    	alert(xhr.statusText);
		    	alert(thrownError);
		    }  
        });
		
		return false;
	});

	$('.btn_add_sim').click(function() {
		var agent_id = $('.agent_id').val();
		
		window.location.href = ADMIN_URL + '/agent-' + agent_id + '-import-excel';

		return false;
	})

	$('.btn_save_order').click(function() {

		$.ajax({
			url: ADMIN_URL + '/update-order',
			type: 'post',
			dataType: 'json',
			cache: false,
			data: $('#edit_order').serialize(),

			success: function(msg) {
            	if (msg.status == 'OK') {
            		alert(message['update_success']);
            		window.location.href = ADMIN_URL + '/danh-sach-giao-dich';
            	} else {
            		alert(message['error_connection']);
            	}
            },
            error: function (xhr, ajaxOptions, thrownError){
		    	//alert(xhr.statusText);
		    	//alert(thrownError);
		    }  

		});
		return false;
	})

	$('.btn_delete_order').click(function() {
		
		var id = $(this).attr("id");
		$.ajax({
			url: ADMIN_URL + '/delete-order',
			type: 'post',
			dataType: 'json',
			cache: false,
			data: 'id='+id,

			success: function(msg) {
				if (msg.status == 'OK') {
            		alert(message['delete_success']);
            		window.location.href = ADMIN_URL + '/danh-sach-giao-dich';
            	} else {
            		alert(message['error_connection']);
            	}
			},
			error: function (xhr, ajaxOptions, thrownError) {

			}
		})
	})

	$('.btn_edit_page').click(function() {
		CKEDITOR.instances.WYSIWYG.updateElement();
		$.ajax({
			url: ADMIN_URL + '/update-page',
			type: 'post',
			dataType: 'json',
			cache: false,
			data: $('#edit_page').serialize(),

			success: function(msg) {
            	if (msg.status == 'OK') {
            		alert(message['update_success']);
            		window.location.reload();
            	} else {
            		alert(message['error_connection']);
            	}
            },
            error: function (xhr, ajaxOptions, thrownError){
		    	//alert(xhr.statusText);
		    	//alert(thrownError);
		    }  

		});
		return false;
	})

	$('.btn_edit_news').click(function() {
		CKEDITOR.instances.WYSIWYG.updateElement();
		$.ajax({
			url: ADMIN_URL + '/update-news',
			type: 'post',
			dataType: 'json',
			cache: false,
			data: $('#edit_news').serialize(),

			success: function(msg) {
            	if (msg.status == 'OK') {
            		alert(message['update_success']);
            		window.location.reload();
            	} else {
            		alert(message['error_connection']);
            	}
            },
            error: function (xhr, ajaxOptions, thrownError){
		    }  

		});
		return false;
	})

});







