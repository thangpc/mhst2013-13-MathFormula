$(function(){
	$('.preview').click(function() {
		var latex = $('#latex-source').val();
		if (latex == "") {
			alert("Please enter your formular!");
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
	})

	/*
	$('.reset').click(function() {
		var html = $('#html-source').text();
		alert(html);
		$('.textarea').nextAll().remove();				
		$('#editable-math').addClass('empty');

		$('#latex-source').val('');
		latexSource = "";
		//$('.result').hide();
		//$('.textarea').nextAll().add('<span class="cursor"></span>');
	})
	*/
});
