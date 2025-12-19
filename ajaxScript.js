// console.log("Work");
$(document).ready(function () {
  console.log(BASE_URL);

  // $-мейн пермнная
  function loading() {
    $("div.text-center").show();
  }
  // fn
  function ShowPlann(activePage) {
    // console.log(BASE_URL);
    // console.log("BASE_URL =", BASE_URL);
    $.ajax({
      url: BASE_URL + "controllers/table-lessensAJAX.php",
      method: "POST",
      data: { activePage }, // тож самое что и {activePage : activePage}
      success: function (response) {
        // console.log(response);
        $("#table-body-lessens").html(response);
      },
      error: function (xhr) {
        console.log("Error:", xhr.status, xhr.statusText);
      },
    });
  }
  console.log("READY!");

  // $(document).on('click', '.MenuBlock', function(e){
  $(".form-check-input").on("click", function (e) {
    $(".form-check-input").not(this).prop("checked", false);
    $('[name="option"]:checked').each(function () {
      // console.log($(this).val());
      if ($(this).val() == "arrows") {
        // console.log("arroes");
        $(".arrows").show();
        $(".paginationNav").hide();

        $(".arrows").on("click", function (e) {
          e.preventDefault();

          let direction = $(e.target).closest("button").data("direction");
          // console.log(direction);
          let currentDay = parseInt(localStorage.getItem("day")) || 1;

          if (direction === "next") {
            currentDay += 1;
          } else {
            currentDay -= 1;
          }

          if (currentDay < 1) {
            currentDay = 5;
          } else if (currentDay > 5) {
            currentDay = 1;
          }

          localStorage.setItem("day", currentDay);
          ShowPlann(currentDay);
        });
      } else {
        // console.log("pagination");
        $(".paginationNav").show();
        $(".arrows").hide();

        $(".page-link").on("click", function (event) {
          // console.log($(this).text());
          let activePage = $(this).text();
          console.log(activePage);
          event.preventDefault();

          ShowPlann(activePage);
        });
      }
    });
  });
  // })

  //for message:
  $("select[name='userOption']").on("change", function (e) {
    let userOption = $(this).val();
    // console.log(selectedVal);
    e.preventDefault();
    $.ajax({
      method: "POST",
      url: BASE_URL + "controllers/table-usersAJAX.php",
      data: {
        userOption: userOption,
      },
      success: function (response) {
        $("#table-body").html(response);
      },
    });
  });

  // let mainBlock = $("#mainBlock");

  $("#attempBtn").on("click", function (e) {
    e.preventDefault();
    console.log("u clikced on attempt btn");

    let title = $("#title").val();
    let content = $("#content").val();

    // console.log(title + " " + content);

    $.ajax({
      method: "POST",
      url: BASE_URL + "controllers/add_announcement.php",
      dataType: "json",
      data: {
        title: title,
        content: content,
      },
      success: function (response) {
        if (response.status === "success") {
          sessionStorage.setItem("alertMsg", "Added annoucement");
          sessionStorage.setItem("alertType", "success");

          console.log("Saved msg:", sessionStorage.getItem("alertMsg"));
          console.log("Saved type:", sessionStorage.getItem("alertType"));

          $("#table-body").html(response);

          setTimeout(function () {
            window.location.href = BASE_URL + "view/ogloszenia.tpl.php";
          }, 200);

          alertTimeout(); // add_announcement.tpl.php
        } else {
          $("#liveAlertPlaceholder").html(`
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Added to another announcement
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `);
          alertTimeout();
        }
      },
      error: function (xhr, status, error) {
        $("#liveAlertPlaceholder").html(`
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Request error: ${error}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div>                                                 
            `);
        alertTimeout();
      },
    });
  });

  //attendance 

  

  // looking as wich page is now
  if (window.location.pathname.includes("ogloszenia.tpl.php")) {
    const msg = sessionStorage.getItem("alertMsg");
    const type = sessionStorage.getItem("alertType");

    console.log("Saved msg:", msg);
    console.log("Saved type:", type);

    if (msg && type) {
      $("#liveAlertPlaceholder").html(`
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                ${msg}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `);
      sessionStorage.removeItem("alertMsg");
      sessionStorage.removeItem("alertType");
      alertTimeout();
    }
  }

  // for DELEGATE events
  $(document).on("click", ".editBtn", function () {
    console.log("click on editBtn");
    let id = $(this).data("id");
    // Нужно подняться к родительскому <tr> и найти .announcement-title:
    let title = $(this).closest("tr").find(".announcement-title").data("title");
    let content = $(this)
      .closest("tr")
      .find(".announcement-content")
      .data("content");
    // console.log(title);

    $("#EditDateId").val(id);

    $("#EditDateTitle").val(title);
    $("#EditDateContent").val(content);

    $("#editModal").modal("show");

    // добавить дата атрибуты
    // let title=$(this).data('title');
    // let content=$(this).data('content');
    // data-toggle="modal"
    console.log("id: " + id + " title: " + title + " content: " + content);
  });
  $("#closeEditModal").on("click", function () {
    $("#editModal").modal("hide");
  });

  // Total Editing date:
  $("#TotalEditModal").on("click", function (event) {
    event.preventDefault();
    // console.log(23); для  url: 'edit_announcement.php', и url: 'table-contentAJAX.php', убрал /
    $.ajax({
      url: BASE_URL + "controllers/edit_announcement.php",
      method: "POST",
      data: $("#FormForEdit").serialize(),
      dataType: "json",
      // beforeSend: loading,
      success: function (response) {
        //console.log(response);
        if (response.status === "error") {
          //  alert("error");
          // $("#editModal").modal("hide");

          $("#editModal .modal-body").prepend(`
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          ${response.msg}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    `);

          alertTimeout();
          return;
        }
        $.ajax({
          url: BASE_URL + "controllers/table-contentAJAX.php",
          method: "POST",
          success: function (response) {
            // console.log("NORM");
            // console.log(response);
            $("#table-body").html(response);
            $("#editModal").modal("hide");
            // $("div.text-center").hide();
          },
          error: function () {
            alert("error");
          },
        });
        // console.log("так пока без ошибок :) ");
      },
      error: function (xhr, status, error) {
        $("#liveAlertPlaceholder").html(`
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Request error: ${error}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `);
      },
      // console.log($("#FormForEdit").serialize());
      // добавялем те эдитированные данные
      // event.preventDefault();
    });
  });

  // remover all
  $("#remover_btn").on("click", function (event) {
    event.preventDefault();
    $.ajax({
      // юрл ссылка на файл с нужным тебе запросом(куда мы отпраялем данные)
      url: BASE_URL + "controllers/remove_announcement.php",
      // вся информация о том что ввели
      method: "POST",
      //функция которая выплнится если запрос успешен(стутс 200 и Редистатус 4)
      success: function (response) {
        // искючаем 1
        if (response.trim() === "ok") {
          // удаляем строки из таблицы
          $("table tr").not(":first").remove();
        } else {
          console.error("Ошибка при удалении: ", response);
        }
        $("div.text-center").hide();
      },
    });
  });

  // attendance: 
  $.ajax({
    url: BASE_URL + "controllers/get_attendance_link.php",
    dataType: "json",
    success: function(data){
      console.log(data);
      let url = data.attendanceUrl;
      let label = data.attendanceLable;
      console.log(label);
      console.log(url);
      $.ajax({
            url: BASE_URL + "controllers/getUser.php",
            dataType: "json",
            success: function(response){
              if(response.status == "success"){
                // respone -> json get login field (echo json_encode([ "status" => "success", "login" => $_SESSION['user'] ]);)
                let user = response.login;
                let userRole = response.role;
                if(userRole == "teacher"){
                  console.log("U a teacehr");
                  console.log(userRole);
                  $("#tableBlockAttendance").show();
                  // here code to show attendance page
                }else{
                  $("#tableBlockAttendance").hide();
                }
                
                // console.log(user + " " + userRole);
                $("#loginText").show();
                $("#loginName").text(response.login).show();
                $("#logOutBtn").show();
              }else{
                $("#loginText").hide();
                $("#loginName").hide();
                $("#logOutBtn").hide();
              } 
            }
      });
    },
    error: function (xhr, status, error) {
      console.log(`Smth wrond: ${error} status is: ${status}`);
    }
  });

  // remove this record
  $(document).on("click", ".DeleteBtn", function (event) {
    console.log("clicked on delet btn");
    // $(".DeleteBtn").on('click', function(event){
    let id = $(this).data("id");
    // console.log(id);

    event.preventDefault();
    $.ajax({
      url: BASE_URL + "controllers/remove-record.php",
      method: "POST",
      data: { id: id },
      beforeSend: loading,
      success: function () {
        console.log("id record to remove : " + id);
        $(`#announcement-${id}`).remove();
        console.log($(`#announcement-${id}`));
        $("div.text-center").hide();
      },
    });
  });

  //   alert fn timeout

  function alertTimeout() {
    setTimeout(function () {
      $(".alert").alert("close");
    }, 3000);
  }

  $("#registerBtn").on("click", function (e) {
    e.preventDefault();
    console.log("1 take val");
    let login = $("#login_input").val();
    let email = $("#email_input").val();
    let password = $("#password_input").val();
    let password_confirm = $("#password_confirm").val();

    //   console.log(login);

    if (
      login == "" ||
      email == "" ||
      password == "" ||
      password_confirm == ""
    ) {
      $("#liveAlertPlaceholder").html(`
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                All fields are empty
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `);

      alertTimeout();
      console.log("2 is empty fields");
      // e.preventDefault();
      return;
    }
    if (password != password_confirm) {
      console.log("3 if pwd not much");
      $("#liveAlertPlaceholder").html(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Passwords do not match
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `);
      alertTimeout();
      return;
    }
    console.log("4.Send request...");
    $.ajax({
      method: "POST",
      url: BASE_URL + "controllers/register.php",
      data: {
        login: login,
        email: email,
        password: password,
        password_confirm: password_confirm,
      },
      dataType: "json",
      success: function (response) {
        console.log(response);
        if (response.status === "success") {
          $("#liveAlertPlaceholder").html(`
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Successful regestarion
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `);
          alertTimeout();
          $(
            "#login_input, #email_input, #password_input, #password_confirm"
          ).val("");
        } else {
          $("#liveAlertPlaceholder").html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        ${response.msg}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `);
          alertTimeout();
        }

        // e.preventDefault();
        // return;
      },
      error: function (xhr, status, error) {
        console.log("AJAX Error:", error);
        $("#liveAlertPlaceholder").html(`
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Request error: ${error}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `);
        alertTimeout();
      },
    });
  });

  $("#loginBtn").on("click", function (e) {
    e.preventDefault();
    console.log("1 step grab data");
    let loginSignIn = $("#exampleInputEmail1").val();
    let pwdSignIn = $("#exampleInputPassword1").val();


    if (loginSignIn == "" || pwdSignIn == "") {
      $("#liveAlertPlaceholder").html(`
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  All fields are empty
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          `);
      console.log("2 data are empty");
      alertTimeout();
      return;
    }
    console.log("3  grabed data: " + loginSignIn + " " + pwdSignIn + " and go to ajax");
    $.ajax({
      method: "POST",
      url: BASE_URL + "controllers/login.php",
      data: {
        // !!!!!
        login: loginSignIn,
        password: pwdSignIn,
      },
      dataType: "json",
      success: function (response) {
        console.log("Seccess all :)");
        console.log(response);
        // response.Status == 200
        if (response.status == "success") {
          $("#liveAlertPlaceholder").html(`
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Are u successful sigin
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `);
            
          alertTimeout();
          $("#exampleInputEmail1").val("");
          $("#exampleInputPassword1").val("");
          console.log("go to the next one ajax");
          // must to create another file to gett session user
          $.ajax({
            url: BASE_URL + "controllers/getUser.php",
            dataType: "json",
            success: function(response){
              console.log("all ok in second ajax");
              if(response.status == "success"){
                // respone -> json get login field (echo json_encode([ "status" => "success", "login" => $_SESSION['user'] ]);)
                $("#loginText").show();
                $("#loginName").text(response.login).show();
                $("#logOutBtn").show();
              }else{
                $("#loginText").hide();
                $("#loginName").hide();
                $("#logOutBtn").hide();
              }
            }
          })
        } else {
          console.log("Stmh wrong :)");

          $("#liveAlertPlaceholder").html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        ${response.msg}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `);
          alertTimeout();

        }

        // e.preventDefault();
        return;
      },
      error: function (xhr, status, error) {
        console.log("AJAX Error:", error);
        $("#liveAlertPlaceholder").html(`
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Request erro
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `);
        alertTimeout();
      },
    });
  });

  //  logOutBtn
  $("#logOutBtn").on("click", function(e){
      e.preventDefault();
      console.log(" 1 - U cliked logout btn");

      $.ajax({
           url: BASE_URL + "controllers/logOut.php",
           dataType: "json",
           success: function(response){
              if(response.status == "success"){
                   $("#loginText").hide();
                   $("#loginName").hide();
                   $("#logOutBtn").hide();
                }
           }
      });
  });
  // in register form to login
  $("#signInLink").on("click", function (e) {
    // console.log("all ok");
    $("#registerBlock").hide();
    $("#headerRegister").hide();
    $("#headerLogin").show();
    $("#loginBlock").show();
  });

  // in login form to register
  $("#registerInLink").on("click", function (e) {
    //console.log("all ok");
    $("#registerBlock").show();
    $("#loginBlock").hide();
    $("#headerRegister").show();
    $("#headerLogin").hide();
  });
});
