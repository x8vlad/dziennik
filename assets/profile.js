$(document).ready(function(){
    console.log("start get User controller");  
    $.ajax({
        url: '../controllers/getUser.php',
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

    // change date on profile page
    if ($("#dateSignUp").length > 0) {
    console.log("start profile.php controller");  
    $.ajax({
        url: "../controllers/profile.php",
        dataType: "json",
        success: function(response){
            if(response.status === "success"){
                let signUpDate = response.dateSignUp;
                // console.log(signUpDate);
                $("#dateSignUp").text(signUpDate); 
            }else{
                console.warn("WEar in profile.php ", response.status);
            }
        },
        error: function(xhr, status, error){
            console.error("error " + error);
            console.log("status error " + status);
        }
    });
 }
});