require('./bootstrap');

// A $( document ).ready() block.
$(document).ready(function () {
    $('.delete_button').on('click', function () {
        console.log('click');
        let id = $(this).attr('data-id');
        let title_post = $(this).closest('.post').find('.title_post').text();
        console.log(title_post);
        if (id) {
            $('#name_post').text(title_post);
            let link = $('#form_delete').attr('action');
            let link_correct = link.replace(/link_here/g, id);
            $('#form_delete').attr('action', link_correct);
        }

    })
});
