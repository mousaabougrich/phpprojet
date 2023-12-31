<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <title>Cbum</title>
</head>
<body>
    <nav>
        <div class="nav__logo">
            <a href=""><img src="assets/image-removebg-preview.png" alt="logo"></a>
        </div>
        <ul class="nav__links">
            <li class="link"><a  href="">Home</a></li>
        
            <li class="link"><a href="#PROGRAMES">Program</a></li>
            <li class="link"><a href="user.php">BILL</a></li>
           
            <li class="link"><a href="#WHY JOIN US">Comunity</a></li>
            <?php if (isset($_SESSION['name'])): ?>
            <li class="link"><button class="btn"> <?php echo htmlspecialchars($_SESSION['name']); ?></button></li>
           <li class="link"><a href="logout.php">Logout</a></li>   
        </ul>
     <div class="nav-right">
        
        <?php else: ?>
          <button class="btn">  <a style="color: white;" href="loging.php">Login</a></button>
          <button class="btn"> <a style="color: white;"href="create.php">Register</a></button>
        <?php endif; ?>
    </div>

        <!--<button class="btn">JOIN NOW</button>-->
    </nav>
    <header class="section__container header__container">
        <div class="header__content">
          <span class="bg__blur"></span>
          <span class="bg__blur header__blur"></span>
          <h4>BEST FITNESS IN THE TOWN</h4>
          <h1><span>MAKE</span> YOUR BODY SHAPE</h1>
          <p>
           Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis, dolorum ev
           eniet! Eos molestiae totam laboriosam earum numquam sunt culpa voluptatibus sed,
            quidem ipsa, eaque non accusamus. Impedit obcaecati fuga veritatis.
          </p>
          <button class="btn">Get Started</button>
        </div>
        <img src="assets/cbum.png" alt="header" />
      </div>
    </header>

    <section id="PROGRAMES" class="section__container explore__container">
    <div class="explore__header">
        <h2 class="section__header">EXPLORE OUR PROGRAM</h2>
        <div class="explore__nav">
            <span><i class="ri-arrow-left-line"></i></span>
            <span><i class="ri-arrow-right-line"></i></span>
        </div>
    </div>

    <div class="explore__grid">
        <!-- Strength Card -->
        <div class="explore__card">
            <span><i class="ri-boxing-fill"></i></span>
            <form action="subscribe.php" method="post">
                <input type="hidden" name="plan_id" value="14">
                <h4>Strength</h4>
                <p>Embrace the essence of strength as we delve into its various dimensions physical, mental, and emotional.</p>
                <button type="submit" class="btn price__btn">Join Now <i class="ri-arrow-right-line"></i></button>
            </form>
        </div>

        <!-- Physical Fitness Card -->
        <div class="explore__card">
            <span><i class="ri-heart-pulse-fill"></i></span>
            <form action="subscribe.php" method="post">
                <input type="hidden" name="plan_id" value="15">
                <h4>Physical Fitness</h4>
                <p>It encompasses a range of activities that improve health, strength, flexibility, and overall well-being.</p>
                <button type="submit" class="btn price__btn" onclick="thankUser()">Join Now <i class="ri-arrow-right-line"></i></button>
            </form>
        </div>
        <div id="thankYouMessage" style="display: none; color: green; font-size: 18px; text-align: center; margin-top: 20px;">
    Thank you for joining!
</div>


        <!-- Fat Lose Card -->
        <div class="explore__card">
            <span><i class="ri-run-line"></i></span>
            <form action="subscribe.php" method="post">
                <input type="hidden" name="plan_id" value="16">
                <h4>Fat Lose</h4>
                <p>Through a combination of workout routines and expert guidance, we'll empower you to reach your goals.</p>
                <button type="submit" class="btn price__btn">Join Now <i class="ri-arrow-right-line"></i></button>
            </form>
        </div>

        <!-- Weight Gain Card -->
        <div class="explore__card">
            <span><i class="ri-shopping-basket-fill"></i></span>
            <form action="subscribe.php" method="post">
                <input type="hidden" name="plan_id" value="17">
                <h4>Weight Gain</h4>
                <p>Designed for individuals, our program offers an effective approach to gaining weight in a sustainable manner.</p>
                <button type="submit" class="btn price__btn">Join Now <i class="ri-arrow-right-line"></i></button>
            </form>
        </div>
    </div>
