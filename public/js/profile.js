$(document).ready(function() {
    $(".edit-profile-link").click(function() {
        $(".profile-page").hide();
        $(".edit-profile-form").show();
    });

    $(".cancel-edit-profile-link").click(function() {
        $(".profile-page").show();
        $(".edit-profile-form").hide();
    });
});
