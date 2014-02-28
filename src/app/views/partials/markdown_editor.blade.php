{{ HTML::script('js/marked.js') }}
{{ HTML::script('js/editor.js') }}
<script>
    var markdownEditor = function(taller) {
        var editor = new Editor();
        editor.render();

        if (taller)
            $('.CodeMirror').height(400);
    };

    markdownEditor({{ ((isset($taller)) ? true : false) }});
</script>