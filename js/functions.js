function getHeight() {
    var breadth = $('body').css('width');
    var height = $('body').css('height');
    console.log(breadth);
    alert(breadth);
    alert(height);
    height = breadth * 756 / 1536;
    var length = height.toString();
    alert(length);
    alert(typeof length);
    $('body').css('height', length);
}