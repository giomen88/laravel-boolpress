@yield('form')

@if ($errors->any())
    <div class="alert alert-danger" >
        <ul>
            @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="form-group">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Titolo" value=" {{old('title', $post->title)}} " required>
        </div>
    <div class="form-group">
        <label for="content" class="form-label">Descrizione</label>
        <textarea class="form-control" id="content" name="content" rows="5" placeholder="Contenuto" required>{{old('content', $post->content)}}</textarea>                    
    </div>
    <div class="form-group">
        <label for="category_id">Categoria</label>
        <select class="form-control" name="category_id" id="category_id">
            <option value="">Nessuna categoria</option>
            @foreach($categories as $category)
            <option  @if (old('category_id', $post->category_id) == $category->id) selected @endif value=" {{$category->id}} "> {{$category->label}} </option>
            @endforeach
        </select>
    </div>
        <div class="form-group d-flex justify-content-between align-items-end">
            <div class="url-input">
                <label for="image" class="form-label">URL Immagine</label>
                <input type="url" class="form-control" id="image" name="image" placeholder="URL" value=" {{old('image', $post->image)}} " required>
            </div>
            <img src=" {{ $post->image ?? 'https://usbforwindows.com/storage/img/images_3/function_set_default_image_when_image_not_present.png' }} " alt="post image preview" class="img-fluid" id="preview">
        </div>

