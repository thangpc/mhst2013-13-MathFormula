$(function(){

	//preview formular
	$('#preview').click(function() {
		var latex = $('#latex-source').val();
		if (latex == "") {
			$('.status').attr('class', 'status error').html('Please enter your formular!');
			return false;
		}
		$('.result').fadeIn(1500);
		$('#latex-source').show();
		$('#latex-image').html('<img id="latex-image" src="http://latex.codecogs.com/gif.latex?'+latex+'" alt="show latex to image">');
		$('.embedtoforum').html('<input readonly value="[IMG]http://latex.codecogs.com/gif.latex?'+latex+'[/IMG]">');
		$('.linkimage').html('<input readonly value="http://latex.codecogs.com/gif.latex?'+latex+'">');
		$('.down').attr('href', 'http://latex.codecogs.com/gif.latex?'+latex);
		window.scrollTo(0,document.body.scrollHeight);
		return false;	
	});

	// save formular to database
	$('#publish').click(function() {
		var latex = $('#latex-source').val();
		var title = $('#title').val();
		if (latex == "") {
			$('.status').attr('class', 'status error').html('Please enter your formular!');
			return false;
		}

		$.ajax({
            type: "POST",
            url: PUBLIC_URL + 'save-formular',
            cache: false,
            dataType: 'json',
            data: $('#frm_formular').serialize(),
            
            beforeSend: function(msg) {
            	$('#publish').attr('class', 'btn-disable').attr('id', 'un-publish').attr("disabled", "disabled");
                $('.status').attr('class', 'status success').html('Saving <img src="'+PUBLIC_URL+'public_html/images/loading.gif" />');
            },

            success: function(msg) {            
                if (msg.data.status == 'success') {
                	document.frm_formular.reset();
                    window.location = PUBLIC_URL + 'formular/view-' + msg.data.id;
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
	
	//update formular to database
	$('#update-formular').click(function() {
		var latex = $('#latex-source').val();
		var title = $('#title').val();
		if (latex == "") {
			$('.status').attr('class', 'status error').html('Please enter your formular!');
			return false;
		}

		$.ajax({
            type: "POST",
            url: PUBLIC_URL + 'update-formular',
            cache: false,
            dataType: 'json',
            data: $('#frm_formular').serialize(),
            
            beforeSend: function(msg) {
            	$('#update-formular').attr('class', 'btn-disable').attr('id', 'un-publish').attr("disabled", "disabled");
                $('.status').attr('class', 'status success').html('Saving <img src="'+PUBLIC_URL+'public_html/images/loading.gif" />');
            },

            success: function(msg) {            
                if (msg.data.status == 'success') {
                	document.frm_formular.reset();
                    window.location = PUBLIC_URL + 'formular/view-' + msg.data.id;
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
