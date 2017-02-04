@extends('BO.dashboard')

@section('content')
<div class="content">
    <div class="box box-success">
        <div class="box-header with-border"> <h3 class="box-title"><i class="fa fa-th"></i> Adauga Author</h3> </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    {!! Form::open(['url' => '/auth/authors', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('BO.authors.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection