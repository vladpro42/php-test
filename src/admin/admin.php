<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body class="admin">
    <h1>Admin Page</h1>

    <form method="post" class="admin__form" action="">
        <h2 class="admin__form-title">Create Article</h2>
        <label>
            <input class="admin__form-input" type="text" name="name" maxlength="255" placeholder="Name">
        </label>
        <textarea class="admin__form-textarea" name="content" placeholder="Content" maxlength="5000"></textarea>
        <label>
            <input class="admin__form-file" type="file" name="image" placeholder="Image">
        </label>
        <button class="admin__form-submit" type="submit">submit</button>
    </form>

    <form method="post" class="admin__form" action="">
        <h2 class="admin__form-title">Update Article</h2>
        <label>
            <input class="admin__form-input" type="text" name="name" maxlength="255" placeholder="Name">
        </label>
        <textarea class="admin__form-textarea" name="content" placeholder="Content" maxlength="5000"></textarea>
        <label>
            <input class="admin__form-file" type="file" name="image" placeholder="Image">
        </label>
        <label>
            <input class="admin__form-id" type="number" name="id" placeholder="id">
        </label>
        <button class="admin__form-submit" type="submit">submit</button>
    </form>

    <form class="admin__form" method="post" action="">
        <h2 class="admin__form-title">delete Article</h2>
        <label>
            <input class="admin__form-id" type="number" name="id" placeholder="id">
        </label>
        <button class="admin__form-submit" type="submit">submit</button>
    </form>




</body>

</html>