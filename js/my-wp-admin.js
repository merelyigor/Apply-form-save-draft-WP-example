$(document).ready(function () {

    function ajax_post_edit_share_status() {

        $('.select_share_status_js select').change(function () {
            let option_var = $($(this).find('option:selected')[0]).val(),
                post_id = $(this).parent().find('input[name="post_id"]').val(),
                form_data = new FormData();
// form fields
            form_data.append('action', 'post_edit_form');
            form_data.append('option-var', option_var);
            form_data.append('post-id', post_id);

            console.log('option_var', option_var);
            console.log('post_id', post_id);

            $.ajax({
                url: admin_ajax.url,
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'POST',
                success: function (success) {
                    console.log('success', success)
                    //form.get(0).reset();
                    //let $popup = document.querySelector('#modal-getRequest');
                    //$.fancybox.open($popup);
                    //setTimeout(function () {
                    //    $.fancybox.close($popup);
                    //}, 5000);
                }
            });
        })
    }

    function filter_post_show() {
        $obj = $('.select_share_status_js');

        $obj.each(function (i, elem) {
            if ($(this).hasClass('saved')) {
                console.log('saved');
                $(this).parents('tr').addClass('status_saved_draft');
            }
        });
    }


    if ($('body').hasClass('post-type-form-post') && $('body').hasClass('edit-php')) {
        ajax_post_edit_share_status();
        filter_post_show();
    }
});
