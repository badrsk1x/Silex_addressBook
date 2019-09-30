CREATE TABLE zintec (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR NOT NULL,
    point_address  VARCHAR,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

insert into zintec
    (name, point_address)
values('Точка 1', 'Адрес точка 1');


