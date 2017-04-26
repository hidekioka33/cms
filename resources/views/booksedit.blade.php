@extends('layouts.app')
@section('content')

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6">
            
            @include('common.errors')
            
            <form action="{{url('books/update')}}" method="POST" class="form-horizontal">

                <div class="form-group">
                    <label for="book" class="col-sm-3 control-label">Book</label>
                    <div class="col-sm-6">
                        <input type="text" name="item_name" id="book-name" class="form-control" value="{{$book->item_name}}">
                    </div>
                </div>
 
                <div class="form-group">
                    <label for="amount" class="col-sm-3 control-label">Amount</label>
                    <div class="col-sm-6">
                        <input type="text" name="item_amount" id="book-amount" class="form-control" value="{{$book->item_amount}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="col-sm-3 control-label">Price</label>
                    <div class="col-sm-6">
                        <input type="text" name="item_number" id="book-price" class="form-control" value="{{$book->item_number}}">
                    </div>
                </div>

        
        <div class="form-group">
            <div class="well well-sm">
                <button type="submit" class="btn btn-default"><i class="fa fa-plus"></i>Save
                </button>
                <a class="btn btn-link pull-right" href="{{url('/')}}">BACK</a>
            </div>
        </div>
            <input type="hidden" name="id" value="{{$book->id}}" />
            {{csrf_field()}}
        
        </form>
     </div>
</div>
        
@endsection