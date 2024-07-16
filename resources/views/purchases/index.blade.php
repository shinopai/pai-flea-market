<x-app-layout>
  <div class="page-wrap">
    <h2 class="page-heading">{{ $item->name }}</h2>
    <div class="items-show">
      <div class="items-show__content flex">
        <figure>
          @empty($item->image)
          <img
            src="{{ asset('img/item_sample.webp') }}"
            alt="商品サンプル画像"
          />
          @else
          <img
            src="{{ asset('/storage/'.$item->image) }}"
            alt="{{ $item->name }}"
          />
          @endempty
        </figure>
        <table>
          <tr>
            <td class="heading">カテゴリー</td>
            <td>
              {{ $item->category->category->name }}/{{ $item->category->name }}
            </td>
          </tr>
          <tr>
            <td class="heading">商品の状態</td>
            <td>{{ $item->status->name }}</td>
          </tr>
        </table>
      </div>
      <p class="items-show__price">
        &yen;&nbsp;{{ number_format($item->price) }}
      </p>
      <form action="" method="POST">
        <button type="submit" class="items-show__btn">購入する</button>
      </form>
    </div>
  </div>
</x-app-layout>
