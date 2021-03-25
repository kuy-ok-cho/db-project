<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gold</title>

    <!-- font awesome link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <!-- main style css link -->
    <link rel="stylesheet" href="/gold/css/style.css" />

    <!-- design css link -->
    <link rel="stylesheet" href="/gold/css/web_design_input.css">

    <!-- animation css link -->
    <link rel="stylesheet" href="/gold/css/animation.css" />

    <!-- media query style css link -->
    <link rel="stylesheet" href="/gold/css/media.css" />
  </head>
  <body>
    <div class="wrap">
      
      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/header.php" ?>

      <section class="contents designUpload hasTitle">
        <div class="center">
          <!-- contact title -->
          <div class="title">
            <h2>UPLOAD PROJECTS</h2>
            <div class="subTit">
              <span class="subLine"></span>
              <!-- <a href="#" class="subLink">View More Details</a> -->
            </div>
          </div>
          <!-- end of contact title -->

          <!-- design input contents form -->
          <div class="webInputFrom webDesignInput">
            <form action="/gold/php_process/pages/web_insert.php" method="post" name="web_form" enctype="multipart/form-data">
              <div class="titleSer clear">
                <p class="title_input">
                  <label for="title">Title</label>
                  <input type="text" placeholder="Title Here" id="title" name="web_title">
                </p>
                <p class="serial_input">
                  <label for="serial">SerialNo.</label>
                  <input type="text" placeholder="SerialNo. Here" id="serial" name="web_serial">
                </p>
                <p class="client_input">
                  <label for="client">Client</label>
                  <input type="text" placeholder="Client Name" id="client" name="web_client">
                </p>
                <p class="domain_input">
                  <label for="domain">Domain</label>
                  <input type="text" placeholder="Domain Name" id="domain" name="web_domain">
                </p>
              </div>
              <!-- end of title, serial, client input  -->
              <div class="web_desc uploadDesc">
                <textarea name="web_desc" placeholder="Website Description Here..."></textarea>
              </div>
              <!-- end of text description -->
              <div class="uploadImgs clear">
                <div class="uploadBox img1">
                  <div class="inputControll">
                    <input class="uploadName" placeholder="Main Image">
                    <label for="mainImage">SELECT IMAGE</label>
                    <input type="file" id="mainImage" class="uploadHidden" name="main">
                  </div>
                  <div class="img1_box imgWrap">
                    <img id="img1">
                  </div>
                </div>
                <div class="uploadBox img2">
                  <div class="inputControll">
                    <input class="uploadName" placeholder="mobile Image">
                    <label for="subImage">SELECT IMAGE</label>
                    <input type="file" id="subImage" class="uploadHidden" name="mobile">
                  </div>
                  <div class="img2_box imgWrap">
                    <img id="img2">
                  </div>
                </div>
                <div class="uploadBox img3">
                  <div class="inputControll">
                    <input class="uploadName" placeholder="Thumbnail Image (400 * 400)">
                    <label for="thumImage">SELECT IMAGE</label>
                    <input type="file" id="thumImage" class="uploadHidden" name="thumbnail">
                  </div>
                  <div class="thumb_box imgWrap">
                    <img id="thumb">
                  </div>
                </div>
              </div>
              <!-- end of image upload box -->
            </form>
          </div>
          <!-- end of designInputFrom -->

          <div class="btns">
            <button type="submit" class="commonBtn" id="submitBtn">UPLOAD</button>
          </div>

        </div>
        <!-- end of center -->
  
      </section>

      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/about.php" ?>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/footer.php" ?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/gold/js/custom.js"></script>
    <script src="/gold/js/design_upload.js"></script>
    <script>
      const submitBtn = document.querySelector("#submitBtn");

      submitBtn.addEventListener('click', function(e){
        e.preventDefault();
        if(!document.web_form.web_title.value){
          alert('상품명을 입력해 주세요!');
          document.web_form.web_title.focus();
          return;
        }

        if(!document.web_form.web_serial.value){
          alert('시리얼 넘버를 입력해 주세요!');
          document.web_form.web_serial.focus();
          return;
        }

        if(!document.web_form.web_client.value){
          alert('납품 업체명을 입력해 주세요!');
          document.web_form.web_client.focus();
          return;
        }

        if(!document.web_form.web_domain.value){
          alert('도메인을 입력해 주세요!');
          document.web_form.web_domain.focus();
          return;
        }

        if(!document.web_form.web_desc.value){
          alert('상품 설명을 입력해 주세요!');
          document.web_form.web_desc.focus();
          return;
        }

        if(!document.web_form.main.value){
          alert('메인 사진을 입력해 주세요!');
          return;
        }

        if(!document.web_form.mobile.value){
          alert('모바일 사진을 입력해 주세요!');
          return;
        }

        if(!document.web_form.thumbnail.value){
          alert('썸네일 사진을 입력해 주세요!');
          return;
        }

        document.web_form.submit();
      });
    </script>
  </body>
</html>
