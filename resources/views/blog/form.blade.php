<form action="" method="post">
    @csrf
    @method($post->id ? "PATCH" : "POST")
    <div class="row">
        <div class="col-6">
            <div class="row row-cols-1 g-4">
                <div class="col">
                    <div class="form-group">
                        <label for="title">Titre*</label> <br>
                        <input class="form-control" type="text" id="title" name="title" value="{{ old('title', $post->title) }}">
                        @error("title")
                            <p class="text-danger mb-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="slug">Slug</label> <br>
                        <input class="form-control" type="text" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
                        @error("slug")
                            <p class="text-danger mb-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="content">Contenu*</label> <br>
                        <textarea class="form-control" name="content" id="content">{{ old('content', $post->content) }}</textarea>
                        @error("content")
                        <p class="text-danger mb-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="category">Catégorie*</label> <br>
                        <select class="form-control" name="category_id" id="category">
                            <option value="">Sélectionner une catégorie</option>
                            @foreach ($categories as $category)
                                <option @selected(old('category_id', $post->category_id) == $category->id) value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error("category_id")
                        <p class="text-danger mb-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @php
                    $tagsIds = $post->tags()->pluck('id');
                @endphp
                <div class="col">
                    <div class="form-group">
                        <label for="tag">Tags</label> <br>
                        <select class="form-control" name="tags[]" id="tag" multiple>
                            @foreach ($tags as $tag)
                                <option @selected($tagsIds->contains($tag->id)) value="{{ $tag->id }}">
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                        @error("tags")
                        <p class="text-danger mb-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <button class="btn btn-primary">
                        @if($post->id)
                            Modifier
                        @else
                            Créer
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
