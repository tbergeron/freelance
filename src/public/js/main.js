$(function(){
    // date picker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });

    // expandable textarea
    $('textarea').each(function(){
        this.addEventListener('keyup', function() {
            growTextarea(this);
        }, false);

        growTextarea(this);
    });

});

function growTextarea(textarea) {
    textarea.style.overflow = 'hidden';
    textarea.style.height = 0;

    // never resize too small
    if (textarea.scrollHeight > 50) {
        textarea.style.height = textarea.scrollHeight + 'px';
    } else {
        textarea.style.height = '72px';
    }
}