<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3">
                <p>© 2015-2016 <a href="http://dhost.ml">TechBlog</a></p>
                <p><a href="mailto:evgeniy.zhigalskiy@gmail.com">evgeniy.zhigalskiy@gmail.com</a></p>
            </div>
            <div class="col-xs-12 col-sm-6">
            </div>
            <div class="col-xs-12 col-sm-3">
                <p class="text-right"><i class="fa fa-github fa-lg" aria-hidden="true"></i> View source code on <a href="https://github.com/Evgen8/laravel-tblog">GitHub</a></p>
            </div>
        </div>
    </div>

</footer>
<!-- pluso plugin -->
<script type="text/javascript">
    (function () {
        if (window.pluso)if (typeof window.pluso.start == "function") return;
        if (window.ifpluso == undefined) {
            window.ifpluso = 1;
            var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
            s.type = 'text/javascript';
            s.charset = 'UTF-8';
            s.async = true;
            s.src = ('https:' == window.location.protocol ? 'https' : 'http') + '://share.pluso.ru/pluso-like.js';
            var h = d[g]('body')[0];
            h.appendChild(s);
        }
    })();
</script>
<script src="{{ asset('js/TechBlog.js') }}"></script>
<script src="{{ asset('js/ajax.js') }}"></script>
@yield('script')
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>