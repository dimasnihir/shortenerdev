<?php if ($links): ?>
    <div class="container">
        <table class="table table-dark table-striped mt-5 align-middle">
            <thead>
            <tr>
                <th scope="col">Long url</th>
                <th scope="col">Short url</th>
                <th scope="col">Time create</th>
                <th scope="col">delete</th>
            </tr>
            </thead>
            <tbody>
            <form method="post">
            <?php foreach ($links as $url): ?>
                <tr>
                    <td><?=$url['long_url']?></td>
                    <td><?=$url['short_url']?></td>
                    <td><?=$url['date']?></td>
                <td><button class="btn btn-danger" name="btn_delete" value="<?=$url['short_url']?>">delete</button></td>
              </tr>
            <?php endforeach; ?>
            </form>
            </tbody>
        </table>
    </div>

<?php endif; ?>