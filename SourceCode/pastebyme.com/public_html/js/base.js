$(document).ready(function() {

    initMathQuill();

    $('#btn-login').click(function() {
        var username = $('#username').val();
        var password = $('#password').val();
        if (username.length < 4 || username.length >25) {
            $('.status').attr('class', 'status error').html('Username must be from 4 - 25 characters.');
            $('#username').focus();
            return false;
        }
        if (password.length < 4) {
            $('.status').attr('class', 'status error').html('Password must be from 4 - 25 characters.');
            $('#password').focus();
            return false;
        }
        $.ajax({
            type: "POST",
            url: PUBLIC_URL + 'login-check',
            cache: false,
            dataType: 'json',
            data: $('#frm_login').serialize(),
            
            beforeSend: function(msg) {
                $('.status').attr('class', 'status success').html('Logging <img src="'+PUBLIC_URL+'public_html/images/loading.gif" />');
            },

            success: function(msg) {            
                if (msg.data.status == 'success') {
                    window.location.href = document.referrer;
                    window.location.href = PUBLIC_URL;
                } else {
                    $('.status').attr('class', 'status error').html(msg.data.message);
                }
            }
        });
        
        return false;
    });
    
    $('#btn-signup').click(function() {

        var username = $('#username').val();
        var password = $('#password').val();
        var email = $('#email').val();

        if (username.length < 4 || username.length >25) {
            $('.status').attr('class', 'status error').html('Username must be from 4 - 25 characters.');
            $('#username').focus();
            return false;
        }
        if (password.length < 4) {
            $('.status').attr('class', 'status error').html('Password must be from 4 - 25 characters.');
            $('#password').focus();
            return false;
        }
        if ( !validateEmail(email) ) {            
            $('.status').attr('class', 'status error').html('Email not valid.');
            $('#email').focus();
            return false;
        }
        $.ajax({
            type: "POST",
            url: PUBLIC_URL + 'check-sign-up',
            cache: false,
            dataType: 'json',
            data: $('#frm_signup').serialize(),
            
            beforeSend: function(msg) {
                $('#btn-signup').attr("disabled", "disabled");
                $('.status').attr('class', 'status success').html('Checking <img src="'+PUBLIC_URL+'public_html/images/loading.gif" />');
            },

            success: function(msg) {            
                if (msg.data.status == 'success') {
                    window.location.href = document.referrer;
                    window.location.href = PUBLIC_URL;                    
                } else {
                    $('#btn-signup').removeAttr("disabled");
                    $('.status').attr('class', 'status error').html(msg.data.message);
                }
            }
        });
        
        return false;
    });
    
    $('#btn-change-pass').click(function() {

        var oldPassword = $('#old-password').val();
        var password = $('#password').val();
        var rePassword = $('#re-password').val();

        if (oldPassword.length < 4 || oldPassword.length > 25) {
            $('.status').attr('class', 'status error').html('Old password must be from 4 - 25 characters.');
            $('#old-password').focus();
            return false;
        }
        if (password.length < 4 || password.length > 25) {
            $('.status').attr('class', 'status error').html('New password must be from 4 - 25 characters.');
            $('#password').focus();
            return false;
        }
        if (rePassword.length < 4 || rePassword.length > 25) {
            $('.status').attr('class', 'status error').html('Re-password must be from 4 - 25 characters.');
            $('#re-password').focus();
            return false;
        }
        if (password != rePassword) {
            $('.status').attr('class', 'status error').html('New password not matched.');
            $('#re-password').focus();
            return false;
        }

        $.ajax({
            type: "POST",
            url: PUBLIC_URL + 'account/change-pass-ajax',
            cache: false,
            dataType: 'json',
            data: $('#frm_newpass').serialize(),
            
            beforeSend: function(msg) {
                $('#btn-change-pass').attr("disabled", "disabled");
                $('.status').attr('class', 'status success').html('Checking <img src="'+PUBLIC_URL+'public_html/images/loading.gif" />');
            },

            success: function(msg) {
                if (msg.data.status == 'success') {                    
                    $('.status').attr('class', 'status success').html('Updated.');
                    $('#frm_newpass')[0].reset();
                    $('#old-password').focus();                    
                } else {                    
                    $('.status').attr('class', 'status error').html(msg.data.message);
                }
                $('#btn-change-pass').removeAttr("disabled");
            }
        });
        
        return false;
    });

})

/* Init MathQuill */
function initMathQuill() {
    var LatexImages = false;
    function printTree(html) {
        html = html.match(/<[a-z]+|<\/[a-z]+>|./ig);
        if(!html) return '';
        var indent = '\n', tree = '';
        while(html.length)
        {
            var token = html.shift();
            if(token.charAt(0) === '<')
            {
                if(token.charAt(1) === '/')
                {
                    indent = indent.slice(0,-2);
                    if(html[0] && html[0].slice(0,2) === '</')
                        token += indent.slice(0,-2);
                }
                else
                {
                    tree += indent;
                    indent += '  ';
                }
                token = token.toLowerCase();
            }

            tree += token;
        }
        return tree.slice(1);
    }
    
    // add latex source
    var editingSource = false, latexSource = $('#latex-source'), htmlSource = $('#html-source'), latexMath = $('#editable-math').bind('keydown keypress', function()
    {
        setTimeout(function() {
            htmlSource.text(printTree(latexMath.mathquill('html')));
            var latex = latexMath.mathquill('latex');
            if(!editingSource)
                latexSource.val(latex);
            if(!LatexImages)
                return;
            latex = encodeURIComponent(latexSource.val());
        });
    }).keydown().focus();

    if(location.hash && location.hash.length > 1)
        latexMath.mathquill('latex', decodeURIComponent(location.hash.slice(1))).focus();
    
    var textarea = latexSource.focus(function(){
        editingSource = true;
    }).blur(function(){
        editingSource = false;
    }).bind('keydown keypress', function()
    {
        var oldtext = textarea.val();
        setTimeout(function()
        {
            var newtext = textarea.val();
            if(newtext !== oldtext)
            latexMath.mathquill('latex', newtext);
        });
    });
}
/* end mathquill */

/* validate email */
function validateEmail(email) { 
  // http://stackoverflow.com/a/46181/11236 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
