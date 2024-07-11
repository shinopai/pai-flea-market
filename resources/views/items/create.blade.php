<x-app-layout>
  <div class="page-wrap">
    <h2 class="page-heading">商品を出品する</h2>
    <form action="{{ route('items.store') }}" method="post" class="items-create-form" enctype="multipart/form-data">
      @csrf
      <div class="items-create-form__item">
        <label>商品画像</label>
        <label for="image" class="image">
          <span>写真</span>
          <input type="file" name="image" id="image">
        </label>
        <figure class="preview" id="preview">
          <figcaption>プレビュー</figcaption>
          <img src="" id="preview_image" alt="">
        </figure>
        @error('image')
        <ul class="err-msg">
          <li>{{ $message }}</li>
        </ul>
        @enderror
      </div>
      <div class="items-create-form__item">
        <label for="name">商品名</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
        <ul class="err-msg">
          <li>{{ $message }}</li>
        </ul>
        @enderror
      </div>
      <div class="items-create-form__item">
        <label for="introduction">商品の説明</label>
        <textarea name="introduction" id="introduction" cols="30" rows="5">{{ old('introduction') }}</textarea>
        @error('introduction')
        <ul class="err-msg">
          <li>{{ $message }}</li>
        </ul>
        @enderror
      </div>
      <div class="items-create-form__item">
        <label for="category">カテゴリー</label>
        <select name="category_id" id="category">
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
        @error('category_id')
        <ul class="err-msg">
          <li>{{ $message }}</li>
        </ul>
        @enderror
      </div>
      <div class="items-create-form__item">
        <label for="status">商品の状態</label>
        <select name="status_id" id="status">
          @foreach ($statuses as $status)
          <option value="{{ $status->id }}" @if($status->id === (int)old('status_id')) selected @endif>{{ $status->name }}</option>
          @endforeach
        </select>
        @error('status_id')
        <ul class="err-msg">
          <li>{{ $message }}</li>
        </ul>
        @enderror
      </div>
      <div class="items-create-form__item">
        <label for="price">販売価格</label>
        <input type="text" name="price" id="price" value="{{ old('price') }}">
        @error('price')
        <ul class="err-msg">
          <li>{{ $message }}</li>
        </ul>
        @enderror
      </div>
      <div class="items-create-form__item">
        <input type="submit" value="出品する">
      </div>
    </form>
  </div>

  <script>
    // 商品画像のプレビュー機能
    function previewImage() {
      const input = document.getElementById('image')
      const preview = document.getElementById('preview')
      const previewImage = document.getElementById('preview_image')

      input.addEventListener('change', (event) => {
        const [file] = event.target.files

        if(file){
          previewImage.setAttribute('src', URL.createObjectURL(file))
          preview.style.display = 'block'
        }else{
          preview.style.display = 'none'
        }
      })
    }

    previewImage()
  </script>
</x-app-layout>
