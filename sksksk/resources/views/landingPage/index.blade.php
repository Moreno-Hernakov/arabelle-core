<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>unknown</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/page.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <!-- bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  </head>
  <body>

   @include('landingPage.layout.header')
    
    <!-- JUMBOTRON -->
    <div class="top-wrapper">
      <div class="container">
        <h1>BELAJAR CODING.</h1>
        <h1>BELAJAR MENJADI LEBIH KREATIF.</h1>
        <p>unknown adalah platform online untuk belajar coding.</p>
        <p>Kami menawarkan lingkungan pemograman yang lengkap untuk mempermudah Anda memulai.</p>
        <div class="btn-wrapper">
          <a href="#" class="btn signup">Daftar dengan Email</a>
          <p>atau</p>
          <a href="#" class="btn facebook"><span class="fa fa-facebook"></span>Daftar dengan Facebook</a>
          <a href="#" class="btn twitter"><span class="fa fa-twitter"></span>Daftar dengan Twitter</a>
        </div>
      </div>
    </div>

    <!-- KONTEN -->
    <div class="lesson-wrapper">
      <div class="container">
        <div class="heading">
          <h2>Cari tau dari mana Anda mau memulai!</h2>
        </div>
        <div class="lessons">
          <div class="lesson">
            <div class="lesson-icon">
              <img src="https://prog-8.com/images/html/advanced/html.png">
               <p>HTML & CSS</p>
            </div>
            <p class="txt-contents">Bahasa yang digunakan untuk membuat dan mendesain tampilan situs web Anda. </p>
          </div>
          <div class="lesson">
            <div class="lesson-icon">
              <img src="https://prog-8.com/images/html/advanced/jQuery.png">
              <p>jQuery</p>
            </div>
            <p class="txt-contents">Library JavaScript yang cepat, kaya akan fitur, dan mudah digunakan yang menangani animasi dan permintaan Ajax.</p>
          </div>
          <div class="lesson">
            <div class="lesson-icon">
              <img src="https://prog-8.com/images/html/advanced/ruby.png">
              <p>Ruby</p>
            </div>
            <p class="txt-contents">Bahasa dinamis, serba guna yang sederhana dan produktif. Ruby sering digunakan untuk membuat aplikasi web yang responsive.</p>
          </div>
          <div class="lesson">
            <div class="lesson-icon">
              <img src="https://prog-8.com/images/html/advanced/php.png">
              <p>PHP</p>
            </div>
            <p class="txt-contents">Bahasa skrip open source yang dapat disematkan ke dalam HTML, dan cocok untuk pengembangan web.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="message-wrapper">
      <div class="container">
        <div class="heading">
          <h2>Apakah Anda siap untuk menjadi programer yang handal?</h2>
          <h3>Ayo belajar coding, ayo belajar menjadi lebih kreatif!</h3>
        </div>
        <span class="btn message">Mulai Belajar</span>
      </div>
    </div>

    <!-- FOOTER -->
    <footer>
      <div class="container">
        <img src="https://prog-8.com/images/html/advanced/footer_logo.png">
        <p>Learn to code, learn to be creative.</p>
      </div>
    </footer>
  </body>
</html>