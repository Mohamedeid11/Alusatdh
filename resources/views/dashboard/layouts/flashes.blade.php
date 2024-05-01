@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="d-flex justify-content-between align-items-center">
            <div>{!! session()->get('success') !!}</div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="d-flex justify-content-between align-items-center">
                <div>{{ $error }}</div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endforeach
@endif
