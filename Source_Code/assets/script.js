$(document).ready(function(){
    $('.comment-coloumn').slideToggle('hide');
    $('.comment-content ul').slideToggle('hide');
    $('.submit-comment').slideToggle('hide');
    $('.show-input-file').slideToggle('hide');
})


function showCommentColumn(id){
    $('.comment-coloumn.'+id).slideToggle();
    $('.submit-comment.'+id).slideToggle();
}

function showAllComment(id){
    $("#"+id).slideToggle();
    $("#"+id).html("");
    $.post("../controller/show_comment_final.php" ,
    {  
        id: id
    },
    function(data) {
        $('#'+id).append( data );
    });
}


var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");

function register(){
    x.style.left="-400px";
    y.style.left="50px";
    z.style.left="110px";
}
function login(){
    x.style.left="50px";
    y.style.left="450px";
    z.style.left="0px";
}

$(window).on("scroll", function() {
    if($(window).scrollTop()) {
            $('div.header').addClass('black');
            $('div.dropdown').addClass('black');
    }

    else {
          $('div.header').removeClass('black');
          $('div.dropdown').removeClass('black');
    }
});




function RegisterData(){
    $FName = $('#FNameReg').val();
    $LName = $('#LNameReg').val();
    $Email = $('#EmailReg').val();
    $BDay = $('#BDayReg').val();
    $Gender = $('#cars').val();
    $Password = $('#PassReg').val();
    $CPassword = $('#CPassReg').val();
    event.preventDefault();                
    $.post("../controller/reg.php", { FirstName : $FName , 
                        LastName : $LName ,
                        Email : $Email , 
                        BirthDate : $BDay , 
                        Gender : $Gender , 
                        Password : $Password,
                        ConfirmPassword : $CPassword},
    function(data) {
        console.log(data)
        if (data == 1) {
            $('#RegisterAlert').text("Register Succesfull please login").css("color","green")
        }
        else if(data == -1){
            $('#RegisterAlert').text("Please enter the same Password").css("color","red","font-family","Arial")
        }
        else if(data == -2)
        {
            $('#RegisterAlert').text("Email has been used").css("color","red","font-family","Arial")
        }
        else if(data == -3)
        {
            $('#RegisterAlert').text("Field can't be empty").css("color","red","font-family","Arial")
        }
        else if(data == -4)
        {
            $('#RegisterAlert').text("Email is not valid").css("color","red","font-family","Arial")
        }
    });
}

function loginData() {
    $email = $('#email').val();
    $password = $('#password').val();
    $captcha = $('#captcha').val();
    event.preventDefault();
    $.post("../controller/login.php", { 
        email: $email,
        pwd: $password,
        captcha: $captcha
    },
    function(data) {            
        console.log("data: " + data)
        if (data == -1) {
            $('#LoginAlert').text("Captcha Error").css("color","red","font-family","Arial");
        }
        else if (data > 0) {
            $('#LoginAlert').text("Login Successful").css("color","green","font-family","Arial");
            window.location.href = "View/profile.php?id=" + data;
        }else if(data == -1)
        {
            $('#LoginAlert').text("Wrong Email or Password").css("color","red","font-family","Arial");
        }
        else if(data == -2)
        {
            $('#LoginAlert').text("Email or Password can't be empty").css("color","red","font-family","Arial");
        }
        else {
                $('div.header').removeClass('black');
        }
    });
}

function PostComment() { 
    var kode_post = 0;  
    $Commentator = $('#Commentator').val();
    $PID = $('#PID').val();
    $CommentContent = $('#CommentContent').val();
    event.preventDefault();
    console.log($Commentator);
    console.log($PID);
    console.log($CommentContent);
    $.post("../controller/comment.php" ,
    {
        Commentator: $Commentator,
        PID: $PID,
        CommentContent: $CommentContent   
    },
    function(data)
    {
        kode_post = data;
    }
    );
    if ($('#'+kode_post).toggle('show')) {
        $("#"+kode_post).slideToggle();
        $("#"+kode_post).slideToggle();
    }
}
