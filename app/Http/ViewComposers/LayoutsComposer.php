<?php
/**
 * Created by PhpStorm.
 * User: Kidwany
 * Date: 1/14/2019
 * Time: 7:52 PM
 */

namespace App\Http\ViewComposers;

use App\Models\Album;
use App\Models\Contact;
use App\Models\About;
use App\Models\Page;
use App\Models\Same_a;
use App\Models\Service;
use App\Models\Setting;
use  Illuminate\View\View;

class LayoutsComposer
{
    public function compose(View $view)
    {

        // Return Projects In the footer of all pages

        //retrieve Projects in footer
        $contact = Contact::orderby('id', 'desc')->first();
        $about = About::with('about_'.currentLang())->orderBy('created_at', 'desc')->first();
        $setting = Setting::with('setting_'.currentLang(), 'image')->orderBy('created_at', 'desc')->first();
        $sameAs = Same_a::all();
        $mainServices = Service::with('service_'.currentLang(), 'parentService')->where('parent_service_id', null)->get();
        $mainOpenGraph = Page::with('open_graph')->where('url', '/')->first();
        $albums = Album::with('album_en', 'album_ar')->get();

        $view->with('contact', $contact)
                ->with('about', $about)
                ->with('setting', $setting)
                ->with('sameAs', $sameAs)
                ->with('mainServices', $mainServices)
                ->with('albums', $albums)
                ->with('mainOpenGraph', $mainOpenGraph);
    }
}
