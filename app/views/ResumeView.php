<?php
/**
 * Created by PhpStorm.
 * User: Костя
 * Date: 25.09.2018
 * Time: 20:36
 */
?>
<div class="container contact-form" align="center">
    <h2 id="h2res">User's resume</h2>
    <?php
    while ($dataresume = $data->fetch()) {
    ?>
    <div class="row" id="res">
        <div class="col-md-6">
            <div class="form-group" align="center">
                <h4>Photo</h4>
                <?php
                echo '<img width="350px" src="data:image/jpeg;base64,' . base64_encode($dataresume['photo']) . '" />';
                ?>
            </div>
        </div>
        <div class="col-md-6">
            <table  class="table">
                <tr>
                    <td class="font-italic" id="black">First Name:</td>
                    <td class="font-weight-bold" id="black"><?php echo $dataresume['name']; ?></td>
                </tr>
                <tr>
                    <td class="font-italic" id="black">Last Name:</td>
                    <td class="font-weight-bold" id="black"><?php echo $dataresume['surname'];?></td>
                </tr>
                <tr>
                    <td class="font-italic" id="black">Birthdate:</td>
                    <td class="font-weight-bold" id="black"><?php echo $dataresume['birthdate'];?></td>
                </tr>
                <tr>
                    <td class="font-italic" id="black">Country:</td>
                    <td class="font-weight-bold" id="black"><?php echo $dataresume['country'];?></td>
                </tr>
                <tr>
                    <td class="font-italic" id="black">Telephone:</td>
                    <td class="font-weight-bold" id="black"><?php echo $dataresume['tel'];?></td>
                </tr>
                <tr>
                    <td class="font-italic" id="black">Email:</td>
                    <td class="font-weight-bold" id="black"><?php echo $dataresume['email'];?></td>
                </tr>
                <tr>
                    <td class="font-italic" id="black">Address:</td>
                    <td class="font-weight-bold" id="black"><?php echo $dataresume['address'];?></td>
                </tr>
                <tr>
                    <td colspan="2" id="blue" align="center">Education:</td>
                </tr>
                <?php for ($i = 0; $i < 5; $i++) {
                    if ($i > 0 && $dataresume["datebeginstudy$i"] !== NULL) { ?>
                        <tr>
                        <td colspan="2" align="center"></td>
                        </tr>
                        <?php
                    }?>
                    <tr <?php if ($dataresume["datebeginstudy$i"] == NULL) { ?> hidden="" <?php } ?>>
                        <td class="font-italic" id="black">
                            Start Date:
                        </td>
                        <td class="font-weight-bold" id="black">
                            <?php
                            echo $dataresume["datebeginstudy$i"];
                            ?>
                        </td>
                    </tr>
                    <tr <?php if ($dataresume["dateendstudy$i"] == NULL) { ?> hidden="" <?php } ?>>
                        <td class="font-italic" id="black">
                            End Date:
                        </td>
                        <td class="font-weight-bold" id="black">
                            <?php
                            echo $dataresume["dateendstudy$i"];
                            ?>
                        </td>
                    </tr>
                    <tr <?php if ($dataresume["studyname$i"] == NULL) { ?> hidden="" <?php } ?>>
                        <td class="font-italic" id="black">
                            Institution Name:
                        </td>
                        <td class="font-weight-bold" id="black">
                            <?php
                            echo $dataresume["studyname$i"];
                            ?>
                        </td>
                    </tr>
                    <tr <?php if ($dataresume["professionstudy$i"] == NULL) { ?> hidden="" <?php } ?>>
                        <td class="font-italic" id="black">
                            Specialty:
                        </td>
                        <td class="font-weight-bold" id="black">
                            <?php
                            echo $dataresume["professionstudy$i"];
                            ?>
                        </td>
                    </tr>
                    <tr <?php if ($dataresume["doctor$i"] == NULL) { ?> hidden="" <?php } ?>>
                        <td class="font-italic" id="black">
                            Academic Degree:
                        </td>
                        <td class="font-weight-bold" id="black">
                            <?php
                            echo $dataresume["doctor$i"];
                            ?>
                        </td>
                    </tr>
                <?php }
                ?>
                <tr>
                    <td colspan="2" id="blue" align="center">Work:</td>
                </tr>
                <?php
                for ($j = 0; $j < 5; $j++) {
                    if ($j > 0 && $dataresume["datebeginwork$j"] !== NULL) { ?>
                        <tr>
                            <td colspan="2" align="center"></td>
                        </tr>
                        <?php
                    }?>
                    <tr <?php if ($dataresume["datebeginwork$j"] == NULL) { ?> hidden="" <?php } ?>>
                        <td class="font-italic" id="black">
                            Start Work:
                        </td>
                        <td class="font-weight-bold" id="black">
                            <?php
                            echo $dataresume["datebeginwork$j"];
                            ?>
                        </td>
                    </tr>
                    <tr <?php if ($dataresume["dateendwork$j"] == NULL) { ?> hidden="" <?php } ?>>
                        <td class="font-italic" id="black">
                            End Work:
                        </td>
                        <td class="font-weight-bold" id="black">
                            <?php
                            echo $dataresume["dateendwork$j"];
                            ?>
                        </td>
                    </tr>
                    <tr  <?php if ($dataresume["workname$j"] == NULL) { ?> hidden="" <?php } ?>>
                        <td class="font-italic" id="black">
                            Company Name:
                        </td>
                        <td class="font-weight-bold" id="black">
                            <?php
                            echo $dataresume["workname$j"];
                            ?>
                        </td>
                    </tr>
                    <tr  <?php if ($dataresume["professionwork$j"] == NULL) { ?> hidden="" <?php } ?>>
                        <td class="font-italic" id="black">
                            Specialty:
                        </td>
                        <td class="font-weight-bold" id="black">
                            <?php
                            echo $dataresume["professionwork$j"];
                            ?>
                        </td>
                    </tr>
                <?php }
                ?>
                <tr>
                    <td colspan="2" align="center"></td>
                </tr>
                <tr>
                    <td class="font-italic" id="black">Interests:</td>
                    <td class="font-weight-bold" id="black"><?php echo $dataresume['interests'];?></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
        }
    ?>
</div>