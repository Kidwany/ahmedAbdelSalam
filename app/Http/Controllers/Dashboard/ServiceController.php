<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Image;
use App\Models\Open_graph;
use App\Models\Page;
use App\Models\Service;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$type = Input::get('type');
        if ($type == 'main')
        {

        }
        else if ($type == 'sub')
        {
            $services = Service::with('service_en', 'createdBy', 'image')->where('parent_service_id', '!=', null)->get();
            return view('dashboard.service.subService', compact('services'));
        }*/
        $services = Service::with('service_en', 'createdBy', 'image')->where('parent_service_id', null)->get();
        return view('dashboard.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.service.create');
    }

    public function storeSub(Request $request)
    {
        $input = $request->all();
        $input['created_by'] = Auth::user()->id;
        $request->validate([
            'title_en'          => 'bail|required|max:200',
            'service_id'        => 'bail|required|int|max:200',
            'video_url'         => 'bail|max:300',
            'url'               => 'bail|unique:service|max:190',
            'description_en'    => 'bail|required',
            'slug_en'           => 'bail|required|max:1000',
            'title_ar'          => 'bail|required|max:1000',
            'description_ar'    => 'bail|required',
            'slug_ar'           => 'bail|required|max:300',
            'image_id'          => 'bail|required|mimes:jpeg,jpg,png,gif',
        ], [], [
            'title_en'          => ' Title in English',
            'description_en'    => ' Description in English',
            'slug_en'           => ' Slug in English',
            'title_ar'          => ' Title in Arabic',
            'description_ar'    => ' Description in Arabic',
            'slug_ar'           => ' Slug in Arabic',
            'image_id'          => ' Image',
            'video_url'         => ' Video Url'
        ]);


        //Upload Slide Image
        if ($uploadedFile = $request->file('image_id'))
        {
            $fileName = time() . $uploadedFile->getClientOriginalName();
            $uploadedFile->move('dashboardImages/service', $fileName);
            $filePath = 'dashboardImages/service/'.$fileName;
            $image = Image::create(['name' => $fileName, 'path' => $filePath]);
            $input['image_id'] = $image->id;
        }

        if (empty($input['url']))
        {
            $input['url'] = str_slug($input['title_en']);
        }

        $open_graph = new Open_graph();
        $open_graph->og_title = $input['title_en'];
        $open_graph->og_image = $input['image_id'];
        $open_graph->og_description = $input['description_en'];
        $open_graph->og_url =  $input['url'];
        $open_graph->save();

        $page = new Page();
        $page->url = $input['url'];
        $page->name = $input['title_en'];
        $page->open_graph_id = $open_graph->id;
        $page->save();


        $service = new Service();
        $service->image_id = $input['image_id'];
        $service->created_by = $input['created_by'];
        $service->url = $input['url'];
        //$service->video_id = $video->id;
        $service->page_id = $page->id;
        $service->open_graph_id = $open_graph->id;
        $service->parent_service_id = $input['service_id'];
        $service->save();

        $service->service_ar()->create(['service_id' => $service->id, 'title' => $input['title_ar'], 'description' => $input['description_ar'], 'slug' => $input['slug_ar']]);
        $service->service_en()->create(['service_id' => $service->id, 'title' => $input['title_en'], 'description' => $input['description_en'], 'slug' => $input['slug_en']]);


        //$service->video()->create(['url' => $input['url']]);

        Session::flash('create', 'Service  Has Been Created Successfully');
        return redirect(adminUrl('service/'.$input['service_id']));
    }


    public function createSubService($id)
    {
        $service = Service::with('image', 'service_en', 'createdBy')->find($id);
        return view('dashboard.service.createSub', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['created_by'] = Auth::user()->id;
        $request->validate([
            'title_en'          => 'bail|required|max:200',
            'description_en'    => 'bail|required',
            'slug_en'           => 'bail|required|max:1000',
            'url'               => 'bail|unique:service|max:190',
            'title_ar'          => 'bail|required|max:200',
            'description_ar'    => 'bail|required',
            'slug_ar'           => 'bail|required|max:1000',
            'image_id'          => 'bail|required|mimes:jpeg,jpg,png,gif',
        ], [], [
            'title_en'          => ' Title in English',
            'description_en'    => ' Description in English',
            'slug_en'           => ' Slug in English',
            'title_ar'          => ' Title in Arabic',
            'description_ar'    => ' Description in Arabic',
            'slug_ar'           => ' Slug in Arabic',
            'image_id'          => ' Image',
        ]);


        //Upload Slide Image
        if ($uploadedFile = $request->file('image_id'))
        {
            $fileName = time() . $uploadedFile->getClientOriginalName();
            $uploadedFile->move('dashboardImages/service', $fileName);
            $filePath = 'dashboardImages/service/'.$fileName;
            $image = Image::create(['name' => $fileName, 'path' => $filePath]);
            $input['image_id'] = $image->id;
        }

        if (empty($input['url']))
        {
            $input['url'] = str_slug($input['title_en']);
        }

        /*if ($input['video_url'])
        {
            $video = new Video();
            $video->url = $input['video_url'];
            $video->save();
        }*/

        $open_graph = new Open_graph();
        $open_graph->og_title = $input['title_en'];
        $open_graph->og_image = $input['image_id'];
        $open_graph->og_description = $input['description_en'];
        $open_graph->og_url =  $input['url'];
        $open_graph->save();

        $page = new Page();
        $page->url = $input['url'];
        $page->name = $input['title_en'];
        $page->open_graph_id = $open_graph->id;
        $page->save();

        $service = new Service();
        $service->image_id = $input['image_id'];
        $service->url = $input['url'];
        $service->page_id = $page->id;
        $service->open_graph_id = $open_graph->id;
        $service->created_by = $input['created_by'];
        $service->save();

        $service->service_ar()->create(['service_id' => $service->id, 'title' => $input['title_ar'], 'description' => $input['description_ar'], 'slug' => $input['slug_ar']]);
        $service->service_en()->create(['service_id' => $service->id, 'title' => $input['title_en'], 'description' => $input['description_en'], 'slug' => $input['slug_en']]);

        Session::flash('create', 'Service  Has Been Created Successfully');
        return redirect(adminUrl('service'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mainService =  Service::with('image', 'service_en', 'createdBy')->find($id);
        $services = Service::with('image', 'service_en', 'createdBy')->where('parent_service_id', $id)->get();
        return view('dashboard.service.subService', compact('services', 'mainService'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::with('image', 'service_en', 'createdBy')->find($id);
        return view('dashboard.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $service = Service::with('service_en', 'createdBy', 'image')->find($id);
        $input['created_by'] = Auth::user()->id;
        $request->validate([
            'title_en'          => 'bail|required|max:200',
            'description_en'    => 'bail|required',
            'slug_en'           => 'bail|required|max:1000',
            'title_ar'          => 'bail|required|max:200',
            'description_ar'    => 'bail|required',
            'slug_ar'           => 'bail|required|max:1000',
            'image_id'          => 'mimes:jpeg,jpg,png,gif',
        ], [], [
            'title_en'          => ' Title in English',
            'description_en'    => ' Description in English',
            'slug_en'           => ' Slug in English',
            'title_ar'          => ' Title in Arabic',
            'description_ar'    => ' Description in Arabic',
            'slug_ar'           => ' Slug in Arabic',
            'image_id'          => ' Image',
        ]);

        //Upload Slide Image
        if ($uploadedFile = $request->file('image_id'))
        {
            $fileName = time() . $uploadedFile->getClientOriginalName();
            $uploadedFile->move('dashboardImages/slider', $fileName);
            $filePath = 'dashboardImages/slider/'.$fileName;
            $image = Image::create(['name' => $fileName, 'path' => $filePath]);
            $input['image_id'] = $image->id;
            $service->image_id = $input['image_id'];
        }

        if (empty($input['url']))
        {
            $input['url'] = str_slug($input['title_en']);
        }


        $service->url = $input['url'];
        $service->created_by = $input['created_by'];
        $service->save();

        $service->service_ar()->update(['service_id' => $service->id, 'title' => $input['title_ar'], 'description' => $input['description_ar'], 'slug' => $input['slug_ar']]);
        $service->service_en()->update(['service_id' => $service->id, 'title' => $input['title_en'], 'description' => $input['description_en'], 'slug' => $input['slug_en']]);
        $service->page()->update(['url' => $input['url'], 'name' => $input['title_en']]);
        $service->openGraph()->update(['og_title' => $input['title_en'], 'og_image' =>  $service->image_id, 'og_description' => $input['description_en'], 'og_url' => $input['url']]);
        $service->image()->update(['alt' => $input['alt']]);


        Session::flash('update', 'Service Has Been Updated Successfully');
        return redirect(adminUrl('service'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        $service->delete();

        try
        {
            if ($service->image_id)
            {
                unlink(public_path() . '/' . $service->image->path);
                DB::table('image')->where('id', $service->image_id)->delete();
            }
        }
        catch (\Exception $e)
        {
            Session::flash('exception', 'Error, Can\'t Delete Slide Because The Slide is related to another table');
            return redirect()->back();
        }

        Session::flash('delete', 'Service ' . $service->id . ' Has Been Deleted Successfully');
        return redirect(adminUrl('service'));
    }
}
