@extends('layouts.app')
@section('content')

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <div class="panel-body col-xs-12 col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6">
           
            @include('common.errors')
            
            <form action="{{url('books')}}" method="POST" class="form-horizontal">
                {{csrf_field()}}
            
                <div class="form-group">
                    <label for="book" class="col-sm-3 control-label">Book</label>
                    <div class="col-sm-6">
                        <input type="text" name="item_name" id="book-name" class="form-control">
                    </div>
                </div>
 
                <div class="form-group">
                    <label for="amount" class="col-sm-3 control-label">Amount</label>
                    <div class="col-sm-6">
                        <input type="text" name="item_amount" id="book-amount" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="col-sm-3 control-label">Price</label>
                    <div class="col-sm-6">
                        <input type="text" name="item_number" id="book-price" class="form-control">
                    </div>
                </div>

        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default"><i class="fa fa-plus"></i>Save
                </button>
            </div>
        </div>
        </form>
        
        // show current book list
        @if(count($books)>0)
            <div class='panel panel-default'>

                <div class='panel-heading'>
                    現在の本
                </div>

                <div class='panel-body'>
                    <div>
                        <div class-"col-mid-4 col-md-offset-4">
                            {{$books->links()}}
                        </div>
                    </div>    

                    <table class="table table-striped task-table">
                        
                        <thead>
                            <th>本一覧</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                            <tr>
                                <td class ="table-text">
                                    <div>{{$book->item_name}}</div>
                                </td>

                                 <td>
                                    <form action="{{url('booksedit/'.$book->id)}}" method="POST">
                                        {{csrf_field()}}

                                        <button type="submit" class="btn btn-primary">
                                            <i class="glyphicon glyphicon-trash"></i>UPDATE
                                        </button>
                                    </form>
                                </td>


                                
                                <td>

                                    <form action="{{url('delete/'.$book->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>DELETE
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>

                <div>
                    <div class-"col-mid-4 col-md-offset-4">
                        {{$books->links()}}
                    </div>
                </div>    

            </div>
        @endif
    
        
    </div>
        
@endsection