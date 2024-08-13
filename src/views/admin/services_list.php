<h1>Управление услугами</h1>
<a href="index.php?action=add_service">Добавить услугу</a>
<table>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($articles as $article): ?>
        <tr>
            <td><?php echo $article['id']; ?></td>
            <td><?php echo $article['name']; ?></td>
            <td>
                <a href="index.php?action=edit_service&id=<?php echo $article['id']; ?>">
                    Редактировать
                </a>
                <a href="index.php?action=delete_service&id=<?php echo $article['id']; ?>"
                    onclick="return confirm('Вы уверены?')">
                    Удалить
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>