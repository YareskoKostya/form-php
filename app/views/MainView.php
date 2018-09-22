<?php
/**
 * Created by PhpStorm.
 * User: Костя
 * Date: 22.09.2018
 * Time: 14:27
 */
?>
<div class="container contact-form" align="center">
    <form action="/list" method="post">
        <h3>Fill in resume</h3>
        <div class="row">
            <div class="col-md-6">
                <div align="center">
                    <h4>Your Photo</h4>
                    <div class="contact-image">
                        <img src="http://www.allwomens.ru/uploads/posts/2018-07/1532497162_sliv-foto-maryany-ro-video.jpg" alt="photo"/>
                    </div>
                    <div class="form-group">
                        <input type="button" name="btnSubmit" class="btnContact" value="Add Photo" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Your First Name *" value="" />
                </div>
                <div class="form-group">
                    <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                </div>
                <div class="form-group">
                    <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                </div>
                <div class="form-group">
                    <select class="custom-select" name="country">
                        <option selected>Your Country *</option>
                        <option>Ukraine</option>
                        <option>Belarus</option>
                        <option>Moldova</option>
                        <option>Poland</option>
                        <option>Slovakia</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <input type="submit" name="btnSubmit" class="btnContact" value="Submit" />
                </div>
            </div>
        </div>
    </form>
</div>
