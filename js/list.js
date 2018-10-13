function showResume(id) {
    $("input[type=text]").val(id);
    document.getElementById("form").submit();
}
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}