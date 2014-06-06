<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="{{URL::to('css/normalize.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/fotorama.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/main.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/fonts.css')}}">
        <script src="{{URL::to('js/vendor/modernizr-2.6.2.min.js')}}"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <header class="clearfix">
            <div class="logo-group">
                <h1>CR8IVE</h1>
                <div>
                    <h2 class="art-director animated hidden">Art Director</h2>
                    <h2 class="animated hidden ui-designer">UI Designer</h2>
                </div>
            </div>

            <nav class="nav">
                <ul class="nav-list">
                    <li class="nav-item" data-href="about"><a class="btn btn-bordered" href="#">About</a>
                    <li class="nav-item" data-href="works"><a class="btn btn-bordered" href="#">Works</a>
                    <li class="nav-item"><a class="btn btn-bordered" href="#">Contacts</a>
                </ul>
            </nav>
            
            <ul class="social">
                <li class="social-item">
                    <a class="social-link" href="#" title="facebook">
                        <span class="icon icon-fb"></span>
                    </a>
                <li class="social-item">
                    <a class="social-link" href="#" title="instagram">
                        <span class="icon icon-inst"></span>
                    </a>
                <li class="social-item">
                    <a class="social-link" href="#" title="behance">
                        <span class="icon icon-be"></span>
                    </a>
            </ul>

        </header>
        <main>          
            <div class="portfolio">
                <div class="portfolio-cont">
                    <div class="start">
                        <div class="start-title">YURI YURCHENKO</div>
                        <div class="start-text">
                            Web / Mobile / Interface Designer / Art Director<br>
                            I'm a mobile, web, graphic and user interface designer, with over 15 years of experience in design and brand identity development. I love to draw, create mobile apps, interfaces and websites, specialized in simple, unique, effective and user-centric design solutions.
                        </div>
                        <div class="scroll-it"></div>
                    </div>
                    @if(is_object($pro))
                        @foreach($pro as $prj)
                            <div class="carousel-item">
                                <img src="{{URL::to('uploads/'.$prj->photo)}}">
                                
                                @if($prj->desc != '')
                                    <!--<h2>{{$prj->desc}}</h2>-->
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div> 
            </div>    
            <div class="scroll"></div>  
        </main>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{URL::to('js/vendor/jquery-1.10.2.min.js')}}"><\/script>')</script>
        <script src="{{URL::to('js/main.js')}}"></script>
    </body>
</html>
