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
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
        }
    }
    return valid; // return the valid status
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
    $('form').submit(function () {
        var formID = $(this).attr('id');
        var formNm = $('#' + formID);
        $.ajax({
            type: 'POST',
            url: '/list/' + formID,
            data: formNm.serialize()
        })
    });
    return false;
});

if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}