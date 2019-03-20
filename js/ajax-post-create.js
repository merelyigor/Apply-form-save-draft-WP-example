// post_create_form -- reviews
$(document).ready(function () {

    function ajax_create_apply(submit_val, id_val) {

        let form = $('#apply'),
            form_data = new FormData();
// form fields
        form_data.append('action', 'post_apply');
        form_data.append('submit_value', submit_val);
        form_data.append('var', id_val);

        form_data.append('name-1', form.find('input[name="name-1"]').val());
        form_data.append('name-2', form.find('input[name="name-2"]').val());
        form_data.append('name-3', form.find('input[name="name-3"]').val());
        form_data.append('name-4', form.find('input[name="name-4"]').val());
        form_data.append('name-5', form.find('input[name="name-5"]').val());
        form_data.append('name-6', form.find('input[name="name-6"]').val());
        form_data.append('name-7', form.find('input[name="name-7"]').val());
        form_data.append('name-8', form.find('input[name="name-8"]').val());
        form_data.append('name-9', form.find('input[name="name-9"]').val());
        form_data.append('name-10', form.find('input[name="name-10"]').val());


        $.ajax({
            url: admin_ajax.url,
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'POST',
            success: function (success) {
                let parsed_data = JSON.parse(success);
                let url_redirect = parsed_data.data.url;


                if (url_redirect !== false) {
                    document.location.replace(url_redirect);
                }


                console.log(url_redirect);
                //form.get(0).reset();
                //let $popup = document.querySelector('#modal-getRequest');
                //$.fancybox.open($popup);
                //setTimeout(function () {
                //    $.fancybox.close($popup);
                //}, 5000);
            }
        });
    }

    function ajax_post_form() {
        $('.submit-js').on('click', function (event) {
            event.preventDefault();
            let submit_val = $(this).text();
            // console.log('submit_val ', submit_val);
            let id_val = $('#apply').find('input[name="var"]').val();

            ajax_create_apply(submit_val, id_val);
        });
    }

    if ($('body').hasClass('single-form-post') || $('body').hasClass('page-template-form-php')) {
        ajax_post_form();
    }

});


