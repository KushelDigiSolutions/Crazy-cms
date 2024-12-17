<x-admin>
    @section('title')
        {{ 'Referal Program' }}
    @endsection
    <div class="container">
        <div class="p-3 mb-3">
            <div class="row">
                <div class="w-100">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="p-4 simi sm:p-8 bg-{{Auth::user()->mode}} shadow sm:rounded-lg mb-3">
                        <div class="max-w-xl">
                            @include('referal.partials.update-referal-information-form')
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="p-4 simi sm:p-8 bg-{{Auth::user()->mode}} shadow sm:rounded-lg mb-3">
                        <div class="max-w-xl">
                            @include('referal.partials.referal-list')
                        </div>
                    </div>
                </div>
                </div>
             
            </div>

        </div>
    </div>
</x-admin>
