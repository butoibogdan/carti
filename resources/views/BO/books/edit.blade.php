@extends('BO.dashboard')

@section('content')
<script>
    $(document).ready(function () {
        $('#finput').fileinput({
            showUpload: false,
            initialPreview: [
                '<img width="100" src="{{url("books",$book->cover)}}" class="file-preview-image">'
            ]
        });
    });
</script>
<div class="content">
    <div class="box box-primary">
        <div class="box-header with-border"> <h3 class="box-title"><i class="fa fa-th"></i> Modifica :: <strong>Book</strong></h3> </div>

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

                    {!! Form::model($book, [
                    'method' => 'PATCH',
                    'url' => ['/auth/books', $book->id],
                    'class' => 'form-horizontal',
                    'files' => true
                    ]) !!}

                    @include ('BO.books.formedit', ['submitButtonText' => 'Salveaza'])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection