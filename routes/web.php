<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Ideas;
use App\Models\Post;
use App\Models\User;

Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);

Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::get('/formtest', function(){
    $posts = Post::all();

    return view('formtest',[
        'posts' => $posts,
    ]);
});

Route::post('/formtest', function(){
    Post::create([
        'description' => request('description'),
    ]);

    return redirect('/formtest');
});

Route::delete('/formtest/{id}', function ($id) {
    Post::findOrFail($id)->delete();

    return redirect('/formtest');
});

Route::get('/delete', function(){
    Post::truncate();  

    return redirect('/formtest');
});


//index
Route::get('/posts', function(){
    $posts = Post::all();

    return view('posts.index', [
        'posts' => $posts,
    ]);
});

//show
Route::get('/posts/{post}', function (Post $post) {
    return view('posts.show', [
        'post' => $post,
    ]);
});

//edit
Route::get('/posts/{post}/edit', function (Post $post) {
    return view('posts.edit', [
        'post' => $post,
    ]);
}
);

//update
Route::patch('/posts/{post}', function (Post $post) {
    $post->update([
        'description' => request('description'),
        'updated_at' => now(),
    ]);

    return redirect('/posts' . '/' . $post->id);
}
);

Route::get('/user_registration', function () {
    return view('Registration.user_registration', [
        'users' => User::all()
    ]);
});

Route::post('/user_registration', function () {
    User::create([
        'first_name' => request('first_name'),
        'last_name' => request('last_name'),
        'middle_name' => request('middle_name'),
        'nickname' => request('nickname'),
        'email' => request('email'),
        'age' => request('age'),
        'address' => request('address'),
        'contact_number' => request('contact_number'),
        'password' => Hash::make(request('password')),
    ]);

    return redirect('/user_registration');
})->name('user.store');

Route::delete('/user/{user}', function(User $user) {
    $user->delete();
    return redirect('/user_registration');
})->name('user.delete');

Route::patch('/user/{user}', function(User $user) {
    $data = request()->all();

    if (!empty($data['password'])) {
        $data['password'] = Hash::make($data['password']);
    } else {
        unset($data['password']); 
    }

    $user->update($data);

    return redirect('/user_registration');
})->name('user.update');

Route::get('/user/{user}/edit', function(User $user) {
    return view('Registration.user_edit', [
        'user' => $user
    ]);
})->name('user.edit');