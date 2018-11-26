<div style="overflow:hidden; width: 100%; height: 450px;">
    <iframe width="100%" height="450"
            src="https://maps.google.com/maps?width=100%&amp;height=450&amp;hl=en&amp;q=7060%20Hollywood%20Blvd%2C%20Los%20Angeles%2C%20CA+(%D0%9D%D0%B0%D0%B7%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
    </iframe>
</div>
<div class="container contact-form" align="center">
    <h2 class="pt-4" align="center">To participate in the conference, please fill out the form:</h2>
    <div class="tab">
        <form action="" method="post" id="form1">
            <p><input class="form-control" type="text" name="firstname" placeholder="first name*" required></p>
            <p><input class="form-control" type="text" name="lastname" placeholder="last name*" required></p>
            <p><input class="form-control" name="birthdate" id="datepicker" placeholder="birthdate*" required></p>
            <p><input class="form-control" type="text" name="subject" placeholder="report subject*" required></p>
            <?php include '../app/views/Country.php'; ?>
            <p><input class="form-control" type="text" name="phone" id="phone" placeholder="phone*"required></p>
            <p><input class="form-control" type="email" name="email" placeholder="email*" required></p>
            <p align="right"><input type="submit" name="btnSubmit" class="btnContact"  onclick="next(1)" value="Next"/></p>
        </form>
    </div>

    <div class="tab">
        <form enctype="multipart/form-data" action="" method="post" id="form2">
            <p><input class="form-control" type="text" name="company" placeholder="company*" required></p>
            <p><input class="form-control" type="text" name="position" placeholder="position*" required></p>
            <p><textarea class="form-control" rows="8" name="about" placeholder="about me*" required></textarea></p>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <label class="custom-file-label" for="inputPhoto">choose a photo</label>
                    <input type="file" class="custom-file-input" name="photo" id="inputPhoto">
                </div>
            </div>
            <p align="right"><input type="submit" name="btnSubmit" class="btnContact"  onclick="next(2)" value="Next"/></p>
        </form>
    </div>

    <div class="tab">
        <h4>Share the link on social networks</h4>
        <input type="button" class="btn btn-lg btn-fb" onclick="location.href='http://facebook.com/share?url=http://form/';" value="Facebook"/>
        <input type="button" class="btn btn-lg btn-tw" onclick="location.href='http://twitter.com/share?text=Check out this Meetup with SoCal AngularJS!&url=http://form/&hashtags=conference,AngularJS';" value="Twitter"/>
        <input type="button" class="btn btn-lg btn-gp" onclick="location.href='http://plus.google.com/share?url=http://form/';" value="Google+"/>    </div>

    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:30px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>

    <h2 class="mt-4"><a href="/List">All members</a></h2>

</div>
<script>
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
</script>
<script src="js/main.js"></script>