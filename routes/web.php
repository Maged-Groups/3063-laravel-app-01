<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    return 'Users Page';
});

Route::get('/about', function () {
    return view('about');
});

// عك
Route::get(
    'employees',
    function () {
        // $employees = [
        //     ['name' => 'Hassan Mahmoud', 'age' => 25, 'salary' => 5000],
        //     ['name' => 'Ahmed Ali', 'age' => 30, 'salary' => 6000],
        //     ['name' => 'Mohamed Ahmed', 'age' => 35, 'salary' => 7000],
        //     ['name' => 'Ali Hassan', 'age' => 40, 'salary' => 8000],
        //     ['name' => 'Hassan Ali', 'age' => 45, 'salary' => 9000],
        //     ['name' => 'Ali Hassan', 'age' => 50, 'salary' => 10000],
        // ];

        $db = new mysqli('localhost', 'root', '', 'classicmodels');

        $qry = 'SELECT * FROM employees;';

        $res = $db->query($qry);
        $employees = $res->fetch_all(MYSQLI_ASSOC);
        $db->close();

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employees Page</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>

    <body class="text-2xl text-center p-5">
        <h1>Employees Page</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, aut!</p>

        <div class="p-4">
            <table class="table-auto border-collapse border border-slate-400 w-full">
                <thead>
                    <tr>
                        <th class="border border-slate-300">Name</th>
                        <th class="border border-slate-300">Extension</th>
                        <th class="border border-slate-300">Job Title</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee) { ?>
                        <tr>
                            <td class="border border-slate-300"><?= $employee['firstName'] . ' ' . $employee['lastName']; ?>
                            </td>
                            <td class="border border-slate-300"><?= $employee['extension']; ?></td>
                            <td class="border border-slate-300"><?= $employee['jobTitle']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>

    </html>
<?php

    }
);


// Route::get('about', function () {
//     return view('static.about');
// });

// Route::get('contact', function () {
//     return view('static.contact');
// });

// Route::get('privacy-policy', function () {
//     return view('static.privacy-policy');
// });

Route::view('about', 'static.about');

Route::view('contact-us', 'static.contact');

Route::redirect('contact', 'contact-us', 301);

Route::view('privacy-policy', 'static.privacy-policy');

Route::prefix('users')->group(function () {
$users = [
    ['id' => 1, 'name' => 'Mohamed Emad', 'email' => 'mohamedemad@example.com', 'phone' => '01000000000', 'role' => 'admin'],
    ['id' => 2, 'name' => 'Ahmed Ali', 'email' => 'ahmedali@example.com', 'phone' => '01000000001', 'role' => 'manager'],
    ['id' => 3, 'name' => 'Yousef Anis', 'email' => 'yousef@example.com', 'phone' => '01000000002', 'role' => 'guest'],
    ['id' => 4, 'name' => 'Sara Kamal', 'email' => 'sara@example.com', 'phone' => '01000000003', 'role' => 'admin'],
    ['id' => 5, 'name' => 'Mostafa Ashraf', 'email' => 'mostafa@example.com', 'phone' => '01000000004', 'role' => 'user'],
    ['id' => 6, 'name' => 'Huda Saleh', 'email' => 'huda@example.com', 'phone' => '01000000005', 'role' => 'guest'],
    ['id' => 7, 'name' => 'Amr Fathy', 'email' => 'amr@example.com', 'phone' => '01000000006', 'role' => 'manager'],
    ['id' => 8, 'name' => 'Maged Ali', 'email' => 'magedali@example.com', 'phone' => '01000000007', 'role' => 'admin'],
    ['id' => 9, 'name' => 'Ali Ibrahim', 'email' => 'aliibrahim@example.com', 'phone' => '01000000008', 'role' => 'user'],
    ['id' => 10, 'name' => 'Hassan Ali', 'email' => 'hassanali@example.com', 'phone' => '01000000009', 'role' => 'manager'],
    ['id' => 11, 'name' => 'Laila Adel', 'email' => 'laila@example.com', 'phone' => '01000000010', 'role' => 'user'],
    ['id' => 12, 'name' => 'Tamer Younis', 'email' => 'tamer@example.com', 'phone' => '01000000011', 'role' => 'guest'],
    ['id' => 13, 'name' => 'Nour Gamil', 'email' => 'nour@example.com', 'phone' => '01000000012', 'role' => 'manager'],
    ['id' => 14, 'name' => 'Ehab Zaki', 'email' => 'ehab@example.com', 'phone' => '01000000013', 'role' => 'admin'],
    ['id' => 15, 'name' => 'Mona Farid', 'email' => 'mona@example.com', 'phone' => '01000000014', 'role' => 'guest'],
];
    // 1. /users → show all users
    Route::get('/', function () use ($users) {
        return view('users.index', compact('users'));
    });

    // 2. /users/create → show form to create user (no submit)
    Route::get('/create', function () {
        return view('users.create');
    });


    // 3. /users/show/{id} → show a specific user (numbers only)
    Route::get('/show/{id}', function ($id) use ($users) {
    $user = collect($users)->firstWhere('id', (int) $id);

    if (!$user) {
        abort(404, 'User not found');
    }

    return view('users.show', compact('user'));
})->whereNumber('id');



    // 4. /users/{id}/edit → show form to edit user info (no submit)
  Route::get('/{id}/edit', function ($id) use ($users) {
    $user = collect($users)->firstWhere('id', (int) $id);

    if (!$user) {
        abort(404, 'User not found');
    }

    return view('users.edit', compact('user'));
})->whereNumber('id');

    //5. /users/role/{role} → filter by role (admin, guest, manager only)
    Route::get('/role/{role}', function ($role) use ($users) {
        $validRoles = ['admin', 'guest', 'manager'];
        abort_unless(in_array($role, $validRoles), 404);

        $filtered = collect($users)->where('role', $role);
        return view('users.role', ['users' => $filtered, 'role' => ucfirst($role)]);
    })->whereIn('role', ['admin', 'guest', 'manager']);
});





