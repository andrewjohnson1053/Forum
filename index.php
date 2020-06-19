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
                    <img src="Images/Picture1.png" id="left-expand-image" class="expand-button" alt=">">
<!--                    <img src="Images/Picture1.png" id="left-expand-image-reversed"  alt="<">-->
                </div>
                <div id="right-div">
                    <span id="login-text" class="option-text">
                        Login
                    </span>
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
            $('.expand-button').click(function () {
                if(activeDiv == 0) {
                    var id = $(this).attr('id');
                    console.log(id);
                    if(id == 'left-expand-image'){
                        activeDiv = 1;
                    }
                    else{
                        activeDiv = 2;
                    }
                    console.log(activeDiv);
                }
                switch (activeDiv) {
                    case 1:{
                        $("#left-div").animate({
                            width:'100%',
                            marginRight : '1%',
                        },{duration : 1000,queue : false});
                        $("#right-div").animate({
                            width:'0%',
                        },{duration : 500 , queue: false});
                        $("#right-expand-image").hide();
                        $("#login-text").hide();
                        $("#right-div").hide();
                        $(this).css('transform','rotate(180deg)');
                        $(this).attr('id','right-expand-image');
                        break;
                    }
                    case 2:{
                        $("#right-div").animate({
                            width:'100%',
                        },{duration : 1000,queue : false});
                        $("#left-div").animate({
                            width:'0%',
                        },{duration : 500 , queue: false});
                        $("#left-expand-image").hide();
                        $("#signup-text").hide();
                        $("#login-text").animate({
                            display : 'none',
                        },{duration : 1000,queue : false});
                        $("#left-div").hide();
                        $(this).css('transform','rotate(180deg)');
                        break;
                    }
                }
            });
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