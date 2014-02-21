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

    // Starring tasks
    $('.starred').click(function(){
        var id = $(this).data('id');
        var star = this;

        var emptyStar = function() {
            $(star).children('i').addClass('glyphicon-star-empty');
            $(star).children('i').removeClass('glyphicon-star');
        };

        var fillStar = function() {
            $(star).children('i').addClass('glyphicon-star');
            $(star).children('i').removeClass('glyphicon-star-empty');
        };

        $.ajax({
            url: '/task/stare',
            data: { id: id }
        }).done(function (data) {
            if (data.success) {
                if (data.starred) {
                    fillStar();
                } else {
                    emptyStar();
                }
            } else {
                alert('Error starring task! Look at the console to get more debug info.');
                console.log(data);
            }
        });

        return false;
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