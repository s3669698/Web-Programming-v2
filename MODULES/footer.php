<?php
function endModule (){
    $html = <<<"OUTPUT"
    <!-- footer -->
    <div class="container">
        <div class="navbarfoot">
            <nav>
                <ul>
                    <li><a href="copyright.php">Copyright</a></li>
                    <li><a href="tos.php">Terms of Service</a></li>
                    <li><a href="pp.php">Privacy Policy</a></li>
                </ul>
            </nav>
        </div>
    </div>
    
    <!-- <div class="container"> -->
        <div class="cookie-container">
            <p>
            We use cookies in this website to give you the best experience on our
            site.
            </p>
    
            <button class="cookie-btn">
            I understand
            </button>
        </div>
    <!-- </div> -->
    </body>
    <script src="js/cookie.js"></script>
OUTPUT;
    echo $html;
}
?>