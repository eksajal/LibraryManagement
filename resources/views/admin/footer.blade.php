<footer class="footer">
    <div class="footer__block block no-margin-bottom">
        <div class="container-fluid text-center">
            <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            <p style="text-align: center;" class="no-margin-bottom">2024 &copy; Created By <a target="_blank"
                    href="https://codevibebd.netlify.app/">CodeVibe Innovations</a></p>
        </div>
    </div>
</footer>
</div>
</div>
<!-- JavaScript files-->
<script src="admin/vendor/jquery/jquery.min.js"></script>
<script src="admin/vendor/popper.js/umd/popper.min.js"></script>
<script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="admin/vendor/jquery.cookie/jquery.cookie.js"></script>
<script src="admin/vendor/chart.js/Chart.min.js') }}"></script>
<script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="admin/js/charts-home.js"></script>
<script src="admin/js/front.js"></script>




<!------Script to stuck the display in activity area------>

<script>
    window.onload = function() {
        // Restore scroll position after full load
        const scrollPosition = localStorage.getItem('scrollPosition');
        if (scrollPosition) {
            const {
                top,
                left
            } = JSON.parse(scrollPosition);
            window.scrollTo(left, top);
        }
    };

    // Save scroll position before the page unloads
    window.addEventListener('beforeunload', function() {
        const scrollPosition = {
            top: window.scrollY,
            left: window.scrollX
        };
        localStorage.setItem('scrollPosition', JSON.stringify(scrollPosition));
    });
</script>

