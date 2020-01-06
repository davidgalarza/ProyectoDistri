CREATE DATABASE Restaurante;
use Restaurante;
CREATE TABLE Usuarios(
    ID INT PRIMARY KEY AUTO_INCREMENT, 
    NOMBRE VARCHAR(40), 
    APELLIDO VARCHAR(40),
    CEDULA VARCHAR(10) UNIQUE,
    TELEFONO VARCHAR(60),
    PERFIL VARCHAR(20),
    CONTRASENA VARCHAR(300)
);

CREATE TABLE Clientes(
    ID INT PRIMARY KEY AUTO_INCREMENT, 
    CEDULA VARCHAR(10) UNIQUE,
    NOMBRE VARCHAR(40), 
    APELLIDO VARCHAR(40),
    DIRECCION VARCHAR(60), 
    TELEFONO VARCHAR(60)
);
CREATE TABLE Mesas(
    ID INT PRIMARY KEY AUTO_INCREMENT, 
    CAPACIDAD INT,
    ESTADO VARCHAR(20)
);
CREATE TABLE Platos(
    ID INT PRIMARY KEY AUTO_INCREMENT, 
    NOMBRE VARCHAR(20), 
    PRECIO DECIMAL(5,2), 
    DESCRIPCION VARCHAR(50), 
    ESTADO VARCHAR(20), 
    CATEGORIA VARCHAR(20)
);
CREATE TABLE Pedidos(
    ID INT PRIMARY KEY AUTO_INCREMENT, 
    ID_CLIENTE INT, 
    FECHA_HORA DATETIME, 
    SUBTOTAL DECIMAL(5,2), 
    IVA DECIMAL(5,2), 
    TOTAL DECIMAL(5,2), 
    ID_MESA INT, 
    ESTADO VARCHAR(17),
    NUMERO_FACTUTA VARCHAR(20),
    FOREIGN KEY (ID_CLIENTE) REFERENCES Clientes(ID),
    FOREIGN KEY (ID_MESA) REFERENCES Mesas(ID)
);
CREATE TABLE Detalle_Pedidos(
    ID INT PRIMARY KEY AUTO_INCREMENT, 
    ID_PEDIDO INT, 
    ID_PLATO INT, 
    CANTIDAD INT, 
    SUBTOTAL DECIMAL(5,2),
    FOREIGN KEY (ID_PEDIDO) REFERENCES Pedidos(ID),
    FOREIGN KEY (ID_PLATO) REFERENCES Platos(ID)
);


