@section('title' , __('Logs & Bugs'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard.index')],
            ['label' => 'Logs & Bugs', 'url' => route('admin.logs.index')],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('Logs & Bugs')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">

    </div>
@endsection
@section('js')
@endsection
<x-admin-layout>
    <div class="card">
        <div class="pt-5 px-5">
            <div class="d-flex justify-content-between">
                <h2 class="fw-bold text-{{$log->color}}">{{$log->level_name . '- ' .$log->level}}</h2>
                <span class="h5 text-muted">{{$log->created_at}}</span>
            </div>
        </div>
        <div class="card-body">
            <h3 class="mb-3">
                {{$log->message}}
            </h3>

            <div class="p-2">
                @if($log->context)
                    <p style="font-size:18px">
                        @foreach($log->context as $item)
                            @if(is_array($item))
                                @foreach($item as $subItem)
                                    {{ is_string($subItem) ? htmlspecialchars($subItem) : '' }}
                                @endforeach
                            @else
                                {{ is_string($item) ? htmlspecialchars($item) : '' }}
                            @endif
                        @endforeach
                    </p>
                @endif
            </div>
        </div>

    </div>
</x-admin-layout>
