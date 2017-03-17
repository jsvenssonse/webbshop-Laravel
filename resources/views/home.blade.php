@include('navbar')
@extends('master')
@section('content')
<meta name="csrf_token" content="{{ csrf_token() }}" />

<div class="row">
    <div class="col-xs-6 col-md-8">
        <div id="products" class="row list-group">
             @foreach ($data as $data)
                <div class="col-xs-4 col-lg-6 item">
                    <div class="row padding">
                        <img class="group list-group-image padding" src="http://placehold.it/400x250/000/fff" alt="" />
                    </div>
                    <div class="caption">
                    

                        <h3 class="group inner list-group-item-heading"> {{$data['name']}}</h3>
                        <p class="group inner list-group-item-text">
                            Artikelnr: {{$data['code']}}
                        </p>
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <h4>
                                Pris: <b">{{$data['price_ink_moms']}}</b></h4>
                                
                            </div>
                            <div class="col-xs-12 col-md-8">
                                <form class="form-inline pull-right">
                                    <div class="form-group">
                                        <input type="text" class="form-control amount" id={{$data['code']}} value="1">
                                        <div class="btn btn-primary submitToCart" data={{$data['code']}} name={{$data['name']}} price_ink_moms={{$data['price_ink_moms']}} moms="{{$data['moms']}}" vat="{{$data['vat']}}" price="{{$data['price']}}" data-link="{{ url('/test') }}" data-token="{{ csrf_token() }}">Add to cart</div>
                                        </input>
                                        
                                        <h5>(varav moms: {{$data['vat']}}%)</h5>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
     
    <div class="col-xs-6 col-md-4 carten">

    </div>

</div>
   
@endsection
