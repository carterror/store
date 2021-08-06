@props(['disabled' => false])

<div class="input-field col s6">
    <i class="mdi-action-account-circle prefix"></i>
    <input id="icon_prefix" type="text" class="validate" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => '']) !!}>
    <label for="icon_prefix">First Name</label>
  </div>