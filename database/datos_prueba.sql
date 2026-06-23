-- Datos de prueba para PostgreSQL.
-- Ejecutar desde la raiz del proyecto con:
-- psql -U postgres -d 8ids2 -f database/datos_prueba.sql
--
-- Este archivo no borra datos existentes. Si se ejecuta mas de una vez,
-- agregara registros duplicados porque las tablas no tienen codigo unico.

BEGIN;

INSERT INTO almacenes (codigo, nombre, created_at, updated_at) VALUES
('ALM-001', 'Almacen Central', now(), now()),
('ALM-002', 'Almacen Norte', now(), now()),
('ALM-003', 'Almacen Sur', now(), now()),
('ALM-004', 'Almacen Este', now(), now()),
('ALM-005', 'Almacen Oeste', now(), now()),
('ALM-006', 'Almacen Refacciones', now(), now()),
('ALM-007', 'Almacen Temporada', now(), now()),
('ALM-008', 'Almacen Mayoreo', now(), now()),
('ALM-009', 'Almacen Mostrador', now(), now()),
('ALM-010', 'Almacen Devoluciones', now(), now());

INSERT INTO productos (codigo, nombre, precio, impuesto, existencia, created_at, updated_at) VALUES
('PROD-001', 'Laptop Lenovo IdeaPad 15', 12999.00, 16.00, 12, now(), now()),
('PROD-002', 'Mouse Inalambrico Logitech', 349.00, 16.00, 80, now(), now()),
('PROD-003', 'Teclado Mecanico Redragon', 1199.00, 16.00, 35, now(), now()),
('PROD-004', 'Monitor Samsung 24 pulgadas', 2899.00, 16.00, 18, now(), now()),
('PROD-005', 'Disco SSD Kingston 1TB', 1399.00, 16.00, 44, now(), now()),
('PROD-006', 'Memoria RAM Kingston 16GB', 899.00, 16.00, 60, now(), now()),
('PROD-007', 'Cable HDMI 2 metros', 129.00, 16.00, 150, now(), now()),
('PROD-008', 'Adaptador USB C a HDMI', 399.00, 16.00, 55, now(), now()),
('PROD-009', 'Webcam Logitech C920', 1699.00, 16.00, 22, now(), now()),
('PROD-010', 'Audifonos Sony Bluetooth', 1499.00, 16.00, 30, now(), now()),
('PROD-011', 'Bocina JBL Go', 799.00, 16.00, 48, now(), now()),
('PROD-012', 'Impresora Epson EcoTank', 4599.00, 16.00, 9, now(), now()),
('PROD-013', 'Cartucho Tinta Negra Epson', 289.00, 16.00, 75, now(), now()),
('PROD-014', 'Cartucho Tinta Color Epson', 329.00, 16.00, 70, now(), now()),
('PROD-015', 'Router TP-Link Archer', 1299.00, 16.00, 26, now(), now()),
('PROD-016', 'Switch TP-Link 8 Puertos', 499.00, 16.00, 40, now(), now()),
('PROD-017', 'No Break Koblenz 750VA', 1599.00, 16.00, 16, now(), now()),
('PROD-018', 'Regulador de Voltaje 1000VA', 699.00, 16.00, 32, now(), now()),
('PROD-019', 'Silla Gamer Reclinable', 3899.00, 16.00, 11, now(), now()),
('PROD-020', 'Escritorio Oficina 120cm', 2499.00, 16.00, 14, now(), now()),
('PROD-021', 'Tablet Samsung Galaxy Tab', 5299.00, 16.00, 10, now(), now()),
('PROD-022', 'Celular Motorola G', 4799.00, 16.00, 20, now(), now()),
('PROD-023', 'Cargador Rapido USB C', 299.00, 16.00, 90, now(), now()),
('PROD-024', 'Power Bank 20000mAh', 649.00, 16.00, 45, now(), now()),
('PROD-025', 'Memoria USB 64GB', 149.00, 16.00, 120, now(), now()),
('PROD-026', 'Memoria USB 128GB', 249.00, 16.00, 95, now(), now()),
('PROD-027', 'Micro SD 128GB', 279.00, 16.00, 88, now(), now()),
('PROD-028', 'Lector de Tarjetas USB', 199.00, 16.00, 52, now(), now()),
('PROD-029', 'Base Enfriadora Laptop', 499.00, 16.00, 37, now(), now()),
('PROD-030', 'Pasta Termica Arctic', 189.00, 16.00, 64, now(), now()),
('PROD-031', 'Gabinete Gamer ATX', 1599.00, 16.00, 15, now(), now()),
('PROD-032', 'Fuente de Poder 650W', 1299.00, 16.00, 17, now(), now()),
('PROD-033', 'Tarjeta Madre MSI B760', 3499.00, 16.00, 8, now(), now()),
('PROD-034', 'Procesador Intel Core i5', 4299.00, 16.00, 7, now(), now()),
('PROD-035', 'Procesador AMD Ryzen 5', 3999.00, 16.00, 9, now(), now()),
('PROD-036', 'Tarjeta Grafica RTX 4060', 7499.00, 16.00, 5, now(), now()),
('PROD-037', 'Ventilador RGB 120mm', 169.00, 16.00, 100, now(), now()),
('PROD-038', 'Kit Limpieza Pantallas', 129.00, 16.00, 110, now(), now()),
('PROD-039', 'Papel Bond Carta 500 Hojas', 119.00, 16.00, 200, now(), now()),
('PROD-040', 'Toner HP Negro', 1199.00, 16.00, 25, now(), now()),
('PROD-041', 'Scanner Canon Lide', 2299.00, 16.00, 6, now(), now()),
('PROD-042', 'Proyector Epson XGA', 8999.00, 16.00, 4, now(), now()),
('PROD-043', 'Pantalla Proyector 100 pulgadas', 1899.00, 16.00, 6, now(), now()),
('PROD-044', 'Cable de Red Cat6 3 metros', 89.00, 16.00, 180, now(), now()),
('PROD-045', 'Bobina Cable Cat6 305 metros', 2199.00, 16.00, 12, now(), now()),
('PROD-046', 'Conector RJ45 Paquete 100', 149.00, 16.00, 75, now(), now()),
('PROD-047', 'Pinza Crimpadora RJ45', 299.00, 16.00, 38, now(), now()),
('PROD-048', 'Multimetro Digital', 349.00, 16.00, 28, now(), now()),
('PROD-049', 'Camara Seguridad IP', 999.00, 16.00, 34, now(), now()),
('PROD-050', 'DVR 8 Canales', 2899.00, 16.00, 13, now(), now());

COMMIT;
