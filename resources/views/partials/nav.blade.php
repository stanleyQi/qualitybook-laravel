<div>
    <nav class="navbar navbar-default navbar-fixed-top navigation-clean-search">
        <div class="container-fluid">
            <div class="navbar-header">
                <img src="{{asset('img/logo.png')}}" alt="Quality Book"
                    style="width:50px;height:auto;float:left;margin-left:20px;margin-right:10px;" />
                <a class="navbar-brand" href="{{ route('home') }}">Quality Book</a>
                <button data-toggle="collapse" class="navbar-toggle collapsed" data-target="#navcol-1"><span
                        class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                        class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>

            <div class="collapse navbar-collapse" id="navcol-1">
                <a class="btn btn-default navbar-btn navbar-right action-button" role="button" href="#">Sign Up</a>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Contact Us</a></li>
                <li><a href="{{ route('booklist') }}">Booklist</a></li>
                    <li>
                        <a href="{{ route('cart') }}">
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                            <span id="cart-component">0</span>
                        </a>
                    </li>
                    <li><a href="#">Login</a></li>
                </ul>
                <form class="navbar-form navbar-left navbar-style navbar-right" id="navcol-1">
                    <div class="form-group header-search">
                        <label class="control-label" for="search-field"><i
                                class="glyphicon glyphicon-search nav-search-icon"></i></label>
                        <input type="search" class="form-control search-field" id="search-field" name="search"
                            placeholder="I am looking for..." />
                    </div>
                </form>
            </div>
        </div>
    </nav>
</div>
