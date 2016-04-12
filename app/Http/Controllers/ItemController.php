<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use File;
use Illuminate\Http\Response;
use Image;
use Storage;
use DB;

class ItemController extends Controller
{
    /**
     * ItemController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['except' => ['index', 'show', 'buy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('category')->get();

        if (Auth::user()){
            if (Auth::user()->admin){
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
        $this->validate($request, [
            'name' => 'required|max:20',
            'description' => 'required|max:500',
            'price' => 'required|integer|min:0',
            'number' => 'required|integer|min:0',
            'available' => 'required|integer|min:0',
            'category' => 'required',
            'image' => 'required|image',
        ]);

        $item = Item::create($request->all());

        $this->saveImage($request, $item);

        //dd($item);
        //$item->update


        return redirect('/shop');
    }

    private function saveImage(Request $request, $item) {

        $nameBig = 'B_' . time() . '_' . $request->file('image')->getClientOriginalName();
        $pathBig = storage_path('app/itemImages/big/' . $nameBig);
        $nameSmall = 'S_' . time() . '_' . $request->file('image')->getClientOriginalName();
        $pathSmall = storage_path('app/itemImages/small/' . $nameSmall);

//        if (isset($item->big_image) || isset($item->small_image)) {
//            File::delete([base_path('storage/app/itemImages/big/' . $item->big_image),
//                            base_path('storage/app/itemImages/small/' . $item->small_image)]);
//        }

        Image::make( $request->file('image')->getRealPath() )->resize(150, 150)->save($pathBig);
        Image::make( $request->file('image')->getRealPath() )->resize(50, 50)->save($pathSmall);

        $item->big_image = $nameBig;
        $item->small_image = $nameSmall;
        $item->save();

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
            if (Auth::user()->admin){
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
        $this->validate($request, [
            'name' => 'required|max:20',
            'description' => 'required|max:500',
            'price' => 'required|integer|min:0',
            'number' => 'required|integer|min:0',
            'available' => 'required|integer|min:0',
            'category' => 'required',
            'image' => 'image',
        ]);

        $item = Item::findOrfail($id);

        $item->update($request->all());
        if ($request->image) {
            $this->saveImage($request, $item);
        }

        $request->session()->flash('alert-success', 'Changes ware successful!');

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

    public function buy(Request $request)
    {
        $item = Item::findOrfail($request->id);
        $inventory = Auth::user()->inventory;

        if ($inventory->money >= $item->price) {
            $inventory[$item->category] += $item->number;
            $inventory->money -= $item->price;
            $item->available -= 1;

            $inventory->save();
            $item->save();

            $request->session()->flash('alert-success', 'Item was successful bought!');
        } else {
            $request->session()->flash('alert-danger', 'Not enough money!');
        }


        if (Auth::user()->admin){
            return redirect('/shop/admin/' . $request->id);
        } else {
            return redirect('/shop/' . $request->id);
        }

    }
}
