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
        <?php
            $study = '../app/views/EducationView.php';
            $handlestudy = fopen($study, 'r');
            $contentsstudy = fread($handlestudy, filesize($study));
            $contentsstudy = str_replace(array("\r","\n"), "", $contentsstudy);
        ?>
        $('<?php echo $contentsstudy; ?>').insertBefore("#study");
        x++;
    } else
    {
        alert('Enough!');
    }
}
y = 0;
function addWork() {
    if (y < 4) {
        <?php
            $work = '../app/views/WorkView.php';
            $handlework = fopen($work, 'r');
            $contentswork = fread($handlework, filesize($work));
            $contentswork = str_replace(array("\r","\n"), "", $contentswork);
        ?>
        $('<?php echo $contentswork; ?>').insertBefore("#work");
        y++;
    } else
    {
        alert('Enough!');
    }
}