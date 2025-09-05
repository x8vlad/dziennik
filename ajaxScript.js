// $-мейн пермнная 
function loading(){
    $("div.text-center").show();
}

$(document).ready(function(){
    //console.log("READY!");

    // $(document).on('click', '.MenuBlock', function(e){
        $('.form-check-input').on('click', function(e){
            $('.form-check-input').not(this).prop('checked', false);
            $('[name="option"]:checked').each(function() {
                // console.log($(this).val());
                if($(this).val() == 'arrows'){
                    // console.log("arroes");
                    $(".arrows").show();
                    $(".paginationNav").hide();
                    
                    $(".arrows").on('click', function(e){
                        e.preventDefault();
                        
                        let direction = $(e.target).closest('button').data('direction');
                        // console.log(direction);
                        let currentDay = parseInt(localStorage.getItem('day')) || 1;
                        
                        if(direction === "next"){
                            currentDay += 1;
                        } else{
                            currentDay -= 1;
                        }

                        if(currentDay < 1){
                            currentDay = 5;
                        }else if(currentDay > 5){
                            currentDay = 1;
                        }

                        localStorage.setItem('day', currentDay);
                        
                        $.ajax({
                            url: 'table-lessensAJAX.php',
                            method: 'POST',
                            data: {activePage: currentDay},
                            success: function(response){
                                // console.log(response);
                                $("#table-body-lessens").html(response);
                                // $("div.text-center").hide();
                            },
                            error: function(xhr) {
                                console.log('Error:', xhr.status, xhr.statusText);
                            }
                        });
                    });

                }else{
                    // console.log("pagination");
                    $(".paginationNav").show();
                    $(".arrows").hide();

                    $('.page-link').on('click', function (event) {
                        // console.log($(this).text());
                        let activePage = $(this).text();
                        console.log(activePage);
                        event.preventDefault();
                        
                        $.ajax({
                            url: 'table-lessensAJAX.php',
                            method: 'POST',
                            data: { activePage: activePage },
                            // beforeSend: loading,
                            success: function(response){
                                // console.log(activePage);
                                console.log(response);  
                                    $("#table-body-lessens").html(response);
                                // $("div.text-center").hide();
                            },
                            error: function(xhr) {
                            console.log('Error:', xhr.status, xhr.statusText);
                            }
                        });
                    });
                }
            });     
        });
    // })
        
    


    // let mainBlock = $("#mainBlock");
    
    // for DELEGATE events
    $(document).on('click', '.editBtn', function() {
        let id=$(this).data('id');
        // Нужно подняться к родительскому <tr> и найти .announcement-title:
        let title = $(this).closest('tr').find('.announcement-title').data('title');
        let content = $(this).closest('tr').find('.announcement-content').data('content');
                    // console.log(title);
        
        $("#EditDateId").val(id);

        $("#EditDateTitle").val(title);
        $("#EditDateContent").val(content);

        $("#editModal").modal('show');

        // добавить дата атрибуты
        // let title=$(this).data('title');
        // let content=$(this).data('content');
    // data-toggle="modal"
        console.log("id: " + id + " title: " + title + " content: " + content);

    });
    $("#closeEditModal").on('click', function(){
        $("#editModal").modal('hide');
    });

    // Total Editing date:
    $("#TotalEditModal").on('click', function(event){
        event.preventDefault();
        // console.log(23);
        $.ajax({
            url: 'edit_announcement.php',
            method: 'POST',
            data: $("#FormForEdit").serialize(),
            beforeSend: loading,
            success:function(response){
                console.log($("#FormForEdit").serialize());
                // добавялем те эдитированные данные
                    event.preventDefault();    
                    $.ajax({
                        url: 'table-contentAJAX.php',
                        method: 'POST',
                        success:function(response){
                            // console.log("NORM");
                            // console.log(response);
                            $("#table-body").html(response);
                            $("#editModal").modal('hide');  
                        }
                    });
                // console.log("так пока без ошибок :) ");
                $("div.text-center").hide(); 
            }
        });

    });

    // remover all
    $("#remover_btn").on('click', function(event){
        event.preventDefault();
        $.ajax({
        // юрл ссылка на файл с нужным тебе запросом(куда мы отпраялем данные)
        url: 'remove_announcement.php',
        // вся информация о том что ввели
        method: 'POST',
        beforeSend: loading,
        //функция которая выплнится если запрос успешен(стутс 200 и Редистатус 4)
        success:function(response){
            // искючаем 1
            $("table tr").not(":first").remove();
            // $("table tr#for_remover").remove();
            $("div.text-center").hide();
        }
        }); 
    });

    // remove this record
    $(document).on('click', '.DeleteBtn', function(event) {
        let id = $(this).data('id');
        // console.log(id);
        // console.log("id record to remove : " + id);
        event.preventDefault();
        $.ajax({
            url: 'remove-record.php',
            method: 'POST',
            data: { id: id },
            beforeSend: loading,
            success: function(){
                $(`#announcement-${id}`).remove();
                console.log($(`#announcement-${id}`));
                $("div.text-center").hide();
            }
        });
    });

    $("#registerBtn").on('click', function(e){
        e.preventDefault(); 
        // найти тут перменные для отправки!
        let login_input = $("#login_input").val();
        let email_input = $("#email_input").val();
        let password_input = $("#password_input").val();
        let password_confirm = $("#password_confirm").val();
        
        $.ajax({
            url: 'register.php',
            method: 'POST',
            data: { 
                login: login_input, 
                email: email_input, 
                password: password_input, 
                password_confirm: password_confirm
            },
            success: function(){
                // show alert
                $("#liveAlertPlaceholder").html(`
                <div class="alert alert-success alert-dismissible fade show" id="alertSuccess" role="alert">
                <div>you are registered</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`);
                
                setTimeout(function(){
                    $("#alertSuccess").alert('close');
                }, 2000);
                // console.log(login_input + " " + email_input + " " + password_input + " " +  password_confirm + " "); 
            },
            error: function(){
                $("#liveAlertPlaceholder").html(`
                <div class="alert alert-danger alert-dismissible fade show" id="alertSuccess" role="alert">
                <div>Some worng with password or login</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`);
                
                setTimeout(function(){
                    $("#alertSuccess").alert('close');
                }, 2000);
            }
        });
        // console.log("registerred");
    });

    $("#loginBtn").on('click', function(e){
        e.preventDefault(); 
        console.log("login");
    });

    // in register form to login
        $("#signInLink").on('click', function(e){
           // console.log("all ok");
            $("#registerBlock").hide();
            $("#headerRegister").hide();
            $("#headerLogin").show();
            $("#loginBlock").show();
        });

        // in login form to register
        $("#registerInLink").on('click', function(e){
            //console.log("all ok");
            $("#registerBlock").show();
            $("#loginBlock").hide();
            $("#headerRegister").show();
            $("#headerLogin").hide();
        });

    
});      