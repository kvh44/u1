<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $utoconsult_article_category1->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $utoconsult_article_category1->getName() ?></td>
    </tr>
    <tr>
      <th>Photo1:</th>
      <td><?php echo $utoconsult_article_category1->getPhoto1() ?></td>
    </tr>
    <tr>
      <th>Keywords:</th>
      <td><?php echo $utoconsult_article_category1->getKeywords() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $utoconsult_article_category1->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $utoconsult_article_category1->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('category1/edit?id='.$utoconsult_article_category1->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('category1/index') ?>">List</a>
