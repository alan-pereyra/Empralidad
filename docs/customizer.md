# Mapa del Personalizador (WordPress Customizer)

El tema **Empralidad** cuenta con un panel de personalización nativo muy amplio (`Apariencia > Personalizar`), modularizado en la carpeta `Customizer/`.

Todas las configuraciones se almacenan y consultan a través de la API estándar de WordPress mediante `get_theme_mod('clave_de_ajuste')`.

---

## 1. Módulos y Secciones

### A. Componentes Generales (`Customizer/components/`)
Configura la apariencia visual transversal a todo el sitio:

| Clave del Ajuste | Tipo | Descripción |
| :--- | :--- | :--- |
| `emp_components_notice_show` | Booleano | Muestra u oculta la barra de anuncio superior. |
| `emp_components_notice_text` | Texto/HTML | Contenido del aviso superior (promociones, envíos, etc.). |
| `emp_components_notice_background` | Color | Color de fondo de la barra de anuncio. |
| `emp_components_notice_color` | Color | Color del texto de la barra de anuncio. |
| `emp_components_nav_logo` | Imagen | Logotipo principal mostrado en la barra de navegación. |
| `emp_components_nav_home` | URL | URL personalizada para el clic en el logotipo (por defecto `home_url()`). |
| `emp_components_nav_search` | Booleano | Activa el botón de búsqueda en la barra superior y móvil. |
| `emp_components_nav_cart` | Booleano | Muestra el acceso directo al carrito con contador dinámico. |
| `emp_components_nav_user` | URL | Enlace para la cuenta de usuario / inicio de sesión. |
| `emp_components_nav_wsp` | Booleano | Habilita el botón flotante de WhatsApp. |
| `emp_components_nav_wsp_numb` | Texto | Número de teléfono para WhatsApp (solo dígitos con código de país). |
| `emp_components_nav_wsp_custom_link` | URL | Enlace personalizado alternativo para el botón de WhatsApp. |
| `emp_components_nav_chat_emp` | URL | Enlace a la WebApp de mensajería (Chat-EMP). |
| `emp_components_head_video` | Video | Video de fondo para la cabecera en la página principal. |

---

### B. Portada y Sliders (`Customizer/frontpage/`)
Controla los elementos visuales de la página de inicio (`front-page.php`):

| Clave del Ajuste | Tipo | Descripción |
| :--- | :--- | :--- |
| `emp_slider_image1` | Imagen | Primer slider de cabecera. |
| `emp_slider_image2` | Imagen | Segundo slider opcional. |
| `emp_slider_image3` | Imagen | Tercer slider opcional. |
| `emp_front_title_show` | Booleano | Muestra el título y texto principal del carrusel. |
| `emp_front_textarea` | Texto | Descripción del primer bloque del carrusel. |
| `emp_front_btn1` | Texto | Etiqueta del botón de llamada a la acción primario. |
| `emp_front_link_btn1` | URL | Destino del botón primario. |
| `emp_front_btn_secondary1` | Texto | Etiqueta del botón secundario. |
| `emp_front_link_btn_secondary1` | URL | Destino del botón secundario. |

---

### C. WooCommerce y Comercio Electrónico (`Customizer/woocommerce/`)
Ajustes propios para la experiencia de compra:

| Clave del Ajuste | Tipo | Descripción |
| :--- | :--- | :--- |
| `emp_woocommerce_bg` | Color | Color de fondo para bloques y contenedores de tienda. |
| `emp_woocommerce_color` | Color | Color de texto y elementos interactivos de tienda. |
| `emp_woocommerce_featured_show` | Booleano | Activa el carrusel de productos destacados en la portada. |
| `emp_woocommerce_categories_show` | Booleano | Muestra el grid de categorías destacadas en la portada. |

---

### D. Redes Sociales y Pie de Página (`Customizer/components/footer.php`)
Configuración de presencia digital y enlaces legales:

| Clave del Ajuste | Tipo | Descripción |
| :--- | :--- | :--- |
| `emp_components_footer_social_nickname` | Texto | Nombre de usuario o handle (ej: `@mitienda`). |
| `emp_components_footer_insta` | URL | Enlace al perfil de Instagram. |
| `emp_components_footer_tiktok` | URL | Enlace al perfil de TikTok. |
| `emp_components_footer_yt` | URL | Enlace al canal de YouTube. |
| `emp_components_footer_face` | URL | Enlace a la página de Facebook. |
| `emp_components_footer_tw` | URL | Enlace a la cuenta de Twitter / X. |
| `emp_components_footer_text` | Texto/HTML | Texto de créditos o descripción institucional en el pie. |
| `emp_components_footer_term` | Página | Selector de la página de Términos y Condiciones. |
| `emp_components_footer_poli` | Página | Selector de la página de Políticas de Privacidad. |
| `emp_components_footer_qr` | Texto/HTML | Inserción de código QR (ej: Data Fiscal AFIP). |
| `emp_components_footer_owner` | Booleano | Permite ocultar el crédito de autor *"Desarrollado por Empralidad"*. |

---

### E. Analítica y Píxeles (`Customizer/analytics/`)

| Clave del Ajuste | Tipo | Descripción |
| :--- | :--- | :--- |
| `emp_analytics_facebook_script` | Código HTML | Píxel de Meta / Facebook para seguimiento de conversiones. |
| `emp_analytics_google_script` | Código HTML | Etiqueta de Google Analytics (GTAG) o Google Tag Manager. |
