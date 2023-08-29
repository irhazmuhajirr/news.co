<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\SubCategoryController;
use App\Http\Controllers\Frontend\PhotoController;
use App\Http\Controllers\Frontend\VideoController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\SubscriberController;
use App\Http\Controllers\Frontend\OnlinePollController;
use App\Http\Controllers\Frontend\ArchiveController;
use App\Http\Controllers\Frontend\TagController;
use App\Http\Controllers\Frontend\LanguageController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminAdvertisementController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminLiveController;
use App\Http\Controllers\Admin\AdminOnlinePollController;
use App\Http\Controllers\Admin\AdminSocialController;
use App\Http\Controllers\Admin\AdminAuthorController;
use App\Http\Controllers\Admin\AdminLanguageController;

use App\Http\Controllers\Author\AuthorController;
use App\Http\Controllers\Author\AuthorPostController;


/* Frontend */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [PageController::class, 'about'])->name('page-about');
Route::get('/subcategory-by-category/{id}', [HomeController::class, 'get_sub_category_by_category'])->name('sub-category-by-category');

Route::post('/search/result', [HomeController::class, 'search'])->name('search-to-result');

Route::get('/frequently-asked-questions', [PageController::class, 'faq'])->name('page-faq');
Route::get('/terms-and-conditions', [PageController::class, 'terms'])->name('page-terms');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('page-privacy');
Route::get('/disclaimer', [PageController::class, 'disclaimer'])->name('page-disclaimer');

Route::get('/contact-us', [PageController::class, 'contact'])->name('page-contact');
Route::post('/contact-us/submit', [PageController::class, 'contact_submit'])->name('contact-submit');
Route::post('/lang/switch', [LanguageController::class, 'switch_lang'])->name('switch-lang');

/* News Posts */
Route::get('/news/detail/{id}', [PostController::class, 'detail'])->name('news-detail');
Route::get('/news/category/{id}', [SubCategoryController::class, 'index'])->name('news-sub-category');

/* Gallery */
Route::get('/gallery/photos', [PhotoController::class, 'index'])->name('photo-gallery');
Route::get('/gallery/videos', [VideoController::class, 'index'])->name('video-gallery');

/* Subscriber */
Route::post('/subscriber', [SubscriberController::class, 'index'])->name('subscribe');
Route::get('/subscriber/verify/{token}/{email}', [SubscriberController::class, 'verify'])->name('subscriber-verify');

/* Online Polls */
Route::get('/online-poll-results', [OnlinePollController::class, 'index'])->name('online-polls');
Route::post('/online-poll-submit/{id}', [OnlinePollController::class, 'submit'])->name('online-poll-submit');

/* Archives */
Route::post('/news/archives', [ArchiveController::class, 'index'])->name('archives');
Route::get('/news/archives/{year}/{month}', [ArchiveController::class, 'pages'])->name('archive-pages');

/* Tags */
Route::get('/news/tags/{tag_name}', [TagController::class, 'index'])->name('tags');

/* Login Form */
Route::get('/author/login', [PageController::class, 'login'])->name('page-login');
Route::post('/author/login-submit', [PageController::class, 'login_submit'])->name('login-submit');
Route::get('/logout', [PageController::class, 'logout'])->name('logout');

/* Author Dashboard */
Route::get('/author/dashboard', [AuthorController::class, 'index'])->name('author-dashboard')
        ->middleware('author:author');
Route::get('/author/edit-profile', [AuthorController::class, 'edit_profile'])->name('author-edit-profile')
        ->middleware('author:author');
Route::post('/author/edit-profile-submit', [AuthorController::class, 'profile_submit'])
        ->name('author-edit-profile-submit');

/* Author News */
Route::get('/author/posts', [AuthorPostController::class, 'index'])->name('author-posts')
        ->middleware('author:author');
Route::get('/author/post/create', [AuthorPostController::class, 'create'])->name('author-post-create')
        ->middleware('author:author');
Route::post('/author/post/store', [AuthorPostController::class, 'store'])->name('author-post-store')
        ->middleware('author:author');
Route::get('/author/post/edit/{id}', [AuthorPostController::class, 'edit'])->name('author-post-edit')
        ->middleware('author:author');
Route::get('/author/post/tag/delete/{id}/{post_id}', [AuthorPostController::class, 'tag_delete'])->name('author-post-tag-delete')
        ->middleware('author:author');
