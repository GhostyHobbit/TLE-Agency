<nav>
    @props(['active' => false])

    @if($active)
        <a {{ $attributes->merge(['class' => 'nav-link-mine active']) }}>
            {{ $slot }}
        </a>
    @else
        <a {{ $attributes->merge(['class' => 'nav-link-mine']) }}>
            {{ $slot }}
        </a>
    @endif
</nav>
