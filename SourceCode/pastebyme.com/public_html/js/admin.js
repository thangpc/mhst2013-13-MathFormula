$(document).ready(function() {

    $('.btn-delete-formula').click(function() {
    	
    	var id = $(this).attr('id');
    	$.ajax({
            type: "POST",
            url: ADMIN_URL + 'formula/delete',
            cache: false,
            dataType: 'json',
            data: 'aid=' + id,
            
            beforeSend: function(msg) {
            },

            success: function(msg) {
                if (msg.data.status == 'success') {
                	alert('Delete success!');
                	$(".row-"+id).fadeOut(1500);
                } else {
                    alert(msg.data.message);
                }
            }
        });

    	return false;
    })

    $('.btn-delete-user').click(function() {
        
        var id = $(this).attr("id");        
        $.ajax({
            type: "POST",
            url: ADMIN_URL + 'user/delete',
            cache: false,
            dataType: 'json',
            data: 'aid=' + id,
            
            beforeSend: function(msg) {
            },

            success: function(msg) {
                if (msg.data.status == 'success') {
                    alert('Delete success!');
                    $(".row-"+id).fadeOut(1500);
                } else {
                    alert(msg.data.message);
                }
            }
        });

        return false;
    })

    $('.btn-block-user').click(function() {        
        var id = $(this).attr("id").trim();
        var act = $(".row-"+id+" .user-block").text().trim();
        var is_active = "";
        var btn_active = "";
        
        if (act == "actived") {
            is_active = "blocked";
            btn_active = "Un-Block";
        }
        else {
            is_active = "actived";
            btn_active = "Block";
        }
        $.ajax({
            type: "POST",
            url: ADMIN_URL + 'user/block',
            cache: false,
            dataType: 'json',
            data: 'aid=' + id,
            
            beforeSend: function(msg) {
            },

            success: function(msg) {
                if (msg.data.status == 'success') {
                    alert(is_active+' this user success!');
                    $(".row-"+id+' .user-block').text(is_active);
                    $(".row-"+id+' .btn-block-user').text(btn_active);
                } else {
                    alert(msg.data.message);
                }
            }
        });

        return false;
    })

    $('.btn-set-admin').click(function() {        
        var id = $(this).attr("id").trim();
        var act = $(".row-"+id+" .user-role").text().trim();
        var is_active = "";
        var btn_active = "";
        
        if (act == "user") {
            is_active = "admin";
            btn_active = "Set User";
        }
        else {
            is_active = "user";
            btn_active = "Set Admin";
        }
        $.ajax({
            type: "POST",
            url: ADMIN_URL + 'user/set-admin',
            cache: false,
            dataType: 'json',
            data: 'aid=' + id,
            
            beforeSend: function(msg) {
            },

            success: function(msg) {
                if (msg.data.status == 'success') {
                    alert($('.btn-set-admin').text().trim()+' success!');
                    $(".row-"+id+' .user-role').text(is_active);
                    $(".row-"+id+' .btn-set-admin').text(btn_active);
                } else {
                    alert(msg.data.message);
                }
            }
        });

        return false;
    })
})