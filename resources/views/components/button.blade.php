<button {{ $attributes->merge(['type' => 'submit', 'class' => 'waves-effect waves-light btn']) }}>
    {{ $slot }}
</button>