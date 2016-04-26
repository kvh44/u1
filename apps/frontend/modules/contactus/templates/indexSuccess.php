<h1>Utoconsult contactuss List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Email</th>
      <th>Fromid</th>
      <th>Content</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($utoconsult_contactuss as $utoconsult_contactus): ?>
    <tr>
      <td><a href="<?php echo url_for('contactus/edit?id='.$utoconsult_contactus->getId()) ?>"><?php echo $utoconsult_contactus->getId() ?></a></td>
      <td><?php echo $utoconsult_contactus->getEmail() ?></td>
      <td><?php echo $utoconsult_contactus->getFromid() ?></td>
      <td><?php echo $utoconsult_contactus->getContent() ?></td>
      <td><?php echo $utoconsult_contactus->getCreatedAt() ?></td>
      <td><?php echo $utoconsult_contactus->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('contactus/new') ?>">New</a>
