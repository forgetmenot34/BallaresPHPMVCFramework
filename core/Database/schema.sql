CREATE DATABASE warehouse_db;

USE warehouse_db;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    sku VARCHAR(100) NOT NULL,
    category VARCHAR(100),
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

select * from products;
insert into products(id, product_name, sku, category, quantity, created_at)
select 1, "NFA", "XW-098", "Rice", 56, '2026-05-20 22:11:56'
where not exists (select 1 from products where sku = 'XW-098');





