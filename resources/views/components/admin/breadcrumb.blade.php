@props(['pageTitle', 'breadcrumbItems'])

<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <!--begin::Title-->
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-">{{ __($pageTitle) }}</h1>
    <!--end::Title-->

    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        @foreach($breadcrumbItems as $item)
            <!--begin::Item-->
            <li class="breadcrumb-item {{ $loop->last ? 'text-dark' : 'text-muted' }}">
                <a href="{{ $item['url'] ?? '#' }}"
                   class="{{ $loop->last ? 'text-dark' : 'text-muted' }} {{ $loop->last ? 'fw-bold' : '' }} text-hover-primary">{{ __($item['label']) }}</a>
            </li>
            @if(!$loop->last)
                <li class="breadcrumb-item text-dark">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
            @endif

            <!--end::Item-->
        @endforeach
    </ul>
    <!--end::Breadcrumb-->
</div>
