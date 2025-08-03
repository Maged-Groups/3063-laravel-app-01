<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Info</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 text-lg">
    <h1 class="text-3xl font-bold mb-6 text-center">User Details</h1>
    <div class="max-w-xl mx-auto border p-6 rounded shadow">
        <p><strong>Name:</strong> <?= $user['name'] ?></p>
        <p><strong>Email:</strong> <?= $user['email'] ?></p>
        <p><strong>Phone:</strong> <?= $user['phone'] ?></p>
        <p><strong>Role:</strong> <?= ucfirst($user['role']) ?></p>
    </div>
</body>
</html>
