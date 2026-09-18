# Guía de Buenas Prácticas y Desarrollo

Esta guía está destinada a desarrolladores que mantengan, extiendan o personalicen el código de **Empralidad**.

---

## 1. Estándares de Seguridad de WordPress

El tema sigue los principios fundamentales de seguridad recomendados por el equipo de seguridad de WordPress:

### A. Nonces (Protección contra CSRF)
Todo formulario o acción en el panel de administración debe incluir y validar un nonce.
- **En la vista (formulario):**
  ```php
  wp_nonce_field( 'emp_save_product_custom_fields', 'emp_product_custom_fields_nonce' );
  ```
- **En el procesamiento (guardado):**
  ```php
  if ( ! isset( $_POST['emp_product_custom_fields_nonce'] ) || 
       ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['emp_product_custom_fields_nonce'] ) ), 'emp_save_product_custom_fields' ) ) {
      return;
  }
  ```

### B. Sanitización en Entrada (Data In)
Antes de persistir cualquier dato en la base de datos (`update_post_meta`, `update_option`), se debe sanitizar:
```php
$clean_value = sanitize_text_field( wp_unslash( $_POST['mi_campo'] ) );
update_post_meta( $post_id, 'mi_campo', $clean_value );
```

### C. Escapado Tardío en Salida (Late Escaping / Data Out)
Nunca imprimir variables directamente sin pasar por su función de escape adecuada:
- **Texto plano dentro de etiquetas HTML:** `<?php echo esc_html( $variable ); ?>`
- **Atributos HTML (como `class`, `id`, `value`):** `<?php echo esc_attr( $variable ); ?>`
- **Enlaces y URLs (como `href`, `src`):** `<?php echo esc_url( $url ); ?>`
- **Contenido con formato HTML permitido:** `<?php echo wp_kses_post( $contenido_html ); ?>`

---

## 2. Reglas de Oro de Rendimiento

1. **Evitar consultas no acotadas (`-1`):** Nunca realizar `get_posts` o `WP_Query` con `posts_per_page => -1` sobre tipos de contenido que puedan crecer con el tiempo (como productos, pedidos o entradas). Utilizar consultas SQL específicas con `$wpdb` para agregaciones (`COUNT`, `MIN`, `MAX`).
2. **Encolado de scripts sin bloqueos:** Siempre registrar scripts en el hook `wp_enqueue_scripts` con el parámetro `$in_footer = true`. No desenganchar `wp_head` de forma destructiva, ya que rompe pasarelas de pago y scripts en línea de plugins externos.
3. **Gestión de Caché (*Cache-Busting*):** Pasar siempre la versión del tema (`wp_get_theme()->get('Version')`) al encolar hojas de estilo y scripts. Esto garantiza que cuando el usuario actualice el tema, los navegadores de sus clientes descarguen los archivos nuevos inmediatamente.

---

## 3. Sistema de Actualizaciones Automáticas vía GitHub

El tema incluye en `functions.php` un sistema nativo para recibir actualizaciones directamente desde GitHub (`emp_check_update` conectado a `pre_set_site_transient_update_themes`).

### ¿Cómo publicar una nueva versión?
1. En el archivo raíz `style.css`, incrementa la versión en la cabecera:
   ```css
   /*
   Theme Name: Empralidad
   Version: 1.1.0
   ...
   */
   ```
2. Realiza el commit y sube los cambios a la rama principal (`master`):
   ```bash
   git commit -am "release: version 1.1.0"
   git push origin master
   ```
3. Los sitios de WordPress que tengan instalado el tema detectarán automáticamente la nueva versión en su panel de `Escritorio > Actualizaciones` y podrán actualizarlo con un solo clic.

---

## 4. Validación de Sintaxis Local

Antes de hacer commit de cualquier cambio en archivos PHP, ejecuta una validación rápida con el linter de PHP:

```powershell
& "C:\xampp\php\php.exe" -l archivo-modificado.php
```

---

## 5. Protocolo de Estilos CSS (Orden Alfabético)

Como práctica y convención estándar en el tema, las propiedades dentro de cada bloque de código `{}` deben ordenarse de forma **alfabética**:

- **Regla general:** Todas las reglas CSS no minificadas deben listar sus propiedades ordenadas alfabéticamente (`a` -> `z`). Esto permite mantener la uniformidad en todo el código y facilita la búsqueda rápida de propiedades específicas.
  ```css
  /* Ejemplo correcto */
  .mi-clase {
  	align-items: center;
  	background: var(--emp-woocommerce-color);
  	color: var(--emp-woocommerce-bg);
  	display: flex;
  	justify-content: center;
  	margin: 0 auto;
  	padding: 10px;
  	width: 100%;
  }
  ```
- **Excepción:** Las secciones o bloques minificados (aquellos que se encuentran en una sola línea continua, sin saltos de línea ni espacios) no requieren orden alfabético, ya que se consideran código compilado/terceros no sujeto a mantenimiento manual directo.

---

## 6. Protocolo de Colores y Variables CSS

Para garantizar la coherencia visual, la personalización dinámica desde el Customizer y evitar código redundante:

- **Uso estricto de variables del tema:** Siempre utilizar las variables CSS existentes (`var(--emp-woocommerce-bg)`, `var(--emp-woocommerce-color)`, `var(--emp-btn-bg)`, `var(--emp-btn-color)`, `var(--emp-content-bg)`, etc.) para colores de texto, fondos y botones.
- **Evitar `rgba()` hardcodeado:** Nunca utilizar colores en formato `rgba()` salvo que sea estrictamente indispensable (por ejemplo, efectos de fondo semitransparentes o sombras sutiles). Para regular la intensidad o jerarquía de un texto, utilizar la propiedad `opacity` sobre la variable correspondiente.
- **Eliminar estilos redundantes:** No declarar colores directos que el elemento ya herede limpiamente del contenedor padre o de las reglas globales del tema.
- **Patrón de Secciones Invertidas (Inversión de Colores):**
  - En secciones, tarjetas o componentes con fondo invertido respecto a la base de la página (por ejemplo tarjetas elevadas, barras de filtros, badges de confianza o bloques contrastados):
    - La propiedad `color` (texto) utiliza `var(--emp-content-bg)`.
    - La propiedad `background` utiliza `var(--emp-content-color)` (o transparencias/derivados de él).
  - **Regla mnemotécnica:** Cuando en una regla CSS el `color` dice `bg` (`color: var(--emp-content-bg);`) y el `background` dice `color` (`background: var(--emp-content-color);`), significa expresamente que **esa sección está invertida** para garantizar el contraste automático ante cualquier esquema de color definido por el usuario.


