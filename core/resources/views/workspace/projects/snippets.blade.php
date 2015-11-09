@extends('layouts.workspace.single-project')

@section('context')
<div class='context'>
	<button class='btn btn-warning' id='new-btn'>New Snippet</button>
</div>
@endsection('context')


@section('navigation')
<a href='/workspace/projects'><span class='fa fa-folder-open-o'></span> Projects</a>
<span class='fa fa-angle-right'></span>
<a href='/workspace/projects/{{ $project->id }}'>{{ $project->title }}</a>
<span class='fa fa-angle-right'></span>
<a href='/workspace/projects/{{ $project->id }}/snippets'><span class='fa fa-star-o'></span> Snippets</a>
@endsection('navigation')

@section('page-content')

<div class='row'>
	@include('helpers.showAllMessages')
    <div class='col-md-12'>
    	<div class='row' id='new'>
			<div class='col-md-6' >
				<h3>Create Snippet</h3>
				<form action='/api/v1/snippets' method='post' id='create-snippet'>
					<div class='form-group'>
						<input class='form-control' type='url' name='url' placeholder='Snippet URL'/>
					</div>
					<div class='form-group'>
						<input class='form-control' type='text' name='title' placeholder='Page Title'/>
					</div>
					<div class='form-group'>
						<textarea class='form-control' type='text' name='text' placeholder='Snippet Text'></textarea>
					</div>
					<input type='hidden' name='project_id' value='{{ $project->id }}' />
					<button class='cancel btn btn-danger'>Cancel</button>
					<div class='pull-right'>
						<button type='submit' class='btn btn-primary'>Create</button>
					</div>
				</form>
			</div>
		</div>

		@if (count($snippets) == 0)
		<p>No snippets have been saved.</p>
		@endif

		<ul id='snippet-list'>
		</ul>

		@include('helpers.dataTemplates')

	</div>
</div>

<script src='/js/realtime.js'></script>
<script src='/js/data/snippet.js'></script>
<script>
Config.setAll({
	permission: '{{ $permission }}',
	projectId: {{ $project->id }},
	userId: {{ $user->id }},
	realtimeEnabled: {{ env('REALTIME_SERVER') == null ? 'false' : 'true'}},
	realtimeServer: '{{ env('REALTIME_SERVER') }}'
});


var snippetList = new SnippetCollection();
snippetList.fetch({
	data: {
		project_id: Config.get('projectId')
	}
});

var snippetListView = new SnippetListView({collection: snippetList});

$('#create-snippet').on('submit', function(e){
	e.preventDefault();
	var projectId = Config.get('projectId');
	var textInput = $(this).find('textarea[name=text]');
	var urlInput = $(this).find('input[name=url]');
	var titleInput = $(this).find('input[name=title]');
	$.ajax({
		url: '/api/v1/snippets',
		method: 'post',
		data: {
			'project_id' : projectId,
			'text': textInput.val(),
			'url': urlInput.val(),
			'title': titleInput.val()
		},
		complete: function(xhr) {
			var json = JSON.parse(xhr.responseText);
			if (json) {
				MessageDisplay.displayIfError(json);
			}	
		},
		success: function(response) {
			snippetList.add(new SnippetModel(response.result));
			urlInput.val('');
			textInput.val('');
			titleInput.val('');
		}
	});
});

$("#create-snippet .cancel").on("click", function(e){
	e.preventDefault();
	$("#new").fadeOut(150);
})

$("#new-btn").on('click', function(){
	$("#new").fadeIn(150);
})

</script>
@endsection('page-content')