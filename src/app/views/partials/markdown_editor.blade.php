{{ HTML::script('packages/ace/ace.js') }}
<script>
    var textarea = $('textarea[name="{{ $id }}"]').hide();
    var editor = ace.edit("{{ $id }}").getSession();
    editor.setMode("ace/mode/markdown");
    editor.maxLines =


    editor.setValue(textarea.val());
    editor.on('change', function(){
        textarea.val(editor.getValue());
    });
</script>