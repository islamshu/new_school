<header>
    <nav class=" navbar navbar-default navbar-fixed-top clearfix" id="">
        <div class="container">
            <div class="logo-image">
                <a href="#"><img src="images/150x50.png" alt="150x50" /></a>
            </div>
            @php
            $general = App\General::first();
            @endphp
            <div class="navbar-right nav">
                <div class="navbar-header">
                    <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar gray"></span><span class="icon-bar gray"></span><span class="icon-bar"></span></button>					
                </div>
                <div class="navbar-inverse side-collapse in">
                    <div class="collapse navbar-collapse" >
                        <ul class="content-ul side-menu-icon">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-pinterest-p"></a></li>
                            <li><a href="#" class="fa fa-skype"></a></li>
                        </ul>
                      
                    </div>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>
</header>