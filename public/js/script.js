var phoneMask = new IMask(
    document.getElementById('phone'), {
        mask: '+{1}(000)000-0000'
    });

$('#datepicker').datepicker({
    uiLibrary: 'bootstrap4'
});

$(document).ready( function() {
    $(".input-group input[type=file]").change(function(){
        var filename = $(this).val().replace(/.*\\/, "");
        $(".custom-file-label").text(filename);
    });
});

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
}

function next(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "finish" or "active" class to the current step:
    if(n == 2){
        x[n].className += " finish";
    } else {
        x[n].className += " active";
    }
}

$(document).ready(function () {
    $('#form1').submit(function () {
        $.ajax({
            type: 'POST',
            url: '/list/form1',
            data: $('#form1').serialize(),
            success: next(1),
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus); alert("Error: " + errorThrown);
            }
        });
        return false;
    });
});


$(document).ready(function () {

    $('#form2').submit(function (e) {

        //stop submit the form, we will post it manually.
        e.preventDefault();

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "/list/form2",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            beforeSend: function(){
                $('.btnContact').attr("disabled");
                $('#form2').css("opacity",".5");
            },
            success: function (msg) {
                console.log(msg);
                $('#form2').css("opacity","");
                $(".btnContact").removeAttr("disabled");
                next(1);
            },
            error: function (e) {
                console.log("ERROR : ", e);
                $("#btnSubmit").prop("disabled", false);

            }
        });

    });

});