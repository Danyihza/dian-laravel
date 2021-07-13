@if(session('success') || session('error') || $errors->any())
<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-{{session('success') ? '9' : '6' }} text-white"> 
    <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> 
    {{session('success') || session('error')}}
    {{ $errors->first() }} 
    <i data-feather="x" class="w-4 h-4 ml-auto"></i> 
</div>
@endif
