<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\galleryRequest;
use App\gallery;
use App\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gallery::with(['travel_package'])->get();

        return view ('pages.admin.gallery.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travel_packages = TravelPackage::all();
        return view ('pages.admin.gallery.create',[
            'travel_packages' => $travel_packages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $data = $request-> all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery','public'
        );

        gallery::create($data);
        return redirect()->route('gallery.index');
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
        $item = gallery::findOrfail($id);
        $travel_packages = TravelPackage::all();

        return view('pages.admin.gallery.edit',[
            'item'=>$item,
            'travel_packages' => $travel_packages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(galleryRequest $request, $id)
    {
        $data = $request-> all(); //mengambil semua data pada database
        $data['image'] = $request->file('image')->store(
            'assets/gallery','public'
        );

        $item = gallery::findOrfail($id); //ini agar kalo ga ada datanya muncul error

        $item->update($data); //fungsi untuk update data
        return redirect()->route('gallery.index'); //mengembalikan ke index jika berhasil
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = gallery::findOrfail($id);

        $item->delete();

        return redirect()->route('gallery.index'); //mengembalikan ke index jika berhasil
    }
}
