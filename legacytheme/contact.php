<?php

/**
 *  Template name: Contact
 */

$title = get_field('contact_title');
$email = get_field('contact_email');
$phone = get_field('contact_phone');
$telega = get_field('contact_telega');

get_header();
?>

<main id="main">
  <div class="page-contact">
    <div class="section-text section-text--decor">

      <div class="container container-md">
        <div class="contact-row">
          <?php if ($title) { ?>
            <div class="contact-col contact-col--title">
              <h1 class="contact-heding text-gradient"><?php echo $title; ?></h1>
            </div>
          <?php }; ?>
          <div class="contact-col contact-col--info">
            <?php if ($phone) { ?>
              <a class="contact-phone" target="_blank" href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone); ?>"><?php echo $phone; ?></a>
            <?php }; ?>
            <?php if ($email) { ?>
              <a class="contact-email text-gradient" target="_blank" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
            <?php }; ?>
          </div>
          <?php if ($telega) { ?>
            <div class="contact-col contact-col--telega">
              <a class="contact-telega-btn" target="_blank" href="<?php echo $telega; ?>">
                <span class="contact-telega-icon">
                  <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M43.8721 10.3398L37.8121 38.7098C37.3601 40.7078 36.2001 41.1578 34.5241 40.2558L25.4341 33.5518L20.9841 37.8058C20.5341 38.2578 20.0821 38.7098 19.0501 38.7098L19.7601 29.3598L36.7161 13.9518C37.4241 13.2418 36.5221 12.9838 35.6201 13.5658L14.5381 26.8458L5.44607 24.0738C3.44807 23.4298 3.44807 22.0738 5.89807 21.1738L41.2281 7.43981C42.9681 6.92381 44.4521 7.82781 43.8721 10.3398Z"
                      fill="white" />
                  </svg>
                </span>
                <span class="contact-telega-title">Telegram</span>
                <span class="contact-telega-hand">👋</span>
              </a>
            </div>
          <?php }; ?>
          <div class="contact-col contact-col--map">
            <div class="contact--map-w">
              <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d81253.06025967788!2d30.459700725306817!3d50.47539976412586!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1743970589572!5m2!1sru!2sua" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</main>
<?php

get_footer();
