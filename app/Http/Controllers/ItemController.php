<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
class ItemController extends Controller
{
    /**
     * ItemController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        if (Auth::user()){
            if (Auth::user()->isAdmin()){
                return view('shop.admin.index', compact('items'));
            }
        }
        return view('shop.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Item::create($request->all());

        $this->saveImage($request, $item);

        return redirect('/shop');
    }

    private function saveImage(Request $request, $item) {

        Storage::put(
            'itemImages/' . $item->getID() . $request->file('image')->getClientOriginalName(),
            file_get_contents($request->file('image')->getRealPath())
        );




//        $file = Input::file('image');
//        $file = file_get_contents($request->image);
//
//        $extension = pathinfo($file, PATHINFO_EXTENSION);
//        $imgName = $request->name . $extension;
//        $destinationPath = 'resources/images/itemImages/';
//        $file->move($destinationPath . $imgName);
//        //file_put_contents($destinationPath, $image);
//
//        $request->image = $destinationPath . $imgName;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::where('id', $id)->first();
        if (Auth::user()){
            if (Auth::user()->isAdmin()){
                return view('shop.admin.item', compact('item'));
            }
        }
        return view('shop.item', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);

        return view('shop.admin.edit', ['model' => $item]);
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
        $item = Item::findOrfail($id);

        $item->update($request->all());

        return redirect(route('shop.admin.edit', ['id' => $item->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::where('id', $id)->delete();
        return redirect('/shop');
    }
}
