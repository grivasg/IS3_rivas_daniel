create database is3_rivas_daniel

-- Crear la tabla de Dependencias
CREATE TABLE Dependencias (
    dep_id SERIAL PRIMARY KEY,
    dep_nombre VARCHAR(50) NOT NULL
);

-- Crear la tabla de Operaciones
CREATE TABLE Operaciones (
    ope_id SERIAL PRIMARY KEY,
    ope_fecha DATE NOT NULL,
    ope_origen VARCHAR(30) NOT NULL,
    ope_destino VARCHAR(30) NOT NULL,
    ope_estado VARCHAR(30) NOT NULL,
    ope_dep_id INT,
    FOREIGN KEY (ope_dep_id) REFERENCES Dependencias(dep_id)
);

-- Crear la tabla de Coordenadas
CREATE TABLE Coordenadas (
    coord_id SERIAL PRIMARY KEY,
    coord_ope_id INT,
    coord_latitud DECIMAL(10, 7) NOT NULL,
    coord_longitud DECIMAL(10, 7) NOT NULL,
    FOREIGN KEY (coord_ope_id) REFERENCES Operaciones(ope_id)
);

-- Crear la tabla de OperacionesPorDependencia
CREATE TABLE OperacionesPorDependencia (
    total_ope_dep_id INT,
    total_operaciones INT,
    FOREIGN KEY (total_ope_dep_id) REFERENCES Dependencias(dep_id)
);

-- Crear la tabla de Roles
CREATE TABLE Roles (
    rol_id SERIAL PRIMARY KEY,
    rol_nombre VARCHAR(50) NOT NULL,
    rol_descripcion TEXT,
    rol_situacion SMALLINT DEFAULT 1
);

-- Crear la tabla de Usuarios
CREATE TABLE Usuarios (
    usu_id SERIAL PRIMARY KEY,
    usu_nombre VARCHAR(50) NOT NULL,
    usu_catalogo INTEGER,  -- Mantener el catálogo para validación
    usu_password VARCHAR(255) NOT NULL,  -- Usar VARCHAR para contraseñas
    usu_rol_id INT NOT NULL,
    usu_dep_id INT,  -- Puede ser NULL si el usuario no está asociado a ninguna dependencia
    usu_situacion SMALLINT DEFAULT 1,
    FOREIGN KEY (usu_rol_id) REFERENCES Roles(rol_id),
    FOREIGN KEY (usu_dep_id) REFERENCES Dependencias(dep_id)
);

-- Crear la tabla de Permisos
CREATE TABLE Permisos (
    permiso_id SERIAL PRIMARY KEY,
    permiso_rol INT NOT NULL,
    permiso_tipo VARCHAR(50) NOT NULL,  -- Tipo de permiso (por ejemplo: "ver_operaciones", "ver_mapa", etc.)
    permiso_situacion SMALLINT DEFAULT 1,
    FOREIGN KEY (permiso_rol) REFERENCES Roles(rol_id)
);



------------------------------------------------------------INSERTS------------
INSERT INTO dependencias (dep_nombre) VALUES (Brigada Militar Mariscal Zavala);
INSERT INTO dependencias (dep_nombre) VALUES (Primera Brigada de Policia Militar Guardia de Honor);
INSERT INTO dependencias (dep_nombre) VALUES (Primera Brigada de Policia Militar);
INSERT INTO dependencias (dep_nombre) VALUES (Guardia Presidencial);



INSERT INTO Operaciones (ope_fecha, ope_origen, ope_destino, ope_estado, ope_dep_id) VALUES ('2024-09-01', 'Plaza Mayor, Zona 1', 'Avenida de la Reforma, Zona 10', 'Completada', 1);
INSERT INTO Operaciones (ope_fecha, ope_origen, ope_destino, ope_estado, ope_dep_id) VALUES('2024-09-02', 'Plaza España, Zona 4', 'Avenida 6ª, Zona 1', 'En Progreso', 2);
INSERT INTO Operaciones (ope_fecha, ope_origen, ope_destino, ope_estado, ope_dep_id) VALUES('2024-09-03', 'Parque de la Industria, Zona 7', 'Plaza Mayor, Zona 1', 'Cancelada', 3);
INSERT INTO Operaciones (ope_fecha, ope_origen, ope_destino, ope_estado, ope_dep_id) VALUES('2024-09-04', 'Avenida de la Reforma, Zona 10', 'Plaza España, Zona 4', 'Completada', 4);
INSERT INTO Operaciones (ope_fecha, ope_origen, ope_destino, ope_estado, ope_dep_id) VALUES('2024-09-05', 'Avenida 6ª, Zona 1', 'Parque de la Industria, Zona 7', 'Completada', 1);



INSERT INTO Coordenadas (coord_ope_id, coord_latitud, coord_longitud) VALUES (1, 14.634915, -90.506882);  -- Plaza Mayor, Zona 1
INSERT INTO Coordenadas (coord_ope_id, coord_latitud, coord_longitud) VALUES (2, 14.609004, -90.513087);  -- Avenida de la Reforma, Zona 10
INSERT INTO Coordenadas (coord_ope_id, coord_latitud, coord_longitud) VALUES (3, 14.612679, -90.513835);  -- Plaza España, Zona 4
INSERT INTO Coordenadas (coord_ope_id, coord_latitud, coord_longitud) VALUES (4, 14.631200, -90.507000);  -- Avenida 6ª, Zona 1
INSERT INTO Coordenadas (coord_ope_id, coord_latitud, coord_longitud) VALUES (1, 14.618500, -90.527000);  -- Parque de la Industria, Zona 7
