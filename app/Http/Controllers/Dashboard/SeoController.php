<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Form;
use App\Models\Image;
use App\Models\Open_graph;
use App\Models\Page;
use App\Models\Same_a;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class SeoController extends Controller
{

    public function websitePages()
    {
        $pageType = Input::get('type');
        if($pageType == 'main')
        {
            $mainPages = Page::where('is_main_page', 1)->get();
            return view('dashboard.seo.mainPage.mainPages', compact('mainPages'));
        }elseif($pageType == 'services')
        {
            $pages = Page::all();
            return view('dashboard.seo.servicePage.servicesPages', compact('pages'));
        }
        elseif ($pageType == 'articles')
        {
            $pages = Page::with('blog')->get();
            return view('dashboard.seo.articlePage.index', compact('pages'));
        }else
        {
            return redirect()->back();
        }
    }


    public function editWebsitePage($id)
    {
        $page = Page::with('open_graph')->find($id);
        return view('dashboard.seo.mainPage.editPages', compact('page'));
    }


    public function updateWebsitePage(Request $request, $id)
    {
        $page = Page::find($id);
        $input = $request->all();
        /*$request->validate([
            'url'               => 'bail|url|max:200',
            'name'              => 'bail|max:200',
        ], [], [
            'url'               => ' URL',
            'name'              => ' Name',
        ]);*/

        $page->description = $input['description'];
        $page->key_words = $input['keywords'];
        $page->header_code = $input['header_code'];
        $page->save();

        Session::flash('create', 'Page as Has Been Updated Successfully');
        return redirect(adminUrl('seo/website-pages?type=main'));
    }

    public function updateWebsiteMainPage(Request $request, $id)
    {
        return $request->all();
    }


    public function editServicePage($id)
    {
        $service = Page::with('open_graph')->find($id);
        return view('dashboard.seo.servicePage.editPages', compact('page'));
    }

    /** ********************************** Open Graphs Pages ************************************** **/
    public function openGraph()
    {
        $openGraphType = Input::get('type');
        if ($openGraphType == 'main')
        {
            $mainPages = Page::where('is_main_page', 1)->get();
            return view('dashboard.seo.mainPageOpenGraph.mainPagesOpenGraph', compact('mainPages'));
        }
        elseif ($openGraphType == 'services')
        {
            $pages = Page::with('service')->get();
            return view('dashboard.seo.serviceOpenGraph.servicesPagesOpenGraph', compact('pages'));
        }
        elseif ($openGraphType == 'articles')
        {
            $pages = Page::with('blog')->get();
            return view('dashboard.seo.articleOpenGraph.articlesPagesOpenGraph', compact('pages'));
        }
        else
        {
            return redirect()->back();
        }
    }


    public function editServicesPagesOpenGraph($id)
    {
        return view('dashboard.seo.serviceOpenGraph.editServiceOpenGraph', compact('pages'));
    }


    public function editArticlesPagesOpenGraph($id)
    {
        return view('dashboard.seo.articleOpenGraph.editArticleOpenGraph', compact('pages'));
    }


    public function editMainPageOpenGraph($id)
    {
        $page = Page::with('open_graph')->find($id);
        return view('dashboard.seo.mainPageOpenGraph.editOpenGraph', compact('page'));
    }

    public function updateMainPageOpenGraph(Request $request, $id)
    {
        $page = Page::with('open_graph')->find($id);
        $input = $request->all();
        $request->validate([
            'og_url'            => 'bail|max:200',
            'og_type'           => 'bail|max:200',
            'og_title'          => 'bail|required|max:200',
            'og_site_name'      => 'bail|max:200',
            'og_image'          => 'bail|mimes:jpeg,jpg,png,gif',
            'og_image_url'      => 'bail|url|max:300',
        ], [], [
            'og_url'            => 'og:url',
            'og_type'           => 'og:type',
            'og_title'          => 'og:title',
            'og_site_name'      => 'og:site_name',
            'og_image'          => 'og:image',
            'og_image_url'      => 'Image Url',
            'og_description'    => 'og:description',
        ]);

        if ($uploadedFile = $request->file('og_image'))
        {
            $fileName = time() . $uploadedFile->getClientOriginalName();
            $uploadedFile->move(uploadedImagePath() . '/openGraph', $fileName);
            $filePath = uploadedImagePath() . '/openGraph/'.$fileName;
            $image = Image::create(['name' => $fileName, 'path' => $filePath]);
            $input['og_image'] = $image->id;
            $page->open_graph()->update(['og_image' => $input['og_image']]);
        }


        $page->open_graph()->update([
            //'og_url'         => $input['og_url'],
            'og_type'        => $input['og_type'],
            'og_title'       => $input['og_title'],
            'og_site_name'   => $input['og_site_name'],
            'image_url'      => $input['image_url'],
            'og_description' => $input['og_description'],
        ]);

        Session::flash('create', 'Open Graph as Has Been Updated Successfully');
        return redirect(adminUrl('seo/open-graph?type=main'));

    }


    /** ********************************** Same As Operation ************************************** **/
    public function sameAs()
    {
        $sameAses = Same_a::all();
        return view('dashboard.seo.sameAs.sameAs', compact('sameAses'));
    }


    public function createSameAs()
    {
        return view('dashboard.seo.sameAs.addSameAs');
    }

    public function storeSameAs(Request $request)
    {
        $input = $request->all();
        $input['created_by'] = Auth::user()->id;
        $request->validate([
            'url'               => 'bail|required|url|max:200',
            'name'              => 'bail|required|max:200',
            'rel'               => 'bail|max:200',
            'item_prop'         => 'bail|required|max:200',
        ], [], [
            'url'               => ' URL',
            'name'              => ' Name',
            'rel'               => 'Rel',
            'item_prop'         => 'Item Prop',
        ]);

        $same = new Same_a();
        $same->url = $input['url'];
        $same->name = $input['name'];
        $same->rel = $input['rel'];
        $same->item_prop = $input['item_prop'];
        $same->created_by = $input['created_by'];
        $same->save();

        Session::flash('create', 'Same as Has Been Created Successfully');
        return redirect(adminUrl('seo/same-as'));
    }

    public function editSameAs($id)
    {
        $sameAs = Same_a::with('createdBy')->find($id);
        return view('dashboard.seo.sameAs.editSameAs', compact('sameAs'));
    }

    public function updateSameAs(Request $request, $id)
    {
        $same = Same_a::with('createdBy')->find($id);
        $input = $request->all();
        $input['created_by'] = Auth::user()->id;
        $request->validate([
            'url'               => 'bail|required|url|max:200',
            'name'              => 'bail|required|max:200',
            'rel'               => 'bail|max:200',
            'item_prop'         => 'bail|required|max:200',
        ], [], [
            'url'               => ' URL',
            'name'              => ' Name',
            'rel'               => 'Rel',
            'item_prop'         => 'Item Prop',
        ]);

        $same->url = $input['url'];
        $same->name = $input['name'];
        $same->rel = $input['rel'];
        $same->item_prop = $input['item_prop'];
        $same->created_by = $input['created_by'];
        $same->save();

        Session::flash('create', 'Same as Has Been Updated Successfully');
        return redirect(adminUrl('seo/same-as'));
    }

    public function deleteSameAs($id)
    {
        $sameAs = Same_a::find($id);
        $sameAs->delete();

        Session::flash('delete', 'Same As Has Been Deleted Successfully');
        return redirect(adminUrl('seo/same-as'));
    }


    /** ********************************** Form ************************************** **/
    public function form()
    {
        $forms = Form::all();
        return view('dashboard.seo.form.index', compact('forms'));
    }

    public function editForm($id)
    {
        $form = Form::with('service')->find($id);
        return view('dashboard.seo.form.edit', compact('form'));
    }

    public function updateForm(Request $request, $id)
    {
        $form = Form::with('service')->find($id);
        $input =  $request->all();
        $request->validate([
            'header_code'               => 'bail||max:200',
            'body_code'                 => 'bail||max:200',
            'tracking_id'               => 'bail|max:200',
        ], [], [
            'header_code'               => ' Header Code',
            'body_code'                 => ' Body Code',
            'tracking_id'               => 'Tracking ID',
        ]);

        $form->header_code = $input['header_code'];
        $form->body_code = $input['body_code'];
        $form->tracking_id = $input['tracking_id'];
        $form->save();

        Session::flash('create', 'Form Has Been Updated Successfully');
        return redirect(adminUrl('seo/form'));
    }


}
