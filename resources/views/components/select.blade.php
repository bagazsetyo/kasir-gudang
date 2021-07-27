@props(['disabled' => false])
@foreach (config('helper.type') as $t)
<input id="{{ $t }}" value="{{ $t }}" {!! $attributes->merge(['class' => 'form-radio']) !!}> <label for="{{ $t }}"> {{ $t }}</label>
@endforeach