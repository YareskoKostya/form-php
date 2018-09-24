<?php
/**
 * Created by PhpStorm.
 * User: Костя
 * Date: 24.09.2018
 * Time: 19:01
 */
?>
<div class="container contact-form" align="center">
    <h2 style="position: relative; left: 50px">List of resumes</h2>
    <form action="/resume" id='form' method="POST">
        <input name='id' type="text" value="" hidden>
        <table style="position: relative; left: 50px" cellpadding="7" border="2">
            <tr>
                <td>
                    Name, surname
                </td>
                <td>
                    email
                </td>
            </tr>
            <?php
            while ($datalist = $data->fetch()) {
                ?>
                <tr onclick="showResume(<?php echo $datalist['id']; ?>)">
                    <td>
                        <?php
                        echo $datalist['name, surname'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $datalist['email'];
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </form>
    <script>
        function showResume(id) {
            $("input[type=text]").val(id);
            document.getElementById("form").submit();
        }

        </div>
