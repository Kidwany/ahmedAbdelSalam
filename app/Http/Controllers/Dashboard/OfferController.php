<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Offer;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::with('offer_en', 'image', 'createdBy')->get();
        return view('dashboard.offer.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.offer.create');
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
            'body_en'           => 'bail|required',
            'title_ar'          => 'bail|required|max:200',
            'body_ar'           => 'bail|required',
            'image_id'          => 'bail|required|mimes:jpeg,jpg,png,gif',
            'alt'               => 'bail|required|max:200',
        ], [], [
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
            $uploadedFile->move(uploadedImagePath() . '/offer', $fileName);
            $filePath = uploadedImagePath() . '/offer/'.$fileName;
            $image = new Image();
            $image->name = $fileName;
            $image->path = $filePath;
            $image->alt = $input['alt'];
            $image->save();
            //$image = Image::create(['name' => $fileName, 'path' => $filePath, 'alt' => $input['alt']]);
            $input['image_id'] = $image->id;
        }



        $offer = new Offer();
        $offer->image_id = $input['image_id'];
        //$offer->created_by = $input['created_by'];
        $offer->save();

        $offer->offer_ar()->create(['offer_id' => $offer->id, 'title' => $input['title_ar'], 'body' => $input['body_ar']]);
        $offer->offer_en()->create(['offer_id' => $offer->id, 'title' => $input['title_en'], 'body' => $input['body_en']]);

        Session::flash('create', 'Offer Has Been Created Successfully');
        return redirect(adminUrl('offer'));
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
        $offer = Offer::with('offer_en', 'image')->find($id);
        return view('dashboard.offer.edit', compact('offer'));
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
        $offer = Offer::with('offer_en', 'image')->find($id);
        //$open_graph = Offer::with('offer_en', 'image')->find($id);
        $request->validate([
            'title_en'          => 'bail|required|max:200',
            'body_en'           => 'bail|required',
            'title_ar'          => 'bail|required|max:200',
            'body_ar'           => 'bail|required',
            'image_id'          => 'bail|mimes:jpeg,jpg,png,gif',
            'alt'               => 'bail|required',
        ], [], [
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
            $uploadedFile->move(uploadedImagePath() . '/offer', $fileName);
            $filePath = uploadedImagePath() . '/offer/'.$fileName;
            //$image = Image::create(['name' => $fileName, 'path' => $filePath, 'alt' => $input['alt']]);
            $image = new Image();
            $image->name = $fileName;
            $image->path = $filePath;
            $image->alt = $input['alt'];
            $image->save();
            $input['image_id'] = $image->id;
            $offer->image_id = $input['image_id'];
            $offer->image()->update(['name' => $fileName, 'path' => $filePath, 'alt' => $input['alt']]);
        }


        //$offer->created_by = $input['created_by'];
        $offer->save();


        $offer->offer_ar()->update(['offer_id' => $offer->id, 'title' => $input['title_ar'], 'body' => $input['body_ar']]);
        $offer->offer_en()->update(['offer_id' => $offer->id, 'title' => $input['title_en'], 'body' => $input['body_en']]);
        $offer->image()->update(['alt' => $input['alt']]);

        Session::flash('create', 'Offer Has Been Updated Successfully');
        return redirect(adminUrl('offer'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::find($id);

        $offer->delete();

        try
        {
            if ($offer->image_id)
            {
                unlink(public_path() . '/' . $offer->image->path);
                DB::table('image')->where('id', $offer->image_id)->delete();
            }
        }
        catch (\Exception $e)
        {
            Session::flash('exception', 'Error, Can\'t Delete Offer Because it is related to another item');
            return redirect()->back();
        }

        Session::flash('delete', 'Offer ' . $offer->id . ' Has Been Deleted Successfully');
        return redirect(adminUrl('offer'));
    }
}
