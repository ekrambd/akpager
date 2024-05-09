<ol class="dd-list">
    @foreach ($items as $item)
        <li class="dd-item item_actions" data-id="{{ clean($item->id) }}">
            <div class="float-end px-2 pt-2">
                <div class="btn btn-sm btn-danger text-white delete" data-id="{{ clean($item->id) }}"
                    href="{{ route('menus.destroyitem', [ 'menuItem' => clean($item->id) ]) }}"
                    title="@lang('Delete User')" data-method="DELETE" data-confirm-title="@lang('Please Confirm')"
                    data-confirm-text="@lang('Are you sure that you want to delete this Menu Item?')"
                    data-confirm-button="@lang('Yes, delete')">
                    <i class="far fa-trash-alt"></i> {{ __('Delete') }}
                </div>
                <div class="btn btn-sm btn-primary edit" data-id="{{ clean($item->id) }}" data-title="{{ clean($item->title) }}"
                    data-url="{{ clean($item->url) }}" data-target="{{ clean($item->target) }}" data-icon_class="{{ clean($item->icon_class) }}"
                    data-icon_class="{{ clean($item->icon) }}" href="{{ route('menus.updateitem', clean($item->id)) }}">
                    <i class="fas fa-pen"></i> {{ __('Edit') }}
                </div>
            </div>
            <div class="dd-handle">
                @if ($item->icon_class)
                <i class="{{ clean($item->icon_class) }}"></i>
                @endif
                <span>{{ clean($item->title) }}</span> <small class="url">{{ clean($item->link()) }}</small>
            </div>
            @if (!$item->children->isEmpty())
                @include('menu.builder', ['items' => $item->children])
            @endif
        </li>
    @endforeach
</ol>