</section>

    <section class="section__container class__container">
      <div class="class__image">
        <span class="bg__blur"></span>
        <img src="assets/class-1.jpg" alt="class" class="class__img-1" />
        <img src="assets/class-2.jpg" alt="class" class="class__img-2" />
      </div>
      <div class="class__content">
        <h2 class="section__header">THE CLASS YOU WILL GET HERE</h2>
        <p>
          Led by our team of expert and motivational instructors, "The Class You
          Will Get Here" is a high-energy, results-driven session that combines
          a perfect blend of cardio, strength training, and functional
          exercises. Each class is carefully curated to keep you engaged and
          challenged, ensuring you never hit a plateau in your fitness
          endeavors.
        </p>
        <button class="btn">Book A Class</button>
      </div>
    </section>

    <section id="WHY JOIN US"class="section__container join__container">
      <h2 class="section__header">WHY JOIN US ?</h2>
      <p class="section__subheader">
        Our diverse membership base creates a friendly and supportive
        atmosphere, where you can make friends and stay motivated.
      </p>
      <div class="join__image">
        <img src="assets/join.jpg" alt="Join" />
        <div class="join__grid">
          <div class="join__card">
            <span><i class="ri-user-star-fill"></i></span>
            <div class="join__card__content">
              <h4>Personal Trainer</h4>
              <p>Unlock your potential with our expert Personal Trainers.</p>
            </div>
          </div>
          <div class="join__card">
            <span><i class="ri-vidicon-fill"></i></span>
            <div class="join__card__content">
              <h4>Practice Sessions</h4>
              <p>Elevate your fitness with practice sessions.</p>
            </div>
          </div>
          <div class="join__card">
            <span><i class="ri-building-line"></i></span>
            <div class="join__card__content">
              <h4>Good Management</h4>
              <p>Supportive management, for your fitness success.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section__container price__container">
      <!-- Basic Plan -->
<form action="subscribe.php" method="post" class="price__card">
    <input type="hidden" name="plan_id" value="11"> <!-- Replace 1 with the actual ID for the Basic Plan -->
    <div class="price__card__content">
        <h4>Basic Plan</h4>
        <h3>$16</h3>
        <p><i class="ri-checkbox-circle-line"></i> Smart workout plan</p>
        <p><i class="ri-checkbox-circle-line"></i> At home workouts</p>
    </div>
    <button type="submit" class="btn price__btn">Join Now</button>
</form>

<!-- Weekly Plan -->
<form action="subscribe.php" method="post" class="price__card">
    <input type="hidden" name="plan_id" value="12"> <!-- Replace 2 with the actual ID for the Weekly Plan -->
    <div class="price__card__content">
        <h4>Weekly Plan</h4>
        <h3>$25</h3>
        <p><i class="ri-checkbox-circle-line"></i> PRO Gyms</p>
        <p><i class="ri-checkbox-circle-line"></i> Smart workout plan</p>
        <p><i class="ri-checkbox-circle-line"></i> At home workouts</p>
    </div>
    <button type="submit" class="btn price__btn">Join Now</button>
</form>

<!-- Monthly Plan -->
<form action="subscribe.php" method="post" class="price__card">
    <input type="hidden" name="plan_id" value="13"> <!-- Replace 3 with the actual ID for the Monthly Plan -->
    <div class="price__card__content">
        <h4>Monthly Plan</h4>
        <h3>$45</h3>
        <p><i class="ri-checkbox-circle-line"></i> ELITE Gyms & Classes</p>
        <p><i class="ri-checkbox-circle-line"></i> PRO Gyms</p>
        <p><i class="ri-checkbox-circle-line"></i> Smart workout plan</p>
        <p><i class="ri-checkbox-circle-line"></i> At home workouts</p>
        <p><i class="ri-checkbox-circle-line"></i> Personal Training</p>
    </div>
    <button type="submit" class="btn price__btn">Join Now</button>
