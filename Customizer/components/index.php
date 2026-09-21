<?php
$wp_customize->add_panel( 'emp_panel_components', array(
  'priority' => 1,
  'title' 	 => __( 'Componentes globales', 'empralidad' )
));
include get_template_directory().'/Customizer/components/notice.php';
include get_template_directory().'/Customizer/components/nav.php';
include get_template_directory().'/Customizer/components/header.php';
include get_template_directory().'/Customizer/components/content.php';
include get_template_directory().'/Customizer/components/buttons.php';
include get_template_directory().'/Customizer/components/footer.php';
include get_template_directory().'/Customizer/components/cata.php';
?>
