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
select 1, "Wireless Bluetooth Headphones", "WB-102", "Electronics", 15, '2026-05-20 22:11:56'
where not exists (select 1 from products where sku = 'WB-102');

insert into products(id, product_name, sku, category, quantity, created_at)
select 2, "Ergonomic Office Chair", "OC-784", "Furniture", 8, '2026-05-20 22:12:10'
where not exists (select 1 from products where sku = 'OC-784');

insert into products(id, product_name, sku, category, quantity, created_at)
select 3, "Stainless Steel Water Bottle", "WB-331", "Kitchen", 40, '2026-05-20 22:12:25'
where not exists (select 1 from products where sku = 'WB-331');

insert into products(id, product_name, sku, category, quantity, created_at)
select 4, "Gaming Mechanical Keyboard", "GK-559", "Electronics", 789, '2026-05-20 22:12:40'
where not exists (select 1 from products where sku = 'GK-559');

insert into products(id, product_name, sku, category, quantity, created_at)
select 5, "Yoga Exercise Mat", "YM-221", "Fitness", 25, '2026-05-20 22:12:55'
where not exists (select 1 from products where sku = 'YM-221');

insert into products(id, product_name, sku, category, quantity, created_at)
select 6, "LED Desk Lamp", "DL-908", "Home", 18, '2026-05-20 22:13:10'
where not exists (select 1 from products where sku = 'DL-908');

insert into products(id, product_name, sku, category, quantity, created_at)
select 7, "Portable Power Bank", "PB-667", "Accessories", 30, '2026-05-20 22:13:25'
where not exists (select 1 from products where sku = 'PB-667');

insert into products(id, product_name, sku, category, quantity, created_at)
select 8, "Men’s Running Shoes", "RS-450", "Sports", 20, '2026-05-20 22:13:40'
where not exists (select 1 from products where sku = 'RS-450');

insert into products(id, product_name, sku, category, quantity, created_at)
select 9, "Smartphone Tripod Stand", "TS-119", "Photography", 233, '2026-05-20 22:13:55'
where not exists (select 1 from products where sku = 'TS-119');

insert into products(id, product_name, sku, category, quantity, created_at)
select 10, "Canvas Travel Backpack", "TB-873", "Bags", 14, '2026-05-20 22:14:10'
where not exists (select 1 from products where sku = 'TB-873');




