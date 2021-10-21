<body class="bg-light">


<div class="list" id="navigation">

        <ul class="list-unstyled list-group">
            <div class="logo"><a href="{{ route('father_dashboard') }}"><img src="{{ asset('father_style/images/dashboard.png') }}" width="100" height="100"></a></div>
            <li class="list-group-item list-group-item-action active"><a href="{{ route('father_dashboard') }}"> العباقرة <i class="fad fa-user-graduate"></i> </a> </li>
        <li class="list-group-item list-group-item-action "><a href="{{ route('all_bills') }}"> فواتير <i class="fad fa-money-bill-alt"></i></a>  </li>
        <li class="list-group-item list-group-item-action"><a href="{{ route('send-message.create') }}"> مراسلة الادارة <i class="fad fa-comments-alt"></i> </a></li>
        <li class="list-group-item list-group-item-action"><a href="{{ route('send-message.index') }}">ارشيف الرسائل <i class="far fa-inbox"></i> </a></li>

        </ul>

    </div>