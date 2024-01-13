@extends('layout.common')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ url('phones/'.$phone->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="sellerName" class="form-label">Seller Name</label>
                    <input type="text" class="form-control" name="seller" id="sellerName" aria-describedby="emailHelp" value="{{ $phone->seller }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Brand</label>
                    <input type="text" class="form-control" id="brand" name="brand" value="{{ $phone->brand }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Version</label>
                    <input type="text" class="form-control" id="version" name="version" value="{{ $phone->version }}">
                </div>
                <div class="mb-3">
                    <label for="purchase_price" class="form-label">purchase price</label>
                    <input type="text" class="form-control" name="purchase_price" id="prprice" value="{{ $phone->purchase_price }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Sale Price</label>
                    <input type="text" class="form-control" name="sale_price" id="sale_price" value="{{ $phone->sale_price }}">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                
            </form>
        </div>
    </div>
@endsection
