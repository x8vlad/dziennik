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

  // let mainBlock = $("#mainBlock");

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
      beforeSend: loading,
      success: function (response) {
        console.log($("#FormForEdit").serialize());
        // добавялем те эдитированные данные
        // event.preventDefault();
        $.ajax({
          url: BASE_URL + "controllers/table-contentAJAX.php",
          method: "POST",
          success: function (response) {
            // console.log("NORM");
            // console.log(response);
            $("#table-body").html(response);
            $("#editModal").modal("hide");
          },
        });
        // console.log("так пока без ошибок :) ");
        $("div.text-center").hide();
      },
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
      beforeSend: loading,
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

  // register and login code firstly change loginName on the main page(as Stdudent or teacher or admin)

  // $("#loginName").on("click", function(event){
  //     console.log("You are student");
  // });

  // $("#loginBtn").on('click', function(e){
  //     // e.preventDefault();
  //     console.log("login");
  // });

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
