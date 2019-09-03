<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Blog;
use App\Models\Image;
use App\Models\Open_graph;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Blog::with('blog_en', 'image', 'createdBy')->get();
        return view('dashboard.blog.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.blog.create');
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
            'url'               => 'bail|unique:blog|max:200',
            'title_en'          => 'bail|required|max:200',
            'body_en'           => 'bail|required',
            'title_ar'          => 'bail|required|max:200',
            'body_ar'           => 'bail|required',
            'image_id'          => 'bail|required|mimes:jpeg,jpg,png,gif',
            'alt'               => 'bail|required|max:200',
        ], [], [
            'url'               => ' URL',
            'title_en'          => ' Title in English',
            'body_en'    => ' Body in English',
            'title_ar'          => ' Title in Arabic',
            'body_ar'    => ' Body in Arabic',
            'image_id'          => ' Image',
            'alt'               => ' Alt Text',
        ]);

        //Upload Slide Image
        if ($uploadedFile = $request->file('image_id'))
        {
            $fileName = time() . $uploadedFile->getClientOriginalName();
            $uploadedFile->move(uploadedImagePath() . '/blog', $fileName);
            $filePath = uploadedImagePath() . '/blog/'.$fileName;
            $image = Image::create(['name' => $fileName, 'path' => $filePath, 'alt' => $input['alt']]);
            $input['image_id'] = $image->id;
        }

        if (empty($input['url']))
        {
            $input['url'] = str_slug($input['title_en']);
        }


        $open_graph = new Open_graph();
        $open_graph->og_title = $input['title_en'];
        $open_graph->og_image = $input['image_id'];
        $open_graph->og_description = $input['body_en'];
        $open_graph->og_url =  $input['url'];
        $open_graph->save();

        $page = new Page();
        $page->url = $input['url'];
        $page->name = $input['title_en'];
        $page->open_graph_id = $open_graph->id;
        $page->save();


        $blog = new Blog();
        $blog->image_id = $input['image_id'];
        $blog->url = $input['url'];
        $blog->created_by = $input['created_by'];
        $blog->page_id = $page->id;
        $blog->open_graph_id = $open_graph->id;
        $blog->save();

        $blog->blog_ar()->create(['blog_id' => $blog->id, 'title' => $input['title_ar'], 'body' => $input['body_ar']]);
        $blog->blog_en()->create(['blog_id' => $blog->id, 'title' => $input['title_en'], 'body' => $input['body_en']]);

        Session::flash('create', 'Article Has Been Created Successfully');
        return redirect(adminUrl('blog'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Blog::with('blog_en', 'image')->find($id);
        return view('dashboard.blog.edit', compact('article'));
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
        $input['created_by'] = Auth::user()->id;
        $blog = Blog::with('blog_en', 'image')->find($id);
        //$open_graph = Blog::with('blog_en', 'image')->find($id);
        $request->validate([
            'url'               => 'bail|unique:blog,url,'. $id .'|max:200',
            'title_en'          => 'bail|required|max:200',
            'body_en'           => 'bail|required',
            'title_ar'          => 'bail|required|max:200',
            'body_ar'           => 'bail|required',
            'image_id'          => 'bail|mimes:jpeg,jpg,png,gif',
            'alt'               => 'bail|required',
        ], [], [
            'url'               => ' URL',
            'title_en'          => ' Title in English',
            'description_en'    => ' Body in English',
            'title_ar'          => ' Title in Arabic',
            'description_ar'    => ' Body in Arabic',
            'image_id'          => ' Image',
            'alt'               => ' Alt Text',
        ]);

        //Upload Slide Image
        if ($uploadedFile = $request->file('image_id'))
        {
            $fileName = time() . $uploadedFile->getClientOriginalName();
            $uploadedFile->move(uploadedImagePath() . '/blog', $fileName);
            $filePath = uploadedImagePath() . '/blog/'.$fileName;
            //$image = Image::create(['name' => $fileName, 'path' => $filePath, 'alt' => $input['alt']]);
            $image = new Image();
            $image->name = $fileName;
            $image->path = $filePath;
            $image->alt = $input['alt'];
            $image->save();
            $input['image_id'] = $image->id;
            $blog->image_id = $input['image_id'];
            $blog->image()->update(['name' => $fileName, 'path' => $filePath, 'alt' => $input['alt']]);
        }



        if (empty($input['url']))
        {
            $input['url'] = str_slug($input['title_en']);
        }



        $blog->url = $input['url'];
        $blog->created_by = $input['created_by'];
        $blog->save();


        $blog->blog_ar()->update(['blog_id' => $blog->id, 'title' => $input['title_ar'], 'body' => $input['body_ar']]);
        $blog->blog_en()->update(['blog_id' => $blog->id, 'title' => $input['title_en'], 'body' => $input['body_en']]);
        $blog->page()->update(['url' => $input['url'], 'name' => $input['title_en']]);
        $blog->openGraph()->update(['og_title' => $input['title_en'], 'og_image' =>  $blog->image_id, 'og_description' => $input['body_en'], 'og_url' => $input['url']]);
        $blog->image()->update(['alt' => $input['alt']]);

        Session::flash('create', 'Article Has Been Updated Successfully');
        return redirect(adminUrl('blog'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        $blog->delete();

        try
        {
            if ($blog->image_id)
            {
                unlink(public_path() . '/' . $blog->image->path);
                DB::table('image')->where('id', $blog->image_id)->delete();
            }
        }
        catch (\Exception $e)
        {
            Session::flash('exception', 'Error, Can\'t Delete Blog Because it is related to another item');
            return redirect()->back();
        }

        Session::flash('delete', 'Blog ' . $blog->id . ' Has Been Deleted Successfully');
        return redirect(adminUrl('blog'));
    }
}
