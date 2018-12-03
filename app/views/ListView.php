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
        <?php foreach ($data->fetchAll() as $member):?>
            <tr>
                <th scope="row" style="vertical-align: middle">
                    <?=++$_SESSION['start']?>
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

    <div class="row mt-4">
        <div class="divBut" align="left" <?php if ($_SESSION['page'] == 1):?> style="display: none" <?php endif ?>>
            <input type="button" class="btnContact" id="prev" onclick="page(-1)" value="Prev"/>
        </div>


        <div class="divBut" align="right" <?php if ($_SESSION['page'] == $_SESSION['total']):?> style="display: none" <?php endif ?>>
            <input type="button" class="btnContact" id="next" onclick="page(1)" value="Next"/>
        </div>

    </div>

</div>
<script>

    function page(n){

        if (!sessionStorage.getItem("show_page")) {
            // Current tab is set to be the first tab (0)
            var currentPage = 1;

        } else {
            currentPage = sessionStorage.getItem("show_page");
        }

        var p = Number(currentPage) + n;

        if (p > 0 && p <= <?=$_SESSION['total']?>) {
            sessionStorage.setItem("show_page", p);
            document.location.href = sessionStorage.getItem("show_page");
        }

    }

</script>