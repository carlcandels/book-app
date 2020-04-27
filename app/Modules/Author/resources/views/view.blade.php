@extends('layouts.app')

@section('content')

    <a href="{{ route('author.create') }}" class="btn btn-md btn-primary pull-right m-1"> Add an Author</a>
    <table class="table table-dark" id="author">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>

                    <th scope="row">{{ $author->id }}</th>
                    <td>{{ $author->name }}</td>
                    <td>{{ Help::parse_date($author->created_at) }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></a>

                        <a href="{{ route('author.edit', $author->slug) }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil
                            "></i></a>

                        <button class="btn btn-sm btn-danger btn_delete" data-id="{{ $author->id }}" data-name="{{ $author->name }}"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>

    <div class="modal" tabindex="-1" role="dialog" id="modal-delete-author">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Author</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <span id="dname"></span>s Record</p>
                </div>
                <div class="modal-footer">
                    {!! Form::open(['method' => 'delete', 'route' => ['author.delete']]) !!}
                    {!! Form::hidden('did', null, ['id' => 'did']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection()

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){

			$('#author').on('click', '.btn_delete', function(){

				var id = $(this).attr('data-id');
				var name = $(this).attr('data-name');

				$('#did').val(id);
				$('#dname').text(name);

				$('#modal-delete-author').modal('show');

			});

		});
	</script>
@append
