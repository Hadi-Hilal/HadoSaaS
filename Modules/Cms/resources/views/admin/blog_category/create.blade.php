@if(isset($modal) && $modal)
    @php
        $langs = config('translatable.locales', ['en']);
    @endphp
        <!-- Create Category Modal -->
    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.blogs_categories.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createCategoryModalLabel">{{ __('Add New Blog Category') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach($langs as $lang)
                            <div class="mb-3">
                                <label for="name_{{$lang}}" class="form-label">{{ __('Name') }} ({{ strtoupper($lang) }}
                                    )</label>
                                <input type="text" class="form-control" name="name[{{$lang}}]" required>
                            </div>
                        @endforeach
                        <div class="mb-3">
                            <label for="slug" class="form-label">{{ __('Url') }}</label>
                            <input type="text" class="form-control" name="slug" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
