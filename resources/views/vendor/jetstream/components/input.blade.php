@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-theme-yellow focus:ring focus:ring-transparent focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
