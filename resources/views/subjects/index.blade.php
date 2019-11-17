<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subject</title>
</head>
<body>
    <h1>Subject</h1>
@if(count($subjects)>0)
@foreach($subjects as $subject)
<div class="well">
    <h3><a href="/subjects/{{ $subject->id }}"> $subject->subj }}</a></h3>
</div>
@endforeach
@else
<p>No Subject Found</p>
@endif
</body>
</html>
