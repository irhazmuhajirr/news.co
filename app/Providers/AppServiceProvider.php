<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use App\Models\TopAdvertisement;
use App\Models\SidebarAdvertisement;
use App\Models\Category;
use App\Models\Page;
use App\Models\LiveChannel;
use App\Models\Post;
use App\Models\OnlinePoll;
use App\Models\SocialItem;
use App\Models\Setting;
use App\Models\Language;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Paginator::useBootstrap();

        $top_advertisement_data = TopAdvertisement::where('id', 1)->first();
        $sidebar_top_advertisement_data = SidebarAdvertisement::where('sidebar_ad_location', 'Top')->get();
        $sidebar_bottom_advertisement_data = SidebarAdvertisement::where('sidebar_ad_location', 'Bottom')->get();
        $live_channels = LiveChannel::get();
        $recent_news = Post::with('rSubCategory')->orderBy('id', 'desc')->get();
        $popular_news = Post::with('rSubCategory')->orderBy('visitors', 'desc')->get();
        $online_polls = OnlinePoll::orderBy('id', 'desc')->get();
        $setting_data = Setting::where('id', 1)->first();
        $languages = Language::orderBy('id', 'asc')->get();
        $default_lang = Language::where('is_default', 'Yes')->first();

        $categories = Category::with('rSubCategory')->where('show_on_menu', 'Show')->orderBy('category_order', 'asc')->get();
        $pages = Page::where('id', 1)->first();
        $social_media_items = SocialItem::get();

        view()->share('global_top_ad_data', $top_advertisement_data);
        view()->share('global_sidebar_top_ad_data', $sidebar_top_advertisement_data);
        view()->share('global_sidebar_bottom_ad_data', $sidebar_bottom_advertisement_data);
        view()->share('global_categories', $categories);
        view()->share('global_pages', $pages);
        view()->share('global_live_channels', $live_channels);
        view()->share('global_recent_news', $recent_news);
        view()->share('global_popular_news', $popular_news);
        view()->share('global_online_polls', $online_polls);
        view()->share('global_social_media_items', $social_media_items);
        view()->share('global_setting_data', $setting_data);
        view()->share('global_languages', $languages);
        view()->share('global_default_lang', $default_lang);
    }
}
