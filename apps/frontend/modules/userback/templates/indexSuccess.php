<br>
<a href="<?php echo url_for('userback/new') ?>" class="btn btn-success">创建新用户</a>
<br><br>

<table class="table table-striped">
  <thead class="ui-widget-header">
    <tr>
      <th>用户名</th>
      <th>电子邮箱</th>
      <th>等级</th>
      <th>管理员</th>
      <th>活跃状态</th>
      <th>创建于</th>
      <th>更新于</th>
      <th>管理</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($utoconsult_users as $utoconsult_user): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td><?php echo $utoconsult_user->getUsername() ?></td>
      <td><?php echo $utoconsult_user->getEmail() ?></td>
      <td><?php echo $utoconsult_user->getLevel() ?></td>
      <td><?php echo $utoconsult_user->getIsAdmin() ?></td>
      <td><?php echo $utoconsult_user->getActive() ?></td>
      <td><?php echo $utoconsult_user->getCreatedAt() ?></td>
      <td><?php echo $utoconsult_user->getUpdatedAt() ?></td>
      <td><a href="<?php echo url_for('userback/edit?id='.$utoconsult_user->getId()) ?>">编辑</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
