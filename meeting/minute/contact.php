<?php
    require_once 'includes/header.php';
?>




<!-- contact section starts  -->

<section class="contact" id="contact">
    <div class="image">
        <img src="images/contact-img.png" alt="">
    </div>

    <form action="">

        <h1 class="heading">contact us</h1>

        <div class="inputBox">
            <input type="text" name="name" required>
            <label>name</label>
        </div>

        <div class="inputBox">
            <input type="email" name="email" required>
            <label>email</label>
        </div>

        <div class="inputBox">
            <input type="number" name="tel" required>
            <label>phone</label>
        </div>

        <div class="inputBox">
            <textarea required name="" id="" cols="30" rows="10"></textarea>
            <label>message</label>
        </div>

        <input type="submit" class="btn" value="send message">

    </form>

</section>

<!-- contact section edns -->


















<?php
    require_once 'includes/footer.php';
?>