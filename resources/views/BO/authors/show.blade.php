@extends('BO.dashboard')

@section('content')
<div class="content">
    <div class="box box-default color-palette-box">
        <div class="box-header with-border"> <h3 class="box-title"><i class="fa fa-th"></i> Author :: {{ $author->id }}</h3> </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ url('auth/authors/' . $author->id . '/edit') }}" class="btn btn-primary" title="Modifica"><i class="fa fa-edit"></i> Modifica</a>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['auth/authors', $author->id],
                        'style' => 'display:inline'
                    ]) !!}
                        {!! Form::button('<i class="fa fa-trash"></i> Sterge', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger',
                                'title' => 'Sterge',
                                'onclick'=>'return confirm("Sigur doriti sa stergeti?")'
                        ))!!}
                    {!! Form::close() !!}

                    <br/><br/>

                    <div class="table-responsive">
                        <table class="table table-hover table-borderless">
                            <tbody>
                                <tr>
                                    <th>ID</th><td>{{ $author->id }}</td>
                                </tr>
                                <tr><th> Name </th><td> {{ $author->name }} </td></tr><tr><th> Description </th><td> {{ $author->description }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="form-group">
                <div class="col-md-2 col-xs-offset-10"><a href = "{{ url('/auth/authors') }}" class = 'btn btn-block btn-default btn-sm'>Inapoi la lista</a></div>
            </div>
        </div>
    </div>
</div>
@endsection