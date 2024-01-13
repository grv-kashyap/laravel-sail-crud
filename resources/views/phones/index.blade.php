@extends('layout.common')

@section('content')
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Brand</th>
                <th scope="col">seller</th>
                <th scope="col">Version</th>
                <th scope="col">Pruchased</th>
                <th scope="col">Sell price</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($phones as $phone)
                
            <tr>
                <th scope="row">{{$phone->id}}</th>
                <td>{{$phone->brand}}</td>
                <td>{{$phone->seller}}</td>
                <td>{{$phone->version}}</td>
                <td>{{$phone->purchase_price}}</td>
                <td>{{$phone->sale_price}}</td>
                <td>
                    <a href="{{url('phones/'.$phone->id.'/edit')}}" class="btn btn-success btn-sm">Edit</a>
                    <form method="POST" action="{{route('phones.destroy',$phone->id)}}" class="d-inline">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
