<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/normalize.css">
    <link rel="stylesheet" href="public/css/admin.css">
</head>

<body class="admin">
    <h1 class="admin__title">
        <?php echo isset($service) ? 'Редактировать услугу' : 'Добавить услугу'; ?>
    </h1>

    <form enctype="multipart/form-data" method="post" class="admin__form">
        <label class="admin__label">
            <input required class="admin__form-input" type="text" name="name" maxlength="255" placeholder="Name"
                value="<?php echo isset($service) ? $service['name'] : ''; ?>">
        </label>
        <textarea class="admin__form-textarea" name="content" placeholder="Content" maxlength="5000">
            <?php echo isset($service) ? $service['content'] : ''; ?>
            </textarea>
        <label class="admin__label">
            <input class="admin__form-file" type="file" name="image" placeholder="Image"
                value="<?php echo isset($service) ? $service['image'] : ''; ?>">
        </label>
        <button class="admin__form-submit" type="submit">submit</button>
    </form>

</body>


</html>