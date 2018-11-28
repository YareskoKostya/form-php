<div style="overflow:hidden; width: 100%; height: 450px;">
    <iframe width="100%" height="450"
            src="https://maps.google.com/maps?width=100%&amp;height=450&amp;hl=en&amp;q=7060%20Hollywood%20Blvd%2C%20Los%20Angeles%2C%20CA+(%D0%9D%D0%B0%D0%B7%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
    </iframe>
</div>
<div class="container contact-form" align="center">
    <h2>To participate in the conference, please fill out the form:</h2>
    <div class="tab">
        <form method="post" id="form1">
            <p><input class="form-control" type="text" name="firstname" placeholder="first name*" required></p>
            <p><input class="form-control" type="text" name="lastname" placeholder="last name*" required></p>
            <p><input class="form-control" name="birthdate" id="datepicker" placeholder="birthdate*" required></p>
            <p><input class="form-control" type="text" name="subject" placeholder="report subject*" required></p>
            <?php include '../app/views/Country.php'; ?>
            <p><input class="form-control" type="text" name="phone" id="phone" placeholder="phone*" required></p>
            <p><input class="form-control" type="email" name="email" placeholder="email*" required></p>
            <p align="right"><input type="submit" name="btnSubmit" class="btnContact" value="Next"/></p>
        </form>
    </div>

    <div class="tab">
        <form enctype="multipart/form-data" method="post" id="form2">
            <p><input class="form-control" type="text" name="company" placeholder="company*" required></p>
            <p><input class="form-control" type="text" name="position" placeholder="position*" required></p>
            <p><textarea class="form-control" rows="8" name="about" placeholder="about me*" required></textarea></p>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <label class="custom-file-label" for="inputPhoto">choose a photo</label>
                    <input type="file" class="custom-file-input" name="photo" id="inputPhoto">
                </div>
            </div>
            <p align="right"><input type="submit" name="btnSubmit" class="btnContact" value="Next"/></p>
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

    <h2 class="mt-4"><a href="/list">All members</a></h2>

</div>
<script src="js/script.js"></script>