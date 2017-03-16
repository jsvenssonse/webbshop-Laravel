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
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody class="products">

        @foreach ($data as $product)
			<tr>
                <td>{{$product['Name']}}</td>
                <td>{{$product['Amount']}}</td>
                <td>{{$product['Price']}}</td>
                <td>Antal</td>
                <td><div class="btn btn-primary remove" code="{{$product['id']}}" data-link="{{ url('/test') }}" data-token="{{ csrf_token() }}">Remove</div></td>
            </tr>

        @endforeach

     		<tr>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Total Price</b></td>
                <td>{{$author}}</td>
            </tr>
			
        </tbody>
    </table>
</div>


@endsection