</form>

    </section>
   /<!-- #region <section class="section__container price__container">
      <h2 class="section__header">OUR PRICING PLAN</h2>
      <p class="section__subheader">
        Our pricing plan comes with various membership tiers, each tailored to
        cater to different preferences and fitness aspirations.
      </p>
      <div class="price__grid">
        <div class="price__card">
          <div class="price__card__content">
            <h4>Basic Plan</h4>
            <h3>$16</h3>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              Smart workout plan
            </p>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              At home workouts
            </p>
          </div>
          <button class="btn price__btn">Join Now</button>
        </div>
        <div class="price__card">
          <div class="price__card__content">
            <h4>Weekly Plan</h4>
            <h3>$25</h3>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              PRO Gyms
            </p>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              Smart workout plan
            </p>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              At home workouts
            </p>
          </div>
          <button class="btn price__btn">Join Now</button>
        </div>
        <div class="price__card">
          <div class="price__card__content">
            <h4>Monthly Plan</h4>
            <h3>$45</h3>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              ELITE Gyms & Classes
            </p>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              PRO Gyms
            </p>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              Smart workout plan
            </p>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              At home workouts
            </p>
            <p>
              <i class="ri-checkbox-circle-line"></i>
              Personal Training
            </p>
          </div>
          <button class="btn price__btn">Join Now</button>
        </div>
      </div>
    </section>--> 
    <!-- ibbbbbmmmmm-->
    <div class="container contact-form">
      <
      <form >
          <h3 style="color: aliceblue;">IBM Calculator</h3>
         <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <input id="cm" type="text" name="txtName" class="form-control" placeholder="Your height (Cm)" value="" />
                  </div>
                  <div class="form-group">
                      <input  id ="kg"type="text" name="txtEmail" class="form-control" placeholder="Your wheigt (Kg)" value="" />
                  </div>
                  <div class="form-group">
                      <input type="text" name="txtPhone" class="form-control" placeholder=" your age" value="" />
                  </div>
                  <div class="form-group">
                      <input style="background-color: rgb(11, 107, 75) ;border-radius: 12%;padding: 12px;" type="button" onclick="bmi(event)" name="btnSubmit" class="btnContact" value="ibm resulte" />

                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <textarea name="txtMsg" id="result" class="form-control" placeholder="" style="width: 100%; height: 150px;"></textarea>
                  </div>
              </div>
          </div>
      </form>

    <section class="review">
      <div class="section__container review__container">
        <span><i class="ri-double-quotes-r"></i></span>
        <div class="review__content">
          <h4>MEMBER REVIEW</h4>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque amet ducimus illo ex unde in nihil quasi fugit 
            laudantium vero soluta consequatur corrupti placeat dignissimos, ratione nemo commodi ad voluptatem?
          </p>
          <div class="review__rating">
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-half-fill"></i></span>
          </div>
          <div class="review__footer">
            <div class="review__member">
              <img src="assets/member.jpg" alt="member" />
              <div class="review__member__details">
                <h4>BOUCHAIB HEH</h4>
                <p>THAD</p>
              </div>
            </div>
            <div class="review__nav">
              <span><i class="ri-arrow-left-line"></i></span>
              <span><i class="ri-arrow-right-line"></i></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="section__container footer__container">
      <span class="bg__blur"></span>
      <span class="bg__blur footer__blur"></span>
      <div class="footer__col">
        <div class="footer__logo"><img src="assets/image-removebg-preview.png" alt="logo" /></div>
        <p>
          Take the first step towards a healthier, stronger you with our
          unbeatable pricing plans. Let's sweat, achieve, and conquer together!
        </p>
        <div class="footer__socials">
          <a href="#"><i class="ri-facebook-fill"></i></a>
          <a href="#"><i class="ri-instagram-line"></i></a>
          <a href="#"><i class="ri-twitter-fill"></i></a>
        </div>
      </div>
      <div class="footer__col">
        <h4>Company</h4>
        <a href="#">Business</a>
        <a href="#">Franchise</a>
        <a href="#">Partnership</a>
        <a href="#">Network</a>
      </div>
      <div class="footer__col">
        <h4>About Us</h4>
        <a href="#">Blogs</a>
        <a href="#">Security</a>
        <a href="#">Careers</a>
      </div>
      <div class="footer__col">
        <h4>Contact</h4>
        <a href="#">Contact Us</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Conditions</a>
        <a href="#">BMI Calculator</a>
      </div>
    </footer>
    <div class="footer__bar">
      
    </div>
 
























   <!--footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
          <div class="footer-1 col-lg-3 col-md-6 col-12">
        <p>We are committed to focusing our efforts on producing high-quality and long-lasting pieces, paying very close attention to uniqueness and sustainability. All our garments are ethically handcrafted and made of premium cotton and/or recycled fabrics.</p>
        
          </div>
          <div class="footer-1 col-lg-3 col-md-6 col-12">
        
        
            <h5 class="pd-2">SUPPORT</h5>
            <ul class="text-uppercase list-unstyled">
        
              <li><a href="">Shipping — Morocco</a></li>
              <li><a href="">Shipping — Morocco</a></li>
              <li><a href="">Shipping — Morocco</a></li>
              <li><a href="">Shipping — Morocco</a></li>
              <li><a href="">Shipping — Morocco</a></li>
              <li><a href="">Shipping — Morocco</a></li>
            </ul>
          </div>
          <div class="footer-1 col-lg-3 col-md-6 col-12">
        
        
            <h5 class="pd-2">BORING STUFF</h5>
            <ul class="text-uppercase list-unstyled">
        
              <li><a href="">Privacy Policy</a></li>
              <li><a href="">Terms of Service</a></li>
              
            </ul>
          </div>
          <div class="footer-1 col-lg-3 col-md-6 col-12">
        
        
            <h5 class="pd-2">contact us</h5>
            <div>
              <h6 class="text text-uppercase">address</h6>
              <p> bala balal</p>
            </div>
            <div>
            <h6 class="text text-uppercase">phone number</h6>
            <p>+212 613409573</p>
          </div>
          
        
          <div>
          <h6 class="text text-uppercase">Email</h6>
            <p>mousaab.ougrich@gamil.com</p>
          </div>
            
        
          
        </div>
        </div>
        
        
        <div class="copyright mt-5">
          <div class="row container mx-auto">
            <div class="col-lg-3 col-md-6 col-12">
              <img src="imagesweb/prod/payment.jpg" alt="">
            </div>
            <div class="col-lg-4 col-md-6 col-12  text-nowrap">
            <p> all rights reserved to&#169;mo </p>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
            <a href="#"><i class="fab fa-facebook-f"> </i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"> </i></a>
            </div>
          </div>
        
        </div>-->
        <script src="ibm.js">
          function thankUser() {
    document.getElementById('thankYouMessage').style.display = 'block';
}

        </script>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
 </body>
  </html>