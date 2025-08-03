<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 text-lg">
    <h1 class="text-3xl font-bold mb-6 text-center">Create New User</h1>
    <form class="max-w-xl mx-auto">
        <input class="block w-full mb-4 p-2 border rounded" type="text" placeholder="Name">
        <input class="block w-full mb-4 p-2 border rounded" type="email" placeholder="Email">
        <input class="block w-full mb-4 p-2 border rounded" type="text" placeholder="Phone">
        <select class="block w-full mb-4 p-2 border rounded">
            <option disabled selected>Choose role</option>
            <option value="admin">Admin</option>
            <option value="guest">Guest</option>
            <option value="manager">Manager</option>
        </select>
    </form>
</body>
</html>
