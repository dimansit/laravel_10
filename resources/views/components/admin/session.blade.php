@if(session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
@elseif(session()->has('error'))
    {{session()->get('error')}}
@endif

