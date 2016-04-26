<h1>Utoconsult annoncements List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Content</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($utoconsult_annoncements as $utoconsult_annoncement): ?>
    <tr>
      <td><a href="<?php echo url_for('annoncement/edit?id='.$utoconsult_annoncement->getId()) ?>"><?php echo $utoconsult_annoncement->getId() ?></a></td>
      <td><?php echo $utoconsult_annoncement->getContent() ?></td>
      <td><?php echo $utoconsult_annoncement->getCreatedAt() ?></td>
      <td><?php echo $utoconsult_annoncement->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('annoncement/new') ?>">New</a>
