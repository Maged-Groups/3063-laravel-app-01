<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 text-lg">
    <h1 class="text-3xl font-bold mb-6 text-center">Edit User</h1>
    <form class="max-w-xl mx-auto">
        <input class="block w-full mb-4 p-2 border rounded" type="text" value="<?= $user['name'] ?>">
        <input class="block w-full mb-4 p-2 border rounded" type="email" value="<?= $user['email'] ?>">
        <input class="block w-full mb-4 p-2 border rounded" type="text" value="<?= $user['phone'] ?>">
        <select class="block w-full mb-4 p-2 border rounded">
            <option <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option <?= $user['role'] == 'guest' ? 'selected' : '' ?>>Guest</option>
            <option <?= $user['role'] == 'manager' ? 'selected' : '' ?>>Manager</option>
        </select>
    </form>
</body>
</html>
