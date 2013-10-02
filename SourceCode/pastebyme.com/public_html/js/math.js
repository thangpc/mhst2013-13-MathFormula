$(document).ready(function() {

	//preview formula
	$('#preview').click(function() {
		var latex = $('#latex-source').val();
		if (latex == "") {
			$('.status').attr('class', 'status error').html('Please enter your formula!');
			return false;
		}
		$('.result').fadeIn(1500);
		$('#latex-source').show();
		$('#latex-image').html('<img id="latex-image" src="http://latex.numberempire.com/render?'+latex+'" alt="show latex to image">');
		$('.embedtoforum').html('<input onclick="this.select()" readonly value="[IMG]http://latex.numberempire.com/render?'+latex+'[/IMG]">');
		$('.linkimage').html('<input onclick="this.select()" readonly value="http://latex.numberempire.com/render?'+latex+'">');
		$('.down').attr('href', 'http://latex.codecogs.com/gif.latex?'+latex);
		window.scrollTo(0,document.body.scrollHeight);
		return false;	
	});

	// save formula to database
	$('#publish').click(function() {
		var latex = $('#latex-source').val();
		var title = $('#title').val();
		if (latex == "") {
			$('.status').attr('class', 'status error').html('Please enter your formula!');
			return false;
		}

		$.ajax({
            type: "POST",
            url: PUBLIC_URL + 'save-formula',
            cache: false,
            dataType: 'json',
            data: $('#frm_formula').serialize(),
            
            beforeSend: function(msg) {
            	$('#publish').attr('class', 'btn-disable').attr('id', 'un-publish').attr("disabled", "disabled");
                $('.status').attr('class', 'status success').html('Saving <img src="'+PUBLIC_URL+'public_html/images/loading.gif" />');
            },

            success: function(msg) {            
                if (msg.data.status == 'success') {
                	document.frm_formula.reset();
                    window.location = PUBLIC_URL + 'formula/view-' + msg.data.id;
                } else {
                    $('.status').attr('class', 'status error').html(msg.data.message).fadeOut(2500);    
                    
                    if (msg.data.status == 'timeout') {
                        if (msg.data.login == 0) {
                            setTimeout(function() {
                                $('.status').html("You can't wait. <a href='"+PUBLIC_URL+"login'>Login</a> or  <a href='"+PUBLIC_URL+"sign-up'>Register</a> account now.").fadeIn(2500); 
                            }, 3000);
                        }
                    }
                }
            }
        });

		return false;		
	})
	
	//update formula to database
	$('#update-formula').click(function() {
		var latex = $('#latex-source').val();
		var title = $('#title').val();
		if (latex == "") {
			$('.status').attr('class', 'status error').html('Please enter your formula!');
			return false;
		}

		$.ajax({
            type: "POST",
            url: PUBLIC_URL + 'update-formula',
            cache: false,
            dataType: 'json',
            data: $('#frm_formula').serialize(),
            
            beforeSend: function(msg) {
            	$('#update-formula').attr('class', 'btn-disable').attr('id', 'un-publish').attr("disabled", "disabled");
                $('.status').attr('class', 'status success').html('Saving <img src="'+PUBLIC_URL+'public_html/images/loading.gif" />');
            },

            success: function(msg) {            
                if (msg.data.status == 'success') {
                	document.frm_formula.reset();
                    window.location = PUBLIC_URL + 'formula/view-' + msg.data.id;
                } else {
                    $('.status').attr('class', 'status error').html(msg.data.message).fadeOut(2500);
                    if (msg.data.status == 'timeout') {
                    	if (msg.data.time == 0) {
                    	}
                    }
                }
            }
        });

		return false;		
	})
	
});
