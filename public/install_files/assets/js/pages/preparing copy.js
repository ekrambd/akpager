$(document).ready(function () {

    $("#migrateCount").hide();
    $("#seedCounter").hide();

    // init or start
    $("#permissionsStartBtn").on('click', function (e) {
        e.preventDefault();

        // change button text loading....
        $(this).text('Loading...');

        // button disabled
        $(this).prop('disabled', true);

        $("#migrationForm").submit();
    });

    // migration
    $("#migrationForm").on('submit', function (e) {
        e.preventDefault();

        var current_url = $(this).attr('action');
        $("#migrateCount").show();
        $("#seedCounter").show();

        async function start() {

            var request = await $.post(current_url);

            if(typeof request === 'object' && request.code === 200 && request.data){

                if(request.data.migration_count){

                    $("#migrateCount").text(`${request.data.migration_count}`);
                    $("#seedCounter").text(`${request.data.seeder_count}`);

                    setTimeout(() => {
                        $("#migrationForm").submit();
                    }, 200);
                }else if(request.data.migration_count === 0){
                    // seeding
                    $("#migrateCount").text('OK');
                    $("#seedCounter").text(`${request.data.seeder_count}`);

                    setTimeout(() => {
                        $("#seedingForm").submit();
                    }, 200);
                }else{
                    alert("Migration: Internet connection error");

                }
            }else if (typeof request === 'string'){
                $("#migrationForm").submit();
            }

            return new Promise((resolve, reject) => resolve(""))
        };

        start();

    });

    // seeding
    $("#seedingForm").on('submit', function (e) {
        e.preventDefault();


        async function start(current_url) {

            var request = await $.post(current_url);

            if(typeof request === 'object' && request.code === 200 && request.data){

                $("#seedCounter").text(`${request.data.seeder_count}`);

                if(request.data.seeder_count){
                    setTimeout(() => {
                        $("#seedingForm").submit();
                    }, 200);
                }else if (request.data.seeder_count === 0){
                    // redirect
                    $("#seedCounter").text("OK");

                    // change button text loading....
                    $("#permissionsStartBtn").prop('disabled', false);
                    $("#permissionsStartBtn").text('Redirect...');
                    $("#permissionsStartBtn").prop('disabled', true);

                    setTimeout(() => {
                        $("#storageLinkForm").submit();
                    }, 300);

                }
            }else if (typeof request === 'string'){
                $("#seedingForm").submit();
            } else {
                alert("seeding: Internet connection error.");
            }

            return new Promise((resolve, reject) => resolve(""))
        };

        var current_url = $(this).attr('action');
        start(current_url);

    });

    //storageLinkForm
    $("#storageLinkForm").on('submit', function(e) {
        e.preventDefault();

        var current_url = $(this).attr('action');

        async function start() {

            var request = await $.post(current_url);

            if(typeof request === 'object' && request.code === 200 ){

                $("#storageLink").text("OK");
                setTimeout(() => {
                    window.location.href = next_url;
                }, 2000);

            }else {
                setTimeout(() => {
                    $("#storageLinkForm").submit();
                }, 3000);
            }

            return new Promise((resolve, reject) => resolve(""))
        };

        start();
    });

});

