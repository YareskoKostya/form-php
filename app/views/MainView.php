<?php
/**
 * Created by PhpStorm.
 * User: Костя
 * Date: 22.09.2018
 * Time: 14:27
 */
?>
<div class="container contact-form" align="left">
    <form action="/list" method="post">
        <h3 align="center">Fill in resume</h3>
        <div class="row">
            <div class="col-md-6">
                <div align="center">
                    <h4>Your Photo</h4>
                    <div class="contact-image">
                        <img src="http://www.allwomens.ru/uploads/posts/2018-07/1532497162_sliv-foto-maryany-ro-video.jpg" alt="photo" class="rounded"/>
                    </div>
                    <div class="form-group">
                        <input type="button" name="btnSubmit" class="btnContact" value="Add Photo" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="text-input" class="col-4 col-form-label">Your First Name:</label>
                    <div class="col-8">
                        <input class="form-control" type="text" name="name" id="text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text-input" class="col-4 col-form-label">Your Last Name:</label>
                    <div class="col-8">
                        <input class="form-control" type="text" name="surname" id="text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date-input" class="col-md-4 col-form-label">Your Birthdate:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="date" name="birthdate" id="date-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text-input" class="col-md-4 col-form-label">Your Country:</label>
                    <div class="col-md-8">
                        <select class="custom-select" name="country" id="text-input">
                            <option selected></option>
                            <option>Ukraine</option>
                            <option>Belarus</option>
                            <option>Moldova</option>
                            <option>Poland</option>
                            <option>Slovakia</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text-input" class="col-4 col-form-label">Your Telephone:</label>
                    <div class="col-8">
                        <input class="form-control" type="tel" name="tel" id="text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text-input" class="col-4 col-form-label">Your Email:</label>
                    <div class="col-8">
                        <input class="form-control" type="email" name="email" id="text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text-input" class="col-4 col-form-label">Your Address:</label>
                    <div class="col-8">
                        <input class="form-control" type="text" name="address" id="text-input">
                    </div>
                </div>
                <div class="form-group" align="center">
                    <h5><label class="col-12 col-form-label">Education:</label></h5>
                </div>
                <div class="form-group row">
                    <label for="date-input" class="col-md-4 col-form-label">Start Date:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="date" name="datebeginstudy0"> id="date-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date-input" class="col-md-4 col-form-label">End Date:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="date" name="dateendstudy0" id="date-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text-input" class="col-4 col-form-label">Institution Name:</label>
                    <div class="col-8">
                        <input class="form-control" type="text"name="studyname0" id="text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text-input" class="col-4 col-form-label">Speciality:</label>
                    <div class="col-8">
                        <input class="form-control" type="text" name="professionstudy0" id="text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text-input" class="col-4 col-form-label">Academic Degree:</label>
                    <div class="col-8">
                        <input class="form-control" type="text" name="doctor0" id="text-input">
                    </div>
                </div>
                <div class="form-group" id="inputstudy0">
                </div>
                <div class="form-group"  align="center">
                    <input type="button" name="btnSubmit" class="btnContact" value="Add More"/>
                </div>
                <div class="form-group" align="center">
                    <h5><label class="col-12 col-form-label">Work:</label></h5>
                </div>
                <div class="form-group row">
                    <label for="date-input" class="col-md-4 col-form-label">Start Work:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="date" name="datebeginwork0" id="date-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date-input" class="col-md-4 col-form-label">End Work:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="date" name="dateendwork0" id="date-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text-input" class="col-4 col-form-label">Company Name:</label>
                    <div class="col-8">
                        <input class="form-control" type="text" name="workname0" id="text-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="text-input" class="col-4 col-form-label">Speciality:</label>
                    <div class="col-8">
                        <input class="form-control" type="text" name="professionwork0" id="text-input">
                    </div>
                </div>
                <div class="form-group" id="inputwork0">
                </div>
                <div class="form-group"  align="center">
                    <input type="button" name="btnSubmit" class="btnContact" value="Add More"/>
                </div>
            </div>
        </div>
        <div class="form-group" align="center">
            <input type="submit" name="btnSubmit" class="btnContact" value="Submit"/>
        </div>
    </form>
</div>
