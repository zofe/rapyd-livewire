
    <x-rpd::edit title="Article Edit">

        <div class="row">
            <div class="form-group col-md-4">
                <x-rpd::input model="article.title" label="Title" />
            </div>

            <div class="form-group col-md-4">
                <x-rpd::select model="article.author_id" :options="$authors" label="Author" addempty />
            </div>

            <div class="form-group col-md-4 pt-2">
                <x-rpd::checkbox model="article.public" label="Public" checkLabel="true" />
            </div>
        </div>
        <div class="row mb-2">
            <div class="form-group col-md-8">
                <x-rpd::rich-text model="article.body" label="Body" />
            </div>
        </div>

        <x-slot name="actions">
            <button type="submit" class="btn btn-primary">Save</button>
        </x-slot>


    </x-rpd::edit>

