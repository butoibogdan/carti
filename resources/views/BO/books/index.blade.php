@extends('BO.dashboard')

@section('content')
<div class="content">
    <div class="box box-default color-palette-box">
        <div class="box-header with-border"> <h3 class="box-title"><i class="fa fa-th"></i> Books</h3> </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ url('/auth/books/create') }}" class="btn btn-primary" title="Adauga Book"><i class="fa fa-edit"></i> Adauga</a>
                    <br/><br/>

                    <div class="table-responsive">
                        <table class="table table-hover table-borderless">
                            <thead>
                                <tr>
                                    <th> Cover </th>
                                    <th> Name </th>
                                    <th> Author </th>
                                    <th> Tags </th>
                                    <th> Description </th>
                                    <th class="col-sm-1 text-center">Actiuni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $item)
                                <tr>
                                    <td><a target="_blank" href="{{url('books', $item->cover)}}">{{ $item->cover }}</a></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->autor->name }}</td>
                                    <td>
                                        @foreach($item->tags as $tag)
                                            {{ $tag->name.','}}
                                        @endforeach
                                    </td>
                                    <td>{!! str_limit($item->description, 50) !!}</td>
                                    <td>
                                        <a href="{{ url('/auth/books/' . $item->id) }}" class="btn btn-success btn-xs" title="Vizualizeaza"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                        <a href="{{ url('/auth/books/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Modifica"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                        {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['/auth/books', $item->id],
                                        'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Sterge" />', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => 'Sterge',
                                        'onclick'=>'return confirm("Sigur doriti sa stergeti?")'
                                        )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination"> {!! $books->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection