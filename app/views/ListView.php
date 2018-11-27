<div class="container contact-form" align="center">
    <h2 class="pb-4">List of conference participants</h2>
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Full name</th>
            <th scope="col">Report subject</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1;?>
        <?php while ($datalist = $data->fetch()):?>
            <tr>
                <th scope="row" style="vertical-align: middle">
                    <?=$i++?>
                </th>
                <td>
                    <img height="50px" src="images/<?=$datalist['photo'] ? : 'no-avatar.png'?>" alt="">
                </td>
                <td style="vertical-align: middle">
                    <?=$datalist['firstname'] . ' ' . $datalist['lastname']?>
                </td>
                <td style="vertical-align: middle">
                    <?=$datalist['subject']?>
                </td>
                <td style="vertical-align: middle">
                    <?=$datalist['email']?>
                </td>
            </tr>
        <?php endwhile;?>
        </tbody>
    </table>
</div>