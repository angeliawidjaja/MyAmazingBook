<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $orders = Order::with('ebook')->where('account_id', Auth::user()->id)->get();
        // dd($orders);
        return view('pages.cart', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($book_id) {
        Order::create([
            'account_id' => Auth::user()->id,
            'ebook_id' => $book_id,
            'order_date' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
        return redirect()->back()->with('alert','Successfully Add Book into Cart');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveAll()
    {
        $orders = Order::where('account_id', Auth::user()->id)->get();
        foreach ($orders as $item) {
            $item->delete();
        }
        return view('pages.success', ['linkToHome' => true, 'showNavBar' => false]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $previousData = Order::find($id);
        if ($previousData) {
            $previousData->delete();
        }
        return redirect()->back()->with('alert','Successfully Remove Order from Cart');
    }
}
