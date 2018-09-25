function addPhoto(){
    document.getElementById('imgInp').click();
}
function check() {
    if (!imgInp.required)
    {
        alert('Add Photo');
    }
}
$(document).ready( function() {

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            document.getElementById("imgInp").required = true;
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });
});
x = 0;
function addStudy() {
    if (x < 4) {
        str = '<br/><div class="form-group row">' +
            '<label for="date-input" class="col-md-4 col-form-label">Start Date:</label>' +
            '<div class="col-md-8">' +
            '<input class="form-control" type="date" name="datebeginstudy' + (x + 1) + '" id="date-input" required>' +
            '</div>' +
            '</div>' +
            '<div class="form-group row">' +
            '<label for="date-input" class="col-md-4 col-form-label">End Date:</label>' +
            '<div class="col-md-8">' +
            '<input class="form-control" type="date" name="dateendstudy' + (x + 1) + '" id="date-input" required>' +
            '</div>' +
            '</div>' +
            '<div class="form-group row">\n' +
            '<label for="text-input" class="col-4 col-form-label">Institution Name:</label>\n' +
            '<div class="col-8">\n' +
            '<input class="form-control" type="text" name="studyname' + (x + 1) + '" id="text-input" required>\n' +
            '</div>\n' +
            '</div>' +
            '<div class="form-group row">\n' +
            '<label for="text-input" class="col-4 col-form-label">Speciality:</label>\n' +
            '<div class="col-8">\n' +
            '<input class="form-control" type="text" name="professionstudy' + (x + 1) + '" id="text-input" required>\n' +
            '</div>\n' +
            '</div>\n' +
            '<div class="form-group row">\n' +
            '<label for="text-input" class="col-4 col-form-label">Academic Degree:</label>\n' +
            '<div class="col-8">\n' +
            '<input class="form-control" type="text" name="doctor' + (x + 1) + '" id="text-input" required>\n' +
            '</div>\n' +
            '</div>' +
            '<div class="form-group" id="inputstudy' + (x + 1) + '">\n' +
            '</div>';
        document.getElementById('inputstudy' + x).innerHTML = str;
        x++;
    } else
    {
        alert('Enough!');
    }
}
y = 0;
function addWork() {
    if (y < 4) {
        str2 = '<br/><div class="form-group row">\n' +
            '<label for="date-input" class="col-md-4 col-form-label">Start Work:</label>\n' +
            '<div class="col-md-8">\n' +
            '<input class="form-control" type="date" name="datebeginwork' + (y + 1) + '" id="date-input" required>\n' +
            '</div>\n' +
            '</div>\n' +
            '<div class="form-group row">\n' +
            '<label for="date-input" class="col-md-4 col-form-label">End Work:</label>\n' +
            '<div class="col-md-8">\n' +
            '<input class="form-control" type="date" name="dateendwork' + (y + 1) + '" id="date-input" required>\n' +
            '</div>\n' +
            '</div>\n' +
            '<div class="form-group row">\n' +
            '<label for="text-input" class="col-4 col-form-label">Company Name:</label>\n' +
            '<div class="col-8">\n' +
            '<input class="form-control" type="text" name="workname' + (y + 1) + '" id="text-input" required>\n' +
            '</div>\n' +
            '</div>\n' +
            '<div class="form-group row">\n' +
            '<label for="text-input" class="col-4 col-form-label">Speciality:</label>\n' +
            '<div class="col-8">\n' +
            '<input class="form-control" type="text" name="professionwork' + (y + 1) + '" id="text-input" required>\n' +
            '</div>\n' +
            '</div>\n' +
            '<div class="form-group" id="inputwork' + (y + 1) + '">\n' +
            '</div>';
        document.getElementById('inputwork' + y).innerHTML = str2;
        y++;
    } else
    {
        alert('Enough!');
    }
}