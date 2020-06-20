<?php

?>

<html lang="en">
    <head>
        <title>
            Forum MainPage
        </title>
        <link rel="stylesheet" href="index.css">
        <script src="jquery.min.js"></script>
    </head>
    <body>
        <div id="main-container">
            <div id="header-container">
                <div id="logo-image">
                    Image
                </div>
                <div id="header-text">
                    Project_Name
                </div>
                <div id="date-div">
                    Date and Time
                </div>
            </div>
            <div id="header-seperater" class="seperater">
    
            </div>
            <div id="middle-container" datafld="unchanged">
                <div id="left-div">
                    <span id="signup-text" class="option-text">
                        Signup
                    </span>
                    <div id="sign-up-form-div" hidden>
            
                    </div>
                    <img src="Images/Picture1.png" id="left-expand-image" class="expand-button" alt=">">
                    <!--                    <img src="Images/Picture1.png" id="left-expand-image-reversed"  alt="<">-->
                </div>
                <div id="right-div">
                    <span id="login-text" class="option-text">
                        Login
                    </span>
                    <div id="log-in-form-div" hidden>
            
                    </div>
                    <img src="Images/Picture2.png" id="right-expand-image" class="expand-button" alt="<">
                    <!--                    <img src="Images/Picture2.png" id="right-expand-image-reversed" alt=">">-->
                </div>
            </div>
            <div id="footer-seperator" class="seperater"></div>
            <div id="footer-container">
                <span id="copyright-text">&copy; 2020</span>
            </div>
        </div>
        <!--        <script>-->
        <!--            var breadth = $('body').css('width');-->
        <!--            var height = $('body').css('height');-->
        <!--            // console.log(breadth);-->
        <!--            alert(breadth);-->
        <!--            alert(height);-->
        <!--            height = breadth*756/1536;-->
        <!--            var length = height.toString();-->
        <!--            alert(length);-->
        <!--            alert(typeof length);-->
        <!--            $('body').css('height',length);-->
        <!--        </script>-->
        <script>
            var activeDiv = 0;

            function showLogin() {
                $("#sign-up-form-div").hide();
                $("#left-div").animate({width: '0%'}, 1000);
                $(".option-text").hide();
                //$("#left-div").hide();
                //$("#left-div").css();
                $("#left-expand-image").hide();
                $("#right-div").show();
                $("#right-expand-image").show();
                $("#right-div").animate({
                    width: '100%',
                }, {
                    duration: 1000, complete: function () {
                        console.log("Animation Complete");
                        $("#log-in-form-div").show();
                    }
                });
                $("#right-expand-image").css('margin-left', '1%');
                $("#right-expand-image").css('transform', 'rotate(180deg)');
                activeDiv = 1;
                console.log("Login is Running");
            }

            function showSignup() {
                $("#log-in-form-div").hide();
                $("#right-div").animate({width: '0%'}, 1000);
                $(".option-text").hide();
                //$("#right-div").hide();
                //$("#right-div").css('width','0%');
                $("#right-expand-image").hide();
                $("#left-div").show();
                $("#left-expand-image").show();
                $("#left-div").animate({
                    width: '100%',
                }, {
                    duration: 1000, complete: function () {
                        console.log("Animation Complete");
                        $("#sign-up-form-div").show();
                    }
                });
                $("#left-expand-image").css('margin-left', '1%');
                $("#left-expand-image").css('transform', 'rotate(180deg)');
                activeDiv = 2;
                console.log("SignUp is Running");
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
            // var activeDiv = 0;
            // $('.expand-button').click(function () {
            //     if(activeDiv == 0) {
            //         var id = $(this).attr('id');
            //         console.log(id);
            //         if(id == 'left-expand-image'){
            //             activeDiv = 1;
            //         }
            //         else{
            //             activeDiv = 2;
            //         }
            //         console.log(activeDiv);
            //     }
            //     switch (activeDiv) {
            //         case 1:{
            //             $("#left-div").animate({
            //                 width:'100%',
            //                 marginRight : '1%',
            //             },{duration : 1000,queue : false});
            //             $("#right-div").animate({
            //                 width:'0%',
            //             },{duration : 500 , queue: false});
            //             $("#right-expand-image").hide();
            //             $("#login-text").hide();
            //             $("#right-div").hide();
            //             $(this).css('transform','rotate(180deg)');
            //             $(this).attr('id','right-expand-image');
            //
            //             break;
            //         }
            //         case 2:{
            //             $("#right-div").animate({
            //                 width:'100%',
            //             },{duration : 1000,queue : false});
            //             $("#left-div").animate({
            //                 width:'0%',
            //             },{duration : 500 , queue: false});
            //             $("#left-expand-image").hide();
            //             $("#signup-text").hide();
            //             $("#login-text").animate({
            //                 display : 'none',
            //             },{duration : 1000,queue : false});
            //             $("#left-div").hide();
            //             $(this).css('transform','rotate(180deg)');
            //             activeDiv = 1;
            //             break;
            //         }
            //     }
            // });
            // $("#left-expand-image").click(function () {
            //     // $("#right-div").css('width','48%');
            //     // $("#left-div").css('float','right');
            //     // $("#right-div").css('z-index','5');
            //     // $("#left-div").css('z-index','10');
            //     $("#left-div").animate({
            //         width:'100%',
            //         marginRight : '1%',
            //     },{duration : 1000,queue : false});
            //     $("#right-div").animate({
            //         width:'0%',
            //     },{duration : 500 , queue: false});
            //     $("#right-expand-image").hide();
            //     $("#login-text").hide();
            //     $
            //     //$("#right-div").hide();
            //     $(this).css('transform','rotate(180deg)');
            //     $(this).attr('id','right-expand-image');
            // });
            // $("#right-expand-image").click(function () {
            //     // $("#left-div").css('width','48%');
            //     // $("#left-div").css('z-index','5');
            //     // $("#right-div").css('z-index','10');
            //     $("#right-div").animate({
            //         width:'100%',
            //     },{duration : 1000,queue : false});
            //     $("#left-div").animate({
            //         width:'0%',
            //     },{duration : 500 , queue: false});
            //     $("#left-expand-image").hide();
            //     $("#signup-text").hide();
            //     $("#login-text").animate({
            //         display : 'none',
            //     },{duration : 1000,queue : false});
            //     //$("#left-div").hide();
            //     $(this).css('transform','rotate(180deg)');
            // });
        </script>
    </body>
</html>