<?php
require_once 'modules/top.php';
require_once 'modules/footer.php';

session_start();

if (file_exists('install.php')){
    echo '<p style="font-size: 20px; text-align: center">PHP installation script detected. First-time setup required!</p>';
    echo '<p style="font-size: 20px; text-align: center">Redirecting to installation script in 5 seconds...</p>';
    header('refresh:5, url=install.php');
    die();
}

// top module, then manually specified stylesheets, then navbar module
// edit in 'modules/top.php'
topModule();

  echo '<link rel="stylesheet" href="css/styles.css">';
  echo '<link rel="stylesheet" href="css/contact.css">';
navModule("Cinery | Contact");
?>  
<main>
        <h3 style="text-align:center">Contact Form</h3>
        
    <div class="container">
        <form action="get">
        <label for="count">Contact purpose</label>
        <select id="country" name="country">
            <option value="rental">Store rental</option>
            <option value="service">Customer Services</option>
            <option value="feedback">Customer Feedbacks</option>
            <option value="other">Others</option>
        </select>
        <label for="fname">First Name</label>
        <input type="text" id="name" name="fullname" placeholder="Your full name...">

        <label for="fname">Email</label>
        <input type="text" id="email" name="customeremail" placeholder="Enter your email address">

        <label for="fname">Phone Number</label>
        <input type="text" id="number" name="phonenumber" placeholder="Enter your phone number">

        <input type="radio" id="email" name="rr" />
        <label for="email"><span></span>Email
        <input type="radio" id="phone" name="rr"/>
        <label for="phone"><span></span>Phone
        <br><br>
        Contact day(s) :
        <input type="checkbox" name="seeks[]" value="Monday"/>Monday
        <input type="checkbox" name="seeks[]" value="Tuesday"/>Tuesday
        <input type="checkbox" name="seeks[]" value="Wednesday"/>Wednesday
        <input type="checkbox" name="seeks[]" value="Thurday"/>Thursday
        <input type="checkbox" name="seeks[]" value="Friday"/>Friday
        <input type="checkbox" name="seeks[]" value="Saturday"/>Saturday
        <input type="checkbox" name="seeks[]" value="Sunday"/>Sunday
		<br><br>

        <label for="subject">Message</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
        <input type="submit" value="Submit">
        <input type="reset" value="Clear">
        </form>
    </div>
</main>

<?php
// footer, edit in 'modules/footer.php'
endModule();
?>

</html>
