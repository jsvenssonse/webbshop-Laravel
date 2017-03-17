<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Cart;
use Session;

class CartController extends Controller
{
    public function __construct(Request $request)
    {
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
            //Get sessions data "cart"
            $data = Session::all()['cart'];

            $count = 0; //count price
            $countVat = 0; //count var
            $countExkl = 0; //count price -vat

            //loop session and count prices
            foreach ($data as $key => $value) {
                if ($value['Amount'] >= '1') {
                    $count += $value['Price'] * $value['Amount'];
                    $countVat += $value['Vatsum'] * $value['Amount'];
                    $countExkl += $value['Priceexklmoms'] * $value['Amount'];
                } elseif ($value['Amount'] == '0') {
                    $count -= $value['Price'] * $value['Amount'];
                    $countVat -= $value['Vatsum'] * $value['Amount'];
                    $countExkl -= $value['Priceexklmoms'] * $value['Amount'];
                } else {
                    $count += $value['Price'];
                    $countVat -= $value['Vatsum'];
                    $countExkl -= $value['Priceexklmoms'];
                }
            }
            return view('cart')->with('data', $data)->withTotal($count)->withVat($countVat)->withExkl($countExkl);
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
        //Get data from AJAX
        $input = $this->request;
        $addCart = $input->data;
        $serchId = $input->id;

        //Check of cart exists if not create, else push new data, else update with new amount
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
        //retun data to the cart widget with counted price without vat
        $data = Session::all()['cart'];

        $count = 0;
        foreach ($data as $key => $value) {
            if ($value['Amount'] >= '1') {
                $count += $value['Price'] * $value['Amount'];
            } elseif ($value['Amount'] == '0') {
                $count -= $value['Price'] * $value['Amount'];
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
        //Update amount in Cart
        $input = $this->request;
        $update = $input->update;
        $sessionAll = Session::all()['cart'];
        $find = array_search($id, array_column($sessionAll, 'id'));
        if ($update === 'addone') {
            $amount = $sessionAll[$find]['Amount'] + 1;
            Session::put('cart.'.$find.'.Amount', $amount);
        } elseif ($sessionAll[$find]['Amount'] <= '1') {
            Session::put('cart.'.$find.'.Amount', 1);
        } else {
            $amount = $sessionAll[$find]['Amount'] - 1;
            Session::put('cart.'.$find.'.Amount', $amount);
        }
        
        $data = Session::all()['cart'];
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //If remove product from cart set amount to 0
        $sessionAll = Session::all()['cart'];
        $find = array_search($id, array_column($sessionAll, 'id'));
        Session::put('cart.'.$find.'.Amount', '0');
        $data = $sessionAll = Session::all()['cart'];
        return $data;
    }
}
