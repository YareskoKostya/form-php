var dateMask = new IMask(
    document.getElementById('datepicker'), {
        mask: '00/00/0000'
    });

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

function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n);
}

function next(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = Number(sessionStorage.getItem("show_tab")) + n;
    sessionStorage.setItem("show_tab", currentTab);
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
            beforeSend: function(){
                $('.btnContact').attr("disabled");
                $('#form2').css("opacity",".5");
            },
            success: function (msg) {
                console.log(msg);
                $('#form2').css("opacity","");
                $(".btnContact").removeAttr("disabled");
                if (!msg) {
                    next(1);
                } else {
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again:<br/>' + msg + '</span>');
                }
            },
            error: function (e) {
                console.log("ERROR : ", e);
                $(".btnContact").removeAttr("disabled");
            }
        });
        return false;
    });
});

$(document).ready(function () {
    $('#form2').submit(function () {
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
                if (!msg) {
                    next(1);
                } else {
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again:<br/>' + msg + '</span>');
                }
            },
            error: function (e) {
                console.log("ERROR : ", e);
                $(".btnContact").removeAttr("disabled");
            }
        });
        return false;
    });
});

if (!sessionStorage.getItem("show_tab")) {
    // Current tab is set to be the first tab (0)
    currentTab = 0;
    // Display the current tab
    showTab(currentTab);
} else {
    currentTab = sessionStorage.getItem("show_tab");
    showTab(currentTab);
}