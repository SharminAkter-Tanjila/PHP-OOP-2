<footer class="footer-wrap footer-wrap-v1 mt-5 p-4 shadow" style="background-color: #8e8e8e; ">
    <div class="footer-top-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div id="media_image-3" class="footer-widget widget widget-wrap widget_media_image">
                        <a href="http://localhost/frontend/index.php"><img width="230" height="69" src="../../../public/assets/frontend/images/rentit.png" class="img-fluid mb-4" alt="" decoding="async" loading="lazy" style="max-width: 100%; height: auto;" srcset=""></a></div>
                    <div id="text-4" class="footer-widget widget widget-wrap widget_text">
                        <div class="textwidget">
                            <p style="padding-right: 10px;"><strong>Rentit.anon</strong> lavie en rose this not a drill but a text message.Don't read it!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div id="text-9" class="footer-widget widget widget-wrap widget_text">
                        <div class="widget-header">
                            <h3 class="widget-title">Property Type</h3>
                        </div>
                        <div class="textwidget">
                            <p><a class="text-dark" href="#">Residential</a><br>
                                <a class="text-dark" href="#">Commercial Space</a><br>
                                <a class="text-dark" href="#">Office Space</a><br>
                                <a class="text-dark" href="#">Shop Space</a><br>
                                <a class="text-dark" href="#">Restaurants Space</a><br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div id="text-6" class="footer-widget widget widget-wrap widget_text">
                        <div class="widget-header">
                            <h3 class="widget-title">Important Links</h3>
                        </div>
                        <div class="textwidget">
                            <p><a class="text-dark" href="#">About Us</a><br>
                                <a class="text-dark" href="#">Area Guide</a><br>
                                <a class="text-dark" href="#">Terms and Condition</a><br>
                                <a class="text-dark" href="#">FAQS</a><br>
                                <a class="text-dark" href="#">Contact US</a><br>
                                <a class="text-dark" href="#">Our Team</a><br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div id="text-7" class="footer-widget widget widget-wrap widget_text">
                        <div class="widget-header">
                            <h3 class="widget-title">Contact Us</h3>
                        </div>
                        <div class="textwidget">
                            <p><strong>Address:</strong> Plot: 404 Road: 13, Dhaka-1230, Bangladesh.<br>
                                <strong>Mobile:</strong> +880 16161-16161<br>
                                <strong>E-mail:</strong> rentit@gmail.com
                            </p>
                        </div>

                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- footer-top-wrap -->
    <div class="footer-bottom-wrap footer-bottom-wrap-v2">
        <div class="container">


</footer>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        const showNavbar = (toggleId, navId, bodyId, headerId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId),
                headerpd = document.getElementById(headerId);

            // Validate that all variables exist
            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener("click", () => {
                    // show navbar
                    nav.classList.toggle("show");
                    // change icon
                    toggle.classList.toggle("bx-x");
                    // add padding to body
                    bodypd.classList.toggle("body-pd");
                    // add padding to header
                    headerpd.classList.toggle("body-pd");
                });
            }
        };

        showNavbar("header-toggle", "nav-bar", "body-pd", "header");

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll(".nav_link");

        function colorLink() {
            if (linkColor) {
                linkColor.forEach((l) => l.classList.remove("active"));
                this.classList.add("active");
            }
        }
        linkColor.forEach((l) => l.addEventListener("click", colorLink));

        // Your code to run since DOM is loaded and ready
    });
</script>