<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Post</title>
    @vite(['resources/css/app.css']);
</head>

<body>
    <h1 class="text-red-600 text-3xl">Add a New Post</h1>

    <form action="http://localhost:8000/posts" method="POST" class="max-w-lg mx-auto p-6 bg-white rounded-2xl shadow">


        @csrf

        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}

        <!-- Title -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
            <input type="text" name="title" id="title"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Enter post title" required>
        </div>

        <!-- Post Status -->
        <div class="mb-4">
            <label for="post_status_id" class="block text-gray-700 font-semibold mb-2">Post Status</label>
            <select name="post_status_id" id="post_status_id"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value=''>(Please Select a Status)</option>
                <option value='1'>active</option>
                <option value='2'>inactive</option>
                <option value='3'>archived</option>
                <option value='4'>deleted</option>
                <option value='5'>pending</option>
                <option value='6'>rejected</option>
                <option value='7'>approved</option>
            </select>
        </div>

        <!-- Body -->
        <div class="mb-4">
            <label for="body" class="block text-gray-700 font-semibold mb-2">Body</label>
            <textarea name="body" id="body" rows="5"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Write your post here..."></textarea>
        </div>

        <!-- Submit -->
        <div class="text-right">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Save Post
            </button>
        </div>
    </form>

</body>

</html>
