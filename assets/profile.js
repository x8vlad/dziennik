$(document).ready(function(){
    const url = typeof BASE_URL !== 'undefined' ? BASE_URL + 'controllers/getUser.php' : '../controllers/getUser.php';
      $.ajax({
        url: url,
        dataType: "json",
        success: function(response){
        if(response.status == "success"){
            let user = response.login;
            let userRole = response.role;
            let userID = response.id;
            
            $("#mainUserNameLogin").text(user);
            $("#mainUserRole").text(userRole);
            $("#userId").text("#" + userID);


            console.log(user + " " + userRole + " " + userID);
        }else{
            console.log("dfdf");
        }
        }
    });
});