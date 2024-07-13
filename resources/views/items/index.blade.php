<x-app-layout>
  <a href="{{ route('items.create') }}" class="listing-btn">
    <p>出品</p>
    <i class="fa-solid fa-camera"></i>
  </a>
  <div class="page-wrap">
    <div class="items flex">
      @foreach ($items as $item)
      <a href="{{ route('items.show', ['item' => $item->id]) }}" target="_blank" class="contents">
        <div class="items__item">
          <figure>
            @empty($item->image)
            <img src="{{ asset('img/item_sample.webp') }}" alt="商品サンプル画像">
            @else
            <img src="{{ asset('/storage/'.$item->image) }}" alt="{{ $item->name }}">
            @endempty
            <span>&yen;&nbsp;{{ number_format($item->price) }}</span>
          </figure>
          <div>
            <p>{{ $item->category->category->name }}/{{ $item->category->name }}</p>
            <h3>{{ $item->name }}</h3>
          </div>
        </div>
      </a>
      @endforeach
    </div>
    {{ $items->links() }}
  </div>
</x-app-layout>
