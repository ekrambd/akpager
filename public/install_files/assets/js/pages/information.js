$(document).ready(function () {

    $("#informationFormBtn").on('click', function (e) {
        e.preventDefault();

        // current button text
        var currentText = $(this).text();
        //action url
        var action_url = $("#informationForm").attr('action');

        // ajax form submit
        var formData = $("#informationForm").serialize();

        // change button text loading....
        $(this).text('Loading...');

        // button disabled
        $(this).prop('disabled', true);

        $("#informationForm input").prop('disabled', true);
        $("#db_error").html('').hide();

        $.post(action_url, formData, (response) => {

            $("#db-count-msg").hide();

            if(response && response.message && response.data){
                // Handle the server response here
                var html = `<div class="alert alert-success" role="alert">  ${response.message} </div>`;

                $("#db_error").html(html).show();
            }

            // change button text loading....
            $(this).text('Redirecting...');
            $(this).prop('disabled', true);

            setTimeout(() => {
               window.location.href = next_url;
            }, 3000);

        }).fail((e) => {

            // get response text
            var res = JSON.parse(e.responseText);
            var message = res['message'] ? res['message'] : '';

            var html = `<div class="alert alert-danger" role="alert">  ${message} </div>`;

            $("#db_error").html(html).show();

            // change button text old text
            $(this).text(currentText);
            // button enable
            $(this).prop('disabled', false);
            // enable all input field
            $("#informationForm input").prop('disabled', false);

        }).always(() => {
            $(".card-body").scrollTop(0);
        });
    });
});