<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 text-lg">
    <h1 class="text-3xl font-bold mb-4 text-center">All Users</h1>
    <table class="table-auto w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Phone</th>
                <th class="border px-4 py-2">Role</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr class="text-center">
                <td class="border px-4 py-2"><?= $user['name'] ?></td>
                <td class="border px-4 py-2"><?= $user['email'] ?></td>
                <td class="border px-4 py-2"><?= $user['phone'] ?></td>
                <td class="border px-4 py-2"><?= ucfirst($user['role']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