Route::prefix('customers')->group(function () {

    Route::get('/', function () {
        $customers = [
            ['name' => 'Hassan Mahmoud', 'city' => 'Cairo', 'country' => 'Egypt', 'phone' => '01000000000'],
            ['name' => 'Ahmed Ali', 'city' => 'Alex', 'country' => 'Egypt', 'phone' => '01000000001'],
            ['name' => 'Eman Ahmed', 'city' => 'Giza', 'country' => 'Egypt', 'phone' => '01000000002'],
            ['name' => 'Jailan Yousef', 'city' => 'Giza', 'country' => 'Egypt', 'phone' => '01000000002'],
            ['name' => 'Yara Mostafa', 'city' => 'Cairo', 'country' => 'Egypt', 'phone' => '01000000003'],
            ['name' => 'Maged Ali', 'city' => 'Alex', 'country' => 'Egypt', 'phone' => '01000000004'],
            ['name' => 'Ali Ibrahim', 'city' => 'Giza', 'country' => 'Egypt', 'phone' => '01000000005'],
            ['name' => 'Hassan Ali', 'city' => 'Cairo', 'country' => 'Egypt', 'phone' => '01000000006'],
            ['name' => 'Mohamed Ahmed', 'city' => 'Alex', 'country' => 'Egypt', 'phone' => '01000000007'],
        ];

        // return view('customers.index', ['customers' => $customers]);
        // OR simplify with compact
        return view('customers.index', compact('customers'));
    });

    Route::get('{customer}', function ($customer) {
        return "Customer $customer Page";
    });

    Route::get('{customer}/edit', function ($customer) {
        return "Update Customer $customer";
    });

    Route::get('{customer}/categories/{category}', function ($customer, $category) {
        return "View $category for Customer $customer";
    })->whereNumber('customer')->whereAlphaNumeric('category');

    Route::get('{customer}/category_id/{category}', function ($customer, $category) {
        return "Customer $customer: Categoris with ID $category";
    })->whereNumber(['customer', 'category']);

    Route::get('branch/{branch}', function ($branch) {
        return "Customers in $branch Branch";
    })->whereIn('branch', ['cairo', 'alex', 'giza']);

    Route::get('by-code/{code}', function () {
        return 'Customers by Code';
    })->where('code', '[a-z]{3}-[\d]{3}');
});

Route::fallback(function () {
    return view('errors.404');
});
