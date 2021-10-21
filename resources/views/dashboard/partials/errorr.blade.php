@if(Session::has('errorr'))
    <div class="row mr-2 ml-2">
            <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"  style="background: #f5d6d6;color: black"
                    id="type-error">{{Session::get('errorr')}}
            </button>
    </div>
@endif