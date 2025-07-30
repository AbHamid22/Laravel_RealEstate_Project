

@include("layouts.header")

@include("layouts.sidebar")

<div id="right-panel" class="right-panel">
    @include("layouts.topbar")
    <div class="content">
        @yield("page")

    </div>

    <footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-sm-6">
                    Copyright &copy; 2025 Abdul Hamid
                </div>
                <div class="col-sm-6 text-right">
                    Designed by <a href="http://hamid.intelsofts.com">Ab.Hamid</a>
                </div>
            </div>
        </div>
    </footer>
</div>
@include("layouts.footer")