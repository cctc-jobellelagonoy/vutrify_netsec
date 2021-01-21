@extends('journals.layout')
@section('content')
	<div class="container">
	<article>
	<strong><h1>List of Journals</h1></strong>
	</article>
	<a class="btn btn-danger2" href="{{ route('journals.create')}}"> <img class="img-responsive" src="../images/create-icon.png" width="50" height="50"><strong> Create a new Journal</strong></a>
	

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    @foreach ($journals->chunk(4) as $row)
	
    <div class="row row_width">
		<br>
		@foreach ($row as $journal)
		@if($journal->userid === Auth::id())
		<br>
        <div class="col-sm-4">
            <article>
				<div>
                <h5>
                    <span>{{ $index++ }}.</span>
                    <strong>
                        {{ $journal->title }}
                    </strong>
                </h5>
				</div>
                <div>
                    <div class="img-container">
                        <img class="img-responsive" src="../images/journal-icon.png" width="150" height="150">
                    </div>
                    <div class="mc-description">
                       &nbsp;&nbsp;&nbsp;<strong>Description: </strong>{{ $journal->description }}
                    </div>
                </div>
				<br>
                <div class="mc-footer text-center">
                    <form action="{{ route('journals.destroy',$journal->id) }}" method="POST">
						&nbsp;&nbsp;
                        <a class="btn btn-primary" href="{{ route('journals.show',$journal->id) }}"><strong>Show</strong></a>
						&nbsp;&nbsp;
                        <a class="btn btn-primary" href="{{ route('journals.edit',$journal->id) }}"><strong>Edit</strong></a>
						&nbsp;&nbsp;
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger2"><strong>Delete</strong></button>
                    </form>
                </div>
            </article>
			<br>
        </div>
		 @endif
		 @endforeach
    </div>
   
   
    @endforeach

     </div>

    {!! $journals->links() !!}
    @endsection
