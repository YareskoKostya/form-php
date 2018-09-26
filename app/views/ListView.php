<?php
/**
 * Created by PhpStorm.
 * User: Костя
 * Date: 24.09.2018
 * Time: 19:01
 */
?>
<div class="container contact-form" align="center">
    <h2 id="h2list">List of resumes</h2>
    <form action="/Resume" id='form' method="POST">
        <input name='id' type="text" value="" hidden>
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name, surname</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
            <?php
            while ($datalist = $data->fetch()) {
                ?>
                <tr id="pointer" onclick="showResume(<?php echo $datalist['id']; ?>)">
                    <th scope="row">
                        <?php echo $datalist['id']; ?>
                    </th>
                    <td id="bluelist">
                        <?php echo $datalist['name, surname']; ?>
                    </td>
                    <td id="bluelist">
                        <?php echo $datalist['email']; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </form>
</div>
<script src="../js/list.js"></script>