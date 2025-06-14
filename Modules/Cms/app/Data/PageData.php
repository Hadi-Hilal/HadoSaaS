<?php

namespace Modules\Cms\Data;

use Illuminate\Http\UploadedFile;
use Modules\User\Enums\CmsStatus;
use Spatie\LaravelData\Attributes\Validation\BooleanType;
use Spatie\LaravelData\Attributes\Validation\File;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;

class PageData extends Data
{
    public function __construct(

        #[Required, StringType, Rule('min:2', 'max:255')]
        public string $title,

        #[Required, StringType, Rule('min:2', 'max:255')]
        public string $slug,

        #[Nullable, StringType, Rule('max:255')]
        public ?string $description,

        #[Required, StringType]
        public string $content,

        #[Nullable, StringType, Rule('max:255')]
        public ?string $keywords = null,

        #[Nullable, File, Rule('mimes:jpeg,jpg,png,gif', 'max:2048')]
        public ?UploadedFile $image = null,

        #[Nullable]
        public CmsStatus $status = CmsStatus::PUBLISHED,

        #[Nullable, BooleanType]
        public ?bool $featured = false
    ) {}
}
