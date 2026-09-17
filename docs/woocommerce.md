# Integración y Extensiones de WooCommerce

El tema **Empralidad** amplía las capacidades estándar de WooCommerce con módulos específicos orientados a la venta de computadoras, tecnología y productos gamer.

---

## 1. Especificaciones de Hardware (PC Gamer)

El tema añade una sección personalizada en la pestaña general de cada producto en el panel de administración (`wp-admin > Productos > Editar producto`).

### Campos disponibles:

| Meta Key | Etiqueta | Icono SVG | Descripción |
| :--- | :--- | :--- | :--- |
| `_custom_product_component_field_cpu` | Procesador | `cpu.svg` | Modelo del microprocesador (ej: Intel Core i5 13400F / Ryzen 5 5600). |
| `_custom_product_component_field_mother` | Motherboard | `mother.svg` | Modelo de placa base y chipset (ej: ASUS B650M-A). |
| `_custom_product_component_field_ram` | Memoria RAM | `ram.svg` | Cantidad, tecnología y frecuencia (ej: 16GB DDR4 3200MHz). |
| `_custom_product_component_field_gpu` | Gráfica | `gpu.svg` | Modelo de la placa de video (ej: GeForce RTX 4060 8GB). |
| `_custom_product_component_field_gpu_brand` | Marca Gráfica | — | Selector: `Nvidia` o `AMD` (aplica estilos y tipografía específica de marca). |
| `_custom_product_component_field_ssd_hdd` | Almacenamiento | `ssd.svg` | Capacidad y tipo de unidad (ej: SSD NVMe 1TB M.2). |
| `_custom_product_component_field_power_supply`| Fuente | `power_supply.svg` | Potencia en Watts y certificación (ej: 650W 80 Plus Bronze). |
| `_custom_product_component_field_chassis` | Gabinete | `chassis.svg` | Modelo de gabinete o ventiladores incluidos. |
| `_custom_product_component_field_display` | Monitor | `display.svg` | Especificaciones de pantalla (pulgadas, Hz, resolución). |

### Visualización en Tienda:
- **En el catálogo (Grid / Loop):** `woocommerce/content-product.php` puede mostrar los componentes principales directamente en la tarjeta del producto.
- **En la ficha individual:** `woocommerce/single-product/tabs/description.php` muestra el bloque `#woocommerce-custom-field-pc-gaming` con cada icono SVG y su valor.

---

## 2. Sistema Dinámico de Benchmarks en Juegos

Permite mostrar a los compradores el rendimiento estimado en FPS de una computadora en hasta 5 videojuegos distintos.

### Configuración en el Administrador:
En la edición del producto, debajo de los componentes, se encuentran 5 pares de campos estructurados:
- **Juego / Calidad:** `_custom_benchmark_quality_{1..5}` (ej: *Cyberpunk 2077 - 1080p Ultra*).
- **FPS:** `_custom_benchmark_fps_{1..5}` (ej: *75*).

### Lógica de Visualización (`tabs/description.php`):
Si el producto contiene al menos un benchmark, el sistema genera automáticamente:
1. Una tarjeta por cada juego registrado.
2. Una **insignia de rendimiento** (*tier badge*):
   - **Ultra (+120 FPS):** Insignia violeta para tasas de refresco competitivas.
   - **Smooth (60 - 119 FPS):** Insignia verde esmeralda para juego 100% fluido.
   - **Playable (< 60 FPS):** Insignia ámbar.
3. Una **barra de progreso animada** calculada proporcionalmente sobre una escala de 144 FPS.

---

## 3. Mini-Carrito AJAX

El tema incluye un mini-carrito optimizado para dispositivos móviles:
- **Shortcode:** `[emp-mini-cart]` (ejecuta `emp_mini_cart()`).
- **Actualización en Tiempo Real:** Mediante el filtro `woocommerce_add_to_cart_fragments`, el contador flotante `#mini-cart-count` se refresca por AJAX cada vez que el usuario añade o elimina un producto sin necesidad de recargar la página.

---

## 4. Rendimiento en el Catálogo (`woocommerce.php`)

Para evitar problemas de saturación de memoria (*Memory Limit Exhaustion*) en tiendas con catálogos medianos o grandes, el rango de precios del filtro de búsqueda se calcula mediante una consulta SQL agregada directa:

```sql
SELECT 
  MIN(CAST(meta_value AS DECIMAL(10,2))) as min_price, 
  MAX(CAST(meta_value AS DECIMAL(10,2))) as max_price 
FROM wp_postmeta pm
INNER JOIN wp_posts p ON p.ID = pm.post_id
WHERE pm.meta_key = '_price' 
  AND pm.meta_value > ''
  AND p.post_status = 'publish' 
  AND p.post_type = 'product';
```

Esta consulta se ejecuta en pocos milisegundos y garantiza que el tema escale a decenas de miles de productos con un consumo de RAM plano.
