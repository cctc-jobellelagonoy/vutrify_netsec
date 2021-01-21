@extends('journals.layout')
@section('content')

<div class="container">
	<div id="pagewrapper">
	<div id="pagecontainer">
	<a class="btn btn-danger2" href="{{ route('journals.index') }}"> <strong>Return to Journals</strong></a>
        <section class="open-book">
            <header>
                <h1>Journal Entry # {{ $journal->id }}</h1>
                <h6>{{ $journal->created_at }}</h6>
            </header>
            <article>
                <h2 class="chapter-title">	{{ $journal->title }}</h2>
                <p>
                     {{ $journal->description }}
                </p>
			
            </article>
            <footer>
                <ol id="page-numbers">
                    <li>1</li>
                    <li>2</li>
                </ol>
            </footer>
        </section>
    </div>
	</div>
</div>
@endsection
