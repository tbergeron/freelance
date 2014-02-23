$(function(){
    // date picker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
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

    // comment edit button
    $('.comment-edit').click(function(){
        var id = $(this).data('id'),
            that = this;

        $.ajax('/comment/edit/' + id).done(function (data) {
            console.log(data);
            $(that).parent().parent().parent().find('.comment-content').html(data);
            markdownEditor();
        });

        return false;
    });

});