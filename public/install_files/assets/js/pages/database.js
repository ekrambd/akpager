$(document).ready(function () {

    //  database
    $("#databaseFormBtn").on('click', function (e) {
        e.preventDefault();

        // hide db_error message
        $("#db_error").html('').hide();

        // current button text
        var currentText = $(this).text();
        // 'this' refers to the jQuery object containing the selected element(s)
        // You can perform any action you want on the selected element(s) here

        // change button text loading....
        $(this).text('Loading...');
        // button disabled
        $(this).prop('disabled', true);

        // ajax form submit
        var formData = $("#databaseForm").serialize();
        // disable all input field
        $("#databaseForm input").prop('disabled', true);

        $.post(`${current_url}`, formData).done((response) => {

            $(".card-body").scrollTop(0);

            if (response && response.message) {
                // Handle the server response here
                var html = `<div class="alert alert-success" role="alert">  ${response.message} </div>`;

                $("#db_error").html(html).show();
            }

            // change button text loading....
            $(this).text('Redirecting...');

            // button disabled
            $(this).prop('disabled', true);
            $(".card-body").scrollTop(0);

            setTimeout(() => {
                window.location.href = next_url;
            }, 3000);

        }).fail((e) => {

            var message = "Database connection error.";

            if (e.responseText) {
                // get response text
                var res = JSON.parse(e.responseText);
                message = res['message'] ? res['message'] : '';
            }

            var html = `<div class="alert alert-danger" role="alert">  ${message} </div>`;

            $("#db_error").html(html).show();

            // button enable
            $(this).prop('disabled', false);
            // change button text old text
            $(this).text(currentText);
            // enable all input field
            $("#databaseForm input").prop('disabled', false);
            $(".card-body").scrollTop(0);

        });

    });
});
