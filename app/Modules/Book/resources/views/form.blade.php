<div class="row">
    <div class="col-md-12">
        <div class="box box-primary color-palette-box">
            <div class="box-body">
                <div class="header">
                    @if (isset($book))
                        <p class="lead my-1">Update Book</p>
                    @else
                        <p class="lead my-1">Create Book</p>
                    @endif

                    <hr class="my-2">
                </div>

                <div class="mb-4">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                {!! Form::label('Cover Image: ', '') !!}
                                {!! Form::file('image') !!}
                                <small class="text-danger">{{ $errors->first('image') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                {!! Form::label('title', 'Title ') !!}
                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Harry Potter', 'required']) !!}
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {!! Form::label('description', 'Description ') !!}
                                {!!  Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Book Description']) !!}
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('published_at') ? ' has-error' : '' }}">
                                {!! Form::label('published_at', 'Publish Date ') !!}

                                {!! Form::date('published_at', \Carbon\Carbon::now(), ['class' => 'form-control', 'required']) !!}

                                <small class="text-danger">{{ $errors->first('published_at') }}</small>
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Submit', ['class' => 'btn btn-md btn-primary']) !!}
                            </div>

                        </div>

                    </div>


                </div>
            </div>


        </div>
    </div>
</div>
