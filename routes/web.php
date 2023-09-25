<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TestimonialController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('index', function () {
    return view('frontend.index');
});

Route::get('/', function () {
    return view('frontend.index');
})->middleware(RedirectIfAuthenticated::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('admin/profile/update', [AdminController::class, 'adminProfileUpdate'])->name('admin.update');
    Route::get('admin/change/password', [AdminController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::post('admin/update/password', [AdminController::class, 'adminUpdatePassword'])->name('admin.update.password');

    //permission
    Route::controller(RoleController::class)->group(function () {
        Route::get('/permissions/all', 'allPermissions')->name('all.permissions');
        Route::get('/permissions/add/{id?}', 'addPermissions')->name('add.permissions');
        Route::post('/permission/save/{id?}', 'savePermission')->name('save.permission');
        Route::get('/permission/delete/{id}', 'deletePermission')->name('delete.permission');

    });
    //roles
    Route::controller(RoleController::class)->group(function () {
        Route::get('/roles/all', 'allRoles')->name('all.roles');
        Route::get('/roles/add/{id?}', 'addRole')->name('add.role');
        Route::post('/roles/save/{id?}', 'saveRole')->name('save.role');
        Route::get('/role/delete/{id}', 'deleteRole')->name('delete.role');
        Route::get('/role_permission/add', 'addRolePermission')->name('add.role.permission');
        Route::post('/roles_permission/save/{id?}', 'saveRolePermission')->name('save.role.permission');
        Route::get('/role_permission/all', 'allRolePermission')->name('all.role.permission');
        Route::get('/role_permission/edit/{id}', 'editRolePermission')->name('edit.role.permission');
        Route::post('/role_permission/update/{id}', 'updateRolePermission')->name('update.role.permission');
        Route::get('/role_permission/delete/{id}', 'deleteRolePermission')->name('delete.role.permission');
        Route::get('/selectRoleAjax', 'selectRoleAjax')->name('selectRoleAjax');











    });



});

Route::middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::get('admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
    Route::get('admin/logoutPage', [AdminController::class, 'adminLogoutPage'])->name('admin.logout.page');
});
Route::middleware('auth')->group(function () {
    // web routes
    Route::controller(HomeController::class)->group(function () {
        Route::get('/add/home', 'home')->name('home')->middleware('auth');
        Route::post('/update/home', 'Updatehome')->name('update.home');

    });
    Route::controller(AboutController::class)->group(function () {
        Route::get('/add/about', 'about')->name('about');
        Route::post('/update/about', 'updateAbout')->name('update.about');


    });
    Route::controller(SkillController::class)->group(function () {
        Route::get('/skills/all', 'allSkills')->name('all.skills');
        Route::get('/skills/add', 'addSkillPage')->name('add.skill.page');
        Route::post('/save/skill/{id?}', 'saveSkill')->name('save.skill');
        Route::get('/edit/skill/{id}', 'editSkill')->name('edit.skill');
        Route::get('/delete/skill/{id}', 'deleteSkill')->name('delete.skill');




    });
    Route::controller(ServiceController::class)->group(function () {
        Route::get('/services/all', 'allServices')->name('all.services');
        Route::get('/services/add', 'addService')->name('add.service');
        Route::post('/services/save/{id?}', 'saveService')->name('save.service');
        Route::get('/services/edit/{id}', 'editService')->name('edit.service');
        Route::get('/delete/service/{id}', 'deleteService')->name('delete.service');


    });
    Route::controller(TestimonialController::class)->group(function () {
        Route::get('/testimonial/all', 'alltestimonial')->name('all.testimonials');
        Route::get('/testimonial/add/{id?}', 'addtestimonial')->name('add.testimonial');
        Route::post('/testimonial/save/{id?}', 'saveTestimonial')->name('save.testimonial');
        Route::get('/testimonial/delete/{id}', 'deleteTestimonial')->name('delete.testimonial');


    });
    Route::controller(ContactController::class)->group(function () {
        Route::get('/contact/add', 'addContact')->name('add.contact');
        Route::post('/contact/update/{id}', 'updateContact')->name('update.contact');


    });

    Route::controller(MessageController::class)->group(function () {
        Route::get('/messages/all', 'allMessages')->name('all.messages');
        Route::post('/message/send', 'sendMessage')->name('send.message');
        Route::get('/delete/message/{id}', 'deleteMessage')->name('delete.message');



    });

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admins/all', 'admins')->name('admins');
        Route::get('/admins/add/{id?}', 'addAdmin')->name('add.admin');
        Route::post('/admin/save/{id?}', 'saveAdmin')->name('save.admin');
        Route::get('/admin/delete/{id}', 'deleteAdmin')->name('delete.admin');
        Route::get('/admin/activeInactiveAdmin', 'activeInactiveAdmin')->name('active.inactive');




    });


});





require __DIR__ . '/auth.php';