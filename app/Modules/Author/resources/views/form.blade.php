<div class="row">
    <div class="col-md-12">
        <div class="box box-primary color-palette-box">
            <div class="box-body">
                <div class="header">
                    <p class="lead my-1">Create Author</p>
                    <hr class="my-2">
                </div>

                <div class="mb-4">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Name ') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'John Doe']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('bio', 'Biography ') !!}
                                {!!  Form::textarea('bio', null, ['class' => 'form-control', 'required', 'placeholder' => 'Biography of the author']) !!}
                                <small class="text-danger">{{ $errors->first('bio') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::submit('Submit', ['class' => 'btn btn-md btn-primary']) !!}
                            </div>

                        </div>

                    </div>


                </div>
            </div>


        </div>
    </div>
</div>
