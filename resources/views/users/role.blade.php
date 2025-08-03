<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users by Role</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 text-lg">
    <h1 class="text-3xl font-bold text-center mb-8">
        <?= ucfirst($role) ?> Users
    </h1>

    <?php if (count($users)): ?>
        <ul class="max-w-xl mx-auto space-y-4">
            <?php foreach ($users as $user): ?>
                <li class="p-4 bg-gray-100 rounded shadow">
                    <strong>Name:</strong> <?= $user['name'] ?><br>
                    <strong>Email:</strong> <?= $user['email'] ?><br>
                    <strong>Phone:</strong> <?= $user['phone'] ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="text-center text-gray-500">No users found with this role.</p>
    <?php endif; ?>
</body>
</html>
