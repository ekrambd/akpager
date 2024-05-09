
$("#migrateSubmitBtn").on('click', function (e) {
    e.preventDefault();

    // change button text loading....
    $(this).text('Loading...');

    // button disabled
    $(this).prop('disabled', true);

    $("#migrationForm").submit();
});

// handle form
$("#migrationForm").on('submit', function (e) {
    e.preventDefault();

    var current_url = $(this).attr('action');

    $.post(current_url).done(function (response) {

        $(".card-body").scrollTop(0);

        if (response && response.message) {
            // Handle the server response here
            var html = `<div class="alert alert-success" role="alert">  ${response.message} </div>`;

            $("#db_error").html(html).show();
        }

        // change button text loading....
        $("#migrateSubmitBtn").text('Redirecting...');

        // button disabled
        $("#migrateSubmitBtn").prop('disabled', true);
        $(".card-body").scrollTop(0);

        setTimeout(() => {
            window.location.href = next_url;
        }, 3000);

    }).fail(function () {

    });

});
