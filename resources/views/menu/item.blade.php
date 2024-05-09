<li>
    <a href="{{ $item->url }}" class="ai-icon">
        @if ($item->icon_class)
        <i class="{{clean($item->icon_class)}}"></i>
        @endif
        <span class="nav-text">{{ trans($item->title) }}</span>
    </a>
</li>