Route::post('/author/post/update/{id}', [AuthorPostController::class, 'update'])->name('author-post-update')
        ->middleware('author:author');
Route::get('/author/post/delete/{id}', [AuthorPostController::class, 'delete'])->name('author-post-delete')
        ->middleware('author:author');

/* Forget Password */
Route::get('/forget-password', [PageController::class, 'forget_password'])->name('forget-password');
Route::post('/forget-password-submit', [PageController::class, 'forget_password_submit'])
        ->name('forget-password-submit');
Route::get('/reset-password/{token}/{email}', [PageController::class, 'reset_password'])
        ->name('reset-password');
Route::post('/reset-password-submit', [PageController::class, 'reset_password_submit'])
        ->name('reset-password-submit');

/* ----------------------------------------------------------------------------------------------------------------------- */

/* Admin Dashboard*/
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin-dashboard')
        ->middleware('admin:admin');
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin-login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin-login-submit');
Route::get('/admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin-forget-password');
Route::post('/admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])
        ->name('admin-forget-password-submit');
Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])
        ->name('admin-reset-password');
Route::post('/admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])
        ->name('admin-reset-password-submit');
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin-logout')
        ->middleware('admin:admin');
Route::get('/admin/edit-profile', [AdminProfileController::class, 'edit'])->name('admin-edit-profile')
        ->middleware('admin:admin');
Route::post('/admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin-edit-profile-submit')
        ->middleware('admin:admin');

/* Settings */
Route::get('/admin/settings', [AdminSettingController::class, 'index'])->name('admin-setting')
        ->middleware('admin:admin');
Route::post('/admin/setting-update', [AdminSettingController::class, 'update'])->name('admin-setting-update')
        ->middleware('admin:admin');

// Route::post('/admin/services/finance', AdminAdvertisementController::class 'get_token')->name('')

/* Page Settings */
Route::get('/admin/page/about', [AdminPageController::class, 'about'])->name('admin-page-about')
        ->middleware('admin:admin');
Route::post('/admin/page/about/update', [AdminPageController::class, 'about_update'])->name('admin-page-about-update')
        ->middleware('admin:admin');

Route::get('/admin/page/faq', [AdminPageController::class, 'faq'])->name('admin-page-faq')
        ->middleware('admin:admin');
Route::post('/admin/page/faq/update', [AdminPageController::class, 'faq_update'])->name('admin-page-faq-update')
        ->middleware('admin:admin');

Route::get('/admin/faq', [AdminFaqController::class, 'index'])->name('admin-faq')
        ->middleware('admin:admin');
Route::get('/admin/faq/create', [AdminFaqController::class, 'create'])->name('admin-faq-create')
        ->middleware('admin:admin');
Route::post('/admin/faq/store', [AdminFaqController::class, 'store'])->name('admin-faq-store')
        ->middleware('admin:admin');
Route::get('/admin/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin-faq-edit')
        ->middleware('admin:admin');
Route::post('/admin/faq/update/{id}', [AdminFaqController::class, 'update'])->name('admin-faq-update')
        ->middleware('admin:admin');
Route::get('/admin/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin-faq-delete')
        ->middleware('admin:admin');

Route::get('/admin/faq/create', [AdminFaqController::class, 'create'])->name('admin-faq-create')
        ->middleware('admin:admin');

Route::get('/admin/page/terms-and-conditions', [AdminPageController::class, 'terms'])
        ->name('admin-page-terms')->middleware('admin:admin');
Route::post('/admin/page/terms-and-conditions/update', [AdminPageController::class, 'terms_update'])
        ->name('admin-page-terms-update')->middleware('admin:admin');

Route::get('/admin/page/privacy-policy', [AdminPageController::class, 'privacy'])->name('admin-page-privacy')
        ->middleware('admin:admin');
Route::post('/admin/page/privacy-policy/update', [AdminPageController::class, 'privacy_update'])
        ->name('admin-page-privacy-update')->middleware('admin:admin');

Route::get('/admin/page/disclaimer', [AdminPageController::class, 'disclaimer'])
        ->name('admin-page-disclaimer')->middleware('admin:admin');
Route::post('/admin/page/disclaimer/update', [AdminPageController::class, 'disclaimer_update'])
        ->name('admin-page-disclaimer-update')->middleware('admin:admin');

Route::get('/admin/page/login', [AdminPageController::class, 'login'])
        ->name('admin-page-login')->middleware('admin:admin');
Route::post('/admin/page/login/update', [AdminPageController::class, 'login_update'])
        ->name('admin-page-login-update')->middleware('admin:admin');

Route::get('/admin/page/contact', [AdminPageController::class, 'contact'])
        ->name('admin-page-contact')->middleware('admin:admin');
Route::post('/admin/page/contact/update', [AdminPageController::class, 'contact_update'])
        ->name('admin-page-contact-update')->middleware('admin:admin');

/** Advertisement */
Route::get('/admin/home-advertisements', [AdminAdvertisementController::class, 'home_ad_show'])
        ->name('admin-home-advertisements')->middleware('admin:admin');
Route::post('/admin/home-advertisement-update', [AdminAdvertisementController::class, 'home_ad_update'])
        ->name('admin-home-advertisement-update')->middleware('admin:admin');
Route::get('/admin/top-advertisement', [AdminAdvertisementController::class, 'top_ad_show'])
        ->name('admin-top-advertisement')->middleware('admin:admin');
Route::post('/admin/top-advertisement-update', [AdminAdvertisementController::class, 'top_ad_update'])
        ->name('admin-top-advertisement-update')->middleware('admin:admin');
Route::get('/admin/sidebar-advertisements', [AdminAdvertisementController::class, 'sidebar_ad_show'])
        ->name('admin-sidebar-advertisements')->middleware('admin:admin');
Route::get('/admin/sidebar-advertisement-create', [AdminAdvertisementController::class, 'sidebar_ad_create'])
        ->name('admin-sidebar-advertisement-create')->middleware('admin:admin');
Route::post('/admin/sidebar-advertisement-store', [AdminAdvertisementController::class, 'sidebar_ad_store'])
        ->name('admin-sidebar-advertisement-store')->middleware('admin:admin');
Route::get('/admin/sidebar-advertisement-edit/{id}', [AdminAdvertisementController::class, 'sidebar_ad_edit'])
        ->name('admin-sidebar-advertisement-edit')->middleware('admin:admin');
Route::post('/admin/sidebar-advertisement-update/{id}', [AdminAdvertisementController::class, 'sidebar_ad_update'])
        ->name('admin-sidebar-advertisement-update')->middleware('admin:admin');
Route::get('/admin/sidebar-advertisement-delete/{id}', [AdminAdvertisementController::class, 'sidebar_ad_delete'])
        ->name('admin-sidebar-advertisement-delete')->middleware('admin:admin');

/** Category */
Route::get('/admin/news-categories', [AdminCategoryController::class, 'index'])
        ->name('admin-news-categories')->middleware('admin:admin');
Route::get('/admin/news-category/create', [AdminCategoryController::class, 'create'])
        ->name('admin-news-category-create')->middleware('admin:admin');
Route::post('/admin/news-category/store', [AdminCategoryController::class, 'store'])
        ->name('admin-news-category-store')->middleware('admin:admin');
Route::get('/admin/news-category/edit/{id}', [AdminCategoryController::class, 'edit'])
        ->name('admin-news-category-edit')->middleware('admin:admin');
Route::post('/admin/news-category/update/{id}', [AdminCategoryController::class, 'update'])
        ->name('admin-news-category-update')->middleware('admin:admin');
Route::get('/admin/news-category/delete/{id}', [AdminCategoryController::class, 'delete'])
        ->name('admin-news-category-delete')->middleware('admin:admin');

/** Sub Category */
Route::get('/admin/sub-categories', [AdminSubCategoryController::class, 'index'])
        ->name('admin-sub-categories')->middleware('admin:admin');
Route::get('/admin/sub-category/create', [AdminSubCategoryController::class, 'create'])
        ->name('admin-sub-category-create')->middleware('admin:admin');
Route::post('/admin/sub-category/store', [AdminSubCategoryController::class, 'store'])
        ->name('admin-sub-category-store')->middleware('admin:admin');
Route::get('/admin/sub-category/edit/{id}', [AdminSubCategoryController::class, 'edit'])
        ->name('admin-sub-category-edit')->middleware('admin:admin');
Route::post('/admin/sub-category/update/{id}', [AdminSubCategoryController::class, 'update'])
        ->name('admin-sub-category-update')->middleware('admin:admin');
Route::get('/admin/sub-category/delete/{id}', [AdminSubCategoryController::class, 'delete'])
        ->name('admin-sub-category-delete')->middleware('admin:admin');

/** Admin Posts */
Route::get('/admin/posts', [AdminPostController::class, 'index'])
        ->name('admin-posts')->middleware('admin:admin');
Route::get('/admin/post/create', [AdminPostController::class, 'create'])
        ->name('admin-post-create')->middleware('admin:admin');
Route::post('/admin/post/store', [AdminPostController::class, 'store'])
        ->name('admin-post-store')->middleware('admin:admin');
Route::get('/admin/post/edit/{id}', [AdminPostController::class, 'edit'])
        ->name('admin-post-edit')->middleware('admin:admin');
Route::get('/admin/post/tag/delete/{id}/{post_id}', [AdminPostController::class, 'tag_delete'])
        ->name('admin-post-tag-delete')->middleware('admin:admin');
Route::post('/admin/post/update/{id}', [AdminPostController::class, 'update'])
        ->name('admin-post-update')->middleware('admin:admin');
Route::get('/admin/post/delete/{id}', [AdminPostController::class, 'delete'])
        ->name('admin-post-delete')->middleware('admin:admin');

/** Admin Photos */
Route::get('/admin/photos', [AdminPhotoController::class, 'index'])
        ->name('admin-photos')->middleware('admin:admin');
Route::get('/admin/photo/create', [AdminPhotoController::class, 'create'])
        ->name('admin-photo-create')->middleware('admin:admin');
Route::post('/admin/photo/store', [AdminPhotoController::class, 'store'])
        ->name('admin-photo-store')->middleware('admin:admin');
Route::get('/admin/photo/edit/{id}', [AdminPhotoController::class, 'edit'])
        ->name('admin-photo-edit')->middleware('admin:admin');
Route::post('/admin/photo/update/{id}', [AdminPhotoController::class, 'update'])
        ->name('admin-photo-update')->middleware('admin:admin');
Route::get('/admin/photo/delete/{id}', [AdminPhotoController::class, 'delete'])
        ->name('admin-photo-delete')->middleware('admin:admin');

/** Admin Videos */
Route::get('/admin/videos', [AdminVideoController::class, 'index'])
        ->name('admin-videos')->middleware('admin:admin');
Route::get('/admin/video/create', [AdminVideoController::class, 'create'])
        ->name('admin-video-create')->middleware('admin:admin');
Route::post('/admin/video/store', [AdminVideoController::class, 'store'])
        ->name('admin-video-store')->middleware('admin:admin');
Route::get('/admin/video/edit/{id}', [AdminVideoController::class, 'edit'])
        ->name('admin-video-edit')->middleware('admin:admin');
Route::post('/admin/video/update/{id}', [AdminVideoController::class, 'update'])
        ->name('admin-video-update')->middleware('admin:admin');
Route::get('/admin/video/delete/{id}', [AdminVideoController::class, 'delete'])
        ->name('admin-video-delete')->middleware('admin:admin');

/** Admin Subscribers */
Route::get('/admin/subscribers/list', [AdminSubscriberController::class, 'list'])
        ->name('admin-subscribers-list')->middleware('admin:admin');
Route::get('/admin/subscribers/send-email', [AdminSubscriberController::class, 'send_email'])
        ->name('admin-subscribers-send-email')->middleware('admin:admin');
Route::post('/admin/subscribers/send-email/submit', [AdminSubscriberController::class, 'send_email_submit'])
        ->name('admin-subscribers-send-email-submit')->middleware('admin:admin');

/** Admin Live Channels */
Route::get('/admin/live-channels', [AdminLiveController::class, 'index'])
        ->name('admin-live-channels')->middleware('admin:admin');
Route::get('/admin/live-channel/create', [AdminLiveController::class, 'create'])
        ->name('admin-live-channel-create')->middleware('admin:admin');
Route::post('/admin/live-channel/store', [AdminLiveController::class, 'store'])
        ->name('admin-live-channel-store')->middleware('admin:admin');
Route::get('/admin/live-channel/edit/{id}', [AdminLiveController::class, 'edit'])
        ->name('admin-live-channel-edit')->middleware('admin:admin');
Route::post('/admin/live-channel/update/{id}', [AdminLiveController::class, 'update'])
        ->name('admin-live-channel-update')->middleware('admin:admin');
Route::get('/admin/live-channel/delete/{id}', [AdminLiveController::class, 'delete'])
        ->name('admin-live-channel-delete')->middleware('admin:admin');

/** Admin Online Polls */
Route::get('/admin/online-polls', [AdminOnlinePollController::class, 'index'])
        ->name('admin-online-polls')->middleware('admin:admin');
Route::get('/admin/online-poll/create', [AdminOnlinePollController::class, 'create'])
        ->name('admin-online-poll-create')->middleware('admin:admin');
Route::post('/admin/online-poll/store', [AdminOnlinePollController::class, 'store'])
        ->name('admin-online-poll-store')->middleware('admin:admin');
Route::get('/admin/online-poll/edit/{id}', [AdminOnlinePollController::class, 'edit'])
        ->name('admin-online-poll-edit')->middleware('admin:admin');
Route::post('/admin/online-poll/update/{id}', [AdminOnlinePollController::class, 'update'])
        ->name('admin-online-poll-update')->middleware('admin:admin');
Route::get('/admin/online-poll/delete/{id}', [AdminOnlinePollController::class, 'delete'])
        ->name('admin-online-poll-delete')->middleware('admin:admin');

/** Admin Online Polls */
Route::get('/admin/social-media', [AdminSocialController::class, 'index'])
        ->name('admin-social-media')->middleware('admin:admin');
Route::get('/admin/social-media/create', [AdminSocialController::class, 'create'])
        ->name('admin-social-media-create')->middleware('admin:admin');
Route::post('/admin/social-media/store', [AdminSocialController::class, 'store'])
        ->name('admin-social-media-store')->middleware('admin:admin');
Route::get('/admin/social-media/edit/{id}', [AdminSocialController::class, 'edit'])
        ->name('admin-social-media-edit')->middleware('admin:admin');
Route::post('/admin/social-media/update/{id}', [AdminSocialController::class, 'update'])
        ->name('admin-social-media-update')->middleware('admin:admin');
Route::get('/admin/social-media/delete/{id}', [AdminSocialController::class, 'delete'])
        ->name('admin-social-media-delete')->middleware('admin:admin');

/** Admin Authors */
Route::get('/admin/authors/dashboard', [AdminAuthorController::class, 'dashboard'])
        ->name('admin-authors-dashboard')->middleware('admin:admin');
Route::get('/admin/authors', [AdminAuthorController::class, 'index'])
        ->name('admin-authors')->middleware('admin:admin');
Route::get('/admin/author/create', [AdminAuthorController::class, 'create'])
        ->name('admin-author-create')->middleware('admin:admin');
Route::post('/admin/author/store', [AdminAuthorController::class, 'store'])
        ->name('admin-author-store')->middleware('admin:admin');
Route::get('/admin/author/edit/{id}', [AdminAuthorController::class, 'edit'])
        ->name('admin-author-edit')->middleware('admin:admin');
Route::post('/admin/author/update/{id}', [AdminAuthorController::class, 'update'])
        ->name('admin-author-update')->middleware('admin:admin');
Route::get('/admin/author/delete/{id}', [AdminAuthorController::class, 'delete'])
        ->name('admin-author-delete')->middleware('admin:admin');

Route::get('/admin/author/news', [AdminAuthorController::class, 'author_news'])
        ->name('admin-author-news')->middleware('admin:admin');

/** Admin Languages */
Route::get('/admin/languages', [AdminLanguageController::class, 'index'])->name('admin-languages')
        ->middleware('admin:admin');
Route::get('/admin/language/create', [AdminLanguageController::class, 'create'])->name('admin-language-create')
        ->middleware('admin:admin');
Route::post('/admin/language/store', [AdminLanguageController::class, 'store'])->name('admin-language-store')
        ->middleware('admin:admin');
Route::get('/admin/language/edit/{id}', [AdminLanguageController::class, 'edit'])->name('admin-language-edit')
        ->middleware('admin:admin');
Route::post('/admin/language/update/{id}', [AdminLanguageController::class, 'update'])->name('admin-language-update')
        ->middleware('admin:admin');
Route::get('/admin/language/delete/{id}', [AdminLanguageController::class, 'delete'])->name('admin-language-delete')
        ->middleware('admin:admin');

Route::get('/admin/language/source/{id}', [AdminLanguageController::class, 'source'])->name('admin-language-source')
        ->middleware('admin:admin');
Route::post('/admin/language/source-submit/{id}', [AdminLanguageController::class, 'source_submit'])->name('admin-language-source-submit')
        ->middleware('admin:admin');