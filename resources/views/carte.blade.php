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


     		<tr>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Total Price</b></td>
                <td></td>
            </tr>
			
        </tbody>
    </table>
</div>


@endsection