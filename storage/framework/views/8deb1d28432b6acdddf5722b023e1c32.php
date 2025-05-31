<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">
    <title>Agencia de Seguros | Tu tranquilidad es nuestra prioridad</title>
  </head>
  <body>
    <style>
        .about__section, .benefits__section, .contact__section {
          padding: 4rem 1rem;
          background-color: #f9f9f9;
        }
      
        .about__section h2,
        .benefits__section h2,
        .contact__section h2 {
          text-align: center;
          font-size: 2.2rem;
          margin-bottom: 2rem;
          color: #0a2c56;
        }
      
        .about__section h3 {
          margin-top: 1.5rem;
          font-size: 1.25rem;
          color: #0a2c56;
        }
      
        .container {
          max-width: 1200px;
          margin: 0 auto;
        }
      
        .benefits__grid {
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
          gap: 2rem;
          margin-top: 2rem;
        }
      
        .benefit__card {
          background: #ffffff;
          padding: 2rem;
          border-radius: 10px;
          text-align: center;
          box-shadow: 0 8px 20px rgba(0,0,0,0.05);
          transition: transform 0.3s ease;
        }
      
        .benefit__card:hover {
          transform: translateY(-5px);
        }
      
        .benefit__card i {
          font-size: 2.5rem;
          color: #0056b3;
          margin-bottom: 1rem;
        }
      
        .contact__section form {
          max-width: 600px;
          margin: 0 auto;
          background: #ffffff;
          padding: 2rem;
          border-radius: 10px;
          box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
      
        .form__group {
          margin-bottom: 1.5rem;
        }
      
        .form__group label {
          display: block;
          margin-bottom: 0.5rem;
          font-weight: 600;
        }
      
        .form__group input,
        .form__group select {
          width: 100%;
          padding: 0.75rem;
          border: 1px solid #ccc;
          border-radius: 5px;
          font-size: 1rem;
          background-color: #f8f8f8;
        }
      
        .btn__submit {
          display: inline-block;
          width: 100%;
          padding: 0.75rem;
          background-color: #0056b3;
          color: #fff;
          font-size: 1rem;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          transition: background-color 0.3s ease;
        }
      
        .btn__submit:hover {
          background-color: #003d80;
        }
      
        .btn__cta {
          display: inline-block;
          margin-top: 1rem;
          background: #0056b3;
          color: white;
          padding: 0.75rem 1.5rem;
          border-radius: 5px;
          text-decoration: none;
          font-weight: 500;
          transition: background 0.3s;
        }
      
        .btn__cta:hover {
          background: #003d80;
        }

        .elegant-bg {
  background: linear-gradient(to bottom, #f3f6fa, #ffffff);
  padding: 4rem 1rem;
}

.about__content {
  max-width: 1000px;
  margin: 0 auto;
}

.section__title {
  font-size: 2.5rem;
  color: #0a2c56;
  text-align: center;
  margin-bottom: 2rem;
  font-weight: 700;
}

.about__text .highlight {
  font-size: 1.2rem;
  color: #333;
  text-align: center;
  margin-bottom: 3rem;
  line-height: 1.8;
  max-width: 800px;
  margin-left: auto;
  margin-right: auto;
}

.about__grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
}

.about__card {
  background-color: #ffffff;
  padding: 2rem;
  border-left: 5px solid #0056b3;
  border-radius: 8px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.05);
  transition: transform 0.3s;
}

.about__card:hover {
  transform: translateY(-5px);
}

.about__card h3 {
  font-size: 1.5rem;
  margin-bottom: 1rem;
  color: #0056b3;
}

.about__card p {
  color: #555;
  line-height: 1.7;
}

.form__notice {
  background-color: #e9f3ff;
  border-left: 5px solid #0056b3;
  padding: 1rem 1.5rem;
  margin-bottom: 2rem;
  border-radius: 6px;
  display: flex;
  align-items: flex-start;
  gap: 1rem;
}

.form__notice i {
  font-size: 1.5rem;
  color: #0056b3;
  margin-top: 4px;
}

.form__notice p {
  margin: 0;
  color: #333;
  font-size: 1rem;
  line-height: 1.5;
}

.alert__success {
  background-color: #d4edda;
  border-left: 5px solid #28a745;
  padding: 1rem 1.5rem;
  margin-bottom: 1.5rem;
  border-radius: 6px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  font-size: 1rem;
  color: #155724;
  position: relative;
  animation: fadeIn 0.5s ease-in-out;
}

.alert__success i {
  font-size: 1.4rem;
  color: #28a745;
}

