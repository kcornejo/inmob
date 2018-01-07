function kenStars() {
    $(".star").each(function () {
        $(this).barrating({
            theme: 'css-stars',
            showSelectedRating: false
        });
        alert("test");
    });
}
$(document).ready(function () {
    kenStars();
});