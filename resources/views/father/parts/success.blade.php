@if(Session::has('success'))
{{-- {{ dd('dd') }} --}}
    <div class="row mr-2 ml-2">
            <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2" style="background: #c4ffd1"
                    id="type-error">{{Session::get('success')}}
            </button>
    </div>
@endif