.alert__success button {
  background: transparent;
  border: none;
  font-size: 1.2rem;
  color: #155724;
  cursor: pointer;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-10px); }
  to { opacity: 1; transform: translateY(0); }
}



      </style>
      



    <nav>
      <div class="nav__logo">
        <div>IPW</div>
        Seguros
      </div>
      <ul class="nav__socials">
        <li><a href="#"><i class="ri-facebook-circle-fill"></i></a></li>
        <li><a href="#"><i class="ri-instagram-line"></i></a></li>
        <li><a href="#"><i class="ri-twitter-fill"></i></a></li>
        <li><a href="#"><i class="ri-whatsapp-line"></i></a></li>
      </ul>
      <div class="nav__contact">
        <div class="nav__contact__card">
          <span><i class="ri-phone-line"></i></span>
          <div>
            <p>Llámanos</p>
            <h4>+57 300 000 0000</h4>
          </div>
        </div>
        <div class="nav__contact__card">
          <span><i class="ri-mail-line"></i></span>
          <div>
            <p>Escríbenos</p>
            <h4>contacto@seguros.com</h4>
          </div>
        </div>
      </div>
    </nav>

    <header class="header__container">
      <div class="header__image">
        <img src="<?php echo e(asset('img/headers.jpg')); ?>" alt="header" />
      </div>
      <div class="header__content">
        <h1>Protegemos lo que <span>más valoras</span> desde 2003</h1>
        <p>
            En Ibeth Pana Weffer Seguros, tu experiencia es nuestra prioridad. Queremos ofrecerte el mejor 
            servicio y para lograrlo, necesitamos conocer tu opinión. 
            ¡Responde nuestra encuesta y ayúdanos a mejorar!
        </p>
        <a href="#formulario" class="btn__cta"> 
            Responder encuesta ya!
        </a>
      </div>
    </header>

    <section class="about__section elegant-bg">
        <div class="container">
          <div class="about__content">
            <div class="about__text">
              <h2 class="section__title">¿Quiénes Somos?</h2>
              <p class="highlight">
                Somos una agencia de seguros establecida en <strong>Maicao desde 2003</strong>, dedicada a ofrecer
                soluciones ágiles, seguras y personalizadas en pólizas y productos afines.
              </p>
            </div>
      
            <div class="about__grid">
              <div class="about__card">
                <h3>Misión</h3>
                <p>
                  Brindar asesoría experta y personalizada en seguros, guiando a nuestros clientes
                  en la selección de la póliza que mejor se adapte a sus necesidades,
                  protegiendo su patrimonio con respaldo profesional.
                </p>
              </div>
              <div class="about__card">
                <h3>Visión</h3>
                <p>
                  Para el año <strong>2026</strong>, consolidarnos como la agencia líder en La Guajira,
                  reconocida por la excelencia en nuestro servicio, calidad en la asesoría y
                  alianzas sólidas con las mejores compañías aseguradoras del país.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      

    <section class="benefits__section">
      <div class="container">
        <h2>Beneficios de Elegirnos</h2>
        <div class="benefits__grid">
          <div class="benefit__card">
            <i class="ri-shield-check-line"></i>
            <h4>Protección Real</h4>
            <p>Tu patrimonio siempre seguro con respaldo profesional.</p>
          </div>
          <div class="benefit__card">
            <i class="ri-hand-heart-line"></i>
            <h4>Atención Personalizada</h4>
            <p>Adaptamos nuestras pólizas a tus necesidades reales.</p>
          </div>
          <div class="benefit__card">
            <i class="ri-building-line"></i>
            <h4>Aliados Confiables</h4>
            <p>Trabajamos con las principales aseguradoras del país.</p>
          </div>
        </div>
      </div>
    </section>

    <section id="formulario" class="contact__section">
        <div class="form__notice">
            <i class="ri-information-line"></i>
            <p>
              Esta encuesta nos permite saber si prefieres registrar tu póliza de manera 
              <strong>100% virtual</strong> o de forma <strong>presencial</strong> desde nuestra sede. 
              Tu elección nos ayudará a brindarte una mejor atención.
            </p>
          </div>
          
            <div class="container">
                <h2>Formulario de consulta</h2>
                <?php if(session('success')): ?>
        <div class="alert__success" id="alert-success">
            <i class="ri-checkbox-circle-line"></i>
            <span><?php echo e(session('success')); ?></span>
            <button onclick="document.getElementById('alert-success').style.display='none'">&times;</button>
        </div>
        <?php endif; ?>

        <form action="<?php echo e(route('contacto.store')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div class="form__group">
            <label>Modalidad</label>
            <select name="modalidad" required>
              <option value="virtual">100% Virtual</option>
              <option value="presencial">Presencial</option>
            </select>
          </div>
          <div class="form__group">
            <label>Tipo de Usuario</label>
            <select name="tipo_usuario" required>
              <option value="empresa">Empresa</option>
              <option value="persona">Persona Natural</option>
            </select>
          </div>
          <div class="form__group">
            <label>Nombre / Razón Social</label>
            <input type="text" name="nombre" required />
          </div>
          <div class="form__group">
            <label>Correo Electrónico</label>
            <input type="email" name="email" required />
          </div>
          <button type="submit" class="btn__submit">Enviar</button>
        </form>
      </div>
    </section>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="<?php echo e(asset('js/contact.js')); ?>"></script>
  </body>
</html><?php /**PATH C:\xampp\htdocs\aseguradora\resources\views/pages/contact.blade.php ENDPATH**/ ?>