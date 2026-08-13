<button {{ $attributes->merge(['type' => 'submit', 'class' => 'sombra-btn-primary']) }}>
    {{ $slot }}
</button>
