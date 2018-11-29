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
        <?php foreach ($data->fetchAll() as $k => $member):?>
            <tr>
                <th scope="row" style="vertical-align: middle">
                    <?=++$k?>
                </th>
                <td>
                    <img height="50px" src="images/<?=$member['photo'] ? : 'no-avatar.png'?>" alt="">
                </td>
                <td style="vertical-align: middle">
                    <?=$member['firstname'] . ' ' . $member['lastname']?>
                </td>
                <td style="vertical-align: middle">
                    <?=$member['subject']?>
                </td>
                <td style="vertical-align: middle">
                    <?=$member['email']?>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>