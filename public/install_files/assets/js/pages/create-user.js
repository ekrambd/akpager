$(document).ready(function () {

    $("#createUserFormBtn").on('click', function (e) {
        e.preventDefault();

        // current button text
        var currentText = $(this).text();
        
        //action url
        var action_url = $("#createUserForm").attr('action');

        // ajax form submit
        var formData = $("#createUserForm").serialize();

        // change button text loading....
        $(this).text('Loading...');
        // button disabled
        $(this).prop('disabled', true);

        $("#createUserForm input").prop('disabled', true);
        $("#db_error").html('').hide();

        $.post(action_url, formData, (response) => {

            if(response && response.message){
                // Handle the server response here
                var html = `<div class="alert alert-success" role="alert">  ${response.message} </div>`;

                $("#db_error").html(html).show();

                $(this).prop('disabled', false);
                // change button text loading....
                $(this).text('Redirecting...');
                // button disabled
                $(this).prop('disabled', true);

                setTimeout(() => {
                    window.location.href = next_url;
                }, 3000);
            }
            
        }).fail((e) => {

            try {
                // get response text
                var res = JSON.parse(e.responseText);
                var message = res['message'] ? res['message'] : '';

                var html = `<div class="alert alert-danger" role="alert">  ${message} </div>`;

                $("#db_error").html(html).show();

            } catch (error) {}

            // change button text old text
            $(this).text(currentText);
            // button enable
            $(this).prop('disabled', false);
            // enable all input field
            $("#createUserForm input").prop('disabled', false);

        });

    });
});
