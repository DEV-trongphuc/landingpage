<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">

  <!-- Load JS sớm nhất -->
  <script src="/wp-content/new_public/LANDINGPAGE_MBA/variable.js?v=013009202ss3s5s276010"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const h1 = document.querySelector("h1");
    if (h1 && h1.textContent.trim() !== "") {
      document.title = h1.textContent.trim();
    }
  });
</script>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>