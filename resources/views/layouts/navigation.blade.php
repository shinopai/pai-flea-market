@php
// 検索エリアのselectを動的に生成する為の情報を取得
$categories = App\Models\SubCategory::all();

$ladies = $categories->where('category_id', 1);
$mens = $categories->where('category_id', 2);
$baby_kids = $categories->where('category_id', 3);
$others = $categories->where('category_id', 4);
@endphp

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 header">
    <!-- Primary Navigation Menu -->
    <div class="header__inner flex">
        <!-- Logo -->
        <a href="{{ route('items.index') }}" class="contents">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
        </a>

        <!-- Settings Dropdown -->
        <div class="item flex">
            <form action="{{ route('items.search') }}" method="GET" class="form">
                <select name="sc">
                    <optgroup label="レディース">
                        @foreach ($ladies as $item)
                        <option value="{{ $item->id }}" @if($item->id === (int)old('category_id')) selected @endif>
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </optgroup>
                    <optgroup label="メンズ">
                        @foreach ($mens as $item)
                        <option value="{{ $item->id }}" @if($item->id === (int)old('category_id')) selected @endif>
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </optgroup>
                    <optgroup label="ベビー/キッズ">
                        @foreach ($baby_kids as $item)
                        <option value="{{ $item->id }}" @if($item->id === (int)old('category_id')) selected @endif>
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </optgroup>
                    <optgroup label="その他">
                        @foreach ($others as $item)
                        <option value="{{ $item->id }}" @if($item->id === (int)old('category_id')) selected @endif>
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </optgroup>
                </select>
                <input type="text" name="st" id="">
                <button type="submit">
                    <img src="{{ asset('img/icn-search.webp') }}" alt="検索">
                </button>
            </form>
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</nav>
