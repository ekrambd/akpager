$(document).ready(function(){

    var connection = $('#db_form [name="DB_CONNECTION"]').val();

    function isSqlite (connection){

        if(connection == 'sqlite'){
            $("#db_form input").each(function () {
                if($(this).attr('name') != '_token'){
                    $(this).parent().parent().addClass('hide');
                    $("#database_sqlite_path").parent().parent().removeClass('hide');
                }
            });
        }else{
            $("#db_form input").each(function () {
                if($(this).attr('name') != '_token'){
                    $(this).parent().parent().removeClass('hide');
                    $("#database_sqlite_path").parent().parent().addClass('hide');
                }
            });
        }
    }

    if($("#db_form").length){
        isSqlite(connection);

        $('#db_form [name="DB_CONNECTION"]').on('change', function(){
            isSqlite($(this).val());
        });
    }

    if($('#DB_CLEAN_iAgreeBtn').length){
        $('#seed_btn').prop('disabled', true);
        $('#DB_CLEAN_iAgreeBtn').on('click', function() {
            if ($('#DB_CLEAN_iAgreeBtn').is(':checked')) {
              // Checkbox is checked
              $('#seed_btn').prop('disabled', false);
              // Perform your desired action here
            } else {
              // Checkbox is not checked
              $('#seed_btn').prop('disabled', true);
              // Perform a different action or provide an alternative logic here
            }
        });
    }

});
