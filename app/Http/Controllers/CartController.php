<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Cart;
use Session;
class CartController extends Controller
{
    public function __construct(Request $request) {
        $this->request = $request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       
        if (session::all()['cart']) {
            $data = Session::all()['cart'];
            //dd( $data[0]['Name']);
            $count = 0;
            foreach ($data as $key => $value) {
                if($value['Amount'] >= '1'){
                    $count += $value['Price'] * $value['Amount'];
                } else {
                    $count += $value['Price'];
                }  
            
            }
            return view('cart')->with('data', $data)->withAuthor($count);
        } else {
            return view('carte');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {   
        $input = $this->request;
        $addCart = $input->data;
        $serchId = $input->id;
        if (session::exists('cart')) {
            $sessionAll = Session::all()['cart'];
            $find = array_search($serchId, array_column($sessionAll, 'id'));
            if ($find===false) {
                Session::push('cart', $addCart);
            } else {
                $nr1 = $sessionAll[$find]['Amount'];
                Session::put('cart.'.$find.'.Amount', $addCart['Amount']+$nr1);
            }
            
        } else {
            Session::push('cart', $addCart);
        }
        $data = Session::all();
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = Session::all()['cart'];
        //dd( $data[0]['Name']);
        $count = 0;
        foreach ($data as $key => $value) {
            if ($value['Amount'] >= '1') {
                $count += $value['Price'] * $value['Amount'];
            } else {
                $count += $value['Price'];
            }  
        }
       
        return view('cartw')->with('data', $data)->withAuthor($count);
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
    public function update(Request $request, $id)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sessionAll = Session::all()['cart'];
        $find = array_search($id, array_column($sessionAll, 'id'));
        Session::forget('cart.'.$find);
        $data = $sessionAll = Session::all()['cart'];
        return $data;
    }
}