<?php foreach ($data['list'] as $ary): ?>
    <tr>
        <td><?= $ary['username'] ?></td>
        <td><?= $ary['create_at'] ?></td>
    </tr>
<?php endforeach;?>
