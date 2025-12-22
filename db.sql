USE loker;

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    fecha TIMESTAMP NOT NULL
          DEFAULT CURRENT_TIMESTAMP
          ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(50) NULL,
    nombre VARCHAR(50) NOT NULL,
    costo INT NOT NULL,
    precio INT NOT NULL,
    cantidad INT DEFAULT 0,
    categoria INT,
    fecha TIMESTAMP NOT NULL
          DEFAULT CURRENT_TIMESTAMP
          ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_categoria
        FOREIGN KEY (categoria)
        REFERENCES categorias(id)
);
