{{-- <div> --}}
    <button {!! $attributes !!}>
        <img 
        wire:loading
        wire:target="{{  $attributes->whereStartsWith('wire:click')->first() }}"
        src="{{ asset('img/circle_loading.gif') }}" 
        width="20" 
        height="20"
        class="m-auto">{{ $slot }}</button>
{{-- </div> --}}