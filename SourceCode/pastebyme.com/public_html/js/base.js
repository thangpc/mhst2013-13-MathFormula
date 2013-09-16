
var LatexImages = false;
    $(function(){
        function printTree(html)
        {
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
        
        var editingSource = false, latexSource = $('#latex-source'), htmlSource = $('#html-source'), codecogs = $('#codecogs'), latexMath = $('#editable-math').bind('keydown keypress', function()
        {
            setTimeout(function() {
                htmlSource.text(printTree(latexMath.mathquill('html')));
                var latex = latexMath.mathquill('latex');
                if(!editingSource)
                    latexSource.val(latex);
                if(!LatexImages)
                    return;
                latex = encodeURIComponent(latexSource.val());
//            location.hash = '#'+latex; //extremely performance-crippling in Chrome for some reason
                codecogs.attr('src','http://latex.codecogs.com/gif.latex?'+latex).parent().attr('href','http://latex.codecogs.com/gif.latex?'+latex);
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
    });
    