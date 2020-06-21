var activeDiv = 0;

function showLogin() {
    $("#sign-up-form-div").hide();
    $("#left-div").animate({width: '0%'}, 1000);
    $(".option-text").hide();
    // $("#left-div").hide();
    // $("#left-div").css();
    $("#left-expand-image").hide();
    $("#right-div").show();
    $("#right-expand-image").show();
    $("#right-div").animate({
        width: '100%',
    }, {
        duration: 1000, complete: function () {
            // console.log("Animation Complete");
            $("#log-in-form-div").show();
        }
    });
    // $("#right-expand-image").css('margin-left', '1%');
    $("#right-expand-image").css('transform', 'rotate(180deg)');
    activeDiv = 1;
    // console.log("Login is Running");
}

function showSignup() {
    $("#log-in-form-div").hide();
    $("#right-div").animate({width: '0%'}, 1000);
    $(".option-text").hide();
    // $("#right-div").hide();
    // $("#right-div").css('width','0%');
    $("#right-expand-image").hide();
    $("#left-div").show();
    $("#left-expand-image").show();
    $("#left-div").animate({
        width: '100%',
    }, {
        duration: 1000, complete: function () {
            // console.log("Animation Complete");
            $("#sign-up-form-div").show();
        }
    });
    // $("#left-expand-image").css('margin-left', '1%');
    $("#left-expand-image").css('transform', 'rotate(180deg)');
    activeDiv = 2;
    //console.log("SignUp is Running");
}

if (activeDiv == 0) {
    $("#left-expand-image").click(function () {
        showLogin();
    });
    $("#right-expand-image").click(function () {
        showSignup();
    });
}
if (activeDiv == 1) {
    $(".expand-button").click(function () {
        showSignup();
    });
}
if (activeDiv == 2) {
    $(".expand-button").click(function () {
        showLogin();
    });
}

function setDate() {
    n = new Date();
    var day = n.getDay();
    var daylist = ["Sunday", "Monday", "Tuesday", "Wednesday ", "Thursday", "Friday", "Saturday"];
    y = n.getFullYear();
    m = n.getMonth() + 1;
    d = n.getDate();
    document.getElementById("date-div").innerHTML = daylist[day] + " " + d + "/" + m + "/" + y;
}

setDate();