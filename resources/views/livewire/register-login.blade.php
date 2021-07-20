<div>
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    @if(Request::getPathInfo() == '/register')



    @endif
    @if(Request::getPathInfo() == '/login')

    @endif
    @if(Request::getPathInfo() == '/reset')

    @endif
    @if(Request::getPathInfo() == '/password')
        @if($confirmPassword)

        @endif
    @endif
</div>
