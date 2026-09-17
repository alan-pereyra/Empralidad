# Documentación Técnica - Tema Empralidad

Bienvenido a la documentación oficial para desarrolladores del tema **Empralidad**. Este tema está diseñado para tiendas de comercio electrónico impulsadas por WordPress y WooCommerce, con un enfoque prioritario en dispositivos móviles (*mobile-first*), diseño plano (*flat design*), soporte para PWA y herramientas de conversión para venta directa (WhatsApp, carritos dinámicos y catálogo interactivo).

---

## 📚 Índice de Documentación

1. **[Arquitectura y Estructura del Tema](architecture.md)**
   - Organización de directorios y jerarquía de plantillas.
   - Ciclo de vida y flujo de carga de componentes.
   - Gestión de assets (CSS, JS y fuentes locales).

2. **[Mapa del Personalizador (WordPress Customizer)](customizer.md)**
   - Opciones generales de marca, tipografías y paleta de colores.
   - Sliders y carrusel de la página de inicio.
   - Ajustes de cabecera, navegación y pie de página.
   - Integraciones de analítica y mensajería.

3. **[Integración y Extensiones de WooCommerce](woocommerce.md)**
   - Sistema de especificaciones de hardware (PC Gamer).
   - Sistema dinámico de Benchmarks y FPS en juegos.
   - Mini-carrito dinámico con AJAX y botón flotante de WhatsApp.
   - Optimización de consultas para catálogos con miles de productos.

4. **[Guía de Buenas Prácticas y Desarrollo](development-guide.md)**
   - Estándares de seguridad de WordPress (Nonces, sanitización y *late escaping*).
   - Encolado seguro de scripts y cache-busting.
   - Sistema de distribución y actualizaciones automáticas vía GitHub.

---

## ⚙️ Requisitos Técnicos

- **WordPress:** 5.9 o superior (probado hasta 6.x).
- **PHP:** 7.4, 8.0, 8.1, 8.2+.
- **WooCommerce:** 6.0 o superior.
- **Extensiones PHP recomendadas:** `curl`, `json`, `mbstring`, `mysqli`.
