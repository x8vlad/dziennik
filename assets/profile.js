$(document).ready(function(){
      $.ajax({
        url: BASE_URL + 'controllers/getUser.php',
        dataType: "json",
        success: function(response){
        if(response.status == "success"){
            let user = response.login;
            let userRole = response.role;
            let userID = response.id;
            //main data changed
            $("#mainUserNameLogin").text(user);
            $("#mainUserRole").text(userRole);
            $("#userId").text("#" + userID);
            
            //sub data changed
            $("#loginSub").text(user);
            $("#userRoleSub").text(userRole);

            // console.log(user + " " + userRole + " " + userID);
        }else{
            console.log("dfdf");
        }
        }
    });
});