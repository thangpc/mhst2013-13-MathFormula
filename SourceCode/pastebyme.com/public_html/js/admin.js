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

})