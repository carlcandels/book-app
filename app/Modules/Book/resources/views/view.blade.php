@extends('layouts.app')

@section('content')

    <a href="{{ route('book.create') }}" class="btn btn-md btn-primary pull-right m-1"> Add a Book</a>
    <table class="table table-dark" id="book">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Cover</th>
                <th scope="col">Title</th>
                <th scope="col">Date Published</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>

                    <th scope="row">{{ $book->id }}</th>
                    <td> <img src="{{ isset($book->image_url) ? $book->image_url : 'https://via.placeholder.com/150x200' }}" alt=""> </td>
                    <td>{{ $book->title }}</td>
                    <td>{{ Help::parse_date($book->publised_at) }}</td>
                    <td>{{ Help::parse_date($book->created_at) }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></a>

                        <a href="{{ route('book.edit', $book->slug) }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil
                            "></i></a>

                        <button class="btn btn-sm btn-danger btn_delete" data-id="{{ $book->id }}" data-title="{{ $book->title }}"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>

    <div class="modal" tabindex="-1" role="dialog" id="modal-delete-book">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <span id="dtitle"></span></p>
                </div>
                <div class="modal-footer">
                    {!! Form::open(['method' => 'delete', 'route' => ['book.delete']]) !!}
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

			$('#book').on('click', '.btn_delete', function(){

				var id = $(this).attr('data-id');
				var title = $(this).attr('data-title');

				$('#did').val(id);
				$('#dtitle').text(title);

				$('#modal-delete-book').modal('show');

			});

		});
	</script>
@append
