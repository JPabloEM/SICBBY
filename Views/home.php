<?php 
    nav_info($data); 
?>

<!DOCTYPE html> 
  <head>
    <meta charset="utf-8" />
    <title>SICBBY</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="Assets/Ptemplate/img/icon/CBBY.webp" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Quicksand:wght@600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="Assets/Ptemplate/lib/animate/animate.min.css" rel="stylesheet" />
    <link href="Assets/Ptemplate/lib/lightbox/css/lightbox.min.css" rel="stylesheet" />
    <link href="Assets/Ptemplate/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Assets/Ptemplate/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="Assets/Ptemplate/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Spinner Start -->
    <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div
        class="spinner-border text-primary"
        style="width: 3rem; height: 3rem"
        role="status"
      >
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->

    <!-- Topbar End -->

    <!-- Navbar Start -->
 


    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid bg-dark p-0 mb-5">
      <div class="row g-0 flex-column-reverse flex-lg-row">
        <div class="col-lg-6 p-0 wow fadeIn" data-wow-delay="0.1s">
       
          <div
            class="header-bg h-100 d-flex flex-column justify-content-center p-5"
          >
          <p style="color: white"><span class="me-2"></span>SICBBY</p>
            <h1 class="display-4 text-light mb-1">
              Sistema de Información Corredor Biológico Bosques del Yaguarundi
            </h1>
            <div class="d-flex align-items-center pt-4 animated slideInDown">
              <a href="<?= base_url(); ?>/sobreV" class="btn btn-primary py-sm-3 px-3 px-sm-5 me-5"
                >Ver más</a
              >
              <button
                type="button"
                class="btn-play"
                data-bs-toggle="modal"
                data-src="https://www.youtube.com/embed/DWRcNpR6Kdc"
                data-bs-target="#videoModal"
              >
                <span></span>
              </button>
              <h6 class="text-white m-0 ms-4 d-none d-sm-block">Ver Video</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
          <div class="owl-carousel header-carousel">
            <div class="owl-carousel-item">
              <img class="img-fluid" src="Assets/Ptemplate/img/carousel-1.webp" alt="" />
            </div>
            <div class="owl-carousel-item">
              <img class="img-fluid" src="Assets/Ptemplate/img/carousel-2.webp" alt="" />
            </div>
           
            
          </div>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Video Modal Start -->
    <div
      class="modal modal-video fade"
      id="videoModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <!-- 16:9 aspect ratio -->
            <div class="ratio ratio-16x9">
              <iframe
                class="embed-responsive-item"
                src=""
                id="video"
                allowfullscreen
                allowscriptaccess="always"
                allow="autoplay"
              ></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Video Modal End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
        
            <h1 class="display-5 mb-4">
              HISTORIA DEL CORREDOR BIOLÓGICO 
              <span class="text-primary" >BOSQUES DEL YAGUARUNDI</span>
            </h1>
            <p class="mb-4" style="text-align: justify;">
            El Corredor Biológico Bosques del Yaguarundi (CBBY) se ubica en 
            la Península de Nicoya, en el Área de Conservación Tempisque, anteriormente era 
            conocido como Corredor Biológico Potrero-Caimital (CBPC). Este Corredor Biológico fue creado con el fin cumplir 
            la misión y los objetivos establecidos por el Corredor Biológico Mesoamericano (CBM), sirviendo como 
            iniciativa de integración regional firmada en 1997 para promover la conservación de los bosques a 
            través del ordenamiento territorial, conformada por siete países de Centroamérica y México.
            </p>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>
              Se constituyó en el año 2006.
            </h5>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>
              Trabaja en la gestión integral del recurso hídrico como servicio fundamental.
            </h5>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>
              Brinda estos servicios a los habitantes de las ciudades de Nicoya y Hojancha. 
            </h5>
            <a class="btn btn-primary py-3 px-5 mt-3" href="sobreV" style='border-radius: 15px;' >Leer más</a>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="img-border">
              <img class="img-fluid" src="Assets/Ptemplate/img/home1.webp" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->

    <!-- Facts Start -->

    
    <div
      class="container-xxl bg-primary facts my-5 py-5 wow fadeInUp"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <div class="row g-4">
        <h2 style= 'text-align: center; color: white;'>Conservación de especies</h2>
          <div
            class="col-md-1 col-lg-3 text-center wow fadeIn"
            data-wow-delay="0.1s"
          >
          <img class="img-fluid" width="50" height="50" src="Assets/Ptemplate/img/icon/huella.webp" alt="ardilla" />
            <h1 class="text-white mb-2">Felinos</h1>
            <p class="text-white mb-0">Indicadores de la calidad del bosque.</p>
          </div>
          <div
            class="col-md-2 col-lg-3 text-center wow fadeIn"
            data-wow-delay="0.3s"
          >
          <img class="img-fluid" width="50" height="50" src="Assets/Ptemplate/img/icon/ardilla.webp" alt="ardilla" />
            <h1 class="text-white mb-2">Dispersores terrestres</h1>
            <p class="text-white mb-0">Transformadores del bosque-servicio ecosistémico de dispersión.</p>
          </div>
          <div
            class="col-md-2 col-lg-3 text-center wow fadeIn"
            data-wow-delay="0.5s"
          >
          <img width="64" height="64" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/000000/external-orangutan-in-the-wild-flaticons-lineal-color-flat-icons-2.png"
           alt="external-orangutan-in-the-wild-flaticons-lineal-color-flat-icons-2"/>
            <h1 class="text-white mb-2" >Frugívoros arbóreos</h1>
            <p class="text-white mb-0">Aumentan la diversidad biológica, contribuyen al bienestar humano.</p>
          </div>
          <div
            class="col-md-2 col-lg-3 text-center wow fadeIn"
            data-wow-delay="0.7s"
          >
          <img class="img-fluid" width="50" height="50" src="Assets/Ptemplate/img/icon/bat.webp" alt="murcielago" />
            <h1 class="text-white mb-2">Murciélagos frugívoros</h1>
            <p class="text-white mb-0">Transformadores del bosque, polinizadores.</p>
          </div>
          <div
            class="col-md-2 col-lg-3 text-center wow fadeIn"
            data-wow-delay="0.7s"
          >
          <img class="img-fluid" width="50" height="50" src="Assets/Ptemplate/img/icon/bird.webp" alt="ave" />
            <h1 class="text-white mb-2">Aves frugívoras</h1>
            <p class="text-white mb-0">Dispersoras.</p>
          </div>
          <div
            class="col-md-2 col-lg-3 text-center wow fadeIn"
            data-wow-delay="0.7s"
          >
          <img class="img-fluid" width="50" height="50" src="Assets/Ptemplate/img/icon/anfibio.webp" alt="anfibio" />
            <h1 class="text-white mb-2">Anfibios</h1>
            <p class="text-white mb-0">Indicadores de calidad de bosque.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Facts End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
          <div class="col-lg-6">
            <p><span class="text-primary me-2"></span>Elementos focales</p>
            <h1 class="display-5 mb-0">
              ¿Qué elementos focales se manejan dentro del Corredor Biológico
              <span class="text-primary">Bosques del Yaguarundi?</span> 
            </h1>
          </div>
          <div class="col-lg-6">
          </div>
        </div>
        <div class="row gy-5 gx-4">
          <div
            class="col-lg-3 col-md-4 col-sm-6 text-center wow fadeInUp"
            data-wow-delay="0.1s"
          >
            <img class="img-fluid mb-3"  width="80" height="80" src="Assets/Ptemplate/img/icon/water.webp" alt="Icon" />
            <h5 class="mb-3"> <strong>Recurso hídrico</strong></h5>
            <span
              >Proteger la importante red hídrica característica del territorio, genera conectividad 
              entre ecosistemas, trae bienestar social, y mantiene la biodiversidad.</span
            >
          </div>
          <div
            class="col-lg-3 col-md-4 col-sm-6 text-center wow fadeInUp"
            data-wow-delay="0.3s"
          >
            <img class="img-fluid mb-3"  width="80" height="80" src="Assets/Ptemplate/img/icon/bosque.webp" alt="Icon" />
            <h5 class="mb-3">Cobertura forestal</h5>
            <span
              >Se consideran los espacios fuera de ríos o quebradas donde aún existen parches de bosque remanente. 
              Estos parches que están dispersos en el territorio, tienen gran importancia para albergar la biodiversidad, además se 
              consideran los árboles que se encuentran amenazados o en peligro de extinción.</span
            >
          </div>
          <div
            class="col-lg-3 col-md-4 col-sm-6 text-center wow fadeInUp"
            data-wow-delay="0.5s"
          >
            <img class="img-fluid mb-3"  width="80" height="80" src="Assets/Ptemplate/img/icon/biodiversidad.webp" alt="Icon" />
            <h5 class="mb-3">Biodiversidad</h5>
            <span
              >Es un área estratégica que conecta hábitats naturales, 
              facilitando el movimiento de especies y promoviendo la diversidad genética. </span
            >
          </div>
          <div
            class="col-lg-3 col-md-4 col-sm-6 text-center wow fadeInUp"
            data-wow-delay="0.7s"
          >
            <img class="img-fluid mb-3"  width="80" height="80" src="Assets/Ptemplate/img/icon/comunidad.webp" alt="Icon" />
            <h5 class="mb-3">Cultura</h5>
            <span
              >La promoción de economías verdes y ecoturismo en la región, contribuye al bienestar de las comunidades 
              locales al proporcionar oportunidades económicas a través del ecoturismo y la educación ambiental. </span
            >
          </div>
          <div
            class="col-lg-3 col-md-4 col-sm-6 text-center wow fadeInUp"
            data-wow-delay="0.1s"
          >
            <img class="img-fluid mb-3" width="80" height="80"  src="Assets/Ptemplate/img/icon/proteccion.webp" alt="Icon" />
            <h5 class="mb-3">Protección</h5>
            <span
              >Entre los servicios que proporcionan se incluyen la protección de la fauna y flora, la conservación de ecosistemas,
               recurso hídrico, la mitigación del cambio climático, la promoción de economías ambientalmente sostenibles. </span
            >
          </div>
          <div
            class="col-lg-3 col-md-4 col-sm-6 text-center wow fadeInUp"
            data-wow-delay="0.3s"
          >
            <img class="img-fluid mb-3" width="80" height="80"  src="Assets/Ptemplate/img/icon/preservacion.webp" alt="Icon" />
            <h5 class="mb-3">Seguridad</h5>
            <span
              >Fomentar la seguridad alimentaria al proteger ecosistemas que sustentan 
              la agricultura y la provisión de recursos naturales, lo que beneficia a las poblaciones cercanas.</span
            >
          </div>
          <div
            class="col-lg-3 col-md-4 col-sm-6 text-center wow fadeInUp"
            data-wow-delay="0.5s"
          >
            <img class="img-fluid mb-3" width="80" height="80"  src="Assets/Ptemplate/img/icon/educacion.webp" alt="Icon" />
            <h5 class="mb-3">Social</h5>
            <span
              >Este corredor no solo preserva el patrimonio natural, sino que también genera empleo,
               educación y conciencia ambiental, fortaleciendo así el tejido social y la calidad de vida de las comunidades.</span
            >
          </div>
        </div>
      </div>
    </div>
    <!-- Service End -->


    <!-- Footer Start -->
  </body>
</html>

<?php 
  
	footer_info($data);
?>