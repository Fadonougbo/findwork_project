@php
    $newClass??='';
    $addLimite??=true;

    $description=$listing->description;
    $descriptionWithLimit=Str::limit($description,310,'...');
    
@endphp

<p class="text-justify my-2 {{$newClass}} " >
    @if ($addLimite)
        {{$descriptionWithLimit}}
    @else
        {{$description}}
    @endif
</p>