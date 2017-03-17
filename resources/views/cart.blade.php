@include('navbar')
@extends('master')
@section('content')
<meta name="csrf_token" content="{{ csrf_token() }}" />
<div class="widget">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Amount</th>
                <th>Price</th>
                <th>Code</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="products">

        @foreach ($data as $product)
            @if ($product['Amount'] > 0)
            <tr>
                <td>{{$product['Name']}}</td>
                <td>{{$product['Amount']}}</td>
                <td>{{$product['Price']}}</td>
                <td>{{$product['id']}}</td>
                    
                
                <td>
                    <a href="/cart" class="btn btn-primary addone" code="{{$product['id']}}" data-link="{{ url('/cart') }}" data-token="{{ csrf_token() }}">+</a> 
                    <a href="/cart" class="btn btn-primary removeone" code="{{$product['id']}}" data-link="{{ url('/cart') }}" data-token="{{ csrf_token() }}">-</a>
                    <a href="/cart" class="btn btn-primary remove" code="{{$product['id']}}" data-link="{{ url('/cart') }}" data-token="{{ csrf_token() }}">Remove</a>
                </td>
            </tr>
            @endif
        @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Vat</b></td>
                <td>{{$vat}}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Excl.VAT</b></td>
                <td>{{$exkl}}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Total Price</b></td>               
                <td>{{$total}}</td>
            </tr>
            
        </tbody>
    </table>
</div>


@endsection