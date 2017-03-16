
<meta name="csrf_token" content="{{ csrf_token() }}" />

<div class="widget">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Amount</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody class="products">

        @foreach ($data as $product)
			<tr>
                <td>{{$product['Name']}}</td>
                <td>{{$product['Amount']}}</td>
                <td>{{$product['Price']}}</td>
            </tr>

        @endforeach
     		<tr>
                <td><b>Total Price</b></td>
                <td></td>
                <td>{{$author}}</td>
            </tr>
			
        </tbody>
    </table>
</div>


