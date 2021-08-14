<input {{ $attributes }}>
<div class="absolute top-4 right-3"> 
    <img 
    wire:loading
    wire:target="{{  $attributes->whereStartsWith('wire:model')->first() }}"
    src="{{ asset('img/circle_loading.gif') }}" 
    width="20" 
    height="20"
    class="m-auto">
</div>